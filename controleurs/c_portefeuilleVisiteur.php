<?php
	$action=$_REQUEST['action'];

	$id = $_GET['matricule'];

	switch($action)
	{
		case 'PraticienParVisiteur' : 
			$lesPraticiens = $pdo->getPraticiensV($id);
			include("vues/v_portefeuilleVisiteur.php");	
		break;
		case 'VisiteurParPraticien':
			if(isset ($id)) {


			}else {

			}
	}
?>
