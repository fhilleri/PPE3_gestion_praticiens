<!doctype html>
<html>
    <head>
        <title>PorteFeuille</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" />
    </head>
   <body>
    <div class="form-style-6">
	<form action="index.php?uc=praticiens&ucp=portefeuilleResponsable&action=afficherPortefeuille" method="post">
    <table >
            <tr>
            <td>Matricule visiteur :</td><td>Nom praticien :</td>
            <td>Région:</td>
            </tr> 
        <?php

	    foreach( $leportefeuille as $relations)
        {
            $matricule = $relations['matricule'];
            $nom = $relations['nom'];
            $region = $relations['reg_code'];
           
            ?>
            <tr>
                <td width=150><?php echo $matricule ?></a></td>
                <td width=150><?php echo $nom ?></td>
                <td width=300><?php echo $region ?></td>
               
                <?php 

                ?>
				<td width=30><a href=index.php?uc=praticiens&ucp=portefeuilleResponsable&action=modifierPortefeuille&matricule=<?php echo $matricule ?>><img src="images/modifier.gif" title="Modif"></a></td>
                <td width=30><a href=index.php?uc=praticiens&ucp=portefeuilleResponsable&action=supprimerPortefeuille&matricule=<?php echo $matricule ?>><img src="images/supp.png" title="Suppr"></a></td>
            </tr>
            <?php 
        }
        ?>
	</form>
 	</div>
	
	</body>
</html>