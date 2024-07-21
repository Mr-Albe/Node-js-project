<?php
if (isset($_POST['choix'])) {
    $choix = $_POST['choix'];
    echo "<h1>Résultat :</h1>";

    switch ($choix) {
        case '1':
            // Carré
            if (isset($_POST['cote']) && is_numeric($_POST['cote'])) {
                $cote = $_POST['cote'];
                $surface = $cote * $cote;
                $perimetre = 4 * $cote;
                echo "Surface du carré : " . number_format($surface, 2) . " unités carrées<br>";
                echo "Périmètre du carré : " . number_format($perimetre, 2) . " unités<br><br>";
                echo "<a href='switchCaseFigure.php'>Retourner au formulaire</a>";

            } else {
                echo "Veuillez entrer un côté valide pour le carré.<br>";
                echo "<a href='switchCaseFigure.php'>Retourner au formulaire</a>";

            }
            break;

        case '2':
            // Rectangle
            if (isset($_POST['longueur']) && is_numeric($_POST['longueur']) && isset($_POST['largeur']) && is_numeric($_POST['largeur'])) {
                $longueur = $_POST['longueur'];
                $largeur = $_POST['largeur'];
                $surface = $longueur * $largeur;
                $perimetre = 2 * ($longueur + $largeur);
                echo "Surface du rectangle : " . number_format($surface, 2) . " unités carrées<br>";
                echo "Périmètre du rectangle : " . number_format($perimetre, 2) . " unités<br><br>";
                echo "<a href='switchCaseFigure.php'>Retourner au formulaire</a>";

            } else {
                echo "Veuillez entrer une longueur et une largeur valides pour le rectangle.<br>";
                echo "<a href='switchCaseFigure.php'>Retourner au formulaire</a>";

            }
            break;

        case '3':
            // Sphère
            if (isset($_POST['rayonSphere']) && is_numeric($_POST['rayonSphere'])) {
                $rayon = $_POST['rayonSphere'];
                $surface = 4 * pi() * pow($rayon, 2);
                $volume = (4 / 3) * pi() * pow($rayon, 3);
                echo "Surface de la sphère : " . number_format($surface, 2) . " unités carrées<br>";
                echo "Volume de la sphère : " . number_format($volume, 2) . " unités cubes<br><br>";
                echo "<a href='switchCaseFigure.php'>Retourner au formulaire</a>";

            } else {
                echo "Veuillez entrer un rayon valide pour la sphère.<br>";
                echo "<a href='switchCaseFigure.php'>Retourner au formulaire</a>";
            }
            break;

        case '4':
            // Cercle
            if (isset($_POST['rayonCercle']) && is_numeric($_POST['rayonCercle'])) {
                $rayon = $_POST['rayonCercle'];
                $surface = pi() * pow($rayon, 2);
                $perimetre = 2 * pi() * $rayon;
                echo "Surface du cercle : " . number_format($surface, 2) . " unités carrées<br>";
                echo "Périmètre du cercle : " . number_format($perimetre, 2) . " unités<br>";
            } else {
                echo "Veuillez entrer un rayon valide pour le cercle.<br>";
                echo "<a href='switchCaseFigure.php'>Retourner au formulaire</a>";
            }
            break;

        case '5':
            // Cône
            if (isset($_POST['rayonCone']) && is_numeric($_POST['rayonCone']) && isset($_POST['hauteurCone']) && is_numeric($_POST['hauteurCone'])) {
                $rayon = $_POST['rayonCone'];
                $hauteur = $_POST['hauteurCone'];
                $surfaceBase = pi() * pow($rayon, 2);
                $surfaceLaterale = pi() * $rayon * sqrt(pow($rayon, 2) + pow($hauteur, 2));
                $surface = $surfaceBase + $surfaceLaterale;
                $volume = (1 / 3) * pi() * pow($rayon, 2) * $hauteur;
                echo "Surface du cône : " . number_format($surface, 2) . " unités carrées<br>";
                echo "Volume du cône : " . number_format($volume, 2) . " unités cubes<br><br>";
                echo "<a href='switchCaseFigure.php'>Retourner au formulaire</a>";

            } else {
                echo "Veuillez entrer un rayon et une hauteur valides pour le cône.<br>";
                echo "<a href='switchCaseFigure.php'>Retourner au formulaire</a>";

            }
            break;

        default:
            echo "Choix non valide.";
            echo "<a href='switchCaseFigure.php'>Retourner au formulaire</a>";

            break;
    }
} else {
    echo "Veuillez soumettre le formulaire.";
    echo "<a href='switchCaseFigure.php'>Retourner au formulaire</a>";
    
}
?>
