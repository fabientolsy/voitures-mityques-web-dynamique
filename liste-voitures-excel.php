<?php
require "configuration.php";
require_once 'lib/onesheet/autoload.php';
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$listeVoitures = VoitureDAO::listerVoitures();

$tableur = new OneSheet\Writer('');

foreach ($listeVoitures as $mityques) {

    $tableur->addRow(array($mityques['titre'], $mityques['resume'], $mityques['ventes'], $mityques['ventes']));
}

// ajustement des cellules au contenu
$tableur->enableCellAutosizing();

// Écrire le fichier
$tableur->writeToFile('liste-voitures.xlsx');

$fichier = "liste-voitures.xlsx";
// On vérifie si le fichier existe
if (!file_exists($fichier)) {
    die("Fichier introuvable!");
}

// Forcer le téléchargement
header("Content-Disposition: attachment; filename=" . basename($fichier));
header("Content-Length:" . "'" . filesize($fichier) . "'");
header("Content-Type: application/octet-stream;");
readfile($fichier);
