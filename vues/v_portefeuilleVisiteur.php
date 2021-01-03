
<main class="centered text-align">

    <p><H1>Liste de vos praticiens</H1>

    <!--form class="centered text-align" action="index.php?uc=praticiens&ucp=recherchePraticiens" method="post">

        
        <div id="select">
			Matricule visiteur
			<select name="numVisiteur">

                <?php /*
                $selected = ($numVisiteur == "0" ? "selected" : "");
                echo "<option $selected value='0'>Tous</option>";
                foreach($Praticiens as $Praticien)
                    { 
                        $selected = ($numVisiteur == $Praticien["matricule"] ? "selected" : "");
                        echo "<option $selected value='" . $Praticien["matricule"] . "'>" .$Praticien["matricule"] ."</option>";
                    }*/
                ?>
            </select>
            Region
			<select name="numSecteur">
                <?php /*
                $selected = ($numSecteur == "0" ? "selected" : "");
                echo "<option $selected value='0'>Toutes</option>";
                foreach($Regions as $Region)

                    { 
                        $selected = ($numSecteur == $Region["sec_num"] ? "selected" : "");
                        echo "<option $selected value='" . $Region["sec_num"] . "'>" .$Region["reg_code"] ."</option>";
                    }*/
                ?>
            </select>
        </div>
    
        <input class='bouton centered' type="Submit" value="Valider">
    </form -->

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

