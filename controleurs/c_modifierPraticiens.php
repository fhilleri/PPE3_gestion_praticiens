<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'modificationPraticien':
		{
			$num = $_REQUEST['idPraticien'];
			$praticien = $pdo->getLePraticien($num);
			include("vues/v_modifierPraticien.php");
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
	}
?>