<?php

if (isset($_REQUEST["ucp"]))
{
    $ucp = $_REQUEST["ucp"];
}
else $ucp = "accueil";

$pdo = Pdolbc::getPdolbc();	 
switch($ucp)
{
    case "accueil":
        include("c_accueil.php");
    break;
    case "connexion":
        include("c_connexion.php");
    break;
    case "deconnexion":
        include("c_deconnexion.php");
    break;
    case "portefeuilleResponsable":
        include("controleurs/c_portefeuilleResponsable.php");
         break;
    case "portefeuilleVisiteur" :
        include("controleurs/c_portefeuilleVisiteur.php"); 
        break;
    case "ajouterPortefeuille" : 
        include("controleurs/c_portefeuilleResponsable.php");
        break;
    case "modifierPraticiens" :
        include("controleurs/c_modifierPraticiens.php"); 
        break;
     case "recherchePraticiens" :
        include("controleurs/c_recherchePraticiens.php"); 
        break;
    
}

?>