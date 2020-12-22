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
		case 'modification' :
			$matricule = $_REQUEST['matricule'];
			$idspecialite = $_REQUEST['idspecialite'];
			$idPraticien = $_REQUEST['idPraticien'];
			$elementPortefeuille = $pdo->getElementPorteFeuille($matricule, $idspecialite, $idPraticien);
			include("./vues/v_entete.php");
			include("./vues/v_bandeau.php");
			include("vues/v_modifierPortefeuille.php");
			break;
		case 'confirmerModification' :
			$matricule = $_REQUEST['PnouveauMatricule'];
			$idspecialite = $_REQUEST['PnouveauIdspecialite'];
			$idPraticien = $_REQUEST['PnouveauIdPraticien'];

			$nouveauMatricule = $_REQUEST['Pmatricule'];
			$nouveauIdspecialite = $_REQUEST['Pidspecialite'];
			$nouveauIdPraticien = $_REQUEST['PidPraticien'];

			$pdo->getsuprrPortefeuille($matricule, $idspecialite, $idPraticien);
			$pdo->getAjoutPortefeuille($nouveauMatricule, $nouveauIdspecialite, $nouveauIdPraticien);
			
			header("location: index.php?uc=praticiens&ucp=portefeuilleResponsable&action=afficherPortefeuille");
			break;
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