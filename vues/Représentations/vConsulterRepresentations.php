<?php
use \modele\dao\TypeChambreDAO;
use modele\dao\EtablissementDAO;
use modele\dao\OffreDAO;
use modele\dao\Bdd;
require_once __DIR__ . '/../../includes/autoload.php';
Bdd::connecter();

include("includes/_debut.inc.php");

// CONSULTER LES REPRESENTATIONS
// IL FAUT QU'IL Y AIT AU MOINS UNE REPRESENTATION
// L'AFFICHAGE SOIT EFFECTUÉ
$lesRepresentations = REPRESENTATIONDAO::getAll();
$nbRep = count($lesRepresentations);
$lesTypesRepresentation = TypeChambreDAO::getAll();
$nbTypesRepresentation = count($lesTypesRepresentation);

if ($nbRep != 0 && $nbTypesRepresentation != 0) {
    // POUR CHAQUE REPRESENTATION : AFFICHAGE DU NOM ET D'UN TABLEAU COMPORTANT 1
    // LIGNE D'EN-TÊTE ET 1 LIGNE PAR TYPE DE CHAMBRE

    // BOUCLE SUR LES REPRESENTATION
    foreach ($lesEtablissements as $unEtablissement) {
        $idRep = $unEtablissement->getId();
        $nom = $unEtablissement->getNom();

        // AFFICHAGE DU NOM DE LA REPRESENTATION ET D'UN LIEN VERS LE FORMULAIRE DE
        // MODIFICATION
        echo "<strong>$nom</strong><br>
      <a href='cRepresentation.php?action=demanderModifier&idRep=$idRep'>
      Modifier</a>
   
      <table width='45%' cellspacing='0' cellpadding='0' class='tabQuadrille'>";

        // AFFICHAGE DE LA LIGNE D'EN-TÊTE
        echo "
         <tr class='enTeteTabQuad'>
            <td width='30%'>Lieu</td>
            <td width='35%'>Groupe</td>
            <td width='35%'>Heure Début</td> 
            <td width='35%'>Heure Fin</td> 
         </tr>";

        // BOUCLE SUR LES TYPES DE REPRESENTATION (AFFICHAGE D'UNE LIGNE PAR TYPE DE 
        // REPRESENTATION AVEC LE NOMBRE DE CHAMBRES OFFERTES DANS L'ÉTABLISSEMENT POUR 
        // LE TYPE DE CHAMBRE)
        foreach ($lesTypesRepresentation as $unTypeRepresentation) {

            echo " 
            <tr class='ligneTabQuad'>
               <td>".$unTypeRepresentation->getId()."</td>
               <td>".$unTypeRepresentation->getLibelle()."</td>";
            // On récupère les representation
            $uneOffreRep = OffreDAO::getOneById($uneRepresentation->getId(), $unTypeChambre->getId());
            if (is_null($uneOffre)){
                $nbOffreRep = 0;
            }else{
                $nbOffreRep = $uneOffre->getNbChambres();
            }
            echo "
               <td>$nbOffreRep</td>
            </tr>";
        }
        echo "
      </table><br>";
    }
}

include("includes/_fin.inc.php");