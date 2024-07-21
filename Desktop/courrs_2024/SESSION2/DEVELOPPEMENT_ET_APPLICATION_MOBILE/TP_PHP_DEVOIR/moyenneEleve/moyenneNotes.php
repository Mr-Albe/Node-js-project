<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programme de saisie et calcul de la moyenne des notes</title>
</head>
<body>
    <h1><marquee behavior="" direction="">Session de saisie</marquee></h1>
    <form action="traitementMoyenne.php" method="POST">
        <h3>Veuillez remplir tous ces champs.</h3>

        <label for="math">La note de Math</label>
        <input type="number" name="math" placeholder="0.00" id="math"  min="0" max="300" required> <br><br>

        <label for="physique">La note de Physique</label>
        <input type="number" name="physique" placeholder="0.00" id="physique" min="0" max="300" required> <br><br>

        <label for="html">La note de HTML/CSS</label>
        <input type="number" name="html" placeholder="0.00" id="html" min="0" max="300" required> <br><br>

        <label for="base">La note de Base de données</label>
        <input type="number" name="baseDonnee" placeholder="0.00" id="base" min="0" max="100" required> <br><br>

        <button type="submit">Calculer la Moyenne</button>
        <button type="reset">Supprimer</button>
    </form>
</body>
</html>
