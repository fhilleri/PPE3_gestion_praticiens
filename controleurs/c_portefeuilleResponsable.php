<?php
	$action=$_REQUEST['action'];
	switch($action)
	{
		case 'connecter':
		    {
				$profil = $pdo->getProfilConnexion($login, $mdp);
				$_SESSION['loginClient'] = $profil["login"];
				$_SESSION['typeprofilClient'] = $profil["typeprofil"];

				if($profil["typeprofil"]== 'R')
				{
					include("vues/v_portefeuilleResponsable.php");
				}
				else
				{
					echo("Vous n'êtes pas connecté en tant que responsable");
				}

				break;
			}
		case 'afficherPraticien':
			{
				include("vues/v");
			break;
			}
        case 'supprimerVisite':
            {
               
            }
	}
?>