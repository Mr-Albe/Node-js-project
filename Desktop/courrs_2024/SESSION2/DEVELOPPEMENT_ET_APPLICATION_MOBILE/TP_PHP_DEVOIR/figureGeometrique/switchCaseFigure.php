<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Figures Géométriques</title>
</head>
<body>
    <h1>Gestion des Figures Géométriques</h1>
    <form action="traitementSwitchCase.php" method="post">
        <label for="choix">Choisir une opération (1 à 5) :</label>
        <select name="choix" id="choix" required>
            <option value="1">Carré : Surface et Périmètre</option>
            <option value="2">Rectangle : Surface et Périmètre</option>
            <option value="3">Sphère : Surface et Volume</option>
            <option value="4">Cercle : Surface et Périmètre</option>
            <option value="5">Cône : Surface et Volume</option>
        </select><br><br>

        <label for="cote">Côté (pour le carré) :</label>
        <input type="number" name="cote" id="cote" step="0.01"><br><br>

        <label for="longueur">Longueur (pour le rectangle) :</label>
        <input type="number" name="longueur" id="longueur" step="0.01"><br><br>

        <label for="largeur">Largeur (pour le rectangle) :</label>
        <input type="number" name="largeur" id="largeur" step="0.01"><br><br>

        <label for="rayonSphere">Rayon (pour la sphère) :</label>
        <input type="number" name="rayonSphere" id="rayonSphere" step="0.01"><br><br>

        <label for="rayonCercle">Rayon (pour le cercle) :</label>
        <input type="number" name="rayonCercle" id="rayonCercle" step="0.01"><br><br>

        <label for="rayonCone">Rayon (pour le cône) :</label>
        <input type="number" name="rayonCone" id="rayonCone" step="0.01"><br><br>

        <label for="hauteurCone">Hauteur (pour le cône) :</label>
        <input type="number" name="hauteurCone" id="hauteurCone" step="0.01"><br><br>

        <button type="submit">Calculer</button>
        <button type="reset">Réinitialiser</button>

    </form>
</body>
</html>
