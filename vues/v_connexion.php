<nav id="connexion">
<main>
    <div id="loginbox">
        <img src="./images/avatar.png" id="avatar">
        <h1>Connexion</h1>
        <form method="POST" action="index.php?uc=praticiens&ucp=connexion&action=validerConnexion">
        <table>
            <tr>
                <td><label for="login">Login :</label></td>
                <td><input type="text" name="login"></td>
            </tr>
            <tr>
                <td><label for="mdp">Mot de passe :</label></td>
                <td><input type="password" name="mdp"></td>
            </tr>
        </table>

        <input type="submit" value="Connexion">
    </form>
</div>
</main>
</nav>
