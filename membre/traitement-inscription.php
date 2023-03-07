<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";


// Traitement de inscription-informations.php
$_SESSION['membre']['pseudonyme'] = $nouveauMembre['pseudonyme'];
if (isset($_POST['inscription-informations'])) {
    if (isset($_POST['inscription-informations'])) {
        // SI un des champs est vide
        if (empty($_POST['pseudonyme']) || empty($_POST['motdepasse']) || empty($_POST['motdepasse2'])) {
            $_SESSION['erreur2'] = "Veuillez renseigner tous les champs !";
            header("location: inscription-informations.php");
        }
        // Si les mots de passe ne correspondent pas 
        elseif ($_POST['motdepasse'] != $_POST['motdepasse2']) {
            $_SESSION['erreur2'] = "Veuillez renseigner tous les champs !";
            header("location: inscription-informations.php");
        } else {
            require CHEMIN_ACCESSEUR . "MembreDAO.php";
            // Verification de l'existence du pseudonyme dans la base de donnees 
            $membre = MembreDAO::trouverCourriel($_POST['pseudonyme']);

            // Si le pseudonyme existe deja dans la base de donnees
            if ($membre) {
                $_SESSION['erreur2'] = "Ce pseudonyme est deja utilise !";
                header("location: inscription-informations.php");
            }
            if (!empty($_POST['inscription-informations'])) {
                $filtreMembre = array(
                    'pseudonyme' => FILTER_SANITIZE_ENCODED,
                    'motdepasse' => FILTER_SANITIZE_ENCODED,
                );

                $nouveauMembre = filter_input_array(INPUT_POST, $filtreMembre);
            }
        }
    }
}

$_SESSION['membre']['pseudonyme'] = $nouveauMembre['pseudonyme'];
// ici le mot de passe est inscrit en clair dans la BD.  Il faut le crypter avec password_hash
$_SESSION['membre']['motdepasse'] = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);

$reussiteInscription = MembreDAO::enregistrerMembre($_SESSION['membre'], $nouveauMembre);

if ($reussiteInscription) {
    header('location: ../index.php');
}
