<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>minichat</title>
    <link rel="stylesheet" href="style.css">
</head>
<style type="text/css">
    form
    {
    text-align:center;
    background-color: beige;
    }
</style>
<body>
    
<p>MON MINICHAT</p><br>


<!--Formulaire-->
<fieldset>
    <legend>Minichat</legend>
    <form class="minichat" action="minichat_post.php" method="post">
        <p>
            <label for="pseudo">Pseudo * : <input type="text" name="pseudo" placeholder="Pseudo"></label>
            
        </p>

        <p>
            <label for="message">Message * : <input type="text" name="message" placeholder="Message"></label>
           
        </p>

        <input type="submit" value="envoyer"/>
</fieldset>
<!--Formulaire-->


<?php
try
{
	// Connexion à la base de données
	$bdd = new PDO('mysql:host=localhost;dbname=test2;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// Récupération des 10 derniers messages

$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)

var_dump($reponse);
while ($donnees = $reponse->fetch())
{
       echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
</body>
</html>