<main>
<nav id="recherche">
    <form class="centered text-align" action="index.php?uc=praticiens&ucp=rechercheVisiteurs" method="post">
        
        <h2 class="text-align">Recherche de visiteurs</h2>
        <div id="select">
            Noms praticiens
            
            <select name="praticien">
            
                <?php 
                $selected = ($idPraticien == "0" ? "selected" : "");
                echo "<option $selected value='0;0'>Tous</option>";
                foreach($Praticiens as $Praticiens)
                { 
                    $selected = ($idPraticien == $Praticiens["idPraticien"] && $idSpecialite == $Praticiens["idspecialite"] ? "selected" : "");
                    echo "<option $selected value='" . $Praticiens["idspecialite"] . ";" . $Praticiens["idPraticien"] . "'>" .$Praticiens["nom"] ."</option>";
                }
                ?>
            </select>
            Secteur
            <select name="numSecteur">
                <?php 
                $selected = ($numSecteur == "0" ? "selected" : "");
                echo "<option $selected value='0'>Toutes</option>";
                foreach($Secteurs as $Secteur)

                    { 
                        $selected = ($numSecteur  == $Secteur["sec_num"] ? "selected" : "");
                        echo "<option $selected value='" . $Secteur["sec_num"] . "'>".$Secteur["sec_num"]."</option>";
                    }
                ?>
            </select>

            <input class="bouton centered" type="Submit" value="Valider"></a></td> 
            
        </div>
    </form>
        
    <table class="tableau centered text-align">
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