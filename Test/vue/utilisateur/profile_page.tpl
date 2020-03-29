
	
<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <title>Profile</title>
        <link rel="stylesheet" href="./vue/utilisateur/CSS/profile/bootstrap.css">
        <link rel="stylesheet" href="./vue/utilisateur/CSS/profile/profile.css">
    </head>
    <body>        
        <section class="home_banner_area">
        	<div class="row">	
           		<div class="container block">
           		
	           		<div class="banner_inner d-flex align-items-center">
	           			  <div class="container photo">
	        		<img src="./vue/utilisateur/img/student.png" alt="">
	        	</div>
						<div class="banner_content">
							<div class="media">
								<div class="media-body">
									<div class="personal_text">
										<h2><?php 
										print_r ($_SESSION['profil']['nom']." ".$_SESSION['profil']['prenom']);echo ('<br/>');
										?></h2>
										<h5><?php print_r ($_SESSION['profil']['email']);echo ('<br/>');?></h5>
													 <?php 
										
										if($_SESSION['profil']['role']=='eleve'){
											echo ('<h6>Matricule: <p>');print_r ($_SESSION['profil']['matricule']);echo ('</p></h6><br/>');
											echo ('<h6>Votre Groupe: <p>');print_r ($_SESSION['profil']['num_grpe']);echo ('</p></h6><br/>');
											echo ('<h6>Votre date de naissance: <p>');print_r ($_SESSION['profil']['date_etu']);echo ('</p></h6><br/>');
										}
										else{
											print_r ($_SESSION['profil']['date_prof']);echo ('<br/>');
										}
										?>
									</div>

								</div>
								
							</div>
							
						</div>
					</div>
            </div>
	    </div>

        </section>
        <div class="return-button"><?php 
							if ($_SESSION['profil']['role'] == 'prof'){
								echo('<a href="index.php?controle=utilisateur&action=accueilProf"><img src="./vue/utilisateur/img/return.png" alt=""></a>');
							}
							else {
								echo('<a href="index.php?controle=utilisateur&action=accueil_etudiant"><img src="./vue/utilisateur/img/return.png" alt=""></a>');
							}
						?>
						</div>
   
    </body>
</html>

