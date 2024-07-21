<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Augmentation Salaire Professeur du Collège Marie-Anne</title>
</head>
<body>
    <h1>Augmentation de Salaire des Professeurs du Collège Marie-Anne</h1>

    <form action="traitementAugmtSalaire.php" method="post">
        <h3>Veuillez remplir tous les champs.</h3>

        <label for="lastName">Nom du professeur :</label>
        <input type="text" name="lastName" id="lastName" placeholder="Nom" required> <br><br>

        <label for="firstName">Prénom du professeur :</label>
        <input type="text" name="firstName" id="firstName" placeholder="Prénom" required> <br><br>

        <label for="sexe">Sexe du professeur :</label>
        <input type="text" name="sexe" id="sexe" placeholder="Sexe" required> <br><br>

        <label for="heure">Nombre d'heures du professeur :</label>
        <input type="number" name="heure" id="heure" min="0" placeholder="0" required> <br><br>

        <label for="prixHeure">Prix de l'heure du professeur :</label>
        <input type="number" name="prixHeure" id="prixHeure" min="0" placeholder="0" required> <br><br>

        <button type="submit">Soumettre</button>
        <button type="reset">Réinitialiser</button>
    </form>
</body>
</html>
