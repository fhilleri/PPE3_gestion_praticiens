<main>

	<h2 class="text-align">Modification du praticien</h2>
	<form class="centered" action="index.php?uc=praticiens&ucp=modifierPraticiens&action=confirmModifPraticien" method="post">

		<table>
			<tbody>
				<tr><td>Nom</td><td><input required type="text" name="TNom" value="<?php echo $praticien['nom'] ?>" maxlength=20></td></tr>
				<tr><td>Prenom </td><td><input required type="text" name="TPrenom" value="<?php echo $praticien['prenom']?>" maxlength=20></td></tr>	
				<tr><td>Note</td><td><input required type="number" name="TNote" value="<?php echo $praticien['note']?>" maxlength=20></td></tr>
				<tr><td>Code postal</td><td><input required type="text" name="TCodePostal" value="<?php echo $praticien['codePostal']?>" maxlength=5></td></tr>	
				<tr><td>Ville</td><td><input required type="text" name="TVille" value="<?php echo $praticien['ville']?>" maxlength=50></td></tr>	
				<tr><td>Rue</td><td><input required type="text" name="TRue" value="<?php echo $praticien['rue']?>" maxlength=50></td></tr>	
				<tr><td>Longitude</td><td><input required type="text" name="TLongitude" value="<?php echo $praticien['longitude']?>" maxlength=20></td></tr>		
				<tr><td>Latitude</td><td><input required type="text" name="TLatitude" value="<?php echo $praticien['latitude']?>" maxlength=20></td></tr>	
				<input type = hidden name="TNum" value="<?php echo $praticien['idPraticien']?>">
				<input type = hidden name="TSpecialite" value="<?php echo $praticien['idspecialite']?>">
			</tbody>
		</table>
		
		<input class="bouton centered" type="submit" value="Valider">
	</form>
</main>