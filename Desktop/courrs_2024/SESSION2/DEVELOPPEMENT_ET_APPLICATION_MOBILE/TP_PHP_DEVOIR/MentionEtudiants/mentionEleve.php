<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La mention des étudiants de 2ème année Info.</title>
</head>
<body>
    <!-- <h1><marquee behavior="" direction="">Session de saisie</marquee></h1> -->
    <form action="traitementMention.php" method="POST">
        <h3>Veuillez remplir tous les champs.</h3>

        <label for="name">Le nom de l'étudiant :</label>
        <input type="text" name="name" placeholder="Nom" id="name" required> <br><br>

        <label for="phpN">La note de PHP :</label>
        <input type="number" name="phpN" placeholder="0.00" id="phpN" min="0" max="100" required> <br><br>

        <label for="baseDonnee">La note de Base de Données :</label>
        <input type="number" name="baseDonnee" placeholder="0.00" id="baseDonnee" min="0" max="100" required> <br><br>
        
        <label for="anglais">La note d'Anglais :</label>
        <input type="number" name="anglais" placeholder="0.00" id="anglais" min="0" max="100" required> <br><br>

        <label for="systExploi">La note de Système d'Exploitation :</label>
        <input type="number" name="systExploi" placeholder="0.00" id="systExploi" min="0" max="100" required> <br><br>

        <button type="submit">Calculer la Moyenne</button>
        <button type="reset">Réinitialiser</button>
    </form>
</body>
</html>
