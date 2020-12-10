<nav id="bandeau">
	<!-- Images En-t�te -->
	<!--<img src="images/menuGauche.gif"    alt="Choisir" title="Choisir"/>-->
	<!--  Menu haut-->
	<ul id="menu">
		<div class="navbar">
      <a href="index.php?uc=accueil&ucp=accueil">Accueil</a>
      <div class="subnav">
        <button class="subnavbtn">Echantillons<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
        </div>
      </div>
      <div class="subnav">
        <button class="subnavbtn">Praticiens<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <?php 
            if (isset($_SESSION['typeprofilClient']))
            {
              $typeProfil = $_SESSION['typeprofilClient'];
              if ($typeProfil == 'V') echo ('<a href="index.php?uc=praticiens&ucp=portefeuilleVisiteur&action=modification">Praticiens par visiteur</a>');
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
      <div class="subnav">
        <button class="subnavbtn">Carrières<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
        </div>
      </div>
      <div class="subnav">
        <button class="subnavbtn">Visites<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
        </div>
      </div>
      <div class="subnav">
        <button class="subnavbtn">Frais<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
        </div>
      </div>
      <div class="subnav">
        <button class="subnavbtn">Administration<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
        </div>
      </div>
      <?php
      if (isset($_SESSION["loginClient"]))
      {
        echo '<a href="index.php?uc=praticiens&ucp=deconnexion">Déconnexion</a>';
      }
      else echo '<a href="index.php?uc=praticiens&ucp=connexion">Connexion</a>';
      ?>
    </div>
	</ul>
</nav>