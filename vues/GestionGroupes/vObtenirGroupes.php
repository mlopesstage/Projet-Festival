<?php
use modele\dao\GroupesDAO;
use modele\dao\AttributionDAO;
use modele\dao\Bdd;
require_once __DIR__.'/../../includes/autoload.php';
Bdd::connecter();

include("includes/_debut.inc.php");

// AFFICHER L'ENSEMBLE DES GROUPES
// CETTE PAGE CONTIENT UN TABLEAU CONSTITUÉ D'1 LIGNE D'EN-TÊTE ET D'1 LIGNE PAR
// GROUPE

echo "
<br>
<table width='55%' cellspacing='0' cellpadding='0' class='tabNonQuadrille'>

   <tr class='enTeteTabNonQuad'>
      <td colspan='4'><strong>Groupes</strong></td>
   </tr>";

$lesGroupes = GroupesDAO::getAll();
// BOUCLE SUR LES GROUPES
foreach ($lesGroupes as $UnGroupe) {
    $id = $UnGroupe->getId();
    $nom = $UnGroupe->getNom();
    echo "
		<tr class='ligneTabNonQuad'>
         <td width='52%'>$nom</td>
         
         <td width='16%' align='center'> 
         <a href='cGestionGroupes.php?action=detailGp&id=$id'>
         Voir détail</a></td>
         
         <td width='16%' align='center'> 
         <a href='cGestionGroupes.php?action=demanderModifierGp&id=$id'>
         Modifier</a></td>";

    // S'il existe déjà des attributions pour les groupes il faudra
    // d'abord les supprimer avant de pouvoir supprimer le groupe
//    if (!existeAttributionsGp($connexion, $id)) {
    $lesAttributionsDeCeGroupes = AttributionDAO::getAllByIdGp($id);
    if (count($lesAttributionsDeCeGroupes)==0) {
        echo "
            <td width='16%' align='center'> 
            <a href='cGestionGroupes.php?action=demanderSupprimerGp&id=$id'>
            Supprimer</a></td>";
    } else {
        echo "
            <td width='16%'>&nbsp; </td>";
    }
    echo "
      </tr>";
}
echo "
</table>
<br>
<a href='cGestionGroupes.php?action=demanderCreerGp'>
Création d'un Groupe</a >";

include("includes/_fin.inc.php");