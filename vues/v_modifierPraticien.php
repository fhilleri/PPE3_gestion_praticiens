<main>

   <p><h1>MODIFICATION DU PRATICIEN :</h1></p><BR/>
	<form action="index.php?uc=praticiens&ucp=portefeuilleResponsable&action=modifierPortefeuille" method="post">
   
		<table>
		<tbody>
			<tr><td>Nom</td><td><input name="TNom" value= <?php echo $praticien['nom'] ?> size=20></td></tr>
			<tr><td>Prenom </td><td><input name="TPrenom" value= <?php echo $praticien['prenom']?> size=20></td></tr>	
			<tr><td>Adresse</td><td><input name="TSpecialite" value= <?php echo $praticien['idspecialite']?> size=50></td></tr>	
			<tr><td>Code postal</td><td><input name="TNotoriete" value= <?php echo $praticien['note']?> size=5></td></tr>	
			<tr><td>Ville</td><td><input name="TVille" value= <?php echo $praticien['ville']?> size=20></td></tr>		
			<input type = hidden name="TNum" value= <?php echo $praticien['idPraticien']?>>

		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Valider">
	</form>
 
	
</main>