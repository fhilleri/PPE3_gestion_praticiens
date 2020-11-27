<?php
	include("./vues/v_entete.php");
	include("./vues/v_bandeau.php");
	$lesPraticiens = $pdo->getLesPraticiens();
	include("vues/v_portefeuilleVisiteur.php");	

	include("./vues/v_pied.php");
?>
