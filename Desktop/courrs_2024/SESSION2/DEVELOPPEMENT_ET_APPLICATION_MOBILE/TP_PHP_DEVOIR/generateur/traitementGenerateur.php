<?php
if (isset($_POST['valueElectro'], $_POST['valueResist'], $_POST['valueIntens'])) {
    $forceElectro = $_POST['valueElectro'];
    $resistance = $_POST['valueResist'];
    $intensite = $_POST['valueIntens'];

    // Validation des valeurs
    $valide = true;
    $erreurs = [];

    if ($forceElectro < 0) {
        $valide = false;
        $erreurs[] = "La force électromotrice doit être positive.";
    }
    if ($resistance < 0) {
        $valide = false;
        $erreurs[] = "La résistance intérieure doit être positive.";
    }
    if ($intensite < 0) {
        $valide = false;
        $erreurs[] = "L'intensité doit être positive.";
    }

    if ($valide) {
        $puissanceDisponible = ($forceElectro * $intensite) - ($intensite * $intensite * $resistance);  // P = E * I - I^2 * r

        echo "Les informations concernant l'état du générateur : <br><br>";
        echo "Force Electromotrice (E) : $forceElectro V<br>";
        echo "Résistance Intérieure (r) : $resistance Ω<br>";
        echo "Intensité (i) : $intensite A<br><br>";
        echo "La puissance disponible du générateur est : " . number_format($puissanceDisponible, 2) . " W<br>";

        echo "<a href='generateur.php'>Retour au formulaire</a>";
    } else {
        foreach ($erreurs as $erreur) {
            echo "<p style='color: red;'>$erreur</p>";
        }
        echo "<a href='generateur.php'>Retour au formulaire</a>";
    }
} else {
    echo "Erreur de soumission du formulaire.";
    echo "<a href='generateur.php'>Retour au formulaire</a>";
}
?>
