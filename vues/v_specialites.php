<main>

    <h2 class="text-align">Affichage des spécialités</h2>

    <a class="bouton centered" href="index.php?uc=praticiens&ucp=specialite&action=ajouter">Ajouter une spécialité</a>

    <?php
        if (isset($_SESSION["error"])) 
        {
            echo '<div class="erreur centered">' . $_SESSION["error"] . '</div>';
            unset($_SESSION["error"]);
        }
    ?>

    <table class="tableau specialite centered">
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
                            <td><a href="index.php?uc=praticiens&ucp=specialite&action=modifier&idSpecialite=<?= $idSpecialite ?>"><img class="bouton_image" src="./images/modification.png" alt="Modifier"></a></td>
                            <td><a href="index.php?uc=praticiens&ucp=specialite&action=confirmSupprimer&idSpecialite=<?= $idSpecialite ?>"><img class="bouton_image" src="./images/delete.png" alt="Supprimer"></a></td>
                        </tr>

                    <?php
                }
            ?>
        </tbody>
    </table>

</main>