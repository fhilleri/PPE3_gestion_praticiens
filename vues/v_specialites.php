<main>

    <a href="index.php?uc=praticiens&ucp=specialite&action=ajouter"><button>Ajouter une spécialité</button></a>

    <table>
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
                            <td><a href="index.php?uc=praticiens&ucp=specialite&action=modifier&idSpecialite=<?= $idSpecialite ?>"><button>Modifier</button></a></td>
                            <td><a href="index.php?uc=praticiens&ucp=specialite&action=confirmSupprimer&idSpecialite=<?= $idSpecialite ?>"><button>Supprimer</button></a></td>
                        </tr>

                    <?php
                }
            ?>
        </tbody>
    </table>

</main>