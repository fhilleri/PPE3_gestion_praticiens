<?php
	
	if(isset ($id)) {

		$action=$_REQUEST['action'];
		$id = $_GET['matricule'];

		switch($action)
		{
			case 'VisiteurParPraticien':
				$lesVisiteurs = $pdo->getVisiteurP($id);
				include("vues/v_portefeuilleVisiteur.php");
			break;
		}

	}else {

		"Vous n'êtes pas connecté"
	}

?>
