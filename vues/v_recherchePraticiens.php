<main>
<nav id="recherche">

<!doctype html>
<html>

<head>
	<title>Recherche des praticiens</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <form class="centered text-align" action="index.php?uc=praticiens&ucp=recherchePraticiens" method="post">

        
        <p><H1>Recherche de praticiens</H1>
        <div id="select">
			<tr><td>Matricule visiteur</td><td>
			<select name="numVisiteur">
         
            <?php 
             echo "<option value='" . $Praticiens[""] . "'>" .$Praticiens[""] ."</option>";
			 foreach($Praticiens as $Praticiens)
				{ 
					echo "<option value='" . $Praticiens["matricule"] . "'>" .$Praticiens["matricule"] ."</option>";
                }
           ?>
            </select>
            <tr><td>Region</td><td>
			<select name="numSecteur">
            <?php 
            echo "<option value='" . $Region[""] . "'>" .$Region[""] ."</option>";
			 foreach($Region as $Region)

				{ 
                    
					echo "<option value='" . $Region["sec_num"] . "'>" .$Region["reg_code"] ."</option>";
				}
            ?>
        </select>
            
        </div>
        
        

        <table class="tableau">
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
            $notoriete = $unPraticien['note'];
            $ville = $unPraticien['ville'];
            $date = $unPraticien['dateVisite'];
        
            ?>
            <tr>
                <td><?php echo $nom ?></td>
                <td><?php echo $prenom ?></td>
                <td><?php echo $specialite ?></td>
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
        <input class='bouton centered' type="Submit" value="Valider"></a></td> 
    </form>
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