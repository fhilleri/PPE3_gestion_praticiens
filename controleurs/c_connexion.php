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

        var_dump($profil);

        if ($profil !== false) 
        {
            echo "Bonjour " . $profil["nom"];

            $_SESSION['loginClient'] = $profil["login"];
            $_SESSION['typeprofilClient'] = $profil["typeprofil"];

            header("location: http://localhost/PPE3_gestion_praticiens/index.php?uc=praticiens&ucp=accueil");
        }
        else
        {
            echo("Erreur");
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