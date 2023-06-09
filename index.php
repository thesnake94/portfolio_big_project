<?php
include "includes/config.php";
include "includes/database.php";
$db = new Database();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description"
		content="Bienvenue sur le portfolio de Dayen ROMDHANE dans lequel vous allez pouvoir retrouver mes compétences, mes expériences, quelques projets que j'ai pu mener." />
	<meta name="keyword"
		content="Portfolio, cv, curiculum vitae, projet, dayen, romdhane, expérience, freelancer, indépendant, compétences, stage, guardia." />
	<meta name="author" content="Romdhane Dayen" />
	<title>Portfolio ROMDHANE Dayen - Etudiant en cybersécurité</title>
	<link rel="icon" type="image/x-icon" href="portfolio/assets/pdp moi png.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

	<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
		type="text/css" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="portfolio/css/styles.css" rel="stylesheet" />
	<style>  body{background-image: url('portfolio/assets/img/background_bulle.gif');}</style>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>


</head>

<body   id="page-top">
	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg text-uppercase fixed-top shadow-lg" id="mainNav">
		<div class="container">
			<a class="navbar-brand" href="#page-top">Dayen ROMDHANE</a>
			<button class="navbar-toggler text-uppercase font-weight-bold bg-info text-white rounded" type="button"
				data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
				aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item mx-0 mx-lg-1">
						<a class="nav-link py-3 px-0 px-lg-3 " href="#about" onclick="closeNav()">
							A propos de moi
						</a>
					</li>
					<li class="nav-item mx-0 mx-lg-1">
						<a class="nav-link py-3 px-0 px-lg-3 " href="#expérience" onclick="closeNav()">
							Expériences
						</a>
					</li>
					<li class="nav-item mx-0 mx-lg-1">
						<a class="nav-link py-3 px-0 px-lg-3 " href="#projet" onclick="closeNav()">
							Projets
						</a>
					</li>
					<li class="nav-item mx-0 mx-lg-1">
						<a class="nav-link py-3 px-0 px-lg-3 " href="game/game.php" onclick="closeNav()">
							Jeux
						</a>
					</li>
					<li class="nav-item mx-0 mx-lg-1">
						<a class="nav-link py-3 px-0 px-lg-3 " href="#contact" onclick="closeNav()">
							Contact
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Masthead-->
	<header class="masthead text-white text-center bg-image">
		<div class="container d-flex align-items-center flex-column">
			<!-- Masthead Avatar Image-->
			<img class="masthead-avatar mb-5 rounded-circle img-responsive pdp_moi"
				src="portfolio/assets/img/photo de moi.jpg" alt="photo de moi haut de page" />
			<!-- Masthead Heading-->
			<h1 class="masthead-heading text-uppercase mb-0">Dayen ROMDHANE</h1>
			<!-- Icon etoile-->
			<div class="divider-custom divider-light">
				<div class="divider-custom-line"></div>
				<div class="divider-custom-icon">
					<a href="egg/matrix.php"><i class="fas fa-shield"></i></a>
				</div>
				<div class="divider-custom-line"></div>
			</div>
			<!-- Masthead Subheading-->
			<p class="masthead-subheading font-weight-light mb-0">Etudiant en cybersécurité</p>
		</div>
	</header>

	<!-- About Section-->
	<section class="page-section bg-dark text-white mb-0" id="about">
		<div class="container">
			<!-- About Section Heading-->
			<h2 class="page-section-heading text-center text-uppercase text-white">
				A propos de moi
			</h2>
			<!-- Icon Divider-->
			<div class="divider-custom divider-light">
				<div class="divider-custom-line"></div>
				<div class="divider-custom-icon"><i class="fas fa-user"></i></div>
				<div class="divider-custom-line"></div>
			</div>
			<!-- About Section Content-->
			<div class="row">
				<div class="col-lg-4 ms-auto">
					<?php 
						// Exécution de la requête SQL
					$sql = "SELECT * FROM about";
					$result = mysqli_query($conn, $sql);

					// Vérifier si des données ont été trouvées
					if (mysqli_num_rows($result) > 0) {
						// Afficher les données dans des td
						while($row = mysqli_fetch_assoc($result)) {
					?>
					<p class="lead1">
						<?php echo $row['text1']; ?>
						<br />
					</p>
				</div>
				<div class="col-lg-4 me-auto">
					<p class="lead">
						<?php echo $row['text2']; ?>

					</p>
					<?php }} 
					?>
				</div>
			</div>
			<!-- About Section Button-->
			<div class="text-center mt-4">
				<a class="btn btn-xl btn-outline-light" href="portfolio/assets/CV stage DAYEN ROMDHANE.pdf"
					target="_blank">
					<i class="fas fa-download me-2"></i>
					Télécharger mon CV !
				</a>
			</div>
		</div>
	</section>

	<!-- expérience Section-->
	<section class="page-section text-white mb-0" id="expérience">
		<div class="container">
			<!-- About expérience Heading-->
			<h2 class="page-section-heading text-center text-uppercase text-white">
				Mes expériences
			</h2>
			<!-- Icon Divider-->
			<div class="divider-custom divider-light">
				<div class="divider-custom-line"></div>
				<div class="divider-custom-icon"><i class="fa-regular fa-hourglass-half"></i></i></div>
				<div class="divider-custom-line"></div>
			</div>
		</div>
		<br>
		<!-- timeline -->
		<div class="timeline">
			<div class="container-time left">
				<div class="date1">2012 - 2019</div>
				<i class="icon fa-solid fa-person-swimming"></i>
				<div class="content">
					<h2>Sport étude natation</h2>
					<p>
						J'ai intégré le sport étude natation en classe de CM2 à Victor Hugo à créteil.
					</p>
				</div>
			</div>
			<div class="container-time right">
				<div class="date1">2017 - 2019</div>
				<i class="icon fa-solid fa-flag-checkered"></i>
				<div class="content">
					<h2>Niveau national natation</h2>
					<p>
						Entrainement tous les jours de 17h à 20h dont une heure de renforcement musculaire avec
						compétition tous les weekends.
						J'ai pu participer aux championnats de France.
					</p>
				</div>
			</div>
			<div class="container-time left">
				<div class="date2">Dec 2018</div>
				<i class="icon fa-solid fa-eye"></i>
				<div class="content">
					<h2>Stage d'observation chez Oui.sncf</h2>
					<p>
						Stage d'observation en classe de 3e au collège avec les développeurs du site et de l'application
						mobile, les UX/UI designer, les chargés de communications via les réseaux sociaux.
					</p>
				</div>
			</div>
			<div class="container-time right">
				<div class="date2">Jun 2022</div>
				<i class="icon fa-solid fa-graduation-cap"></i>
				<div class="content">
					<h2>Baccalauréat général</h2>
					<p>
						Obtention de mon Baccalauréat spécialité Maths, SVT, Physique-chimie au lycée d'Arsonval à
						Saint-maur-des-fossés.
					</p>
				</div>
			</div>
			<div class="container-time left">
				<div class="date3">Aug & Sep 2022</div>
				<i class="icon fa-solid fa-user-tie"></i>
				<div class="content">
					<h2>Employé saisonnier chez GAN Assurance</h2>
					<p>
						Emploi saisonnier au sein du pôle indemnisation chez GAN Assurance ouverture des sinistres.
					</p>
				</div>
			</div>
			<div class="container-time right">
				<div class="date3">2022 - Today</div>
				<i class="icon fa-solid fa-shield-halved"></i>
				<div class="content">
					<h2>Etudiant en cybersécurité</h2>
					<p>
						Etudiant chez Guardia Cybersecurity school.
					</p>
				</div>
			</div>
		</div>
	</section>



