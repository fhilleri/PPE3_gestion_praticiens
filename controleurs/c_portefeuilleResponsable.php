<?php
	include("./vues/v_entete.php");
	include("./vues/v_bandeau.php");
	$action=$_REQUEST['action'];
	
	switch($action)
	{
		case 'afficherPortefeuille':
			{
				$leportefeuille = $pdo->getPorteFeuilleRes();
				include("vues/v_portefeuilleResponsable.php");
			break;
			}
		case 'ajouterPortefeuille':
			{
				$matricule = $_REQUEST['matricule'];
				$idspecialite = $_REQUEST['idspecialite'];
				$idPraticien = $_REQUEST['idpraticien'];
				
				$ajoutP = $pdo->getAjoutPortefeuille($matricule, $idspecialite, $idPraticien);
				include("vues/v_modificationPortefeuille.php");
			break; 
			}
		case 'confirmerAjout':
			{
				$matricule = $_REQUEST['Pmatricule'];
				$idspecialite = $_REQUEST['Pidspecialite'];
				$idPraticien = $_REQUEST['Pidpraticien'];
				
				$ajoutP = $pdo->getAjoutPortefeuille($matricule, $idspecialite, $idPraticien);
				
			break;
			}
        case 'supprimerPortefeuille':
            {
			   $suppr = $pdo->getsuprrPortefeuille();
			   include("vues/v_portefeuilleResponsable.php");
			break;
            }
	}
	include("./vues/v_entete.php");	
?>