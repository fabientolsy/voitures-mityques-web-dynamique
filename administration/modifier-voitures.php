<?php

include "../configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";
//print_r($_GET);
$idVoiture = filter_input($_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$voiture = VoitureDAO::modifierVoiture($idVoiture);


//print_r($voiture);
?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Modifier</title>
	<style>
		* {
			margin: 0;
			padding: 0;
		}

		/* CSS reset pour uniformiser les navigateurs */
		* {
			font-family: Verdana;
		}

		body>header,
		body>section {
			padding: 2em;
		}

		h2 {
			color: #034c7a;
			text-transform: uppercase;
		}

		h1 {
			background-color: #034c7a;
			color: white;
			padding: 1em;
			text-transform: uppercase;
		}

		#contenu {
			padding: 2em;
		}

		form {
			border: solid #034c7a 2px;
			background-color: lightblue;
			padding: 1em;
		}

		form>div {
			margin-top: 1em;
		}

		form>div>label {
			display: block;
			font-weight: bold;
			color: #476e87;
		}

		form input,
		form textarea,
		form select {
			width: 39em;
		}

		form input[type=submit] {
			margin-top: 2em;
		}

		form textarea {
			height: 5em;
		}
	</style>
</head>

<body>
	<header>
		<h1>Panneau d'administration de modification</h1>
		<nav></nav>
	</header>

	<section id="contenu">
		<header>
			<h2>Modifier une voiture</h2>
		</header>

		<form action="traitement-modifier-voiture.php" method="post">

			<div class="champs">
				<label for="titre">Titre</label>
				<input type="text" name="titre" id="titre" value="<?= $mityques['titre']; ?>" />
			</div>

			<div class="champs">
				<label for="resume">Resume</label>
				<textarea name="resume" id="resume"><?= $mityques['resume'] ?></textarea>
			</div>

			<div class="champs">
				<label for="description">Description</label>
				<textarea name="description" id="description"><?= $mityques['description'] ?></textarea>
			</div>

			<div class="champs">
				<label for="titre">Début des ventes</label>
				<input type="text" name="sortie" id="sortie" value="<?= $mityques['sortie'] ?>" />
			</div>

			<div class="champs">
				<label for="titre">Nombre de ventes</label>
				<input type="text" name="ventes" id="ventes" value="<?= $mityques['ventes'] ?>" />
			</div>

			<div class="champs">
				<label for="titre">Image</label>
				<input type="text" name="image" id="image" value="<?= $mityques['illustration'] ?>">
			</div>

			<div class="champs">
				<label for="titre">Pays d'origine</label>
				<input type="text" name="origine" id="origine" value="<?= $mityques['origine']; ?>" />
			</div>

			<input type="submit" value="Enregistrer">
			<input type="hidden" name="id" value="<?= $mityques['id'] ?>" />
		</form>

	</section>

	<footer><span id="signature"></span></footer>
</body>

</html>