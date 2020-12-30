<main>
<nav id="recherche">
    <form class="centered text-align" action="index.php?uc=praticiens&ucp=rechercheVisiteurs" method="post">
        
        <p><H1>Recherche des visiteurs</H1>
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
        
        <table class="tableau" cellspacing=1 >
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
                <td><?php echo  $num ?></td>
                <td><?php echo $Region ?></td>
                <td><?php echo $date ?></td>
                <?php 

                ?>
            <?php 
        } 

        ?>
        </table>

        <input class="bouton centered" type="Submit" value="Valider"></a></td> 
    </form>
    </div>
</nav>
</main>