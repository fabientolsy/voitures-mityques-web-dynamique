<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class VoitureDAO
{
    public static function listerVoitures()
    {
        $MESSAGE_SQL_LISTE_VOITURE = "SELECT id, titre, resume, sortie, ventes, illustration from mityques";

        $requeteListeVoitures = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_LISTE_VOITURE);
        $requeteListeVoitures->execute();
        $listeVoitures = $requeteListeVoitures->fetchAll();

        return $listeVoitures;
    }

    public static function lireVoitures($id)
    {
        $MESSAGE_SQL_VOITURE = "SELECT * FROM mityques WHERE id = :id";

        $requeteVoitures = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_VOITURE);
        $requeteVoitures->bindParam(':id', $id, PDO::PARAM_INT);
        $requeteVoitures->execute();
        $voiture = $requeteVoitures->fetch();

        return $voiture;
    }

    public static function modifierVoiture($idVoiture)
    {
        $SQL_MODIFIER_VOITURE = "UPDATE mityques SET titre = :titre, resume = :resume, description = :description, sortie = :sortie, total = :total, origine = :origine, illustration = :illustration WHERE id = :id";

        $requeteModifierVoiture = BaseDeDonnees::getConnexion()->prepare($SQL_MODIFIER_VOITURE);
        $requeteModifierVoiture->bindParam(':id', $idVoiture, PDO::PARAM_INT);
        $requeteModifierVoiture->bindParam(':titre', $titre, PDO::PARAM_STR);
        $requeteModifierVoiture->bindParam(':resume', $resume, PDO::PARAM_STR);
        $requeteModifierVoiture->bindParam(':description', $description, PDO::PARAM_STR);
        $requeteModifierVoiture->bindParam(':sortie', $sortie, PDO::PARAM_STR);
        $requeteModifierVoiture->bindParam(':total', $total, PDO::PARAM_STR);
        $requeteModifierVoiture->bindParam(':origine', $origine, PDO::PARAM_STR);
        $requeteModifierVoiture->bindParam(':illustration', $illustration, PDO::PARAM_STR);
    }


    public static function supprimerVoiture($idVoiture)
    {
        $SQL_SUPPRIMER_VOITURE = "DELETE from mityques WHERE id = " . $idVoiture;

        $requeteSupprimerVoiture = BaseDeDonnees::getConnexion()->prepare($SQL_SUPPRIMER_VOITURE);
        $reussiteSuppression = $requeteSupprimerVoiture->execute();

        return $reussiteSuppression;
    }


    public static function ajouterVoiture()
    {
        $SQL_AJOUTER_VOITURE = "INSERT into mityques(titre, resume, description, sortie, total, origine, illustration) VALUES(:titre, :resume, :description, :sortie, :total, :origine, :illustration)";
        $requeteAjouterVoiture = BaseDeDonnees::getConnexion()->prepare($SQL_AJOUTER_VOITURE);
        $requeteAjouterVoiture->bindParam(':titre', $titre, PDO::PARAM_STR);
        $requeteAjouterVoiture->bindParam(':resume', $resume, PDO::PARAM_STR);
        $requeteAjouterVoiture->bindParam(':description', $description, PDO::PARAM_STR);
        $requeteAjouterVoiture->bindParam(':ventes', $ventes, PDO::PARAM_STR);
        $requeteAjouterVoiture->bindParam(':total', $total, PDO::PARAM_STR);
        $requeteAjouterVoiture->bindParam(':origine', $origine, PDO::PARAM_STR);
        $requeteAjouterVoiture->bindParam(':illustration', $illustration, PDO::PARAM_STR);

        $reussiteAjout = $requeteAjouterVoiture->execute();

        return $reussiteAjout;
    }

    public static function rechercheRapide($mot)
    {
        $SQL_RECHERCHE_RAPIDE = "SELECT * FROM mityques WHERE titre LIKE '%$mot%' OR resume LIKE '%$mot%'";

        $requeteRechercheRapide = BaseDeDonnees::getConnexion()->prepare($SQL_RECHERCHE_RAPIDE);
        $requeteRechercheRapide->execute();
        $resultat = $requeteRechercheRapide->fetchAll();

        return $resultat;
    }

    public static function rechercherAvancee($titreRecherche, $contenuRecherche, $constructeurRecherche)
    {
        if (!empty($titreRecherche) || !empty($contenuRecherche) || !empty($constructeurRecherche)) {
            $SQL_RECHERCHE_AVANCEE = "SELECT * FROM mityques WHERE 1 = 1 ";

            if (!empty($titreRecherche)) {
                $SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND titre like '%$titreRecherche%'";
            }

            if (!empty($contenuRecherche)) {
                $SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND resume like '%$contenuRecherche%'";
            }

            if (!empty($contenuRecherche)) {
                $SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND description like '%$contenuRecherche%'";
            }

            if (!empty($constructeurRecherche)) {
                $SQL_RECHERCHE_AVANCEE = $SQL_RECHERCHE_AVANCEE . " AND realisateur like '%$constructeurRecherche%'";
            }

            $requeteRecherche = BaseDeDonnees::getConnexion()->prepare($SQL_RECHERCHE_AVANCEE);
            $requeteRecherche->execute();
            $resultats = $requeteRecherche->fetchAll();

            return $resultats;
        }
    }

    public static function listerCategories()
    {
        $MESSAGE_LISTER_CATEGORIES  = "SELECT origine, COUNT(*) as nombre, AVG(ventes) as ventesMoyennes, SUM(ventes) as ventesTotales, MAX(ventes) as plus_grande, MIN(ventes) as plus_petite FROM mityques GROUP BY origine";
        $requeteCategorie = BaseDeDonnees::getConnexion()->prepare($MESSAGE_LISTER_CATEGORIES);
        $requeteCategorie->execute();
        $categories = $requeteCategorie->fetchAll();

        return $categories;
    }

    public static function calculerContenu()
    {
        $MESSAGE_CALCULER_CONTENU  = "SELECT AVG(ventes) as moyenne, STDDEV(ventes) as ecartType FROM mityques";
        $requetePageContenu = BaseDeDonnees::getConnexion()->prepare($MESSAGE_CALCULER_CONTENU);
        $requetePageContenu->execute();
        $contenus = $requetePageContenu->fetchAll();

        return $contenus;
    }
}
