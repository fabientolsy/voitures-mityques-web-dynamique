<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php"; 

if (isset($_POST['membre-authentification'])) {
    $filtrerMembre = array();
    $filtrerMembre['pseudonyme'] = FILTER_SANITIZE_STRING;
    $filtrerMembre['motdepasse'] = FILTER_SANITIZE_STRING;
    $membre = filter_var_array($_POST, $filtrerMembre);

    $membreTrouve = MembreDAO::trouverMembre($membre);


    //print_r($membre);

    // Verifier si le mot de passe du formulaire ($motdepasse) est le meme que celui dans la base de donnees ($membre['motdepasse'])
    if (password_verify($membre['motdepasse'], $membreTrouve['motdepasse'])) {
        $_SESSION['membre']['pseudonyme'] = $membreTrouve['pseudonyme'];
        $_SESSION['membre']['prenom'] = $membreTrouve['prenom'];
        $_SESSION['membre']['nom'] = $membreTrouve['nom'];

        header('Location: ../membre.php');

        //print_r($_SESSION);
    } else {
        echo "Ce n'est pas le bon mot de passe";
    }
}
?>