<?php
    $title = 'Recherche des visiteur';
    include("./vues/v_entete.php");
    include("./vues/v_bandeau.php");
    
    if (!isset ($_REQUEST['idPraticien']) or !isset($_REQUEST['numSecteur'])){ 
        $numPraticien =1;
        $numSecteur=1;}
    else{
        $numPraticien =$_REQUEST['idPraticien'];
        $numSecteur=$_REQUEST['numSecteur'];
    }

    $Region = $pdo->getLesRegion();
    $Praticiens = $pdo->getLesPraticiens();
    $LesVisiteur = $pdo->getVisiteur($numPraticien,$numSecteur);
    include("vues/v_rechercheVisiteurs.php");	
    
?>  

