<main>
<nav id="recherche">
    <form class="centered text-align" action="index.php?uc=praticiens&ucp=rechercheVisiteurs" method="post">
        
        <h2 class="text-align">Recherche de visiteurs</h2>
        <div id="select">
            Noms praticiens
            
            <select name="idPraticien">
            
                <?php 
                $selected = ($numPraticien == "0" ? "selected" : "");
                echo "<option $selected value='0'>Tous</option>";
                foreach($Praticiens as $Praticiens)
                { 
                    $selected = ($numPraticien == $Praticiens["idPraticien"] ? "selected" : "");
                    echo "<option $selected value='" . $Praticiens["idPraticien"] . "'>" .$Praticiens["nom"] ."</option>";
                }
                ?>
            </select>
            Region
            <select name="numSecteur">
                <?php 
                $selected = ($numSecteur == "0" ? "selected" : "");
                echo "<option $selected value='0'>Toutes</option>";
                foreach($Regions as $Region)
                { 
                    $selected = ($numSecteur == $Region["sec_num"] ? "selected" : "");
                    echo "<option $selected value='" . $Region["sec_num"] . "'>" .$Region["reg_code"] ."</option>";
                }
                ?>
            </select>

            <input class="bouton centered" type="Submit" value="Valider"></a></td> 
            
        </div>
    </form>
        
    <table class="tableau centered">
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
        } 

        ?>
    </table>
</nav>
</main>