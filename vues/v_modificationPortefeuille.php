<!doctype html>
<html>
    <head>
        <title>PorteFeuille</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link  rel="stylesheet" type="text/css" />

    </head>

   <body>
    <div class="form-style-6">
	<form action="index.php?uc=praticiens&ucp=portefeuilleResponsable&action=modifierPortefeuille" method="post">
        <table>
            <tbody>
                <tr><td>matricule </td><td><input name="matricule" value= <?php echo $praticien['matricule'] ?> size=20></td></tr>
                <tr><td>idspécialite </td><td><input name="specialite" value= <?php echo $praticien['idspecialite']?> size=20></td></tr>	
                <tr><td>idPraticien</td><td><input name="praticien" value= <?php echo $praticien['idPraticien']?> size=50></td></tr>	
                
            </tbody>
        </table>
		<input type="submit" value="Valider">
	</form>
 	</div>
	
	</body>
</html>