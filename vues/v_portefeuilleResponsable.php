
<main>
    <h1>PorteFeuille</h1>

    <a class='bouton centered' href='index.php?uc=praticiens&ucp=portefeuilleResponsable&action=ajouterPortefeuille'>Ajouter une relation</a>

    <form action="index.php?uc=praticiens&ucp=portefeuilleResponsable&action=afficherPortefeuille" method="post">
    <table >
            <tr>
            <td>Matricule visiteur :</td><td>Nom praticien :</td>
            <td>Région:</td>
            </tr> 
        <?php

        foreach( $leportefeuille as $relations)
        {
            $matricule = $relations['matricule'];
            $nom = $relations['nom'];
            $region = $relations['reg_code'];
            $idspecialite = $relations['idspecialite'];
            $idPraticien = $relations['idPraticien'];
        
            ?>
            <tr>
                <td width=150><?php echo $matricule ?></a></td>
                <td width=150><?php echo $nom ?></td>
                <td width=300><?php echo $region ?></td>
                
               
               	<td width=30><a href=index.php?uc=praticiens&ucp=portefeuilleResponsable&action=supprimerPortefeuille&matricule=<?php echo $matricule ?>&idPraticien=<?php echo $idPraticien ?>&idspecialite=<?php echo $idspecialite?>><img class="bouton_image" src="./images/delete.png" title="Suppr"></a></td>
            </tr>
            <?php 
        }
        ?>
       
	</form>
    </div>
	
</main>