<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'modificationPraticien':
		{
			$title = "Modification du praticien";
			include("./vues/v_entete.php");
			include("./vues/v_bandeau.php");

			$num = $_REQUEST['idPraticien'];
			$praticien = $pdo->getLePraticien($num);
			include("vues/v_modifierPraticien.php");
			
			include("./vues/v_pied.php");
			break;
		}
		case 'confirmModifPraticien':
		{
			$num = $_REQUEST['TNum'];
			$nom = $_REQUEST['TNom'];
			$prenom = $_REQUEST['TPrenom'];
			$specialite = $_REQUEST['TSpecialite'];
			$notoriete = $_REQUEST['TNotoriete'];
			$ville = $_REQUEST['TVille'];

			$pdo->modifierClient($nom,$prenom,$specialite,$notoriete,$ville,$num);
			
			//soit ce code :
			$lesPraticiens = $pdo->getLesPraticiens();
			include("vues/v_portefeuilleVisiteur.php");	
			break;
		}

		case 'ajout':
			$title = "Ajouter praticien";
			include("./vues/v_entete.php");
			include("./vues/v_bandeau.php");

			include("./vues/v_ajouterPraticien.php");
			include("./vues/v_pied.php");

		break;

		case 'confirmAjout' :

			$idSpecialite = intval($_REQUEST['TSpecialite']);
			$idPraticien = $pdo->getMaxPraticienIndex()["max"] +1;
			$note = $_REQUEST['TNote'];
			$nom = $_REQUEST['TNom'];
			$prenom = $_REQUEST['TPrenom'];
			$rue = $_REQUEST["TRue"];
			$codePostal = $_REQUEST["TCodePostal"];
			$ville = $_REQUEST['TVille'];
			$longitude = $_REQUEST['TLongitude'];
			$latitude = $_REQUEST['TLatitude'];

			$pdo->ajouterPraticien($idSpecialite, $idPraticien, $note, $nom, $prenom, $rue, $codePostal, $ville, $longitude, $latitude);
		break;
	}
?>