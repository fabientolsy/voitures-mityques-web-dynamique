<?php

require "configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

function convertir($texte)
{
    return iconv('UTF-8', 'windows-1252', $texte);
}

$id = filter_var($_GET['voitures'], FILTER_SANITIZE_NUMBER_INT);

$voitures = VoitureDAO::lireVoitures($id);
require "lib/fpdf/fpdf.php";

$doc = new FPDF();

$doc->AddPage();
$doc->SetFont('Times', 'B', 30);
$doc->Write(5, convertir($voitures['titre']));
$doc->SetFont('Times', '', 15);
$doc->SetY(25);
$doc->Write(5, convertir($voitures['resume']));
$doc->Write(5, convertir("\n" . $voitures['sortie']));
$doc->Write(5, convertir("\n\n" . $voitures['description']));
$doc->Write(5, convertir("\n\n" . $voitures['ventes']));
$doc->Write(5, convertir("\n\n" . $voitures['origine']));
$doc->Output();
