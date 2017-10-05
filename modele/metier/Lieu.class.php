<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Création de la classe Lieu par RONY

class Lieu {
    /**
     * code  de 8 caractères alphanum.
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $nomLieu;
    /**
     * n° de rue et rue
     * @var string
     */
    private $adresseLieu;
    /**
     * 
     * @var integer
     */
    private $capaciteaccueil;
    
    
    function __construct($id, $nomLieu, $adresseLieu, $capaciteaccueil) {
        $this->id = $id;
        $this->nomLieu = $nomLieu;
        $this->adresseLieu = $adresseLieu;
        $this->capaciteaccueil = $capaciteaccueil;
        
    }

    function getId() {
        return $this->id;
    }

    function getNomLieu() {
        return $this->nomLieu;
    }

    function getAdresseLieu() {
        return $this->adresseLieu;
    }

    function getcapaciteaccueil() {
        return $this->capaciteaccueil;
    }

   function setId($id) {
        $this->id = $id;
    }

    function setNomLieu($nomLieu) {
        $this->nomLieu = $nomLieu;
    }

    function setAdresseLieu($adresseLieu) {
        $this->adresseLieu = $adresseLieu;
    }

    function setcapaciteaccueil($capaciteaccueil) {
        $this->capaciteaccueil = $capaciteaccueil;
    }

}