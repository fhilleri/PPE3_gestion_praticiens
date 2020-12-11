<?php

	$action=$_REQUEST['action'];
	
	switch($action)
	{
		case 'afficherPortefeuille':
			{
				include("./vues/v_entete.php");
				include("./vues/v_bandeau.php");
				$leportefeuille = $pdo->getPorteFeuilleRes();
				include("vues/v_portefeuilleResponsable.php");
			break;
			}
		case 'ajouterPortefeuille':
			{
				include("./vues/v_entete.php");
				include("./vues/v_bandeau.php");
				include("vues/v_ajouterPortefeuille.php");
			break; 
			}
		case 'confirmerAjout':
			{
				$matricule = $_REQUEST['Pmatricule'];
				$idspecialite = $_REQUEST['Pidspecialite'];
				$idPraticien = $_REQUEST['PidPraticien'];
				
				$ajoutP = $pdo->getAjoutPortefeuille($matricule, $idspecialite, $idPraticien);
				header("location: index.php?uc=praticiens&ucp=portefeuilleResponsable&action=afficherPortefeuille");
			break;
			}
        case 'supprimerPortefeuille':
            {
				$matricule = $_REQUEST['matricule'];
				$idspecialite = $_REQUEST['idspecialite'];
				$idPraticien = $_REQUEST['idPraticien'];

				$suppr = $pdo->getsuprrPortefeuille($matricule, $idspecialite, $idPraticien);
				header("location: index.php?uc=praticiens&ucp=portefeuilleResponsable&action=afficherPortefeuille");
			break;
            }
	}
	include("./vues/v_entete.php");	
?>