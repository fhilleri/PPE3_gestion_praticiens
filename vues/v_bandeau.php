<nav id="bandeau">
	<!-- Images En-t�te -->
	<!--<img src="images/menuGauche.gif"    alt="Choisir" title="Choisir"/>-->
	<!--  Menu haut-->
	<ul id="menu">
		<div class="navbar">

      <a href="index.php?uc=accueil&ucp=accueil">LBC</a>

      <div id="nav">

        <div class="subnav">
          <button class="subnavbtn">Echantillons<i class="fa fa-caret-down"></i></button>
          <div class="subnav-content">
            <div class="subnav-content-centerer">
              
            </div>
          </div>
        </div>

        <div class="subnav">
          <button class="subnavbtn">Praticiens<i class="fa fa-caret-down"></i></button>
          <div class="subnav-content">
            <div class="subnav-content-centerer">
              <?php 
                if (isset($_SESSION['typeprofilClient']))
                {
                  $typeProfil = $_SESSION['typeprofilClient'];
                  if ($typeProfil == 'V') echo ('<a href="index.php?uc=praticiens&ucp=portefeuilleVisiteur">Praticiens par visiteur</a>');
                  else if ($typeProfil == 'R' || $typeProfil == 'S')
                  {
                    echo ('<a href="index.php?uc=praticiens&ucp=portefeuilleResponsable&action=afficherPortefeuille">Gestion Portefeuille</a>
                    <a href="index.php?uc=praticiens&ucp=specialite&action=afficher">Specialités</a>
                    <a href="index.php?uc=praticiens&ucp=rechercheVisiteurs">Recherche visiteurs</a>
                    <a href="index.php?uc=praticiens&ucp=recherchePraticiens">Recherche praticiens</a>');
                  }
                }
              ?>
            </div>
          </div>
        </div>

        <div class="subnav">
          <button class="subnavbtn">Carrières<i class="fa fa-caret-down"></i></button>
          <div class="subnav-content">
            <div class="subnav-content-centerer">
              
            </div>
          </div>
        </div>

        <div class="subnav">
          <button class="subnavbtn">Visites<i class="fa fa-caret-down"></i></button>
          <div class="subnav-content">
            <div class="subnav-content-centerer">
              
            </div>
          </div>
        </div>

        <div class="subnav">
          <button class="subnavbtn">Frais<i class="fa fa-caret-down"></i></button>
          <div class="subnav-content">
            <div class="subnav-content-centerer">
              
            </div>
          </div>
        </div>

        <div class="subnav">
          <button class="subnavbtn">Administration<i class="fa fa-caret-down"></i></button>
          <div class="subnav-content">
            <div class="subnav-content-centerer">
              
            </div>
          </div>
        </div>

        <div class="separator"></div>

        <?php
        if (isset($_SESSION["loginClient"]))
        {
          echo '<a class="bouton-deconnexion" href="index.php?uc=praticiens&ucp=deconnexion"><span>Déconnexion</span><span>' . $_SESSION['nomClient'] . ' | ' . $_SESSION['fonctionClient'] . '</span></a>';
        }
        else echo '<a href="index.php?uc=praticiens&ucp=connexion">Connexion</a>';
        ?>
      </div>
    </div>
	</ul>
</nav>