<!-- Projets Section-->
<section class="page-section portfolio bg-dark" id="projet">
	<div class="container">
		<!-- Portfolio Section Heading-->
		<h2 class="page-section-heading text-center text-uppercase text-white mb-0">
			Mes projets
		</h2>
		<!-- Icon Divider-->
		<div class="divider-custom divider-light">
			<div class="divider-custom-line"></div>
			<div class="divider-custom-icon"><i class="fas fa-tasks"></i></div>
			<div class="divider-custom-line"></div>
		</div>
		<!-- Portfolio Grid Items-->
		<div class="row justify-content-center">
			<?php
			// Exécution de la requête SQL
			$sql = "SELECT id, img1, title FROM project LIMIT 3";
			$result = mysqli_query($conn, $sql);

			// Vérifier si des données ont été trouvées
			if (mysqli_num_rows($result) > 0) {
				// Afficher les données dans des td
				while($row = mysqli_fetch_assoc($result)) {
					// Affichage du projet dans le format requis
					?>
					<div class="col-md-6 col-lg-4 mb-5">
						<h3 class="text-center text-white"><?php echo $row['title']; ?></h3>
						<a class="portfolio-item mx-auto" href="project/project1.php?id=<?php echo $row['id']; ?>">
							<img class="img-fluid h-100 w-100" src="admin/<?php echo $row['img1']; ?>" alt="<?php echo $row['title']; ?>" />
						</a>
					</div>
				<?php 
				}
			} 
			// Fermeture de la connexion
			mysqli_close($conn);
			?>
		</div>
		<!-- Button -->
		<div class="col-12 text-center">
			<button class="btn btn-primary btn-lg" onclick="location.href='project/project.php'">
			Voir tous mes projets
			</button>
		</div>
	</div>
