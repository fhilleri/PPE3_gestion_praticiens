<?php

if (isset($_REQUEST["ucp"]))
{
    $ucp = $_REQUEST["ucp"];
}
else $ucp = "accueil";

function checkPermission($types)
{
    if (isset($_SESSION['typeprofilClient']))
    {
        foreach ($types as $type) {
            if ($_SESSION['typeprofilClient'] == $type) return true;
        }
    }

    $title = "Erreur de permission";
    include("./vues/v_entete.php");
    include("./vues/v_bandeau.php");
    
    include("./vues/v_permissionErreur.php");
    include("./vues/pied.php");
}

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
        if (checkPermission(['R', 'S'])) include("c_portefeuilleResponsable.php");
        break;
    case "portefeuilleVisiteur" :
        if (checkPermission(['V'])) include("controleurs/c_portefeuilleVisiteur.php"); 
        break;
    case "modifierPraticiens" :
        if (checkPermission(['R', 'S', 'V'])) include("controleurs/c_modifierPraticiens.php"); 
        break;
    case "recherchePraticiens" :
        if (checkPermission(['R', 'S'])) include("controleurs/c_recherchePraticiens.php"); 
        break;
    case "specialite":
        if (checkPermission(['R', 'S'])) include("controleurs/c_specialites.php"); 
        break;
    case "rechercheVisiteurs" :
        if (checkPermission(['R', 'S'])) include("controleurs/c_rechercheVisiteurs.php"); 
        break;
    
}

?>