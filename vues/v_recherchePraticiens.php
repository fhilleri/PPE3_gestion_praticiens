<!doctype html>
<html>

<head>
	<title>Recherche de praticiens</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
</head>
<body>
    <center>
    <form action="index.php?" method="post" id="tableauVisiteur">
        <p><H1>Recherche de praticiens</H1><br>

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
				<td width=30><a href=index.php?ucp=modifierPraticien&action=modificationPraticien&num=<?php echo $num ?>><img src="images/modifier.png" title="Modif"></a></td>
            </tr>
            <?php 
        } 

        ?>
        </table>
        </br>

        <input type="Submit" value="OUI">
    </form>
    </center>
    </div>
</body>
</html>
