<main>
    <h2 class="text-align">Ajouter une relation dans le portefeuille :</h2>
	<form class="centered" action="index.php?uc=praticiens&ucp=portefeuilleResponsable&action=confirmerAjout" method="post">
		<table>
			<tbody>

					
				<tr><td> praticien</td><td><select name="praticien">
				<?php

				foreach ($listeP as $praticien) {
					echo("<option value='".$praticien["idspecialite"].";".$praticien["idpraticien"]."'>".$praticien["prenom"].$praticien["nom"]."</option>");
					
				}				
				?>
				</select></td></tr>	
				<tr><td> matricule</td><td><select name="matricule">
				<?php

				foreach ($listeM as $matricule) {
					echo("<option value='".$matricule["matricule"]."'>".$matricule["matricule"]."</option>");
					
				}				
				?>
				</select></td></tr>	
				
			</tbody>
		</table>

		<input class="bouton centered" type="submit" value="Valider">
	</form>
</main>