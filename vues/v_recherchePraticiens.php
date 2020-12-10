<nav id="recherche">
<!doctype html>
<html>

<head>
	<title>Recherche de praticiens</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/css/ol.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>
        
</head>
<body>
    <center>
    <form action="index.php?uc=praticiens&ucp=recherchePraticiens" method="post" id="tableauVisiteur">
           
        <p><H1><br>Recherche de praticiens</H1><br>
        <div id="select">
			<tr><td>Matricule visiteur</td><td>
			<select name="numVisiteur">
			<?php 
			 foreach($Praticiens as $Praticiens)
				{ 
					echo "<option value='" . $Praticiens["matricule"] . "'>" .$Praticiens["matricule"] ."</option>";
				}
           ?>
            </select>
            <tr><td>Region</td><td>
			<select name="numSecteur">
			<?php 
			 foreach($Region as $Region)
				{ 
					echo "<option value='" . $Region["sec_num"] . "'>" .$Region["reg_code"] ."</option>";
				}
           ?>
        </select>
            
        </div>
        
        

        <table border=3 cellspacing=1 >
            <tr>
            <th>Nom </th><th>Prénom </th>
            <th>Spécialité </th><th>Notoriété </th>
            <th>Ville </th><th>Date de dernier visite </th>
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
                <td width=150><?php echo $nom ?></td>
                <td width=150><?php echo $prenom ?></td>
                <td width=300><?php echo $specialite ?></td>
                <td width=100><?php echo $notoriete?></td>
                <td width=200><?php echo $ville ?></td>
                <td width=200><?php echo $date ?></td>
                <?php 

                ?>
                <td width=30><a href=index.php?uc=praticiens&ucp=modifierPraticiens&action=modificationPraticien&idPraticien=<?php echo $num ?>&idSpecialite=<?php echo $specialite ?> ><img class="bouton_image" src="./images/modification.png" title="Modif"></a></td>
            </tr>
            <?php 
        } 

        ?>
        </table>
        </br>
        <a href=index.php?uc=praticiens&ucp=modifierPraticiens&action=ajout id="ajout">Ajouter un praticien</a>
        <input class='bouton' type="Submit" value="Valider"></a></td> 
    </form>
    </center>
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
</body>
</html>
</nav>