</section>

	<!-- Contact Section-->
	<section class="page-section" id="contact">
		<div class="container">
			<!-- Contact Section Heading-->
			<h2 class="page-section-heading text-center text-uppercase text-white mb-0">
				Me contacter
			</h2>
			<!-- Icon Divider-->
			<div class="divider-custom divider-light">
				<div class="divider-custom-line"></div>
				<div class="divider-custom-icon"><i class="fas fa-envelope"></i></div>
				<div class="divider-custom-line"></div>
			</div>


			<?php 
			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\Exception;

			require 'PHPMailer/src/Exception.php';
			require 'PHPMailer/src/PHPMailer.php';
			require 'PHPMailer/src/SMTP.php';
			
            

			// Récupération des données soumises par le formulaire
			if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['message'])) {
				$nom = mysqli_real_escape_string($db->link, $_POST['nom']);
				$prenom = mysqli_real_escape_string($db->link, $_POST['prenom']);
				$email = mysqli_real_escape_string($db->link, $_POST['email']);
				$message = mysqli_real_escape_string($db->link, $_POST['message']);
                
                		// Vérification du reCAPTCHA
        		if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
                    $secret = '6LeT4JklAAAAAFVxzvgnHjiSinD1WcevkAPrG3oo'; // Votre clé secrète reCAPTCHA
                    $captcha = $_POST['g-recaptcha-response'];
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$ip);
                    $responseKeys = json_decode($response,true);
                    if(intval($responseKeys["success"]) !== 1) {
                        echo "<script>alert('ReCAPTCHA: veuillez confirmer que vous n\\'êtes pas un robot.');</script>";
                        exit;
                    }
                } else {
					echo "<script>alert('ReCAPTCHA: veuillez confirmer que vous n\\'êtes pas un robot.');</script>";
                    exit;
                }

				// Préparation de la requête SQL d'insertion
				$sql = "INSERT INTO contact (nom, prenom, email, message) VALUES ('$nom', '$prenom', '$email', '$message')";

				// initialiser l'objet PHPMailer
				$mail = new PHPMailer(true);

				try {
					// Configuration du serveur SMTP
					$mail->isSMTP();                                           
					$mail->Host       = 'smtp.gmail.com';                       
					$mail->SMTPAuth   = true;                                   
					$mail->Username   = 'dayen.portfolio@gmail.com';            
					$mail->Password   = 'zjyietgtcngdkfjw';                    
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
					$mail->Port       = 465;                                    

					// Destinataire et expéditeur
					$mail->setFrom($email);
					$mail->addAddress('dromdhane@guardiaschool.fr');             

					// Contenu du message
					$mail->isHTML(true);                                  
					$mail->Subject = 'Nouveau message de '.$nom.' '.$prenom. ' depuis le portfolio.';
					$mail->Body    = 'Nom: '.$nom.'<br>Prénom: '.$prenom.'<br>Email: '.$email.'<br>Message: '.$message;

					$mail->send();
				} catch (Exception $e) {
					echo "<script>alert('Votre message n'a pas être envoyé !');</script>";
				}

				// Exécution de la requête SQL
				if (mysqli_query($db->link, $sql)) {
					echo "<script>alert('Votre message a été envoyé avec succès !');</script>";
				} else {
					echo "Erreur lors de l'envoi du formulaire: " . $db->link->error;
				}
				mysqli_close($db->link);
				
			}



	
			?>

			
			<form method="POST" >      
				<input name="nom" type="text" class="feedback-input" placeholder="Nom" required="required" data-error="Nom est obligatoire." />   
				<input name="prenom" type="text" class="feedback-input" placeholder="Prénom" required="required" data-error="Prénom est obligatoire." />   
				<input name="email" type="email" class="feedback-input" placeholder="Email" required="required" data-error="Un email valid est obligatoire." />
				<textarea name="message" class="feedback-input" placeholder="Message" required="required" data-error="Veuillez remplir le champ Message."></textarea>
				 <div class="g-recaptcha" data-sitekey="6LeT4JklAAAAAHjj-1c8A6or6v1TXjlAd7Hxrcaw"></div></br>
				<input class="btnC center" type="submit" value="ENVOYER"/>
			</form>

			<div class="row text-white">
				<div class="col-lg-4 ms-auto" style="text-align: center;">
					<div class="container" style="display: flex; justify-content: center;">
						<div class="title-box-2 pt-8 pt-md-2 ">
							<h5 class="title-left " style="padding-top: 15px;">
								Mon Github
							</h5>
							<div class="contact">
								<a href="https://github.com/thesnake94" rel="external" class="btn_github btnC"
									target="_blank">
									<img class="img-responsive logo_social" src="IMG/github.webp" alt="logo github">
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 me-auto" style="text-align: center;">
					<div class="container" style="display: flex; justify-content: center;">
						<div class="title-box-2 pt-8 pt-md-2">
							<h5 class="title-left" style="padding-top: 15px;">
								Mon Linkedin
							</h5>
							<div class="contact">
								<a href="https://www.linkedin.com/in/dayen-romdhane-1ba139252/" rel="external"
									class="btn_linkedin btnC" target="_blank">
									<img class="img-responsive logo_social" src="IMG/linkedin.webp"
										alt="logo linkedin">
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 me-auto" style="text-align: center;">
					<div class="container" style="display: flex; justify-content: center;">
						<div class="title-box-2 pt-8 pt-md-2">
							<h5 class="title-left" style="padding-top: 15px;">
								Mon Mail
							</h5>
							<div class="contact">
								<a href="mailto:dromdhane@guardiaschool.fr" rel="external" class="btn_mail btnC"
									target="_blank">
									dromdhane@guardiaschool.fr
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
			
	
	</section>




	<!-- Footer-->
	<footer class="footer text-center">
		<div class="container">
			<div class="row">
				<!-- Footer Location-->
				<div class="col-lg-4 mb-5 mb-lg-0">
					<h4 class="text-uppercase mb-4">Adresse</h4>
					<p class="lead mb-0">
						Paris 75
						<br />
						France
					</p>
				</div>
				<!-- Footer Social Icons-->
				<div class="col-lg-4 mb-5 mb-lg-0">
					<h4 class="text-uppercase mb-4">Mes réseaux sociaux</h4>
					<a class="btn btn-outline-light btn-social mx-1" href="https://github.com/thesnake94"
						target="_blank"><i class="fab fa-fw fa-github"></i></a>
					<a class="btn btn-outline-light btn-social mx-1"
						href="https://www.linkedin.com/in/dayen-romdhane-1ba139252/" target="_blank"><i
							class="fab fa-fw fa-linkedin-in"></i></a>
				</div>
				<!-- Footer About Text-->
				<div class="col-lg-4">
					<h4 class="text-uppercase mb-4">Autres</h4>
					<p class="lead mb-0">
						<a href="index.php#contact">Me contacter</a><br />
					</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- Copyright Section-->
	<div class="copyright py-4 text-center text-white">
		<div class="container"><small>Copyright &copy;  ROMDHANE <a href="admin/login.php" style="text-decoration: none; color: white;">D</a>ayen 2023</small></div>
	</div>




	<!-- Bouton retour vers le haut -->
	<a href="#" class="scroll-to-top">
		<div class="scroll-to-top__icon">
			<i class="fa fa-chevron-up"></i>
		</div>
	</a>



	<!-- Bootstrap core JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Core theme JS-->
	<script src="js/scripts.js"></script>
	<script src="portfolio/js/main.js"></script>

</body>

</html>