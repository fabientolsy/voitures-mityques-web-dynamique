<?php
// PARTIE DONNEES

include "configuration.php";

require CHEMIN_ACCESSEUR . "VoitureDAO.php";
$listeVoitures = VoitureDAO::listerVoitures();

require CHEMIN_ACCESSEUR . "ClicDAO.php";
ClicDAO::enregistrerVisite($_SERVER);

?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Voitures mityques</title>
	<link rel="stylesheet" href="style\liste-voitures.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<header>
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">Navbar</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="membre.php">Espace membre</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link active" href="liste-voitures.php" id="pageListe" role="button" aria-expanded="false">
								Voitures
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="recherche-avancee.php">Recherche avancée</a>
						</li>
					</ul>
					<form class="d-flex" method="get" action="resultat-recherche-rapide.php">
						<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success" type="submit">Search</button>
					</form>
				</div>
			</div>
		</nav>
		<!-- Fin Navbar -->

		<h2 class="titre">Ces voitures qui ont marqués</h2>
	</header>

	<section id="contenu">
		<header>
			<h3 class="titre">Liste de ces adulés</h3>
		</header>

		<div id="liste-voitures">
			<?php
			// PARTIE VUE
			foreach ($listeVoitures as $mityques) {
			?>
				<div class="voitures">
					<h3 class="titre"><?= $mityques['titre'] ?></h3>
					<p class="resume"><?= $mityques['resume'] ?></p>
					<span class="sortie"><?= $mityques['sortie'] ?></span>
					<span class="ventes"><?= $mityques['ventes'] ?></span>
					<a href="voitures.php?voitures=<?= $mityques['id']; ?>" title="mityques">
						<button type="button" class="btn btn-primary">Voir plus</button>
					</a>
				</div>

			<?php
			}
			?>

			<div class="telechargement-excel">
				<a href="liste-voitures-excel.php">Télécharger la liste au forat Excel</a>
			</div>
		</div>


	</section>

	<footer><span id="signature"></span></footer>
</body>

</html>