<main>
    <h1>PorteFeuille praticien</h1>
    <form class="centered" action="index.php?uc=praticiens&ucp=portefeuilleResponsable&action=VisiteurParPraticien" method="post">
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
                    <td><?php echo $nom ?></a></td>
                    <td><?php echo $matriucle ?></td>
                </tr>
                <?php 
            }
            ?>
        </table>
    </form>
</main>