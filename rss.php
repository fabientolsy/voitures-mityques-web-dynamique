<?php
// PARTIE DONNEES

require "configuration.php";
require CHEMIN_ACCESSEUR . "VoitureDAO.php";

$listeVoitures = VoitureDAO::listerVoitures();

header("Content-type: application/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8"?>'

//print_r($listeFilms);
?>

<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/">

	<channel>
		<title>Liste de voiture du monde</title>
		<atom:link href="http://tiweb.cgmatane.qc.ca/etudiants/2020/tolsyf/rss.php" rel="self" type="application/rss+xml" />
		<link>http://tiweb.cgmatane.qc.ca/etudiants/2020/tolsyf/</link>
		<description>Les voitures du monde!</description>
		<lastBuildDate>Fri, 25 Dec 2020 23:59:59 EST</lastBuildDate>
		<language>fr-CA</language>
		<sy:updatePeriod>
			hourly </sy:updatePeriod>
		<sy:updateFrequency>
			1 </sy:updateFrequency>
		<generator>programmation manuelle</generator>

		<?php

		$sql = "SELECT champs1, champs2, champs3 FROM mityques ORDER BY ladate LIMIT 0,10";

		foreach ($listeVoitures as $mityques) {
		?>
			<item>
				<title><?= $mityques['titre'] ?></title>
				<link>https://tiweb.cgmatane.qc.ca/etudiants/2020/tolsyf/liste-voitures.php?voitures=<?= $mityques['id'] ?></link>
				<pubDate>Thu, 31 Dec 2020 23:59:59 EST</pubDate>
				<category>
					<![CDATA[Utilisateurs]]>
				</category>
				<guid isPermaLink="false">https://tiweb.cgmatane.qc.ca/etudiants/2020/tolsyf/liste-voitures.php?voitures=<?= $mityques['id'] ?></guid>
				<description>
					<![CDATA[<img src="https://tiweb.cgmatane.qc.ca/etudiants/2020/tolsyf/illustration/<?= $mityques['illustration'] ?>" alt="Image de <?= $mityques['titre'] ?>" width="400px"/><br>]]>
					<![CDATA[<?= $mityques['resume']; ?>]]>
				</description>
				<content:encoded>
					<![CDATA[<?= $mityques['resume']; ?>]]>
				</content:encoded>
			</item>
		<?php
		}
		?>
	</channel>
</rss>