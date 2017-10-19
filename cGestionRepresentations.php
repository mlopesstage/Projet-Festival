<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use modele\metier\Representation;
use modele\dao\RepresentationDAO;
use modele\dao\Bdd;
require_once __DIR__ . '/includes/autoload.php';
Bdd::connecter();

include("includes/_gestionErreurs.inc.php");
//include("includes/gestionDonnees/_connexion.inc.php");
//include("includes/gestionDonnees/_gestionBaseFonctionsCommunes.inc.php");

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'initial';
}
$action = $_REQUEST['action'];


// Aiguillage selon l'étape
switch ($action) {
    case 'initial' :
        include("vues/Representations/vConsulterRepresentations.php");
        break;

    case 'detailRepresentations':
        $id = $_REQUEST['id'];
        include("vues/Representations/vConsulterDetailRepresentations.php");
        break;

    case 'demanderSupprimerRepresentations':
        $id = $_REQUEST['id'];
        include("vues/Representations/vSupprimerRepresentations.php");
        break;

    case 'demanderCreerRepresentations':
        include("vues/Representations/vCreerModifierRepresentations.php");
        break;

    case 'demanderModifierRepresentations':
        $id = $_REQUEST['id'];
        include("vues/Representations/vCreerModifierRepresentations.php");
        break;

    case 'validerSupprimerRepresentations':
        $id = $_REQUEST['id'];
        RepresentationDAO::delete($id);
        include("vues/Representations/vConsulterRepresentations.php");
        break;
    

    case 'validerCreerRepresentations':case 'validerModifierRepresentations':
        $id = $_REQUEST['id'];
        $idLieu = $_REQUEST['idLieu'];
        $idGroupe = $_REQUEST['idGroupe'];
        $DateRep = $_REQUEST['DateRep'];
        $HeureDebut = $_REQUEST['HeureDebut'];
        $HeureFin = $_REQUEST['HeureFin'];
 
        
        if ($action == 'validerCreerRepresentations') {
            verifierDonneesRepresentationsC ($id, $idLieu ,$idGroupe, $DateRep, $HeureDebut, $HeureFin);         
            if (nbErreurs() == 0) {
                $unRepresentation = new Representation($id, $idLieu, $idGroupe, $DateRep, $HeureDebut,$HeureFin); 
                RepresentationDAO::insert($uneRepresentation);
                include("vues/Representations/vConsulterRepresentations.php");
            } else {
                include("vues/Representations/vCreerModifierRepresentations.php");
            }
        } else {
            verifierDonneesRepresentationsM ($id, $idLieu, $idGroupe, $DateRep, $HeureDebut, $HeureFin); 
            if (nbErreurs() == 0) {
                $uneRepresentation = new Representation($id, $idLieu, $idGroupe, $DateRep, $HeureDebut, $HeureFin);
                RepresentationDAO::update($id, $uneRepresentation);
                include("vues/Representations/vConsulterRepresentations.php");
            } else {
                include("vues/Representations/vCreerModifierRepresentations.php");
            }
        }
        break;
}

// Fermeture de la connexion au serveur MySql
Bdd::deconnecter();

function verifierDonneesRepresentationC($id, $idLieu, $idGroupe, $DateRep, $HeureDebut, $HeureFin) {
    if ($id == "" || $idLieu == "" || $idGroupe == "" || $DateRep == "" || $HeureDebut == "" ||
            $HeureFin == "" ) {
        ajouterErreur('Chaque champ suivi du caractère * est obligatoire');
    }
    if ($id != "") {
        // Si l'id est constitué d'autres caractères que de lettres non accentuées 
        // et de chiffres, une erreur est générée
        if (!estChiffresOuEtLettres($id)) {
            ajouterErreur
                    ("L'identifiant doit comporter uniquement des lettres non accentuées et des chiffres");
        } else {
            if (RepresentationDAO::isAnExistingId($id)) {
                ajouterErreur("La Representation $id existe déjà");
            }
        }
        if (!estChiffres($idLieu)){
            ajouterErreur("L'id Lieu de la Representation doit comporter uniquement des chiffres !");
        }
        
        if (!estChiffresOuEtLettres($idGroupe)){
            ajouterErreur("L'id Groupe de la Representation doit comporter uniquement des chiffres et des lettres !");
        }
    }
      
}


function verifierDonneesRepresentationM($id, $idLieu, $idGroupe, $DateRep, $HeureDebut, $HeureFin) {
    if ($idLieu == "" || $identite == "" || $adresse == "" || $ville == "" ||
            $tel == "" || $nomResponsable == "" || $adresseElectronique== "") {
        ajouterErreur('Chaque champ suivi du caractère * est obligatoire');
    }
    


}

   


