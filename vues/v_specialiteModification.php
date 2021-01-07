<main>

    <h2 class="text-align">Modifier une spécialité</h2>

    <form class="centered" action="index.php?uc=praticiens&ucp=specialite&action=comfirmModifier" method="post">
        <input hidden name="Fid" value="<?= $specialite["idspecialite"] ?>">
        <table>
            <tr>
                <td>Nom de la spécialité : </td>
                <td><input type="text" name="Fnom" value="<?= $specialite["nomspecialite"] ?>"></td>
            </tr>
        </table>

        <input class="bouton centered" type="submit" value="Valider">
    </form>

</main>