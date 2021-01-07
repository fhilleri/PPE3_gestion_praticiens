
<main class="centered text-align">

    <h2 class="text-align">Liste de vos praticiens</h2>

    <div>
        <table class="tableau filtre-box">
            <form class="text-align" action="index.php?uc=praticiens&ucp=recherchePraticiens" method="post">
                <tr><th>Filtres</th></tr>
                <tr><td>
                    <h4>Specialités</h4>
                    
                    <div>
                        <input type="checkbox" name="specialites">
                        <label>test</label>
                    </div>
                    <div>
                        <input type="checkbox" id="id" name="specialites">
                        <label for="id">test</label>
                    </div>

                    <input class='bouton centered' type="Submit" value="Valider">
                </td></tr>
            </form>
        </table>

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
            $specialite = $unPraticien['nomspecialite'];
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
                <td><a href="index.php?uc=praticiens&ucp=listeVisiteurPraticien&idSpecialite=<?= $specialite ?>&idPraticien=<?= $num ?>"><img class="bouton_image" src="images/portefeuille.png" title="Portefeuille"></a></td>
            </tr>
            <?php 
        } 

        ?>
        </table>
    </div>

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

