<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermarché - Saisie des Produits</title>
</head>
<body>
    <h1>Session de saisie</h1>
    <form action="traitementSupermarche.php" method="post">
        <h3>Veuillez remplir tous ces champs.</h3>

        <label for="product1">Nom du premier produit :</label>
        <input type="text" name="product1" id="product1" placeholder="Nom" required> <br><br>

        <label for="prix1">Prix unitaire :</label>
        <input type="number" name="prix1" id="prix1" min="0" placeholder="0.00" required> <br><br>

        <label for="Qt1">Quantité :</label>
        <input type="number" name="Qt1" id="Qt1" min="0" placeholder="0.00" required> <br><br>

        <label for="product2">Nom du second produit :</label>
        <input type="text" name="product2" id="product2" placeholder="Nom" required> <br><br>

        <label for="prix2">Prix unitaire :</label>
        <input type="number" name="prix2" id="prix2" min="0" placeholder="0.00" required> <br><br>

        <label for="Qt2">Quantité :</label>
        <input type="number" name="Qt2" id="Qt2" min="0" placeholder="0.00" required> <br><br>

        <button type="submit">Acheter</button>
        <button type="reset">Réinitialiser</button>
    </form>
</body>
</html>
