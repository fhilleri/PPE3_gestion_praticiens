<main>
    <h2 class="text-align">Liste des visiteurs attribués au praticien <?= $praticien["prenom"] . " " . $praticien["nom"] ?></h2>
    <table class="tableau centered text-align">
            <tr>
            <th>Matricule visiteur</th>
            </tr> 
        <?php

        foreach($visiteurs as $visiteur)
        {
            $matricule = $visiteur['matricule'];                
            
            ?>
            <tr>
                <td><?= $matricule ?></a></td>
            </tr>
            <?php 
        }
        ?>
    </table>
</main>