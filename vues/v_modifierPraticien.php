<!doctype html>
<html>

<head>
	<title>MODIFIER PRATICIEN</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
</head>

<body>

   <p><h1>MODIFICATION DU PRATICIEN :</h1></p><BR/>
	<form action="index.php?uc=modifierPraticien&action=confirmModifPraticien" method="post">
   
		<table>
		<tbody>
			<tr><td>Nom</td><td><input name="TNom" value= <?php echo $client['nom'] ?> size=20></td></tr>
			<tr><td>Prenom </td><td><input name="TPrenom" value= <?php echo $client['prenom']?> size=20></td></tr>	
			<tr><td>Adresse</td><td><input name="TSpecialite" value= <?php echo $client['idspecialite']?> size=50></td></tr>	
			<tr><td>Code postal</td><td><input name="TNotoriete" value= <?php echo $client['note']?> size=5></td></tr>	
			<tr><td>Ville</td><td><input name="TVille" value= <?php echo $client['ville']?> size=20></td></tr>		
			<input type = hidden name="TNum" value= <?php echo $client['idPraticien']?>>

		</tbody>
		</table>
		
                <br/>
		<input type="submit" value="Valider">
	</form>
 
	
	</body>
</html>