<main>
    <h1>PorteFeuille praticien</h1>
    <form action="index.php?uc=praticiens&ucp=portefeuilleResponsable&action=VisiteurParPraticien" method="post">
        <table >
                <tr>
                <td>Nom praticien :</td>
                <td>Matricule visiteur :</td>
                </tr> 
            <?php

            foreach( $Ppraticien as $vistieurP)
            {
                $nom = $vistieurP['nom'];
                $matricule = $vistieurP['matricule'];
                
                
                ?>
                <tr>
                    <td width=150><?php echo $nom ?></a></td>
                    <td width=150><?php echo $matriucle ?></td>
                </tr>
                <?php 
            }
            ?>
        </table>
    </form>
</main>