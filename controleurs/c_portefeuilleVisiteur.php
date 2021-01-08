<?php
	
	$matricule = $_SESSION["valeur"];
	
	$filtres = array();
	$filtres["specialites"] = $pdo->getSpecialitesPortefeuilleVisiteur($matricule);
	$filtres["notes"] = $pdo->getNotesPortefeuilleVisiteur($matricule);
	$filtres["villes"] = $pdo->getVillesPortefeuilleVisiteur($matricule);

	if (isset($_POST["filters-defined"]))
	{
		$filtresRequete = array();
		if (isset($_POST["specialites"])) $filtresRequete["specialites"] = $_POST["specialites"];
		else $filtresRequete["specialites"] = array();
	
		if (isset($_POST["notes"])) $filtresRequete["notes"] = $_POST["notes"];
		else $filtresRequete["notes"] = array();
	
		if (isset($_POST["villes"])) $filtresRequete["villes"] = $_POST["villes"];
		else $filtresRequete["villes"] = array();
	}
	else $filtresRequete = null;

	$lesPraticiens = $pdo->getPortefeuilleVisiteur($matricule, $filtresRequete);

	$title = "Liste praticiens";
	$entete = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/css/ol.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>';
	include("./vues/v_entete.php");
	include("./vues/v_bandeau.php");
	include("vues/v_portefeuilleVisiteur.php");	

	include("./vues/v_pied.php");
?>
