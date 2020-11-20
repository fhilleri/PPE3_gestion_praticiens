<main>
    <h1>Ajout du praticient :</h1>
	<form action="index.php?uc=praticiens&ucp=modifierPraticiens&action=confirmAjout" method="post">
   
		<table>
		<tbody>
			<tr><td>Specialité</td><td><input name="TSpecialite" size=20></td></tr>
			<tr><td>Note</td><td><input name="TNote" size=20></td></tr>
			<tr><td>Nom</td><td><input name="TNom" size=20></td></tr>
			<tr><td>Prenom </td><td><input name="TPrenom" size=20></td></tr>	
			<tr><td>Rue</td><td><input name="TRue" size=50></td></tr>	
			<tr><td>Code postal</td><td><input name="TCodePostal" size=5></td></tr>	
			<tr><td>Ville</td><td><input name="TVille" size=50></td></tr>	
			<tr><td>Longitude</td><td><input name="TLongitude" size=20></td></tr>		
            <tr><td>Latitude</td><td><input name="TLatitude" size=20></td></tr>		
			<input type = hidden name="TNum">

		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Valider">
	</form>
</main>