<main>

   <p><h1>MODIFICATION DU PRATICIEN :</h1></p><BR/>
	<form class="centered" action="index.php?uc=praticiens&ucp=modifierPraticiens&action=confirmModifPraticien" method="post">
   
		<table>
			<tbody>
				<tr><td>Nom</td><td><input name="TNom" value= <?php echo $praticien['nom'] ?> size=20></td></tr>
				<tr><td>Prenom </td><td><input name="TPrenom" value= <?php echo $praticien['prenom']?> size=20></td></tr>	
				<tr><td>Note</td><td><input name="TNote" value= <?php echo $praticien['note']?> size=20></td></tr>
				<tr><td>Code postal</td><td><input name="TCodePostal" value= <?php echo $praticien['codePostal']?> size=5></td></tr>	
				<tr><td>Ville</td><td><input name="TVille" value= <?php echo $praticien['ville']?> size=50></td></tr>	
				<tr><td>Rue</td><td><input name="TRue" value= <?php echo $praticien['rue']?> size=50></td></tr>	
				<tr><td>Longitude</td><td><input name="TLongitude" value= <?php echo $praticien['longitude']?> size=20></td></tr>		
				<tr><td>Latitude</td><td><input name="TLatitude" value= <?php echo $praticien['latitude']?> size=20></td></tr>	
				<input type = hidden name="TNum" value= <?php echo $praticien['idPraticien']?>>
				<input type = hidden name="TSpecialite" value= <?php echo $praticien['idspecialite']?>>
			</tbody>
		</table>
		
		<input class="bouton centered" type="submit" value="Valider">
	</form>
 
	
</main>