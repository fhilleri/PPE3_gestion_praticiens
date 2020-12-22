<?php
    $entete = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/css/ol.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>';
    $title = 'Recherche de praticiens';
    include("./vues/v_entete.php");
    include("./vues/v_bandeau.php");
    
    if (!isset ($_REQUEST['numVisiteur']) or !isset($_REQUEST['numSecteur'])){ 
        $numVisiteur =1;
        $numSecteur=1;}
    else{
        $numVisiteur =$_REQUEST['numVisiteur'];
        $numSecteur=$_REQUEST['numSecteur'];
    }

    $Region = $pdo->getLesRegion();
    $Praticiens = $pdo->getLesVisiteur();
    $lesPraticiens = $pdo->getPraticiens($numVisiteur,$numSecteur);
    include("vues/v_recherchePraticiens.php");	
        
        
        
?>  

