<!doctype html>
<html>

<head>
	<title>Liste de vos Praticiens</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
</head>
<body>
    <center>
    <form action="index.php?" method="post" id="tableauVisiteur">
        <p><H1>Liste de vos praticiens</H1><br>

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
				<td width=30><a href=index.php?ucp=modifierPraticien&action=modificationPraticien&num=<?php echo $num ?>><img src="images/modification.png" weight="50px" height="50px" title="Modif"></a></td>
                <td width=30><a href=index.php?ucp=afficherPortefeuille&action=affichagePortefeuille&num=<?php echo $num ?>><img src="images/portefeuille.jpg" weight="50px" height="50px" title="Portefeuille"></a></td>
            </tr>
            <?php 
        } 

        ?>
        </table>
        </br>

        <input type="Submit" value="ACCUEIL">
    </form>
    </center>
    </div>
</body>
</html>
