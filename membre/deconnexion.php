<?php
require "../configuration.php";

//On détruit la session que si le membre est connecté
if (isset($_SESSION['membre']['pseudonyme'])) {
    //On détruit les variables de la session
    session_unset();

    //On détruit la session
    session_destroy();

    header('location: ../index.php');
} else {
    echo "Vous n'êtes pas connecté !";
}
