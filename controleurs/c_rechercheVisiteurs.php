<?php
    $title = 'Recherche des visiteur';
    include("./vues/v_entete.php");
    include("./vues/v_bandeau.php");
    
    if (!isset ($_REQUEST['idPraticien']) or !isset($_REQUEST['numSecteur'])){ 
        $numPraticien =0;
        $numSecteur=0;}
    else{
        $numPraticien =$_REQUEST['idPraticien'];
        $numSecteur=$_REQUEST['numSecteur'];
    }
   
    $Regions = $pdo->getLesRegion();
    $Praticiens = $pdo->getLesPraticiens();
    if( $numPraticien=="0" and $numSecteur=="0"){ 
        $LesVisiteur = $pdo->getToutVisiteur();
    }
    else{
        $LesVisiteur = $pdo->getVisiteur($numPraticien,$numSecteur);
    }
    
   
   
 include("vues/v_rechercheVisiteurs.php");	
    
?>  

