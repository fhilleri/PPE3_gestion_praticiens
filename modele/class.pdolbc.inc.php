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
		$req = "SELECT * 
		FROM praticien
		INNER JOIN specialite on praticien.idspecialite = specialite.idspecialite";
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
		$req = ("SELECT visiteur.matricule, CONCAT(praticien.prenom, ' ', praticien.nom) as nom, praticien.idspecialite, praticien.idPraticien
		FROM portefeuille
		inner join praticien
		on praticien.idpraticien = portefeuille.idpraticien AND praticien.idspecialite = portefeuille.idspecialite
		inner join visiteur 
		on visiteur.matricule = portefeuille.matricule");
		$res = Pdolbc::$monPdo->prepare($req);
		$res->execute();
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	/* Selectionne un élément du portefeuille du Responsabele */

	public function getElementPorteFeuille($matricule, $idspecialite, $idPraticien) {
		$req = ("SELECT visiteur.matricule, nom, reg_code, praticien.idspecialite, praticien.idPraticien
		from portefeuille
		inner join praticien
		on praticien.idpraticien = portefeuille.idpraticien
		inner join visiteur
		on visiteur.matricule = portefeuille.matricule
		inner join region
		on region.sec_num = visiteur.sec_num
		WHERE visiteur.matricule = :matricule AND praticien.idspecialite = :idspecialite
		AND praticien.idPraticien = :idpraticien");
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':matricule',$matricule, PDO::PARAM_STR);
		$res->bindValue(':idspecialite', $idspecialite, PDO::PARAM_STR);   
		$res->bindValue(':idpraticien', $idPraticien, PDO::PARAM_STR);
		$res->execute();
		$element = $res->fetch();
		return $element;
	}



	public function getAjoutPortefeuille($matricule, $idspecialite, $idPraticien){
		$req=("INSERT INTO portefeuille (matricule, idspecialite, idpraticien)
		VALUES (:matricule, :idspecialite, :idpraticien )");
		$res = Pdolbc::$monPdo->prepare($req);
		
		$res->bindValue(':matricule',$matricule, PDO::PARAM_STR);
		$res->bindValue(':idspecialite', $idspecialite, PDO::PARAM_STR);   
		$res->bindValue(':idpraticien', $idPraticien, PDO::PARAM_STR);
		$res->execute();
		
	}

	/* liste déroulante praticien*/
		public function getListePortefeuille(){
			$req=("SELECT nom, prenom, idpraticien, idspecialite FROM praticien");
			$res = Pdolbc::$monPdo->prepare($req);
			
			$res->execute();
			return $res->fetchAll();
		}


		/* liste déroulante matricule */
		public function getListePortefeuilleM(){
			$req=("SELECT * FROM visiteur");
			$res = Pdolbc::$monPdo->prepare($req);
			
			$res->execute();
			return $res->fetchAll();
		}


	/* Supprimer le portefeuille */

	public function getsuprrPortefeuille($matricule, $idspecialite, $idpraticien){

		$req=('DELETE FROM portefeuille WHERE matricule = :matricule and
		idspecialite = :idspecialite and idpraticien= :idpraticien ');
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':matricule', $matricule, PDO::PARAM_INT);
		$res->bindValue(':idspecialite', $idspecialite, PDO::PARAM_INT);
		$res->bindValue(':idpraticien', $idpraticien, PDO::PARAM_INT);
		$res->execute();
	}

	
	/* praticien par visiteur */

	public function getPraticiensV($idPraticien, $idSpecialite)
	{
		$req = ("SELECT portefeuille.matricule
		FROM portefeuille
		WHERE portefeuille.idPraticien = :idpraticien AND portefeuille.idspecialite = :idspecialite");
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':idpraticien', $idPraticien);
		$res->bindValue(':idspecialite', $idSpecialite);
		$res->execute();
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	/* visiteur par praticien */

	public function getVisiteurP($id)
	{
		$req = "select matricule from portefeuille ";
		$res = Pdolbc::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function modifierPraticien($num, $specialite, $nom, $prenom, $note, $code, $ville, $rue, $longitude, $latitude)
	{
		$res = Pdolbc::$monPdo->prepare('UPDATE praticien 
			SET  nom = :nom, prenom = :prenom, note = :note, codePostal = :code, ville = :ville, rue = :rue, longitude = :longitude, latitude = :latitude 
 			WHERE idPraticien = :num AND idspecialite = :specialite');
		
		$res->bindValue('num',$num, PDO::PARAM_INT);
		$res->bindValue('specialite', $specialite, PDO::PARAM_STR);
		$res->bindValue('nom',$nom, PDO::PARAM_STR);
		$res->bindValue('prenom', $prenom, PDO::PARAM_STR);   
		$res->bindValue('note', $note, PDO::PARAM_INT);
		$res->bindValue('code', $code, PDO::PARAM_STR);
		$res->bindValue('ville', $ville, PDO::PARAM_STR);
		$res->bindValue('rue', $rue, PDO::PARAM_STR);
		$res->bindValue('longitude', $longitude, PDO::PARAM_STR);
		$res->bindValue('latitude', $latitude, PDO::PARAM_STR);
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
	}



	public function getPraticiens($numVisiteur,$numSecteur) {
		$req = "SELECT DISTINCT praticien.idspecialite, praticien.idPraticien, praticien.prenom, praticien.nom, specialite.nomspecialite, portefeuille.matricule, praticien.note, praticien.ville, praticien.latitude, praticien.longitude, 
		(SELECT visite.dateVisite FROM visite WHERE visite.idspecialite = praticien.idspecialite AND visite.idPraticien = praticien.idPraticien) as dateVisite
		FROM praticien
		LEFT JOIN portefeuille on portefeuille.idspecialite = praticien.idspecialite AND portefeuille.idPraticien = praticien.idPraticien
		INNER JOIN specialite on specialite.idspecialite = praticien.idspecialite
		WHERE portefeuille.matricule = :numVisiteur AND
		(SELECT secteur.sec_num FROM affecter INNER JOIN region on region.reg_code = affecter.reg_code INNER JOIN secteur on secteur.sec_num = region.sec_num WHERE affecter.idspecialite = praticien.idspecialite AND affecter.idPraticien = praticien.idPraticien ORDER BY affecter.dateArrivee DESC) = :numSecteur";
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':numVisiteur', $numVisiteur);
		$res->bindValue(':numSecteur', $numSecteur);
		$res->execute();
		
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	public function getPraticiensSecteur($numSecteur) {
		$req = "SELECT DISTINCT praticien.idspecialite, praticien.idPraticien, praticien.prenom, praticien.nom, specialite.nomspecialite, portefeuille.matricule, praticien.note, praticien.ville, praticien.latitude, praticien.longitude,
		(SELECT visite.dateVisite FROM visite WHERE visite.idspecialite = praticien.idspecialite AND visite.idPraticien = praticien.idPraticien) as dateVisite
		FROM praticien
		LEFT JOIN portefeuille on portefeuille.idspecialite = praticien.idspecialite AND portefeuille.idPraticien = praticien.idPraticien
		INNER JOIN specialite on specialite.idspecialite = praticien.idspecialite
		WHERE
		(SELECT secteur.sec_num FROM affecter INNER JOIN region on region.reg_code = affecter.reg_code INNER JOIN secteur on secteur.sec_num = region.sec_num WHERE affecter.idspecialite = praticien.idspecialite AND affecter.idPraticien = praticien.idPraticien ORDER BY affecter.dateArrivee DESC) = :numSecteur";
		$res = Pdolbc::$monPdo->prepare($req);
	
		$res->bindValue(':numSecteur', $numSecteur);
		$res->execute();
		
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	public function getPraticiensVisiteur($numVisiteur) {
		$req = "SELECT DISTINCT praticien.idspecialite, praticien.idPraticien, praticien.prenom, praticien.nom, specialite.nomspecialite, portefeuille.matricule, praticien.note, praticien.ville, praticien.latitude, praticien.longitude, (SELECT visite.dateVisite FROM visite WHERE visite.idspecialite = praticien.idspecialite AND visite.idPraticien = praticien.idPraticien) as dateVisite
		FROM praticien
		LEFT JOIN portefeuille on portefeuille.idspecialite = praticien.idspecialite AND portefeuille.idPraticien = praticien.idPraticien
		INNER JOIN specialite on specialite.idspecialite = praticien.idspecialite
		WHERE portefeuille.matricule = :numVisiteur";
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':numVisiteur', $numVisiteur);
	
		$res->execute();
		
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	public function getToutPraticiens() {
		$req = "SELECT DISTINCT praticien.idspecialite, praticien.idPraticien, praticien.prenom, praticien.nom, specialite.nomspecialite, portefeuille.matricule, praticien.note, praticien.ville, praticien.latitude, praticien.longitude, (SELECT visite.dateVisite FROM visite WHERE visite.idspecialite = praticien.idspecialite AND visite.idPraticien = praticien.idPraticien) as dateVisite
		FROM praticien
		LEFT JOIN portefeuille on portefeuille.idspecialite = praticien.idspecialite AND portefeuille.idPraticien = praticien.idPraticien
		INNER JOIN specialite on specialite.idspecialite = praticien.idspecialite" ;
		$res = Pdolbc::$monPdo->prepare($req);
		$res->execute();
		
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function getVisiteur($idSpecialite, $idPraticien, $numSecteur) {
		$req = "SELECT DISTINCT visiteur.matricule, visiteur.sec_num, (SELECT dateVisite FROM visite WHERE visite.matricule = visiteur.matricule ORDER BY visite.dateVisite DESC LIMIT 1) as dateVisite
		FROM visiteur
		LEFT JOIN portefeuille on visiteur.matricule = portefeuille.matricule
		WHERE visiteur.sec_num = :numSecteur AND portefeuille.idspecialite = :idSpecialite AND portefeuille.idPraticien = :idPraticien";

		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':idSpecialite', $idSpecialite);
		$res->bindValue(':idPraticien', $idPraticien);
		$res->bindValue(':numSecteur', $numSecteur);
		$res->execute();

		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	public function getVisiteurSecteur($numSecteur) {
		$req = "SELECT DISTINCT visiteur.matricule, visiteur.sec_num, (SELECT dateVisite FROM visite WHERE visite.matricule = visiteur.matricule ORDER BY visite.dateVisite DESC LIMIT 1) as dateVisite
		FROM visiteur
		LEFT JOIN portefeuille on visiteur.matricule = portefeuille.matricule
		WHERE visiteur.sec_num = :numSecteur";

		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':numSecteur', $numSecteur);
		$res->execute();

		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	public function getVisiteurPraticiens($idSpecialite, $idPraticien) {
		$req = "SELECT DISTINCT visiteur.matricule, visiteur.sec_num, (SELECT dateVisite FROM visite WHERE visite.matricule = visiteur.matricule AND visite.idSpecialite = :idSpecialite AND visite.idPraticien = :idPraticien ORDER BY visite.dateVisite DESC LIMIT 1) as dateVisite
		FROM visiteur
		LEFT JOIN portefeuille on visiteur.matricule = portefeuille.matricule
		WHERE portefeuille.idspecialite = :idSpecialite AND portefeuille.idPraticien = :idPraticien";

		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':idSpecialite', $idSpecialite);
		$res->bindValue(':idPraticien', $idPraticien);
		$res->execute();

		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	public function getToutVisiteur() {
		$req = "SELECT DISTINCT visiteur.matricule, visiteur.sec_num, (SELECT dateVisite FROM visite WHERE visite.matricule = visiteur.matricule ORDER BY visite.dateVisite DESC LIMIT 1) as dateVisite
		FROM visiteur
		LEFT JOIN portefeuille on visiteur.matricule = portefeuille.matricule";
		$res = Pdolbc::$monPdo->prepare($req);
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

	public function getLesSecteur()
	{
		$req = "select * from secteur";
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

	public function getCountPraticienSpecialite($idSpecialite)
	{
		$req = "SELECT COUNT(*) as 'count' FROM praticien WHERE praticien.idspecialite = :idspecialite";
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':idspecialite', $idSpecialite, PDO::PARAM_INT);
		$res->execute();
		return $res->fetch();
	}

	public function getregionvisiteur($matricule){
		$req = ("SELECT reg_code from travailler where matricule = :matricule order by dateaffect limit 1");
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':matricule', $matricule, PDO::PARAM_INT);
		$res->execute();
		return $res->fetch();
	}

	public function getregionpraticien($idspecialite, $idPraticien){
		$req = ("SELECT reg_code from affecter where idpraticien = :idpraticien and idspecialite = :idspecialite
		 order by dateArrivee DESC limit 1");
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':idpraticien', $idPraticien, PDO::PARAM_INT);
		$res->bindValue(':idspecialite', $idspecialite, PDO::PARAM_INT);
		$res->execute();
		return $res->fetch();
	}
	
	public function getSpecialitesPortefeuilleVisiteur($matricule)
	{
		$req = "SELECT specialite.idspecialite, specialite.nomspecialite
		FROM portefeuille
		INNER JOIN praticien on portefeuille.idspecialite = praticien.idspecialite AND portefeuille.idPraticien = praticien.idPraticien
		INNER JOIN specialite on praticien.idspecialite = specialite.idspecialite
		WHERE portefeuille.matricule = :matricule
		GROUP BY praticien.idspecialite";
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':matricule', $matricule, PDO::PARAM_INT);
		$res->execute();
		return $res->fetchAll();
	}

	public function getNotesPortefeuilleVisiteur($matricule)
	{
		$req = "SELECT praticien.note
		FROM portefeuille
		INNER JOIN praticien on portefeuille.idspecialite = praticien.idspecialite AND portefeuille.idPraticien = praticien.idPraticien
		WHERE portefeuille.matricule = :matricule
		GROUP BY praticien.note";
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':matricule', $matricule, PDO::PARAM_INT);
		$res->execute();
		return $res->fetchAll();
	}

	public function getVillesPortefeuilleVisiteur($matricule)
	{
		$req = "SELECT praticien.ville
		FROM portefeuille
		INNER JOIN praticien on portefeuille.idspecialite = praticien.idspecialite AND portefeuille.idPraticien = praticien.idPraticien
		WHERE portefeuille.matricule = :matricule
		GROUP BY praticien.ville";
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':matricule', $matricule, PDO::PARAM_INT);
		$res->execute();
		return $res->fetchAll();
	}

	public function getPortefeuilleVisiteur($matricule, $filtres)
	{
		if ($filtres == null) $filtresStr = "";
		else
		{
			$filtresStr = " AND praticien.idspecialite IN (";
			foreach ($filtres["specialites"] as $index => $specialite) {
				$filtresStr .= $specialite . (($index < count($filtres["specialites"]) -1) ? ", " : "");
			}
			$filtresStr .= ") AND praticien.note IN (";
			foreach ($filtres["notes"] as $index => $note) {
				$filtresStr .= $note . ($index < count($filtres["notes"]) -1 ? ", " : "");
			}
			$filtresStr .= ") AND praticien.ville IN (";
			foreach ($filtres["villes"] as $index => $ville) {
				$filtresStr .= "'" . $ville . "'" . ($index < count($filtres["villes"]) -1 ? ", " : "");
			}
			$filtresStr .= ")";
		}
		$req = "SELECT *
		FROM portefeuille
		INNER JOIN praticien on portefeuille.idspecialite = praticien.idspecialite AND portefeuille.idPraticien = praticien.idPraticien
		INNER JOIN specialite on praticien.idspecialite = specialite.idspecialite
		WHERE portefeuille.matricule = :matricule" . $filtresStr;
		$res = Pdolbc::$monPdo->prepare($req);
		$res->bindValue(':matricule', $matricule, PDO::PARAM_INT);
		$res->execute();
		return $res->fetchAll();
	}
}


?>