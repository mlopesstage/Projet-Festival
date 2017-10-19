<?php
namespace modele\metier;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Création de la classe representation par RONY

class Representation {
    /**
     * code  de 8 caractères alphanum.
     * @var string
     */
    private $id;
    
    /** nom du lieu
     * @var string
     */
    private $idLieu;
    /**
     * nom du groupe
     * @var string
     */
    private $idGroupe;
    /**
     * date
     * @var Date
     */
    private $dateRep;
    /**
     * heuredebut
     * @var temps
     */
    
    private $heureDebut ;
    /**
     * heureFin
     * @var temps
     */
    private $heureFin ;
    
    
    function __construct($id, $idLieu, $idGroupe, $dateRep, $heureDebut, $heureFin) {
        $this->id = $id;
        $this->idLieu = $idLieu;
        $this->idGroupe = $idGroupe;
        $this->dateRep = $dateRep;
        $this->heureDebut = $heureDebut;
        $this->heureFin= $heureFin;
        
    }

    function getId() {
        return $this->id;
    }

    function getIdLieu() {
        return $this->idLieu;
    }

    function getIdGroupe() {
        return $this->idGroupe;
    }

    function getDateRep() {
        return $this->dateRep;
    }
    function getHeureDebut() {
        return $this->heureDebut;
    }

    function getHeureFin() {
        return $this->heureFin;
    }
   function setId($id) {
        $this->id = $id;
    }

    function setIdLieu($idLieu) {
        $this->idLieu = $idLieu;
    }

    function setIdGroupe($idGroupe) {
        $this->idGroupe = $idGroupe;
    }

    function setDateRep($dateRep) {
        $this->dateRep= $dateRep;
    }
    function setHeureDebut($heureDebut) {
        $this->heureDebut = $heureDebut;
    }

    function setHeureFin($heureFin) {
        $this->heureFin = $heureFin;
    }
}
