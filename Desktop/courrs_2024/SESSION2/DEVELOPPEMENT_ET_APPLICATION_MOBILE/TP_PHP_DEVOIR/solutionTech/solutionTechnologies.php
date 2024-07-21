<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul du Salaire des Employés</title>
</head>
<body>
    <h1>Calcul du Salaire des Employés</h1>
    <form action="traitementSolutionTech.php" method="post">
        <label for="nom">Nom Complet :</label>
        <input type="text" name="nom" id="nom" required><br><br>

        <label for="annee">Année d'Intégration :</label>
        <input type="number" name="annee" id="annee" min="1900" max="2023-" required><br><br>

        <label for="salaire">Salaire Brut :</label>
        <input type="number" name="salaire" id="salaire" min="10000" max="70000" step="0.01" required><br><br>

        <button type="submit">Calculer</button>
        <button type="reset">Réinitialiser</button>
    </form>
</body>
</html>
