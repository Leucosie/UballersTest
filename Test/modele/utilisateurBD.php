<?php 
/*Fonctions-modèle réalisant la gestion d'une table de la base,
** ou par extension gérant un ensemble de tables. 
*/

	//echo ("Penser à modifier les paramètres de connect.php avant l'inclusion du fichier <br/>");
	//require ("modele/connect.php") ; //connexion MYSQL et sélection de la base, $link défini
	
function Update_insert($sql){
	require ("modele/connect.php") ; 

	try {
		$commande = $pdo->prepare($sql);
		$bool = $commande->execute();
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); 
	}
}

function verif_ident_BD($login,$pass){ 
	require ("modele/connect.php"); 
	$profil = array();

	$sql_util="SELECT * FROM utilisateur where identifiant=:login_util";
	$res_util= array(); 

	try {
		$cde_util = $pdo->prepare($sql_util);
		$cde_util->bindParam(':login_util', $login);
		$b_util = $cde_util->execute();
		
		if (($b_util)) {
			$res_util = $cde_util->fetchAll(PDO::FETCH_ASSOC); 
			}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
	

	if (count($res_util)> 0) {
		$_SESSION['profil']['identifiant'] = $res_util[0]['identifiant'];
		$_SESSION['profil']['nom'] = $res_util[0]['nom'];
		$_SESSION['profil']['prenom'] = $res_util[0]['prenom'];
		$_SESSION['profil']['genre'] = $res_util[0]['genre'];
		//vérification du mot de passe 
		if(password_verify($pass,$res_util[0]['mot_de_passe'])){
			return true;
		}
		
	}	
		
	return false;
}


function inscriptionBD($identifiant,$mot_de_passe,$date_de_naissance,$nom,$prenom,$genre){ 
	require ("modele/connect.php"); 
	$profil = array();
	$mdp = password_hash($mot_de_passe, PASSWORD_DEFAULT);

	try {
		$sql="INSERT INTO utilisateur (genre, nom, prenom, date_de_naissance, identifiant, mot_de_passe) VALUES('".$genre."', '".$nom."', '".$prenom."','".$date_de_naissance."','".$identifiant."','".$mdp."')" ;
		$commande = $pdo->prepare($sql);
		$bool = $commande->execute();
		if($bool){
			return true;
		}
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		return false;
		die(); // On arrête tout.
	}
	return false;

}


?>
