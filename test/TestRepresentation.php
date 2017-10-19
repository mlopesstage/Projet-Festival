<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Test Representation</title>
    </head>
    <body>
        <?php
        use modele\metier\Representation;
        require_once __DIR__ . '/../includes/autoload.php';
        echo "<h2>Test unitaire de la classe métier Representation</h2>";
        $objet = new Representation('26', '1', 'g024', '2017-07-15', '18:15:00', '19:00:00');
        var_dump($objet);
        ?>
    </body>
</html>
