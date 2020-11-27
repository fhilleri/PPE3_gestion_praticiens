<?php

if (isset($_REQUEST["action"])) $action = $_REQUEST["action"];
else $action = "afficher";

switch($action)
{
    case "afficher":
        $title = "Spécialités";
        include("./vues/v_entete.php");
        include("./vues/v_bandeau.php");
        
        $specialites = $pdo->getSpecialites();
        include("./vues/v_specialites.php");

        include("./vues/v_pied.php");
    break;

    case "ajouter":
        $title = "Spécialités";
        include("./vues/v_entete.php");
        include("./vues/v_bandeau.php");

        include("./vues/v_specialiteAjout.php");

        include("./vues/v_pied.php");
    break;

    case "comfirmAjouter":
        $nomSpecialite = $_REQUEST["Fnom"];
        
        $pdo->ajouterSpecialite($nomSpecialite);
        header("location: index.php?uc=praticiens&ucp=specialite");
        
    break;

    case "confirmSupprimer":
        $idSpecialite = $_REQUEST["idSpecialite"];
        $pdo->supprimerSpecialite($idSpecialite);
    break;
}

?>