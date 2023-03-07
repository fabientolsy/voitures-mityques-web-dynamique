<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class ClicDAO
{
    public static function enregistrerVisite($donnees)
    {
        $MESSAGE_ENREGISTRER_VISITE = "INSERT into clic(ip, langue, page, parametres, referant, moment) VALUES(:ip, :langue, :page, :parametres, :referant, NOW())";
        //echo $SQL_AJOUTER_CLIC;

        include "basededonnees.php";
        $requeteVisite = BaseDeDonnees::getConnexion()->prepare($MESSAGE_ENREGISTRER_VISITE);
        $requeteVisite->bindParam(':ip', $donnees['REMOTE_ADDR'], PDO::PARAM_STR);
        $requeteVisite->bindParam(':langue', $donnees['HTTP_ACCEPT_LANGUAGE'], PDO::PARAM_STR);
        $requeteVisite->bindParam(':page', $donnees['PHP_SELF'], PDO::PARAM_STR);
        $requeteVisite->bindParam(':parametres', $donnees['QUERY_STRING'],  PDO::PARAM_STR);
        $requeteVisite->bindParam(':referant', $donnees['HTTP_REFERER'],  PDO::PARAM_STR);
        $requeteVisite->execute();

        return $requeteVisite;
    }

    public static function listerStatsParJour()
    {
        $MESSAGE_STATS_JOUR = "SELECT DAYOFWEEK(moment) as jour, COUNT(id) as clics, COUNT(DISTINCT ip) as visites FROM clic GROUP BY jour";
        $requeteStats =  BaseDeDonnees::getConnexion()->prepare($MESSAGE_STATS_JOUR);
        $requeteStats->execute();
        $statParJour = $requeteStats->fetchAll();

        return $statParJour;
    }

    public static function listerStatsParLangue()
    {
        $MESSAGE_STATS_LANGUE = "SELECT langue, COUNT(id) as clics, COUNT(DISTINCT ip) as visites FROM clic GROUP BY langue";
        $requeteStats =  BaseDeDonnees::getConnexion()->prepare($MESSAGE_STATS_LANGUE);
        $requeteStats->execute();
        $statParLangue = $requeteStats->fetchAll();

        return $statParLangue;
    }
}
