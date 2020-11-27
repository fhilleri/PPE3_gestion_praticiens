<?php
	$action=$_REQUEST['action'];
	
	switch($action)
	{
		case 'afficherPraticien':
			{
				include("vues/v_portefeuilleResponsable.php");
			break;
			}
        case 'supprimerVisite':
            {
               
            }
	}
?>