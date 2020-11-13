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
}


?>