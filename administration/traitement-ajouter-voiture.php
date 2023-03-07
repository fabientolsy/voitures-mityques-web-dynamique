<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";
//print_r($_POST);

$titre = addslashes(filter_var($_POST['titre']), FILTER_SANITIZE_STRING);
$resume = (filter_var($_POST['resume'], FILTER_SANITIZE_STRING));
$description = (filter_var($_POST['description'], FILTER_SANITIZE_STRING));
$sortie = (filter_var($_POST['sortie'], FILTER_SANITIZE_STRING));
$ventes = (filter_var($_POST['ventes'], FILTER_SANITIZE_STRING));
$origine = (filter_var($_POST['origine'], FILTER_SANITIZE_STRING));

// Ajouter illustration
$fichier_source = $_FILES['pixels']['tmp_name'];
echo "fichier source: " . $fichier_source . "<br>";

$racine_serveur = $_SERVER['DOCUMENT_ROOT'];
$repertoire_projet = "Desktop/Web Dynamique/projet-web-dynamique-2021-fabientolsy/";
$repertoire_image = "illustration";
$illustration = $_FILES['pixels']['name'];
$fichier_destination = $racine_serveur . $repertoire_projet . $repertoire_image . "/" . $illustration;
echo "fichier destination: " . $fichier_destination . "<br>";

$succes = move_uploaded_file($fichier_source, $fichier_destination);

if ($succes) echo '<img src="illustration/' . $illustration . '">';

$reussiteAjout = VoitureDAO::ajouterVoiture();
?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Ajouter</title>
	<link rel="stylesheet" href="style\liste-voitures.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

</html>


<?php
if ($reussiteAjout) {
?>
	Votre voiture a été ajouté à la base de données
	<a href="liste-voitures.php" title=""> <button type="button" class="btn btn-primary">Retourner au menu</button> </a>
<?php
}
?>