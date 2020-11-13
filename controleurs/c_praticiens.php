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
}


?>