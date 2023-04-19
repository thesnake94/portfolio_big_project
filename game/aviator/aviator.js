// Définir les variables globales
var canvas, ctx;
var width, height;
var dino, cactus;
var score = 0;
var isGameOver = false;
var speed = 5;

// Définir la variable de temps pour l'interpolation de mouvement
var lastTime = 0;

// Attendre le chargement de la page pour commencer le jeu
document.addEventListener('DOMContentLoaded', function () {
	canvas = document.getElementById('canvas');
	ctx = canvas.getContext('2d');
	width = canvas.width;
	height = canvas.height;

	// Créer le dinosaure
	dino = {
		x: 50,
		y: height / 2,
		width: 70,
		height: 70,
		image: new Image(),
		draw: function () {
			ctx.drawImage(this.image, this.x, this.y, this.width, this.height);
		},
	};

	// Charger l'image du dinosaure
	dino.image.src = '/avion.png';

	// Créer le cactus
	cactus = {
		x: width - 50,
		y: height - 100,
		width: 50,
		height: 100,
		draw: function () {
			ctx.fillStyle = '#008000'; // couleur verte pour la plante
			ctx.beginPath();
			ctx.moveTo(this.x + this.width / 2, this.y);
			ctx.lineTo(this.x + this.width * 0.8, this.y + this.height * 0.4);
			ctx.lineTo(this.x + this.width, this.y + this.height / 2);
			ctx.lineTo(this.x + this.width * 0.8, this.y + this.height * 0.6);
			ctx.lineTo(this.x + this.width / 2, this.y + this.height);
			ctx.lineTo(this.x + this.width * 0.2, this.y + this.height * 0.6);
			ctx.lineTo(this.x, this.y + this.height / 2);
			ctx.lineTo(this.x + this.width * 0.2, this.y + this.height * 0.4);
			ctx.closePath();
			ctx.fill();
		},
		update: function () {
			this.x -= speed;
			if (this.x < -this.width) {
				this.x = width + this.width;
				this.y = height - Math.floor(Math.random() * 150) - this.height;
				this.height = Math.floor(Math.random() * 50) + 50;
				score++;
				speed += 0.1;
			}
		},
	};

	// Dessiner la plante
	cactus.draw();

	// Écouter les événements clavier
	document.addEventListener('keydown', function (event) {
		if (event.keyCode === 38 && !isGameOver) {
			// Flèche du haut
			if (dino.y > 0) {
				// Vérifier si le dino ne dépasse pas la limite supérieure du canvas
				dino.y -= 15;
			}
		} else if (event.keyCode === 40 && !isGameOver) {
			// Flèche du bas
			if (dino.y < height - dino.height) {
				// Vérifier si le dino ne dépasse pas la limite inférieure du canvas
				dino.y += 15;
			}
		} else if (event.keyCode === 37 && !isGameOver) {
			// Flèche de gauche
			if (dino.x > 0) {
				// Vérifier si le dino ne dépasse pas la limite gauche du canvas
				dino.x -= 15;
			}
		} else if (event.keyCode === 39 && !isGameOver) {
			// Flèche de droite
			if (dino.x < width - dino.width) {
				// Vérifier si le dino ne dépasse pas la limite droite du canvas
				dino.x += 15;
			}
		} else if (event.keyCode === 13 && isGameOver) {
			restart();
		}
	});

	// Commencer la boucle de jeu
	loop();
});

// Boucle de jeu principale
function loop() {
	// Effacer le canvas
	ctx.clearRect(0, 0, width, height);

	// Dessiner le dinosaure et le cactus
	dino.draw();
	cactus.draw();

	// Mettre à jour le cactus
	cactus.update();

	// Vérifier les collisions
	if (collides(dino, cactus)) {
		gameOver();
	}

	// Afficher le score
	ctx.fillStyle = '#000';
	ctx.font = '20px Arial';
	ctx.fillText('Score: ' + score, 10, 30);

	// Si le jeu n'est pas fini, continuer la boucle
	if (!isGameOver) {
		requestAnimationFrame(loop);
	}
}

// Faire sauter le dinosaure
function jump() {
	dino.y -= 125;
	setTimeout(function () {
		dino.y += 125;
	}, 500);
}

// Vérifier les collisions entre deux objets
function collides(a, b) {
	return (
		a.x < b.x + b.width && a.x + a.width > b.x && a.y < b.y + b.height && a.y + a.height > b.y
	);
}

// Fin du jeu
function gameOver() {
	isGameOver = true;

	// Afficher le message de fin de jeu
	ctx.fillStyle = '#000';
	ctx.font = '30px Arial';
	ctx.fillText('Game Over', width / 2 - 70, height / 2 - 15);
	ctx.fillText('Press Enter to Restart', width / 2 - 150, height / 2 + 15);
}

// Redémarrer le jeu
function restart() {
	isGameOver = false;
	score = 0;
	speed = 5;
	dino.y = height / 2;
	cactus.x = width - 50;
	loop();
}
