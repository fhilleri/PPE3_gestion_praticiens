<?php
	
	$action=$_REQUEST['action'];
	switch($action){
			case 'VisiteurParPraticien':
				$lesVisiteurs = $pdo->getVisiteurP($id);
				include("vues/v_portefeuilleVisiteur.php");
			break;
		}

?>
