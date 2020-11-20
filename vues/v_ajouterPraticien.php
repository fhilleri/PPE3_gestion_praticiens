<main>
    <h1>Ajout du praticient :</h1>
	<form action="index.php?uc=modifierPraticien&action=confirmModifPraticien" method="post">
   
		<table>
		<tbody>
			<tr><td>Nom</td><td><input name="TNom" size=20></td></tr>
			<tr><td>Prenom </td><td><input name="TPrenom" size=20></td></tr>	
			<tr><td>Adresse</td><td><input name="TSpecialite" size=50></td></tr>	
			<tr><td>Code postal</td><td><input name="TNotoriete" size=5></td></tr>	
			<tr><td>Ville</td><td><input name="TVille" size=20></td></tr>		
			<input type = hidden name="TNum">

		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Valider">
	</form>
</main>