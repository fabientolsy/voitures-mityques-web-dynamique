<?php

require "configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$listeVoitures = VoitureDAO::listerVoitures();

header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>'
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>http://tiweb.cgmatane.qc.ca/etudiants/2020/tolsyf/</loc>
    <lastmod>2021-04-27T20:41:53+00:00</lastmod>
    <priority>1.00</priority>
  </url>
  <url>
    <loc>http://tiweb.cgmatane.qc.ca/etudiants/2020/tolsyf/index.php</loc>
    <lastmod>2021-04-27T20:41:53+00:00</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>http://tiweb.cgmatane.qc.ca/etudiants/2020/tolsyf/membre.php</loc>
    <lastmod>2021-04-27T20:41:53+00:00</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>http://tiweb.cgmatane.qc.ca/etudiants/2020/tolsyf/liste-voitures.php</loc>
    <lastmod>2021-04-27T20:41:53+00:00</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>http://tiweb.cgmatane.qc.ca/etudiants/2020/tolsyf/recherche-avancee.php</loc>
    <lastmod>2021-04-27T20:41:53+00:00</lastmod>
    <priority>0.80</priority>
  </url>
  <url>
    <loc>http://tiweb.cgmatane.qc.ca/etudiants/2020/tolsyf/membre/inscription-identification.php</loc>
    <lastmod>2021-04-27T20:41:53+00:00</lastmod>
    <priority>0.64</priority>
  </url>

  <?php
  foreach ($listeVoitures as $mityques) {
  ?>
    <url>
      <loc>http://tiweb.cgmatane.qc.ca/etudiants/2020/tolsyf/liste-voitures.php?voitures=<?= $mityques['id'] ?></loc>
      <lastmod>2021-04-27T20:41:53+00:00</lastmod>
      <priority>0.64</priority>
    </url>
  <?php
  }
  ?>


</urlset>