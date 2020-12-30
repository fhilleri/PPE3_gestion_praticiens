<main>
    <h1>Modifier Portefeuille :</h1>
		<form class="centered" action="index.php?uc=praticiens&ucp=portefeuilleResponsable&action=confirmerModification" method="post">

		<input hidden name="PnouveauMatricule" value="<?= $matricule ?>">
		<input hidden name="PnouveauIdspecialite" value="<?= $idspecialite ?>">
		<input hidden name="PnouveauIdPraticien" value="<?= $idPraticien ?>">

		<table>
			<tbody>

				<tr><td>Matricule</td><td><input value="<?= $elementPortefeuille["matricule"] ?>" name="Pmatricule" size=20></td></tr>
				<tr><td>Idpsecialite</td><td><input value="<?= $elementPortefeuille["idspecialite"] ?>" name="Pidspecialite" size=20></td></tr>
				<tr><td>Idpraticien </td><td><input value="<?= $elementPortefeuille["idPraticien"] ?>" name="PidPraticien" size=20></td></tr>	
				
			</tbody>
		</table>

		<input class="bouton centered" type="submit" value="Valider">
	</form>
</main>