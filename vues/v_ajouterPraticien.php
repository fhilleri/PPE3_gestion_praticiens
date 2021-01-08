<main>
    <h2 class="text-align">Ajouter un praticient :</h2>
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
			<tr><td>Nom</td><td><input required type="text" name="TNom" maxlength=20></td></tr>
			<tr><td>Prenom </td><td><input required type="text" name="TPrenom" maxlength=20></td></tr>	
			<tr><td>Note</td><td><input required type="number" name="TNote" maxlength=20></td></tr>
			<tr><td>Code postal</td><td><input required type="text" name="TCodePostal" maxlength=5></td></tr>	
			<tr><td>Ville</td><td><input required type="text" name="TVille" maxlength=50></td></tr>	
			<tr><td>Rue</td><td><input required type="text" name="TRue" maxlength=50></td></tr>	
			<tr><td>Longitude</td><td><input required type="text" name="TLongitude" maxlength=20></td></tr>		
            <tr><td>Latitude</td><td><input required type="text" name="TLatitude" maxlength=20></td></tr>		
			<input type = hidden name="TNum">

		</tbody>
		</table>

		<input class="bouton centered" type="submit" value="Valider">
	</form>
</main>