<?php 
include "../includes/config.php";
?>

<!DOCTYPE html>
<php lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta
			name="description"
			content="Bienvenue sur le portfolio de Dayen ROMDHANE dans lequel vous allez pouvoir retrouver mes compétences, mes expériences, quelques projets que j'ai pu mener."
		/>
		<meta
			name="keyword"
			content="Portfolio, projects, cv, curiculum vitae, projet, dayen, romdhane, expérience, freelancer, indépendant, compétences, stage, guardia."
		/>
		<meta name="author" content="Romdhane Dayen" />
		<title>Projets ROMDHANE Dayen</title>
		<!-- Favicon-->
		<link rel="icon" type="image/x-icon" href="../portfolio/assets/pdp moi png.png" />
		<style>  body{background-image: url('../portfolio/assets/img/background_bulle.gif');}</style>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
		/>
		<!-- include bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

		<!-- Font Awesome icons (free version)-->
		<script
			src="https://use.fontawesome.com/releases/v6.1.0/js/all.js"
			crossorigin="anonymous"
		></script>
		<!-- Google fonts-->
		<link
			href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
			rel="stylesheet"
			type="text/css"
		/>
		<link
			href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic"
			rel="stylesheet"
			type="text/css"
		/>
		<style>  body{background-image: url('portfolio/assets/img/background_bulle.gif');}</style>

		<!-- Core theme CSS (includes Bootstrap)-->
		<link href="../portfolio/css/styles.css" rel="stylesheet" />
	</head>

	<body class="bg-info" id="page-top">
		<!-- Navigation-->
		<nav
			class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top shadow-lg"
			id="mainNav"
		>
			<div class="container">
				<a class="navbar-brand" href="#page-top">Mes Projets</a>
				<button
					class="navbar-toggler text-uppercase font-weight-bold bg-info text-white rounded"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#navbarResponsive"
					aria-controls="navbarResponsive"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					Menu
					<i class="fas fa-bars"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item mx-0 mx-lg-1">
							<a class="nav-link py-3 px-0 px-lg-3" href="../index.php"
								>Accueil</a
							>
						</li>

						<li class="nav-item mx-0 mx-lg-1">
							<a class="nav-link py-3 px-0 px-lg-3" href="#projet">Projets</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<header class="masthead text-white text-center bg-image">
			<div class="container d-flex align-items-center flex-column">
				<!-- Masthead Heading-->
				<h2 class="masthead-heading text-uppercase mb-0">Dayen ROMDHANE</h2>
				<!-- Icon etoile-->
				<div class="divider-custom divider-light">
					<div class="divider-custom-line"></div>
					<div class="divider-custom-icon">
						<i class="fas fa-shield"></i>
					</div>
					<div class="divider-custom-line"></div>
				</div>
				<!-- Masthead Subheading-->
				<h1 class="masthead-subheading font-weight-light mb-0">Tous mes projets</h1>

				<!-- <p class="masthead-subheading font-weight-light mb-0">Etudiant en cybersécurité</p> -->
			</div>
		</header>

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
				$sql = "SELECT id, img1, title FROM project";
				$result = mysqli_query($conn, $sql);

				// Vérifier si des données ont été trouvées
				if (mysqli_num_rows($result) > 0) {
					// Afficher les données dans des td
					while($row = mysqli_fetch_assoc($result)) {
						// Affichage du projet dans le format requis
						?>
						<div class="col-md-6 col-lg-4 mb-5">
							<h3 class="text-center text-white"><?php echo $row['title']; ?></h3>
							<a class="portfolio-item mx-auto" href="project1.php?id=<?php echo $row['id']; ?>">
								<img class="img-fluid h-100 w-100" src="<?php echo $row['img1']; ?>" alt="<?php echo $row['title']; ?>" />
							</a>
						</div>
					<?php 
					}
				} 
				// Fermeture de la connexion
				mysqli_close($conn);
				?>
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
						<a
							class="btn btn-outline-light btn-social mx-1"
							href="https://github.com/thesnake94"
							target="_blank"
							><i class="fab fa-fw fa-github"></i
						></a>
						<a
							class="btn btn-outline-light btn-social mx-1"
							href="https://www.linkedin.com/in/dayen-romdhane-1ba139252/"
							target="_blank"
							><i class="fab fa-fw fa-linkedin-in"></i
						></a>
					</div>
					<!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Autres</h4>
                        <p class="lead mb-0">
                            <a href="../index.php#contact">Me contacter</a><br />
                        </p>
                    </div>
				</div>
			</div>
		</footer>
		<!-- Copyright Section-->
		<div class="copyright py-4 text-center text-white">
		<div class="container"><small>Copyright &copy; ROMDHANE Dayen 2023</small></div>
		</div>


		<!-- Bootstrap core JS-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		<!-- Core theme JS-->
		<script src="js/scripts.js"></script>
		<!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->
		<script src="../portfolio/js/main.js"></script>
	</body>
</php>
