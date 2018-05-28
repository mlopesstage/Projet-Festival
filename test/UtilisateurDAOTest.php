<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Utilisateur : test DAO</title>
    </head>
    
    <body>
        <?php
        use modele\dao\UtilisateurDAO;
        use modele\dao\Bdd;
        use modele\metier\Utilisateur;
        require_once __DIR__ . '/../includes/autoload.php';
        $id = '1';
        Bdd::connecter();
        echo "<h2>Test UtilisateurDAO</h2>";
        // Test n°1
        echo "<h3>1- getOneById</h3>";
        try {
            $objet = UtilisateurDAO::getOneById($id);
            echo "<p>Voici le libelle d'identifiant $id : " . $objet->getnom()."</p>";
            var_dump($objet);
        } catch (Exception $ex) {
            echo "<h4>*** échec de la requête ***</h4>" . $ex->getMessage();
        }
        // Test n°2
        echo "<h3>2- getAll</h3>";
        try {
            $lesObjets = UtilisateurDAO::getAll();
            var_dump($lesObjets);
        } catch (Exception $ex) {
            echo "<h4>*** échec de la requête ***</h4>" . $ex->getMessage();
        }
        Bdd::deconnecter();
        ?>
    </body>
</html>