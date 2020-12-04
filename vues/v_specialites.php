<main>

    <a class="bouton centered" href="index.php?uc=praticiens&ucp=specialite&action=ajouter">Ajouter une spécialité</a>

    <table class="specialite centered">
        <thead>
            <tr>
                <th colspan="3">Spécialités</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($specialites as $specialite) {
                    $idSpecialite = $specialite["idspecialite"];
                    $nomSpecialite = $specialite["nomspecialite"];

                    ?>

                        <tr>
                            <td><?=$nomSpecialite?></td>
                            <td><a href="index.php?uc=praticiens&ucp=specialite&action=modifier&idSpecialite=<?= $idSpecialite ?>"><img src="./images/modification.png" alt="Modifier"></a></td>
                            <td><a href="index.php?uc=praticiens&ucp=specialite&action=confirmSupprimer&idSpecialite=<?= $idSpecialite ?>"><img src="./images/delete.png" alt="Supprimer"></a></td>
                        </tr>

                    <?php
                }
            ?>
        </tbody>
    </table>

</main>