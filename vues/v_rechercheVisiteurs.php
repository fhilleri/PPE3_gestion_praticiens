<main>
<nav id="recherche">
    <center>
    <form action="index.php?uc=praticiens&ucp=rechercheVisiteurs" method="post" id="tableauVisiteur">
        
        <p><H1><br>Recherche des visiteurs</H1><br>
            <div id="select">
			<tr><td>Noms praticiens</td><td>
               
			<select name="idPraticien">
            
			<?php 
			 foreach($Praticiens as $Praticiens)
				{ 
					echo "<option value='" . $Praticiens["idPraticien"] . "'>" .$Praticiens["nom"] ."</option>";
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
            <th>Matricule </th>
            <th>Secteur </th><th>Date de dernier visite </th>
            </tr> 
        <?php
        
        foreach((array)$LesVisiteur as $unVisiteur)
        {
            $num = $unVisiteur['matricule'];
            $Region = $unVisiteur['sec_num'];
            $date = $unVisiteur['dateVisite'];
        
            ?>
            <tr>
                <td width=150><?php echo  $num ?></td>
                <td width=200><?php echo $Region ?></td>
                <td width=200><?php echo $date ?></td>
                <?php 

                ?>
            <?php 
        } 

        ?>
        </table>
        </br>

        <input class='bouton' type="Submit" value="Valider"></a></td> 
    </form>
    </center>
    </div>
</nav>
</main>