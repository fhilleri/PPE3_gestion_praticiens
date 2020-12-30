<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'modificationPraticien':
		{
			$title = "Modification du praticien";
			include("./vues/v_entete.php");
			include("./vues/v_bandeau.php");

			$idPraticien = $_REQUEST['idPraticien'];
			$idSpecialite = $_REQUEST['idSpecialite'];
			$praticien = $pdo->getLePraticien($idPraticien, $idSpecialite);
			include("vues/v_modifierPraticien.php");
			
			include("./vues/v_pied.php");
			break;
		}
		case 'confirmModifPraticien':
		{
			//echo("confirmModifPraticien");

			$num = $_REQUEST['TNum'];
			$specialite = $_REQUEST['TSpecialite'];
			$nom = $_REQUEST['TNom'];
			$prenom = $_REQUEST['TPrenom'];
			$note = $_REQUEST['TNote'];
			$code = $_REQUEST['TCodePostal'];
			$ville = $_REQUEST['TVille'];
			$rue = $_REQUEST['TRue'];
			$longitude = $_REQUEST['TLongitude'];
			$latitude = $_REQUEST['TLatitude'];

			$pdo->modifierPraticien($num, $specialite, $nom, $prenom, $note, $code, $ville, $rue, $longitude, $latitude);
			
			$typeprofil = $_SESSION['typeprofilClient'];
			if ($typeprofil == 'V') header("location: index.php?uc=praticiens&ucp=portefeuilleVisiteur");
			else header("location: index.php?uc=praticiens&ucp=recherchePraticiens");

			//soit ce code :
			/*$lesPraticiens = $pdo->getLesPraticiens();
			include("vues/v_portefeuilleVisiteur.php");	*/
			break;
		}

		case 'ajout':
			$title = "Ajouter praticien";
			include("./vues/v_entete.php");
			include("./vues/v_bandeau.php");

			$specialites = $pdo->getSpecialites();

			include("./vues/v_ajouterPraticien.php");
			include("./vues/v_pied.php");

		break;

		case 'confirmAjout' :

			$idSpecialite = intval($_REQUEST['TSpecialite']);
			$idPraticien = $pdo->getMaxPraticienIndexParSpe($idSpecialite)["max"] +1;
			$note = $_REQUEST['TNote'];
			$nom = $_REQUEST['TNom'];
			$prenom = $_REQUEST['TPrenom'];
			$rue = $_REQUEST["TRue"];
			$codePostal = $_REQUEST["TCodePostal"];
			$ville = $_REQUEST['TVille'];
			$longitude = $_REQUEST['TLongitude'];
			$latitude = $_REQUEST['TLatitude'];

			$pdo->ajouterPraticien($idSpecialite, $idPraticien, $note, $nom, $prenom, $rue, $codePostal, $ville, $longitude, $latitude);
			header("location: index.php?uc=praticiens&ucp=recherchePraticiens");
		break;
	}
?>