<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'modifierPraticien':
		    {
			    include("vues/v_modificationPraticien");
            }
        case 'supprimerPraticien':
            {
               $sup = $pdo=>getSupprimerPraticien();
            }
	}
?>