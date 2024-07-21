<?php
define("RABAIS", 0.055);

if (isset($_POST['product1'],$_POST['prix1'],$_POST['Qt1'])) {
    $name1 = $_POST['product1'];
    $prix1 = $_POST['prix1'];
    $Qt1 = $_POST['Qt1'];
    $montant1 = $Qt1 * $prix1;

    $name2 = $_POST['product2'];
    $prix2 = $_POST['prix2'];
    $Qt2 = $_POST['Qt2'];
    $montant2 = $Qt2 * $prix2;

    $montantTotal = $montant1 + $montant2;
    $rabais = $montantTotal * RABAIS;
    $montantPaye = $montantTotal - $rabais;

    echo "<h1>Les informations concernant l'achat : </h1><br>";
    echo "Le nom du premier produit: $name1 <br>";
    echo "Le Prix Unitaire: $prix1 Gourdes  - la Quantité du Produit: $Qt1 <br><br>";

    echo "Le nom du second produit: $name2 <br>";
    echo "Le Prix Unitaire: $prix2 Gourdes -  la Quantité du Produit: $Qt2 <br><br>";

    echo "Les informations concernant le montant : <br>";
    echo "Le montant de l'achat: $montantTotal Gourdes <br>";
    echo "Le rabais: " . number_format($rabais, 2) . " Gourdes <br>";
    echo "Le montant à payer: " . number_format($montantPaye, 2) . " Gourdes <br><br>";

    echo "<a href='superMarche.php'>Retour au formulaire</a>";
} else {
    echo "Erreur de soumission du formulaire.";
    echo "<a href='superMarche.php'>Retour au formulaire</a>";
}
?>
