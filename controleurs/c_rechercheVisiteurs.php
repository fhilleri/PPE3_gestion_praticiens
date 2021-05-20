<?php
    $title = 'Recherche des visiteur';
    include("./vues/v_entete.php");
    include("./vues/v_bandeau.php");
    
    if (!isset ($_REQUEST['praticien']) or !isset($_REQUEST['numSecteur'])){ 
        $idSpecialite =0;
        $idPraticien =0;
        $numSecteur=0;}
    else{
        $splitedPraticien = explode(";", $_REQUEST['praticien']);
        $idSpecialite = $splitedPraticien[0];
        $idPraticien = $splitedPraticien[1];
        $numSecteur=$_REQUEST['numSecteur'];
    }
   
    $Secteurs = $pdo->getLesSecteur();
    $Praticiens = $pdo->getLesPraticiens();
    if( $idPraticien=="0" and $numSecteur=="0"){ 
        $LesVisiteur = $pdo->getToutVisiteur();
    }
    if( $idPraticien=="0" and $numSecteur!="0"){
        $LesVisiteur = $pdo->getVisiteurSecteur($numSecteur);
    }
    if( $idPraticien!="0" and $numSecteur!="0"){
        $LesVisiteur = $pdo->getVisiteur($idSpecialite, $idPraticien,$numSecteur);
    }
    if( $idPraticien!="0" and $numSecteur=="0"){
        $LesVisiteur = $pdo->getVisiteurPraticiens($idSpecialite, $idPraticien);
    }
 
    
   
   
 include("vues/v_rechercheVisiteurs.php");	
    
?>  

