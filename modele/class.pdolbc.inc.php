<?php

class Pdolbc
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=lbc';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdolbc = null;
			
	private function __construct()
	{
		try{
			if ($_SERVER['SERVER_NAME'] == 'localhost')
			{
				Pdolbc::$monPdo= new PDO ('mysql:host=localhost;dbname=lbc', 'root','');
				Pdolbc::$monPdo->query("SET CHARACTER SET utf8");
			}
			else
			{
				Pdolbc::$monPdo = new PDO ('mysql:host=db718503023.db.1and1.com;dbname=db718503023','dbo718503023','BMw1234*');
				Pdolbc::$monPdo->query("SET CHARACTER SET utf8");
			}
		}
		catch(Exception $e)
		{
			die('erreur :'.$e->getMessage()); 
		}
	}
	public function _destruct(){
		Pdolbc::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 *
 
 * Appel : $instancePdolbc = Pdolbc::getPdolbcNat();
 * @return l'unique objet de la classe PdolbcNat
 */
	public  static function getPdolbc()
	{
		if(Pdolbc::$monPdolbc == null)
		{
			Pdolbc::$monPdolbc= new Pdolbc();
		}
		return Pdolbc::$monPdolbc;  
	}
/**
 * Retourne tous les clients sous forme d'un tableau associatif
 *
 * @return le tableau associatif des clients
*/
	public function getProfilConnexion($login, $mdp)
	{
		$req = 'SELECT *
		FROM profil
		WHERE profil.login = :login AND profil.mdp = :mdp';
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(":login", $login);
		$res->bindValue(":mdp", $mdp);
		$res->execute();
		return $res->fetch();
	}
	public function getSpecialites() {
		$req = "SELECT * FROM specialite";
		$res = Pdolbc::$monPdo->prepare($req);
		$res->execute();
		return $res->fetchAll();
	}

	public function getSpecialite($id) {
		$req = "SELECT * FROM specialite WHERE idspecialite = :id";
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':id', $id);
		$res->execute();
		return $res->fetch();
	}

	public function getLesPraticiens()
	{
		$req = "select * from praticien";
		$res = Pdolbc::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function getLePraticien($idPraticien, $idSpecialite)
	{
		$req = "select * from praticien WHERE idSpecialite = :idSpecialite AND idPraticien = :idPraticien";
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':idPraticien', $idPraticien);
		$res->bindValue(':idSpecialite', $idSpecialite);
		$res->execute();
		$lesLignes = $res->fetch();
		return $lesLignes;
	}

	/* Affiche le portefeuille du Responsabele */

	public function getPorteFeuilleRes() {
		$req = "select * from portefeuille";
		$res = Pdolbc::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	/* Affiche le portefeuille lié au visiteur*/	

	public function getPorteFeuilleVis() {
		$req = "select * from portefeuille";
		$res = Pdolbc::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function modifierPraticien($nom,$prenom,$specialite,$notoriete,$ville,$num)
	{
		$res = Pdolbc::$monPdo->prepare('UPDATE praticien 
			SET  nom = :nom, prenom = :prenom, idspecialite = :specialite, note = :notoriete, ville = :ville 
 			WHERE idPraticien = :num');
		
		$res->bindValue('nom',$nom, PDO::PARAM_STR);
		$res->bindValue('prenom', $prenom, PDO::PARAM_STR);   
		$res->bindValue('specialite', $specialite, PDO::PARAM_STR);
		$res->bindValue('notoriete', $notoriete, PDO::PARAM_INT);
		$res->bindValue('ville', $ville, PDO::PARAM_STR);
		$res->bindValue('num',$num, PDO::PARAM_INT);
		$res->execute();
		//print_r($res->errorInfo());
	}

	public function getMaxPraticienIndexParSpe($specialite)
	{
		$req = "SELECT MAX(idPraticien) as max FROM praticien WHERE idspecialite = :specialite";
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue('specialite', $specialite);
		$res->execute();
		return $res->fetch();
	}

	public function ajouterPraticien($idSpecialite, $idPraticien, $note, $nom, $prenom, $rue, $codePostal, $ville, $longitude, $latitude)
	{
		$req = "INSERT INTO `praticien` (`idspecialite`, `idPraticien`, `note`, `nom`, `prenom`, `rue`, `codePostal`, `ville`, `longitude`, `latitude`) 
		VALUES (:idspecialite, :idPraticien, :note, :nom, :prenom, :rue, :codePostal, :ville, :longitude, :latitude)";
		$res = Pdolbc::$monPdo->prepare($req);

		var_dump($idSpecialite);
		var_dump($idPraticien);

		$res->bindValue(':idspecialite', $idSpecialite, PDO::PARAM_INT);
		$res->bindValue(':idPraticien', $idPraticien, PDO::PARAM_INT);
		$res->bindValue(':note', $note);
		$res->bindValue(':nom', $nom);
		$res->bindValue(':prenom', $prenom);
		$res->bindValue(':rue', $rue);
		$res->bindValue(':codePostal', $codePostal);
		$res->bindValue(':ville', $ville);
		$res->bindValue(':longitude', $longitude);
		$res->bindValue(':latitude', $latitude);
		$res->execute();
		
		var_dump($res->ErrorInfo());
	}

	/* Supprimer les praticiens */
	public function getSupprimerPraticien() {
		$req = "Delete from portefeuille where idpraticien=????";
		$res = Pdolbc::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}


	public function getPraticiens($numVisiteur,$numSecteur) {
		$req = "SELECT praticien.idPraticien,praticien.nom,praticien.prenom,praticien.idspecialite,	praticien.note,praticien.ville,visite.dateVisite,visite.matricule,visiteur.sec_num
		from praticien
		inner join visite on praticien.idPraticien = visite.idPraticien 
		inner join visiteur on visite.matricule = visiteur.matricule 
		where visite.dateVisite = 
	(SELECT p2.dateVisite FROM visite p2
	 where praticien.idPraticien = p2.idpraticien and p2.dateVisite < now()  
			GROUP by p2.dateVisite DESC LIMIT 1)
		and visite.matricule =:numVisiteur and visiteur.sec_num=:numSecteur
		group by visite.idPraticien";
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':numVisiteur', $numVisiteur);
		$res->bindValue(':numSecteur', $numSecteur);
		$res->execute();
		
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function getVisiteur($numPraticien,$numSecteur) {
		$req = "SELECT visiteur.matricule,visite.dateVisite,visiteur.sec_num
		from visiteur
		inner join visite on visiteur.matricule = visite.matricule 
		inner join praticien on visite.idPraticien = praticien.idPraticien
		where visite.dateVisite = (SELECT p2.dateVisite FROM visite p2
		where visiteur.matricule = p2.matricule and p2.dateVisite < now()
		ORDER by p2.dateVisite DESC
	    LIMIT 1)
		and visite.idPraticien =:numPraticien and visiteur.sec_num=:numSecteur";

		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':numPraticien', $numPraticien);
		$res->bindValue(':numSecteur', $numSecteur);
		$res->execute();

		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function getLesVisiteur()
	{
		$req = "select * from visiteur";
		$res = Pdolbc::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}	

	public function getLesRegion()
	{
		$req = "select * from region";
		$res = Pdolbc::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function getIdMaxSpecialite()
	{
		$req = "select MAX(idSpecialite) as max from specialite";
		$res = Pdolbc::$monPdo->query($req);
		$lignes = $res->fetch();
		return $lignes["max"];
	}

	public function ajouterSpecialite($nomSpecialite)
	{
		$idSpecialite = intval($this->getIdMaxSpecialite()) +1;
		$req = "INSERT INTO `specialite` (`idspecialite`, `nomspecialite`) VALUES (:idspecialite, :nomspecialite)";
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':idspecialite', $idSpecialite);
		$res->bindValue(':nomspecialite', $nomSpecialite);
		$res->execute();
	}

	public function modifierSpecialite($idSpecialite, $nomSpecialite)
	{
		$req = "UPDATE `specialite` SET `nomspecialite` = :nomSpecialite WHERE `specialite`.`idspecialite` = :idSpecialite;";
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':nomSpecialite', $nomSpecialite);
		$res->bindValue(':idSpecialite', $idSpecialite);
		$res->execute();
	}

	public function supprimerSpecialite($idSpecialite)
	{
		$req = "DELETE FROM specialite WHERE specialite.idspecialite = :idspecialite";
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':idspecialite', $idSpecialite, PDO::PARAM_INT);
		$res->execute();
	}
}

?>