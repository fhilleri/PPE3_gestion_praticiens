<?php
	$action=$_REQUEST['action'];
	
	switch($action)
	{
		case 'afficherPortefeuille':
			{
				$leportefeuille = $pdo->getPorteFeuilleRes();
				include("vues/v_portefeuilleResponsable.php");
			break;
			}
		case 'modifierPortefeuille':
			{
				$matricule = $_REQUEST['matricule'];
				$idspecialite = $_REQUEST['idspecalte'];
				$idPraticien = $_REQUEST['idPraticien'];
				
				$modifP = $pdo->getmodifPortefeuille($matricule, $idspecialite, $idPraticien, $num, $nvmatricule, $nvidspecialite, $nvidpraticien);
				include("vues/v_modificationPortefeuille.php");
			break; 
			}
		case 'confirmerModif':
			{
				include("vues/v_modificationPortefeuille.php");
			break;
			}
        case 'supprimerPortefeuille':
            {
			   $suppr = $pdo->getsuprrPortefeuille();
			   include("vues/v_portefeuilleResponsable.php");
			break;
            }
	}
?>