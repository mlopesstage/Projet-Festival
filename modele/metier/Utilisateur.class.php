<?php
namespace modele\metier;

/**
 * Une instance d'Attribution représente le fait qu'un groupe 
 * bénéficie d'une offre (un type de chambre dans un établissement)
 * pour un certain nombre de chabres
 */
class Utilisateur {
    /**
     * @var int
     */
    private $id;
    /**
     * @var String 
     */
    private $nom;
    /**
     * @var String
     */
    private $prenom;
    /**
     * @var String
     */
    private $email;
    /**
     * @var String 
     */
    private $login;
    /**
     * @var String
     */
    private $pwd;
 
    function __construct($id,$nom,$prenom,$email,$login,$pwd) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->login = $login;
        $this->pwd = $pwd;
    }
    function getId() {
        return $this->id;
    }
    function getNom() {
        return $this->nom;
    }
    function getPrenom() {
        return $this->prenom;
    }
    function getEmail() {
        return $this->email;
    }
    function getLogin() {
        return $this->login;
    }
    function getPwd() {
        return $this->pwd;
    }
    function setId($id) {
        $this->id = $id;
    }
    function setNom(String $nom) {
        $this->nom = $nom;
    }
    function setPrenom(String $prenom) {
        $this->prenom = $prenom;
    }
    function setEmail(String $email) {
        $this->email = $email;
    }
    function setLogin(String $login) {
        $this->login = $login;
    }
    function setPwd(String $pwd) {
        $this->pwd = $pwd;
    }
}