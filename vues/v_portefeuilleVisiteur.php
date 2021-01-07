
<main class="centered text-align">

    <h2 class="text-align">Liste de vos praticiens</h2>

    <div>
        <table class="tableau filtre-box">
            <form class="text-align" action="index.php?uc=praticiens&ucp=portefeuilleVisiteur" method="post">
                <tr><th>Filtres</th></tr>
                <tr><td>
                    <h4>Specialités</h4>
                    
                    <?php

                        foreach ($filtres["specialites"] as $specialite) {
                            if (in_array($specialite["idspecialite"], $filtresRequete["specialites"])) $checked = "checked";
                            else $checked = "";
                            ?>
                                <div>
                                    <input type="checkbox" value="<?= $specialite["idspecialite"] ?>" name="specialites[]" id="filtre-specialite-<?= $specialite["idspecialite"] ?>" <?= $checked ?>>
                                    <label for="filtre-specialite-<?= $specialite["idspecialite"] ?>"><?= $specialite["nomspecialite"] ?></label>
                                </div>
                            <?php
                        }

                    ?>

                    <h4>Notes</h4>
                    
                    <?php

                        foreach ($filtres["notes"] as $note) {
                            if (in_array($note["note"], $filtresRequete["notes"])) $checked = "checked";
                            else $checked = "";
                            ?>
                                <div>
                                    <input type="checkbox" value="<?= $note["note"] ?>" name="notes[]" id="filtre-note-<?= $note["note"] ?>" <?= $checked ?>>
                                    <label for="filtre-note-<?= $note["note"] ?>"><?= $note["note"] ?></label>
                                </div>
                            <?php
                        }

                    ?>

                    <h4>Villes</h4>
                    
                    <?php

                        foreach ($filtres["villes"] as $ville) {
                            if (in_array($ville["ville"], $filtresRequete["villes"])) $checked = "checked";
                            else $checked = "";
                            ?>
                                <div>
                                    <input type="checkbox" value="<?= $ville["ville"] ?>" name="villes[]" id="filtre-ville-<?= $ville["ville"] ?>" <?= $checked ?>>
                                    <label for="filtre-ville-<?= $ville["ville"] ?>"><?= $ville["ville"] ?></label>
                                </div>
                            <?php
                        }

                    ?>

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

