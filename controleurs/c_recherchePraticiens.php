<?php
         
         
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

