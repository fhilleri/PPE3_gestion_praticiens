<main>
    <h1>Ajout du praticient :</h1>
	<form class="centered" action="index.php?uc=praticiens&ucp=modifierPraticiens&action=confirmAjout" method="post">
		<table>
		<tbody>
			<tr><td>Specialité</td><td>
				<select name="TSpecialite">
					<?php
						for ($i=0; $i < count($specialites); $i++) { 
							$specialite = $specialites[$i];
							$idspecialite = $specialite["idspecialite"];
							$nomspecialite = $specialite["nomspecialite"];
							
							$selected = ($i == 0 ? "selected" : "");
	
							echo "<option value='$idspecialite'>$nomspecialite</option>";
						}
					?>
				</select>
			</td></tr>
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

		<input class="bouton centered" type="submit" value="Valider">
	</form>
</main>