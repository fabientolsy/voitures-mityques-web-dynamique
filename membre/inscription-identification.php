<?php
require "../configuration.php";
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Cinéma du monde</title>
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


    </header>

    <section id="contenu">
        <h2>Inscription d'un membre - Identification 1/2</h2>

        <?php
        if (!empty($_SESSION['erreur'])) {
            echo $_SESSION['erreur'];
            unset($_SESSION['erreur']);
        }
        ?>
        <form method="post" action="inscription-informations.php">


            <fieldset>

                <legend>Identité</legend>

                <div id="entree-prenom">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" />
                </div>
                <br>
                <div id="entree-nom">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" />
                </div>
                <br>
                <div id="entree-organisation">
                    <label for="organisation">Organisation</label>
                    <input type="text" id="organisation" name="organisation">
                </div>
                <br>
                <div id="entree-courriel">
                    <label for="courriel">Courriel</label>
                    <input type="email" id="courriel" name="courriel" />
                </div>
                <br>

            </fieldset>

            <input type="submit" name="inscription-identification" value="Suivant">
            </a>

        </form>

    </section>

    <footer><span id="signature"></span></footer>
</body>

</html>