<?php
	
	/*if (isset($_REQUEST['action']))
	{
		$action=$_REQUEST['action'];
	}
	switch($action){
			case 'VisiteurParPraticien':
				$lesVisiteurs = $pdo->getVisiteurP($id);
				include("vues/v_portefeuilleVisiteur.php");
			break;
		}*/

	$title = "Liste praticiens";
	$entete = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/css/ol.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>';
	include("./vues/v_entete.php");
	include("./vues/v_bandeau.php");
	$lesPraticiens = $pdo->getLesPraticiens();
	include("vues/v_portefeuilleVisiteur.php");	

	include("./vues/v_pied.php");
?>
