<?php
	
	$action=$_REQUEST['action'];
	switch($action){
			case 'VisiteurParPraticien':
				$lesVisiteurs = $pdo->getVisiteurP($id);
				include("vues/v_portefeuilleVisiteur.php");
			break;
		}

	$title = "Liste praticiens";
	include("./vues/v_entete.php");
	include("./vues/v_bandeau.php");
	$lesPraticiens = $pdo->getLesPraticiens();
	include("vues/v_portefeuilleVisiteur.php");	

	include("./vues/v_pied.php");
?>
