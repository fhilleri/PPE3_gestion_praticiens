<?php
    $title = "Liste visiteurs";
	include("./vues/v_entete.php");
	include("./vues/v_bandeau.php");
    $action=$_REQUEST['action'];
    
    switch($action)
	{
        case 'VisiteurParPraticien':
            {
            $praticienP = $pdo->getPraticiensV($id);
            break;
        }
    }
	
	include("./vues/v_entete.php");	
?>