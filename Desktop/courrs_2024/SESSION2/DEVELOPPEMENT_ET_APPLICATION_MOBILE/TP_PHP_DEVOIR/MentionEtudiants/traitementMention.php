<?php

use FFI\CData;

define('COEF4', 4);
define('COEF2', 2);
define('COEF3', 3);
define('COEF', 100);

if (isset($_POST['name'], $_POST['phpN'], $_POST['anglais'], $_POST['systExploi'], $_POST['baseDonnee'])) {
    $name = $_POST['name'];
    $notePhpN = $_POST['phpN'];
    $noteAnglais = $_POST['anglais'];
    $noteSystExploi = $_POST['systExploi'];
    $noteBase = $_POST['baseDonnee'];

    // Validation des notes côté serveur
    $valide = true;
    $reprise = false;
    $erreurs = [];
    $matiere = [];

    if ($notePhpN < 0 || $notePhpN > 100) {
        $valide = false;
        $erreurs[] = "La note de PHP doit être comprise entre 0 et 100.";
    }
    if ($noteAnglais < 0 || $noteAnglais > 100) {
        $valide = false;
        $erreurs[] = "La note d'Anglais doit être comprise entre 0 et 100.";
    }
    if ($noteSystExploi < 0 || $noteSystExploi > 100) {
        $valide = false;
        $erreurs[] = "La note de Système d'Exploitation doit être comprise entre 0 et 100.";
    }
    if ($noteBase < 0 || $noteBase > 100) {
        $valide = false;
        $erreurs[] = "La note de Base de Données doit être comprise entre 0 et 100.";
    }

    if ($notePhpN < 65) {
        $reprise = true;
        $matiere[] = "PHP : Coefficient 4 ";
    }
    if ($noteAnglais < 65) {
        $reprise = true;
        $matiere[] = "Anglais : Coefficient 2 ";
    }
    if ($noteSystExploi < 65) {
        $reprise = true;
        $matiere[] = "Système d'Exploitation : Coefficient 3 ";
    }
    if ($noteBase < 65) {
        $reprise = true;
        $matiere[] = "Base de Données : Coefficient 4 ";
    }

    if ($valide) {
        $sumNotes = ($notePhpN * COEF4) + ($noteAnglais * COEF2) + ($noteSystExploi * COEF3) + ($noteBase * COEF4);
        $coeffTotal = (COEF4 * 2) + COEF2 + COEF3;
        $moyenne = $sumNotes / $coeffTotal;
        $coef = $coeffTotal * COEF;

        echo "<h1>Les informations de $name de la classe 2ème Année Info.</h1> <br>";
        echo "NOTES: $sumNotes sur Coefficient : $coef <br><br> ";
        echo "La moyenne est: " . number_format($moyenne, 2) . "<br><br> ";

        if ($moyenne >= 65) {
            echo "Mention : Admis(e) <br><br><br> ";
        } elseif ($moyenne >= 50 && $moyenne < 65) {
            echo "Mention : Ajourné(e) <br><br> "; 
            echo "Matière(s) de reprise: <br><br>";
            foreach ($matiere as $cours) {
                echo "<p style='color: red;'>$cours</p>";
            }
        } else {
            echo "Mention : Éliminé(e) <br><br>";
        }

        echo "<a href='mentionEleve.php'>Retour au formulaire</a>";
    } else {
        foreach ($erreurs as $erreur) {
            echo "<p style='color: red;'>$erreur</p>";
        }
        echo "<a href='mentionEleve.php'>Retour au formulaire</a>";
    }
} else {
    echo "Erreur de soumission du formulaire.";
    echo "<a href='mentionEleve.php'>Retour au formulaire</a>";
}
?>
