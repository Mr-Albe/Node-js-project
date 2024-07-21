<?php
define("CONST5", 0.05);
define("CONST1", 0.1);
define("CONST16", 0.16);
define("CONST23", 0.23);

if(isset($_POST['lastName'], $_POST['firstName'], $_POST['sexe'], $_POST['heure'], $_POST['prixHeure'])){
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $sexe = $_POST['sexe'];
    $nbHeure = $_POST['heure'];
    $prixHeure = $_POST['prixHeure'];


    $salaireBrut = $nbHeure * $prixHeure;
    if($salaireBrut < 12500) {
        $taxe = $salaireBrut * CONST5; // 5% de taxe
    }
    if($salaireBrut > 12500 && $salaireBrut < 25000) {
        $taxe = $salaireBrut * CONST1; // 10% de taxe
    }
    if($salaireBrut > 25000 && $salaireBrut < 40000) {
        $taxe = $salaireBrut * CONST16; //16% de taxe
    }
    if($salaireBrut >= 40000) {
        $taxe = $salaireBrut * CONST23; //23% de taxe
    }

    $salaireNet = $salaireBrut - $taxe;
    $augmentation = $salaireNet * 0.25; //25% augmentation

    //salaire net + augmentation
    $salnetAugmentation = $salaireNet + $augmentation;

    //affichage des information
    echo "<h1>Informations de Personnel</h1><br>";
    echo "Nom : $lastName <br>";
    echo "Prénom : $firstName <br>";
    echo "Sexe : $sexe <br>";
    echo "Nombre d'Heures travaillées : $nbHeure <br>";
    echo "Prix par Heure : $prixHeure Gourdes <br><br>";

    echo "Salaire Brut : ".number_format($salaireBrut,2) ." Gourdes <br>";
    echo "Taxe : ".number_format($taxe,2). " Gourdes <br>";
    echo "Salaire Net: ".number_format($salaireNet,2). "Gourdes <br>";
    echo "Augmentation : ".number_format($augmentation,2)." Gourdes <br>";
    echo "Salaire Net + Augmentation : ".number_format($salnetAugmentation,2)."Gourdes <br><br>";


    echo "<a href='augmenteSalaire.php'>Retour au formulaire</a>";
} else {
    echo "Erreur de soumission du formulaire.";
    echo "<a href='augmenteSalaire.php'>Retour au formulaire</a>";
}

?>