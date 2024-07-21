<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie des Paramètres du Générateur</title>
</head>
<body>
    <h1>Remplir tous les champs concernant l'état de marche du générateur.</h1>
    <form action="traitementGenerateur.php" method="post">
        <label for="force">La force Electromotrice (E) : </label>
        <input type="number" name="valueElectro" id="force" placeholder="0.00V" required> <br><br>

        <label for="resistance">Résistance Intérieure (r) : </label>
        <input type="number" name="valueResist" id="resistance" min="0" placeholder="0.00 Ω" required> <br><br>

        <label for="intensite">L'intensité (i) : </label>
        <input type="number" name="valueIntens" id="intensite" min="0" placeholder="0.00 A" required> <br><br>

        <button type="submit">Soumettre</button>
        <button type="reset">Réinitialiser</button>
    </form>
</body>
</html>
