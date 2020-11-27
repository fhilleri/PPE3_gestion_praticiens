<?php

if (isset($_REQUEST["action"])) $action = $_REQUEST["action"];
else $action = "afficher";

switch($action)
{
    case "afficher":
        $title = "Spécialités";
        include("./vues/v_entete.php");
        include("./vues/v_bandeau.php");
        
        

        include("./vues/v_pied.php");
    break;
}

?>