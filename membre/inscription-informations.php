<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

// Traitement de identification.php
if (isset($_POST['inscription-identification'])) {
    if (isset($_POST['inscription-identification'])) {
        // Si il un chqmps est vide
        if (empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['organisation'])) {
            $_SESSION['erreur'] = "Veuillez renseigner tous les champs !";
            header("location: inscription-identification.php");
        }
        // Si le courriel n'est pas renseigne ou s'il est dans un mauvais format
        elseif (empty($_POST['courriel']) || !filter_var($_POST['courriel'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['erreur'] = "Courriel invalide !";
            header("location: inscription-identification.php");
        } else {
            require CHEMIN_ACCESSEUR . "MembreDAO.php";
            // Verification de l'existance du courriel dans la base de donnees 
            $membre = MembreDAO::trouverCourriel($_POST['courriel']);

            // Si le courriel est deja present dans la base de donnees 
            if ($membre) {
                $_SESSION['erreur'] = "Ce courriel est deja utilise !";
                header("location: inscription-identification.php");
            }
            if (!empty($_POST['inscription-identification'])) {
                $filtreMembre = array(
                    'prenom' => FILTER_SANITIZE_ENCODED,
                    'nom' => FILTER_SANITIZE_ENCODED,
                    'organisation' => FILTER_SANITIZE_STRING,
                    'courriel' => FILTER_SANITIZE_EMAIL,
                );

                $_SESSION['membre'] = filter_var_array($_POST, $filtreMembre);
            }
        }
    }
}

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Voitures du monde</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>

<body>
    <header>

        <h1>Voitures du monde</h1>

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
        <header>
            <br>
            <h2>Membre</h2>
            <br>
        </header>


        <section id="contenu">
            <header>
                <h2>Inscription d'un membre - Informations 2/2</h2>
                <br>
            </header>

            <form method="post" action="traitement-inscription.php">


                <fieldset>

                    <legend>Informations</legend>

                    <div id="entree-pseudonyme">
                        <label for="pseudonyme">Pseudonyme</label>
                        <input type="text" id="pseudonyme" name="pseudonyme" />
                    </div>


                    <div id="entree-motdepasse">
                        <label for="motdepasse">Mot de passe</label>
                        <input type="password" id="motdepasse" name="motdepasse" />
                    </div>

                    <div id="entree-motdepasse2">
                        <label for="motdepasse2">Confirmation du mot de passe</label>
                        <input type="password" id="motdepasse2" name="motdepasse2" />
                    </div>



                </fieldset>

                <input type="submit" name="inscription-informations" value="Enregistrer">

            </form>

        </section>

        <footer><span id="signature"></span></footer>
</body>

</html>