<?php
namespace modele\dao;

use modele\metier\Representation;
use \PDO;

/**
 * Description of RepresentationDAO
 * Classe métier :  Representation
 * @author qbaudry
 * @version 2017
 */
class RepresentationDAO {

    /**
     * Instancier un objet de la classe Representation à partir d'un enregistrement de la table REPRESENTATION
     * @param array $enreg
     * @return Representation
     */
    protected static function enregVersMetier(array $enreg) {
        $id = $enreg['ID'];
        $idLieu = $enreg['IDLIEU'];
        $idGroupe = $enreg['IDGROUPE'];
        $dateRep = $enreg['DATEREP'];
        $heureDebut = $enreg['HEUREDEBUT'];
        $heureFin = $enreg['HEUREFIN'];
        $uneRepresentation = new Representation($id, $idLieu, $idGroupe, $dateRep, $heureDebut, $heureFin);

        return $uneRepresentation;
    }

    /**
     * Retourne la liste de toutes les représentations
     * @return array tableau d'objets de type Groupe
     */
    public static function getAll() {
        $lesObjets = array();
        $requete = "SELECT * FROM Representation";
        $stmt = Bdd::getPdo()->prepare($requete);
        $ok = $stmt->execute();
        if ($ok) {
            // Tant qu'il y a des enregistrements dans la table
            while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                //ajoute un nouveau lieu au tableau
                $lesObjets[] = self::enregVersMetier($enreg);
            }
        }
        return $lesObjets;
    }

    /**
     * Recherche une représentation selon la valeur de son identifiant
     * @param string $id
     * @return Groupe le groupe trouvé ; null sinon
     */
    public static function getOneById($id) {
        $objetConstruit = null;
        $requete = "SELECT * FROM Representation WHERE id = :id";
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