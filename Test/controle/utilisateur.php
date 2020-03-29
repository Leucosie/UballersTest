<?php 

function ident() {
	$login=  isset($_POST['login'])?($_POST['login']):'';
	$pass=  isset($_POST['pass'])?($_POST['pass']):'';
	$msgCo='';
	$msgIns='';

	if  (count($_POST)==0){
        require ("./vue/utilisateur/connexion.html") ;
	}
    else {
	    if  (! verif_ident($login,$pass)) {
			$_SESSION['profil']=array();
	        $msgCo ="erreur de saisie";
	        require ("./vue/utilisateur/connexion.html") ;
		}
	    else { 
		
			require ("./vue/utilisateur/accueil.html") ;

		}
    }	
}

function verif_ident($login,$pass) {
		require ('./modele/utilisateurBD.php');
		return verif_ident_BD($login,$pass); //true ou false en base;
}

function inscription() {
	$identifiant=  isset($_POST['login'])?($_POST['login']):'';
	$identifiantConf=  isset($_POST['login_confirmation'])?($_POST['login_confirmation']):'';
	$mot_de_passe=  isset($_POST['pass'])?($_POST['pass']):'';
	$genre=  isset($_POST['genre'])?($_POST['genre']):'';
	$prenom=  isset($_POST['prenom'])?($_POST['prenom']):'';
	$nom=  isset($_POST['nom'])?($_POST['nom']):'';
	$annee=  isset($_POST['annee'])?($_POST['annee']):'';
	$mois=  isset($_POST['mois'])?($_POST['mois']):'';
	$jour=  isset($_POST['jour'])?($_POST['jour']):'';
	$regexEmail = "/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i";
    $regexTel ="/^0\d(\s|-)?(\d{2}(\s|-)?){4}$/";
	$msgCo='';
	$msgIns='';

	//vérification si javascript désactivé 
	if  (count($_POST)==0 || (preg_match($regexEmail,$identifiant)==false && preg_match($regexTel,$identifiant)==false) || $identifiant!=$identifiantConf){
		require ("./vue/utilisateur/connexion.html") ;
		$msgIns ="Vous n'avez pas rempli correctement tous les champs";
	}
    else {
		require ('./modele/utilisateurBD.php');
		
		$date_de_naissance = $annee."-".$mois."-".$jour;
		$bool = inscriptionBD($identifiant,$mot_de_passe,$date_de_naissance,$nom,$prenom,$genre); 
		$msgIns = "Inscription réussie !";
		require ("./vue/utilisateur/connexion.html") ;
	}
}

function deconnexion(){
	$_SESSION = array();
	session_destroy();
	header('Location: index.php');
}

?>
