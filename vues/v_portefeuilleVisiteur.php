
<!doctype html>
<html>

<head>
	<title>Liste de vos Praticiens</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/css/ol.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.4.3/build/ol.js"></script>
</head>
<body>

    <center>
    <form action="index.php?" method="post" id="tableauVisiteur">
        <br>
        <br>
        <p><H1>Liste de vos praticiens</H1>

        <table border=3 cellspacing=1 >
            <tr>
            <th>Nom </th><th>Prénom </th>
            <th>Spécialité </th><th>Notoriété </th>
            <th>Ville </th>
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
                <td width=150><?php echo $nom ?></td>
                <td width=150><?php echo $prenom ?></td>
                <td width=300><?php echo $specialite ?></td>
                <td width=100><?php echo $notoriete?></td>
                <td width=200><?php echo $ville ?></td>
                <?php 

                ?>
				<td width=30><a href="index.php?uc=praticiens&ucp=modifierPraticiens&action=modificationPraticien&idPraticien=<?= $num ?>&idSpecialite=<?= $specialite ?>"><img src="images/modification.png" weight="50px" height="50px" title="Modif"></a></td>
                <td width=30><a href="index.php?uc=praticiens&ucp=afficherPortefeuille&action=affichagePortefeuille&num=<?php echo $num ?>"><img src="images/portefeuille.jpg" weight="50px" height="50px" title="Portefeuille"></a></td>
            </tr>
            <?php 
        } 

        ?>
        </table>
        </br>


        <input type="Submit" value="ACCUEIL">
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

