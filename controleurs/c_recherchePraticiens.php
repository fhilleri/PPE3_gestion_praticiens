<?php
                    
        if (isset ($numVisiteur) or isset($numSecteur)){ 
            $numVisiteur =1;
            $numSecteur=1;}
       $lesPraticiens = $pdo->getPraticiens($numVisiteur,$numSecteur);
       include("vues/v_recherchePraticiens.php");	
           
            
            
        ?>  

