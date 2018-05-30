<?php

session_start();

use modele\metier\Utilisateur;
use modele\dao\UtilisateurDAO;
use modele\dao\Bdd;

require_once __DIR__ . '/includes/autoload.php';
Bdd::connecter();
include("vues/Login/vLogin.php");
if (filter_input(INPUT_POST, 'login') != NULL &&
        filter_input(INPUT_POST, 'pwd') != NULL) {
    $lesUtilisateurs = UtilisateurDAO::getAll();
    foreach ($lesUtilisateurs as $unUtilisateur) {
        if ($unUtilisateur->getLogin() == $_POST['login'] && $unUtilisateur->getPwd() == sha1($_POST['pwd'])) {
            $_SESSION['logged'] = TRUE;
            header("Location: index.php");
        } else {
            echo '<script>alert("identifiant ou mot de passe incorrecte.");</script>';
        }
    }
}