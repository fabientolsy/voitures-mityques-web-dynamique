<?php

include "../configuration.php"; // copie-colle le code qui est dans configuration
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

// prepare l'objet $basededonnees pour qu'on puisse parler à la base de données
$listeVoitures = VoitureDAO::listerVoitures();

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
				<a class="navbar-brand" href="../index.php">Navbar</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
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

				</div>
			</div>
		</nav>
		<!-- Fin Navbar -->
	</header>
</body>

</html>

<a href="ajouter-voiture.html" style="margin: 5px;"><button type="button" class="btn btn-success">Ajouter</button></a>
<br><br>
<?php
// la possibilite de boucle la plus utilisée
foreach ($listeVoitures as $mityques) {
	//print_r($film);
	//echo $film['titre'];
?>
	<div class="film" style="border:solid 1px black; margin:15px; padding:5px;">
		<?php echo $mityques['titre']; ?> (<?= $mityques['ventes']; ?>)
		<a href="modifier-voitures.php?id=<?= $mityques['id']; ?>" title="">
			<button type="button" class="btn btn-secondary">Modifer</button>
		</a>
		<a href="supprimer-voiture.php?voitures=<?= $mityques['id']; ?>" title="">
			<button type="button" class="btn btn-danger">Supprimer</button>
		</a>
	</div>
<?php
}
?>

<br>
<a href="contenu.php" title="" style="margin: 5px;">
	<button type="button" class="btn btn-primary">Voir les statistiques en fonction des voitures du site</button>
</a>
<a href="visites.php" title="" style="margin: 5px;">
	<button type="button" class="btn btn-warning">Voir les statistiques de visites</button>
</a>