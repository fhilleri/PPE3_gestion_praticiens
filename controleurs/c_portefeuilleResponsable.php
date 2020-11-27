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
				$modifP = $pdo->getmodifPortefeuille();
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