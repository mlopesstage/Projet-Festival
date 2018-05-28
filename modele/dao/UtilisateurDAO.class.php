<?php
namespace modele\dao;
use modele\metier\Utilisateur;
use PDO;

/**
 * Classe métier :  Utilisateur
 */
class UtilisateurDAO {
    /**
     * Instancier un objet de la classe Utilisateur à partir d'un enregistrement de la table Utilisateur
     * @param array $enreg
     * @return Utilisateur
     */
    protected static function enregVersMetier(array $enreg) {
        $id = $enreg['ID'];
        $nom = $enreg['NOM'];
        $prenom = $enreg['PRENOM'];
        $email = $enreg['EMAIL'];
        $login = $enreg['LOGIN'];
        $motDePasse = $enreg['MOTDEPASSE'];
        $unUtilisateur = new Utilisateur($id, $nom, $prenom, $email, $login, $motDePasse);
        return $unUtilisateur;
    }
    
    /**
     * Retourne la liste de tous les groupes
     * @return array tableau d'objets de type Groupe
     */
    public static function getAll() {
        $lesObjets = array();
        $requete = "SELECT * FROM Utilisateur";
        $stmt = Bdd::getPdo()->prepare($requete);
        $ok = $stmt->execute();
        if ($ok) {
            // Tant qu'il y a des enregistrements dans la table
            while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                //ajoute un nouveau groupe au tableau
                $lesObjets[] = self::enregVersMetier($enreg);
            }
        }
        return $lesObjets;
    }
    
    /**
     * Recherche un groupe selon la valeur de son identifiant
     * @param string $id
     * @return Groupe le groupe trouvé ; null sinon
     */
    public static function getOneById($id) {
        $objetConstruit = null;
        $requete = "SELECT * FROM Utilisateur WHERE ID = :id";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':id', $id);
        $ok = $stmt->execute();
        // attention, $ok = true pour un select ne retournant aucune ligne
        if ($ok && $stmt->rowCount() > 0) {
            $objetConstruit = self::enregVersMetier($stmt->fetch(PDO::FETCH_ASSOC));
        }
        return $objetConstruit;
    }  
}