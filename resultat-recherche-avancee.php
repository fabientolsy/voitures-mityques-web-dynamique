<?php

require "configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$titreRecherche = $_GET['recherche-titre'];
$contenuRecherche = $_GET['recherche-contenu'];
$constructeurRecherche = $_GET['recherche-constructeur'];

$resultats = VoitureDAO::rechercherAvancee($titreRecherche, $contenuRecherche, $constructeurRecherche);

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Voitures du monde</title>
    <style>

    </style>
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

        <h1>Voitures du monde</h1>

    </header>


    <section id="contenu">
        <header>
            <h2>Résultats de recherche</h2>
        </header>

        <div id="resultats-recherche">

            <?php

            foreach ($resultats as $resultat) {
                //print_r($resultat);
                $titre = $resultat['titre'];
                $resume = $resultat['resume'];
                $id = $resultat['id'];
                //echo $titre;

            ?>
                <div class="resultat-recherche">
                    <h4 class="titre">
                        <a href="voitures.php?voitures=<?= $id ?>">
                            <?php echo $titre; ?>
                        </a>
                    </h4>
                    <div class="resume">
                        <?= $resume ?>
                    </div>
                </div>
            <?php

            }

            ?>

        </div>

    </section>

    <footer><span id="signature"></span></footer>
</body>

</html>