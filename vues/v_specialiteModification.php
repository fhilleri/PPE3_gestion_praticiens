<main>

    <h1>Modifier une spécialité</h1>

    <form action="index.php?uc=praticiens&ucp=specialite&action=comfirmModifier" method="post">
        <input hidden name="Fid" value="<?= $specialite["idspecialite"] ?>">
        <table>
            <tr>
                <td>Nom de la spécialité : </td>
                <td><input type="text" name="Fnom" value="<?= $specialite["nomspecialite"] ?>"></td>
            </tr>
        </table>

        <input type="submit" value="Valider">
    </form>

</main>