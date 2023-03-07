<?php

include "../configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

//print_r($_GET);
$idVoiture = $_GET['voitures'];

$reussiteSuppression = VoitureDAO::supprimerVoiture($idVoiture);

//print_r($film);
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Supprimer</title>
    <link rel="stylesheet" href="style\liste-voitures.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

</html>
<?php
if ($reussiteSuppression) {
?>
    La voiture a été supprimé avec succès
    <br>
    <a href="liste-voitures.php" title=""> <button type="button" class="btn btn-primary">Retourner au menu</button> </a>
<?php
}
?>