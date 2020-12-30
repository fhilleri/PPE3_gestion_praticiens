<?php
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
       if( $numVisiteur==0 and $numSecteur!=0){
       $lesPraticiens = $pdo->getPraticiensRegion($numSecteur);
    }
       if( $numVisiteur!=0 and $numSecteur!=0){
        $lesPraticiens = $pdo->getPraticiens($numVisiteur,$numSecteur);
    }
    if( $numVisiteur!=0 and $numSecteur==0){
        $lesPraticiens = $pdo->getPraticiensVisiteur($numVisiteur);
    }
    if( $numVisiteur==0 and $numSecteur==0){ 
    $lesPraticiens = $pdo->getToutPraticiens();
}
  

        
       include("vues/v_recherchePraticiens.php");	
           
            
            
        ?>  

