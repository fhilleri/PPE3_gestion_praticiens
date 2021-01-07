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

				$regionA = $_REQUEST['regionA'];
				$regionT = $_REQUEST['regionT'];
				$pdo->getverifreg($regionA, $regionT);
	
				if($regionA = $regionT){
					$matricule = $_REQUEST['Pmatricule'];
					$idspecialite = $_REQUEST['Pidspecialite'];
					$idPraticien = $_REQUEST['PidPraticien'];
					
					$ajoutP = $pdo->getAjoutPortefeuille($matricule, $idspecialite, $idPraticien);
					header("location: index.php?uc=praticiens&ucp=portefeuilleResponsable&action=afficherPortefeuille");
				}else{
					echo("La région n'est pas la même pour le praticien et le visiteur.");
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
				$regionA = $_REQUEST['regionA'];
				$regionT = $_REQUEST['regionT'];
				$pdo->getverifreg($regionA, $regionT);

				if($regionA = $regionT){

					$matricule = $_REQUEST['PnouveauMatricule'];
					$idspecialite = $_REQUEST['PnouveauIdspecialite'];
					$idPraticien = $_REQUEST['PnouveauIdPraticien'];
		
					$nouveauMatricule = $_REQUEST['Pmatricule'];
					$nouveauIdspecialite = $_REQUEST['Pidspecialite'];
					$nouveauIdPraticien = $_REQUEST['PidPraticien'];
		
					$pdo->getsuprrPortefeuille($matricule, $idspecialite, $idPraticien);
					$pdo->getAjoutPortefeuille($nouveauMatricule, $nouveauIdspecialite, $nouveauIdPraticien);
					
					header("location: index.php?uc=praticiens&ucp=portefeuilleResponsable&action=afficherPortefeuille");
					
				}else{
					echo("La région n'est pas la même pour le praticien et le visiteur.");
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
	include("./vues/pied.php");	
?>