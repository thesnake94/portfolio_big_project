<!DOCTYPE html>
<html>
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
		<title>Flappy bird ROMDHANE Dayen</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
			crossorigin="anonymous"
		/>
		<style>
			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}

			body {
				height: 100vh;
				width: 100vw;
				display: flex;
				justify-content: center;
				align-items: center;
			}

			.container {
				height: 80vh;
				width: 80vw;
			}

			.background {
				height: 100%;
				width: 100%;
				background-image: url('background_bulle.gif');
				background-repeat: no-repeat;
				background-position: center center;
				background-size: cover;
				background-attachment: fixed;
			}

			.bird {
				height: 100px;
				width: 120px;
				position: fixed;
				top: 40vh;
				left: 30vw;
				z-index: 100;
			}

			.pipe_sprite {
				position: fixed;
				top: 40vh;
				left: 100vw;
				height: 70vh;
				width: 6vw;
				background-color: rgb(49, 202, 226);
			}

			.message {
				position: fixed;
				z-index: 10;
				height: 10vh;
				font-size: 10vh;
				font-weight: 100;
				color: rgb(224, 155, 155);
				top: 10%;
				left: auto;
				text-align: center;
			}

			.score {
				position: fixed;
				z-index: 10;
				height: 10vh;
				font-size: 10vh;
				font-weight: 100;
				color: rgb(239, 178, 23);
				top: 0;
				left: 0;
			}

			.score_val {
				color: gold;
			}
		</style>
	</head>

	<body>
		<a class="btn btn-secondary position-fixed top-0 end-0 m-3" href="../game.php">Retour</a>
		<div class="background"></div>
		<img class="bird" src="../img/pdp moi png.png" alt="bird-img" />
		<div class="message text-center">Appuie sur entrer pour commencer</div>
		<div class="score">
			<span class="score_title"></span>
			<span class="score_val"></span>
		</div>
		<script src="bird.js"></script>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
			crossorigin="anonymous"
		></script>
	</body>
</html>
