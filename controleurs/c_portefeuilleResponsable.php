<?php

	$action=$_REQUEST['action'];
	
	switch($action)
	{
		case 'afficherPortefeuille':
			{
				$title = "Portefeuille";
				$entete = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/css/ol.css" type="text/css">
				<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>';
				include("./vues/v_entete.php");
				include("./vues/v_bandeau.php");
				$leportefeuille = $pdo->getPorteFeuilleRes();
				include("vues/v_portefeuilleResponsable.php");
			break;
			}

		case 'ajouterPortefeuille':
			{
				$title = "Ajouter portefeuille";
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
		
				
				$regionPraticien = $pdo->getregionpraticien($idspecialite, $idPraticien);
				$regionVisiteur = $pdo->getregionvisiteur($matricule);
		
				

				if($regionPraticien["reg_code"] == $regionVisiteur["reg_code"]){
					
					$ajoutP = $pdo->getAjoutPortefeuille($matricule, $idspecialite, $idPraticien);
					header("location: index.php?uc=praticiens&ucp=portefeuilleResponsable&action=afficherPortefeuille");
				}else{
					$_SESSION["error"]["portefeuilleResponsable"] = "La région n'est pas la même pour le praticien et le visiteur.";
					header("location: index.php?uc=praticiens&ucp=portefeuilleResponsable&action=afficherPortefeuille");
				}
				break;
			}

		case 'modification' :
			{
				$matricule = $_REQUEST['matricule'];
				$idspecialite = $_REQUEST['idspecialite'];
				$idPraticien = $_REQUEST['idPraticien'];
				$elementPortefeuille = $pdo->getElementPorteFeuille($matricule, $idspecialite, $idPraticien);

				$title = 'Modifier portefeuille';
				include("./vues/v_entete.php");
				include("./vues/v_bandeau.php");
				include("vues/v_modifierPortefeuille.php");
				break;
			}
		case 'confirmerModification' :
			{
				$matricule = $_REQUEST['PnouveauMatricule'];
				$idspecialite = $_REQUEST['PnouveauIdspecialite'];
				$idPraticien = $_REQUEST['PnouveauIdPraticien'];
				$regionPraticien = $pdo->getregionpraticien($idspecialite, $idPraticien);
				$regionVisiteur = $pdo->getregionvisiteur($matricule);

				if($regionPraticien["reg_code"] == $regionVisiteur["reg_code"]){

				
					$nouveauMatricule = $_REQUEST['Pmatricule'];
					$nouveauIdspecialite = $_REQUEST['Pidspecialite'];
					$nouveauIdPraticien = $_REQUEST['PidPraticien'];
		
					$pdo->getsuprrPortefeuille($matricule, $idspecialite, $idPraticien);
					$pdo->getAjoutPortefeuille($nouveauMatricule, $nouveauIdspecialite, $nouveauIdPraticien);
					
					header("location: index.php?uc=praticiens&ucp=portefeuilleResponsable&action=afficherPortefeuille");
					
				}else{
					$_SESSION["error"]["portefeuilleResponsable"] = "La région n'est pas la même pour le praticien et le visiteur.";
					header("location: index.php?uc=praticiens&ucp=portefeuilleResponsable&action=afficherPortefeuille");
				}
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
	include("./vues/v_pied.php");	
?>