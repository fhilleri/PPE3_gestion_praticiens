<?php

if (isset($_REQUEST["ucp"]))
{
    $ucp = $_REQUEST["ucp"];
    $pdo = Pdolbc::getPdolbc();	 
    switch($ucp)
    {
        case "accueil":
            {include("./c_accueil.php"); 
            break;}
        
        case "portefeuilleVisiteur" :
            {include("vues/v_portefeuilleVisiteur.php"); 
            break;}
    }
}

?>