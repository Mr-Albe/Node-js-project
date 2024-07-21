<?php
define('COEF0', 300);
define('COEF1', 100);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $noteMath = $_POST['math'];
    $notePhysique = $_POST['physique'];
    $noteHtml = $_POST['html'];
    $noteBase = $_POST['baseDonnee'];

    // Validation des notes côté serveur
    $valide = true;
    $erreurs = [];

    if ($noteMath < 0 || $noteMath > 300) {
        $valide = false;
        $erreurs[] = "La note de Math doit être comprise entre 0 et 300.";
    }
    if ($notePhysique < 0 || $notePhysique > 300) {
        $valide = false;
        $erreurs[] = "La note de Physique doit être comprise entre 0 et 300.";
    }
    if ($noteHtml < 0 || $noteHtml > 100) {
        $valide = false;
        $erreurs[] = "La note de HTML/CSS doit être comprise entre 0 et 100.";
    }
    if ($noteBase < 0 || $noteBase > 100) {
        $valide = false;
        $erreurs[] = "La note de Base de Données doit être comprise entre 0 et 100.";
    }

    if ($valide) {
        $sumNotes = $noteMath + $notePhysique + $noteHtml + $noteBase;
        $coeffTotal = COEF0 * 3 + COEF1;
        $coeffMoyen = $coeffTotal / 10;
        $moyenne = $sumNotes / $coeffMoyen;

        echo "<h1>LES notes de Jean Paul Ronald de la classe 2eme Anne info.</h1><br>";
        echo "Math: $noteMath<br> Physique : $notePhysique <br> Html/Css : $noteHtml <br> Base de données : $noteBase <br><br>";
        echo "NOTES: $sumNotes sur Coefficient : $coeffTotal <br>";
        echo "La moyenne est: " . number_format($moyenne, 2) . "<br><br>";

        echo "<a href='moyenneNotes.php'>Retour au formulaire</a>"; // Assurez-vous que le chemin est correct

    } else {
        foreach ($erreurs as $erreur) {
            echo "<p style='color: red;'>$erreur</p>";
        }
        echo "<a href='moyenneNotes.php'>Retour au formulaire</a>";
    }
} else {
    echo "Veuillez soumettre le formulaire.";
    echo "<a href='moyenneNotes.php'>Retour au formulaire</a>"; // Assurez-vous que le chemin est correct
}
?>
