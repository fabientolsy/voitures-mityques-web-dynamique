<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class MembreDAO
{
    public static function trouverMembre($membre)
    {
        $SQL_AUTHENTIFICATION = "SELECT * FROM membre WHERE pseudonyme = :pseudonyme";
        $requeteAuthentification = BaseDeDonnees::getConnexion()->prepare($SQL_AUTHENTIFICATION);
        $requeteAuthentification->bindParam(':pseudonyme', $membre['pseudonyme'], PDO::PARAM_STR);
        $requeteAuthentification->execute();
        $membreTrouve = $requeteAuthentification->fetch();

        return $membreTrouve;
    }

    public static function trouverCourriel($user)
    {
        $TROUVER_COURRIEL = "SELECT id_membre FROM membre WHERE courriel = :courriel";
        $requete = BaseDeDonnees::getConnexion()->prepare($TROUVER_COURRIEL);
        $requete->bindParam(':courriel', $user, PDO::PARAM_STR);
        $requete->execute();
        $membre = $requete->fetch();

        return $membre;
    }

    public static function lireMembreParPseudonyme($pseudonyme)
    {
        $SQL_LIRE_MEMBRE = "SELECT * FROM membre WHERE pseudonyme = :pseudonyme";

        $requeteMembre = BaseDeDonnees::getConnexion()->prepare($SQL_LIRE_MEMBRE);
        $requeteMembre->bindParam(':pseudonyme', $pseudonyme, PDO::PARAM_STR);
        $requeteMembre->execute();
        $membre = $requeteMembre->fetch();

        return $membre;
    }

    public static function enregistrerMembre($nouveauMembre)
    {
        $AJOUTER_MEMBRE = "INSERT into membre(prenom, nom, pseudonyme, motdepasse, courriel, organisation) VALUES(:prenom, :nom, :pseudonyme, :motdepasse, :courriel, :organisation)";

        $requeteAjouterMembre = BaseDeDonnees::getConnexion()->prepare($AJOUTER_MEMBRE);

        $requeteAjouterMembre->bindParam(':prenom', $nouveauMembre['prenom'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':nom', $nouveauMembre['nom'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':courriel', $nouveauMembre['courriel'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':organisation', $nouveauMembre['organisation'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':pseudonyme', $nouveauMembre['pseudonyme'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':motdepasse', $nouveauMembre['motdepasse'], PDO::PARAM_STR);

        $reussiteInscription = $requeteAjouterMembre->execute();

        return $reussiteInscription;
    }
}
