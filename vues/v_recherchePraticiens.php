<main>
<nav id="recherche">

    <form class="centered text-align" action="index.php?uc=praticiens&ucp=recherchePraticiens" method="post">

        <h2 class="text-align">Recherche de praticiens</h2>

        <div id="select">
			Matricule visiteur
			<select name="numVisiteur">

                <?php 
                $selected = ($numVisiteur == "0" ? "selected" : "");
                echo "<option $selected value='0'>Tous</option>";
                foreach($Praticiens as $Praticien)
                    { 
                        $selected = ($numVisiteur == $Praticien["matricule"] ? "selected" : "");
                        echo "<option $selected value='" . $Praticien["matricule"] . "'>" .$Praticien["matricule"] ."</option>";
                    }
                ?>
            </select>
            Secteur
			<select name="numSecteur">
                <?php 
                $selected = ($numSecteur == "0" ? "selected" : "");
                echo "<option $selected value='0'>Toutes</option>";
                foreach($Secteurs as $Secteur)

                    { 
                        $selected = ($numSecteur  == $Secteur["sec_num"] ? "selected" : "");
                        echo "<option $selected value='" . $Secteur["sec_num"] . "'>".$Secteur["sec_num"]."</option>";
                    }
                ?>
            </select>
        </div>
    
        <input class='bouton centered' type="Submit" value="Valider">
    </form>
    

    <table class="tableau centered text-align">
        <tr>
            <th>Nom </th><th>Prénom </th>
            <th>Spécialité </th><th>Notoriété </th>
            <th>Ville </th><th>Date de dernier visite </th>
            <th></th>
        </tr> 
    <?php

    foreach((array)$lesPraticiens as $unPraticien)
    {
        $num = $unPraticien['idPraticien'];
        $nom = $unPraticien['nom'];
        $prenom = $unPraticien['prenom'];
        $specialite = $unPraticien['idspecialite'];
        $nomSpecialite = $unPraticien['nomspecialite'];
        $notoriete = $unPraticien['note'];
        $ville = $unPraticien['ville'];
        $date = $unPraticien['dateVisite'];
    
        ?>
        <tr>
            <td><?php echo $nom ?></td>
            <td><?php echo $prenom ?></td>
            <td><?php echo $nomSpecialite ?></td>
            <td><?php echo $notoriete?></td>
            <td><?php echo $ville ?></td>
            <td><?php echo $date ?></td>
            <?php 

            ?>
            <td><a href=index.php?uc=praticiens&ucp=modifierPraticiens&action=modificationPraticien&idPraticien=<?php echo $num ?>&idSpecialite=<?php echo $specialite ?> ><img class="bouton_image" src="./images/modification.png" title="Modif"></a></td>
        </tr>
        <?php 
    } 

    ?>
    </table>
    
    <a class="bouton centered" href=index.php?uc=praticiens&ucp=modifierPraticiens&action=ajout id="ajout">Ajouter un praticien</a>
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
</nav>
</main>