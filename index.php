<?php
session_start();
//require_once("util/fonctions.inc.php");
require_once("util/class.pdolbc.inc.php");
//include("vues/v_entete.php") ;
//include("vues/v_bandeau.php") ;

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

if(!isset($_SESSION['idClient']))
{
	include("vues/v_champConnexion.php");
}
else
{
	include("vues/v_informationsConnexion.php");
}

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
	case 'portefeuilleResponsable' :
		{ include("controleurs/c_portefeuilleResponsable.php");break; }
	case 'portefeuilleVisiteur' :
		{ include("controleurs/c_portefeuilleVisiteur.php");break;}
	case 'listeVisiteurPraticiens' :
		{ include("controleurs/c_listeVisiteurPraticiens.php");break; }	
}
include("vues/v_pied.php") ;
?>

