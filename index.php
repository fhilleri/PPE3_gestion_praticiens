<?php
session_start();
require_once("./modele/class.pdolbc.inc.php");

if(!isset($_REQUEST['uc']))
	$uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

$pdo = Pdolbc::getPdolbc();	 
switch($uc)
{
	case 'accueil':
		{include("controleurs/c_accueil.php");break;}
	case 'echantillons' :
		{include("controleurs/c_echantillons.php");break;}
	case 'praticiens' :
		{ include("controleurs/c_praticiens.php");break; }
	case 'carrières' :
		{ include("controleurs/c_carrières.php");break; }
	case 'visites' :
		{ include("controleurs/c_visites.php");break; }
	case 'frais' :
		{ include("controleurs/c_frais.php");break; }
	case 'administration' :
		{ include("controleurs/c_administration.php");break; }
	}
include("vues/v_pied.php") ;
?>

