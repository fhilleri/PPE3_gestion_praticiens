
<main>

    <form class="centered text-align" action="index.php?" method="post">
        <p><H1>Liste de vos praticiens</H1>

        <table class="tableau">
            <tr>
            <th>Nom </th><th>Prénom </th>
            <th>Spécialité </th><th>Notoriété </th>
            <th>Ville </th>
            <th></th>
            <th></th>
            </tr> 
        <?php
        
        foreach((array)$lesPraticiens as $unPraticien)
        {
            $num = $unPraticien['idPraticien'];
            $nom = $unPraticien['nom'];
            $prenom = $unPraticien['prenom'];
            $specialite = $unPraticien['idspecialite'];
            $notoriete = $unPraticien['note'];
            $ville = $unPraticien['ville'];
        
            ?>
            <tr>
                <td><?php echo $nom ?></td>
                <td><?php echo $prenom ?></td>
                <td><?php echo $specialite ?></td>
                <td><?php echo $notoriete?></td>
                <td><?php echo $ville ?></td>
                <?php 

                ?>
				<td><a href="index.php?uc=praticiens&ucp=modifierPraticiens&action=modificationPraticien&idPraticien=<?= $num ?>&idSpecialite=<?= $specialite ?>"><img class="bouton_image" src="images/modification.png" title="Modifier"></a></td>
                <td><a href="index.php?uc=praticiens&ucp=afficherPortefeuille&action=affichagePortefeuille&num=<?php echo $num ?>"><img class="bouton_image" src="images/portefeuille.png" title="Portefeuille"></a></td>
            </tr>
            <?php 
        } 

        ?>
        </table>
        </br>


        <input class="bouton centered" type="Submit" value="ACCUEIL">
    </form>
    <h2>Map :</h2>
    <div id="map" class="map"></div>
    <div id="mapMarkers" style="display:none">
        [
        <?php
            for ($i=0; $i < count($lesPraticiens); $i++) { 
                $praticien = $lesPraticiens[$i];
                $nom = $praticien["prenom"] . " " . $praticien["nom"];
                $longitude = $praticien["longitude"];
                $latitude = $praticien["latitude"];
                echo '{"nom" : "' . $nom . '",';
                echo '"longitude" : "' . $longitude . '",';
                echo '"latitude" : "' . $latitude . '"}';
                if ($i != count($lesPraticiens) -1) echo ",";
            }
        ?>
        ]
    </div>
    <script src="./js/map.js"></script>
    </div>
</main>

