<?php
    $title = "Recherche des praticiens";
    $entete = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/css/ol.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>';
    include("./vues/v_entete.php");
    include("./vues/v_bandeau.php");
    
    if (!isset ($_REQUEST['numVisiteur']) or !isset($_REQUEST['numSecteur'])){ 
        $numVisiteur =0;
        $numSecteur=0;}
    else{
        $numVisiteur =$_REQUEST['numVisiteur'];
        $numSecteur=$_REQUEST['numSecteur'];
    }

    $Secteurs = $pdo->getLesSecteur();
    $Praticiens = $pdo->getLesVisiteur();
    if( $numVisiteur=="0" and $numSecteur!="0"){
        $lesPraticiens = $pdo->getPraticiensSecteur($numSecteur);
    }
    if( $numVisiteur!="0" and $numSecteur!="0"){
        $lesPraticiens = $pdo->getPraticiens($numVisiteur,$numSecteur);
    }
    if( $numVisiteur!="0" and $numSecteur=="0"){
        $lesPraticiens = $pdo->getPraticiensVisiteur($numVisiteur);
    }
    if( $numVisiteur=="0" and $numSecteur=="0"){ 
        $lesPraticiens = $pdo->getToutPraticiens();
    }

        
    include("vues/v_recherchePraticiens.php");	
    
            
            
        ?>  

