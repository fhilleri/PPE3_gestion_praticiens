<?php
if (isset($_REQUEST["action"])) $action = $_REQUEST["action"];
else $action = "connexion";

switch ($action) {
    case 'validerConnexion':
        
        if (isset($_REQUEST["login"]) && isset($_REQUEST["mdp"]))
        {
            $login = $_REQUEST["login"];
            $mdp = $_REQUEST["mdp"];
        }
        else
        {
            $login = "";
            $mdp = "";
        }

        $profil = $pdo->getProfilConnexion($login, $mdp);

        if ($profil !== false) 
        {

            $_SESSION['loginClient'] = $profil["login"];
            $_SESSION['typeprofilClient'] = $profil["typeprofil"];
            $_SESSION['nomClient'] = $profil["nom"];
            
            $fonctions = array(
                'R' => 'Responsable R',
                'D' => 'Responsable D',
                'S' => 'Responsable S',
                'V' => 'Visiteur',
                'C' => 'Comptable'
            );

            $_SESSION['fonctionClient'] = $fonctions[$profil['typeprofil']];

            header("location: index.php?uc=praticiens&ucp=accueil");
        }
        else
        {
            header("location: index.php?uc=praticiens&ucp=connexion");
        }

        break;
    
    default:
        
        $title = "Connexion";
        include("./vues/v_entete.php");
        include("./vues/v_bandeau.php");
        
        include("./vues/v_connexion.php");
        include("./vues/pied.php");
        break;
}

?>