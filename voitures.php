<?php
include "configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";

$id = filter_var($_GET['voitures'], FILTER_SANITIZE_NUMBER_INT);

$voiture = VoitureDAO::lireVoitures($id);


ClicDAO::enregistrerVisite($_SERVER);
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title><?= $mityque['titre']; ?></title>
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

        <h2>Voiture: <?= $voiture['titre']; ?></h2>
        <nav></nav>
    </header>

    <section id="contenu">
        <div class="voitures" style="border:solid 1px black; margin:5px; padding:5px;">

            <div class="illustration"><img src="illustration/<?= $voiture['illustration']; ?>" /></div>
            <h4 class="titre">
                <a href="liste-voitures.php" title="mityques">
                    <button type="button" class="btn btn-primary">Revenir au menu</button>
                </a>
            </h4>
            <span class="sortie">Année de la première sortie: <?= $voiture['sortie']; ?></span>
            <p class="resume"><?= $voiture['resume']; ?></p>
            <p class="resume"><?= $voiture['description']; ?></p>
            <p class="ventes">Nombre de ventes: <?= $voiture['ventes']; ?></p>
            <p class="origine"><?= $voiture['origine']; ?></p>

            <br><br>

            <a href="voiture-pdf.php?voitures=<?= $voiture['id']; ?>" title="mityques">
                <button type="button" class="btn btn-danger">Télécharger en PDF</button>
            </a>
        </div>

    </section>

    <footer><span id="signature"></span></footer>
</body>

</html>