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
   
    $Secteurs = $pdo->getLesSecteur();
    $Praticiens = $pdo->getLesPraticiens();
    if( $numPraticien=="0" and $numSecteur=="0"){ 
        $LesVisiteur = $pdo->getToutVisiteur();
    }
    if( $numPraticien=="0" and $numSecteur!="0"){
        $LesVisiteur = $pdo->getVisiteurRegion($numSecteur);
    }
    if( $numPraticien!="0" and $numSecteur!="0"){
        $LesVisiteur = $pdo->getVisiteur($numPraticien,$numSecteur);
    }
    if( $numPraticien!="0" and $numSecteur=="0"){
        $LesVisiteur = $pdo->getVisiteurPraticiens($numPraticien);
    }
 
    
   
   
 include("vues/v_rechercheVisiteurs.php");	
    
?>  

