<?php
if (isset($_POST['nom'],$_POST['annee'],  $_POST['salaire'])) {
    $nom = $_POST['nom'];
    $anneeIntegration = $_POST['annee'];
    $salaireBrut = $_POST['salaire'];

    $anneeEncours = date("Y");
    $anciennete = $anneeEncours - $anneeIntegration;

    // Calcul de l'augmentation en fonction de l'ancienneté
    if ($anciennete < 3) {
        $pourcentageAugmentation = 0.05;
    } elseif ($anciennete >= 3 && $anciennete <= 5) {
        $pourcentageAugmentation = 0.10;
    } elseif ($anciennete > 5 && $anciennete < 8) {
        $pourcentageAugmentation = 0.15;
    } elseif ($anciennete >= 8 && $anciennete <= 15) {
        $pourcentageAugmentation = 0.21;
    } else {
        $pourcentageAugmentation = 0.30;
    }

    $augmentation = $salaireBrut * $pourcentageAugmentation;

    // Calcul des taxes
    $ona = 0.01 * $salaireBrut;
    $ofatma = 0.01 * $salaireBrut;
    $cfgdct = 0.01 * $salaireBrut;

    if ($salaireBrut < 20000) {
        $uri = $cas = $fdu = 0.07 * $salaireBrut;
    } elseif ($salaireBrut >= 20000 && $salaireBrut <= 45000) {
        $uri = $cas = $fdu = 0.11 * $salaireBrut;
    } else {
        $uri = $cas = $fdu = 0.18 * $salaireBrut;
    }

    $taxes = $ona + $ofatma + $cfgdct + $uri + $cas + $fdu;

    $salaireNet = $salaireBrut - $taxes;
    $salaireNetAugmente = $salaireNet + $augmentation;

    // Affichage des résultats
    echo "<h1>Informations pour $nom :</h1>";
    echo "Ancienneté : $anciennete ans<br>";
    echo "Salaire Brut : " . number_format($salaireBrut, 2) . " Gourdes<br>";
    echo "Augmentation : " . number_format($augmentation, 2) . " Gourdes<br>";
    echo "ONA : " . number_format($ona, 2) . " Gourdes<br>";
    echo "OFATMA : " . number_format($ofatma, 2) . " Gourdes<br>";
    echo "CFGDCT : " . number_format($cfgdct, 2) . " Gourdes<br>";
    echo "URI : " . number_format($uri, 2) . " Gourdes<br>";
    echo "CAS : " . number_format($cas, 2) . " Gourdes<br>";
    echo "FDU : " . number_format($fdu, 2) . " Gourdes<br>";
    echo "Salaire Net : " . number_format($salaireNet, 2) . " Gourdes<br>";
    echo "Salaire Net Augmenté : " . number_format($salaireNetAugmente, 2) . " Gourdes<br><br>";

    echo "<a href='solutionTechnologies.php'>Retour au formulaire</a>";
} else {
    echo "Erreur de  soumission  du formulaire.";
    echo "<a href='solutionTechnologies.php'>Retour au formulaire</a>";
}
?>
