<?php
include "configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";
//print_r($_POST);
$FILTRES_VOITURE = array(
	'id' => FILTER_SANITIZE_NUMBER_INT,
	'titre' => FILTER_SANITIZE_STRING,
	'resume' => FILTER_SANITIZE_STRING,
	'description' => FILTER_SANITIZE_STRING,
	'ventes' => FILTER_SANITIZE_STRING,
	'total' => FILTER_SANITIZE_STRING,
	'origine' => FILTER_SANITIZE_STRING
);

$voiture = filter_input_array(INPUT_POST, $FILTRES_VOITURE);
$voiture['titre'] = addslashes($voiture['titre']);
//echo "<div>" . $titre . "</div>";

$SQL_MODIFIER_VOITURE = "UPDATE mityques SET titre = :titre, resume=:resume, description = :description, sortie = :sortie, ventes = :ventes, origine = :origine WHERE id = " . $id;
//echo $SQL_MODIFIER_FILM;

include "basededonnees.php";
$requeteModifierVoiture = $basededonnees->prepare($SQL_MODIFIER_VOITURE);
$requeteModifierVoiture->bindParam(':titre', $titre, PDO::PARAM_STR);
$requeteModifierVoiture->bindParam(':resume', $resume, PDO::PARAM_STR);
$requeteModifierVoiture->bindParam(':description', $description, PDO::PARAM_STR);
$requeteModifierVoiture->bindParam(':sortie', $sortie, PDO::PARAM_STR);
$requeteModifierVoiture->bindParam(':ventes', $ventes, PDO::PARAM_STR);
$requeteModifierVoiture->bindParam(':origine', $origine, PDO::PARAM_STR);

$reussiteModification = $requeteModifierVoiture->execute();
?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Modification finit</title>
	<link rel="stylesheet" href="style\liste-voitures.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

</html>


<?php
if ($reussiteModification) {
?>
	La voiture a été modifié dans la base de données
	<a href="liste-voitures.php" title=""> <button type="button" class="btn btn-primary">Retourner au menu</button> </a>
<?php
}
?>