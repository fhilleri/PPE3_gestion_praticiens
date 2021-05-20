<main>
    <h2 class="text-align">Modifier une relation du portefeuille :</h2>
	<form class="centered" action="index.php?uc=praticiens&ucp=portefeuilleResponsable&action=confirmerModification" method="post">

		<input hidden name="PnouveauMatricule" value="<?= $matricule ?>">
		<input hidden name="PnouveauIdspecialite" value="<?= $idspecialite ?>">
		<input hidden name="PnouveauIdPraticien" value="<?= $idPraticien ?>">

		<table>
			<tbody>

				<tr><td>Matricule</td><td><input value="<?= $elementPortefeuille["matricule"] ?>" name="Pmatricule" size=20></td></tr>
				<tr><td> praticien</td><td><select name="praticien">
				<?php

				var_dump($elementPortefeuille);
			
				foreach ($listeP as $praticien) {
					var_dump($praticien);
					if($elementPortefeuille["idspecialite"] == $praticien["idspecialite"] && $elementPortefeuille["idPraticien"] == $praticien["idpraticien"]){  
					$selected = "selected";
					}else{
						$selected = "";
					}
					echo("<option ".$selected."value='".$praticien["idspecialite"].";".$praticien["idpraticien"]."'>".$praticien["prenom"].$praticien["nom"]."</option>");
					
				}				
				?>
				</select></td></tr>	
			</tbody>
		</table>

		<input class="bouton centered" type="submit" value="Valider">
	</form>
</main>