<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";
ClicDAO::enregistrerVisite($_SERVER);
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Voitures du monde</title>
    <style>
        #recherche-rapide>h3>span {
            display: none;
        }
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
            <h2>Accueil</h2>
        </header>

        <div id="bienvenue-membre">
            <?php
            if (!empty($_SESSION['membre'])) {
            ?>
                <br>
                Bonjour <?php echo $_SESSION['membre']['pseudonyme'] . " !"; ?>
                <br><br>
                <a href="membre/deconnexion.php"><button type="button" class="btn btn-danger">Se déconnecter</button></a><?php
                                                                                                                        } else {
                                                                                                                            ?>
                <br>
                <a href="membre.php"><button type="button" class="btn btn-primary">Se connecter</button></a><?php
                                                                                                                        }

                                                                                                            ?>
        </div>
        <br><br>
        <h3><span>Recherche</span></h3>
        <form method="get" action="resultat-recherche-rapide.php">
            <input type="text" name="mot" placeholder="Recherche" />
            <input type="submit" value="OK" />
        </form>
    </section>


    </section>
    <br><br>
    <footer>
        <a href="rss.php"><img width="40px" src="illustration/rss-icone.png" alt=""></a>
        <span id="signature"></span>
    </footer>
</body>

</html>