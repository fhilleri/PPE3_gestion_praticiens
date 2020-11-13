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
    		Pdolbc::$monPdo = new PDO(Pdolbc::$serveur.';'.Pdolbc::$bdd, Pdolbc::$user, Pdolbc::$mdp); 
			Pdolbc::$monPdo->query("SET CHARACTER SET utf8");
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
	public function getLesPraticiens()
	{
		$req = "select * from praticien";
		$res = Pdolbc::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function getLePraticien()
	{
		$req = "select * from praticien";
		$res = Pdolbc::$monPdo->query($req);
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

	/* Affiche Portefeuille lié au visiteur*/	

	public function getPorteFeuilleVis() {
		$req = "select * from portefeuille";
		$res = Pdolbc::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function modifierPraticien($nom,$prenom,$specialite,$notoriete,$ville,$num)
	{
		$res = PdoTransNat::$monPdo->prepare('UPDATE praticien 
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

}
?>