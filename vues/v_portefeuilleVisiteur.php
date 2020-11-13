<div id="tableauVisiteur">
<!doctype html>
<html>

<head>
	<title>Liste de vos Praticiens</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
</head>
<body>
    <center>
    <form action="" method="post">
        <p><H1>Liste de vos praticiens</H1><br>

        <table border=3 cellspacing=1 >
            <tr>
            <th>Nom </th><th>Prénom </th>
            <th>Spécialité </th><th>Notoriété </th>
            <th>Ville </th>
            </tr> 
        <?php

        foreach( $lesPraticiens as $unPraticien)
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
				<td width=30><a href=index.php?uc=modifierPraticien&action=modificationPraticien&num=<?php echo $num ?>><img src="images/modifier.png" title="Modif"></a></td>
                <td width=30><a href=index.php?uc=afficherPortefeuille&action=affichagePortefeuille&num=<?php echo $num ?>>Afficher le portefeuille</a></td>
            </tr>
            <?php 
        }
        ?>
        </table>
        </br>

        <input type="" value="">
    </form>
    </center>
    </div>
</body>
</html>
