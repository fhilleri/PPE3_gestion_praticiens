
<main>
    <h2 class="text-align">Gestion de votre portefeuille</h2>

    <div class="text-align">
        <a class='bouton centered' href='index.php?uc=praticiens&ucp=portefeuilleResponsable&action=ajouterPortefeuille'>Ajouter une relation</a>
    </div>

    <form class="centered text-align" action="index.php?uc=praticiens&ucp=portefeuilleResponsable&action=afficherPortefeuille" method="post">
    <table class="tableau">
            <tr>
                <th>Matricule visiteur</th>
                <th>Nom praticien</th>
                <th></th>
                <th></th>
            </tr> 
        <?php

        foreach( $leportefeuille as $relations)
        {
            $matricule = $relations['matricule'];
            $nom = $relations['nom'];
            $idspecialite = $relations['idspecialite'];
            $idPraticien = $relations['idPraticien'];
        
            ?>
            <tr>
                <td><?php echo $matricule ?></a></td>
                <td><?php echo $nom ?></td>
                

                <td><a href=index.php?uc=praticiens&ucp=portefeuilleResponsable&action=modification&matricule=<?php echo $matricule ?>&idPraticien=<?php echo $idPraticien ?>&idspecialite=<?php echo $idspecialite?>><img class="bouton_image" src="./images/modification.png" title="Ajout"></a></td>
                <td><a href=index.php?uc=praticiens&ucp=portefeuilleResponsable&action=supprimerPortefeuille&matricule=<?php echo $matricule ?>&idPraticien=<?php echo $idPraticien ?>&idspecialite=<?php echo $idspecialite?>><img class="bouton_image" src="./images/delete.png" title="Suppr"></a></td>
            </tr>
            <?php 
        }
        ?>
	</form>
    </div>
	
</main>