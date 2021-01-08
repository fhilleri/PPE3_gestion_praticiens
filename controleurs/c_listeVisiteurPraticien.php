<?php
    $title = "Liste visiteurs";
	include("./vues/v_entete.php");
	include("./vues/v_bandeau.php");
    
    if (isset($_GET["idSpecialite"]) && isset($_GET["idPraticien"]))
    {
        $idPraticien = $_GET["idPraticien"];
        $idSpecialite = $_GET["idSpecialite"];
        $praticien = $pdo->getLePraticien($idPraticien, $idSpecialite);
        $visiteurs = $pdo->getPraticiensV($idPraticien, $idSpecialite);

        include("./vues/v_listeVisiteurPraticien.php");
    }

	
	include("./vues/pied.php");	
?>