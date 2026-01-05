<?php
// On créer une variable pour stocker le fruit sélectionné, qu'on initialise à vide
$fruit_choisi = null;

// On vérifie la soumission du formulaire 
if (isset($_POST['soumettre']) && isset($_POST['fruit'])) {
    // On recupère la valeur du fruit sélectionné
    $fruit_choisi = $_POST['fruit'];
}
function afficherListeDeroulante($options, $selection = null) {
    echo '<select name="fruit">';
    
    // On oarcourt le tableau pour créer les balises <option>
    foreach ($options as $option) {
        $selected = ($option === $selection) ? ' selected="selected"' : '';
        
        // On affiche l'option. 
        echo "<option value=\"$option\"$selected>$option</option>";
    }
    echo '</select>';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste déroulante en PHP</title>
</head>
<body>

    <form action="" method="POST">
        <label for="fruit">Sélectionnez un fruit :</label>
        
        <?php
        include_once "liste-fruit.php"; 
        afficherListeDeroulante($fruits, $fruit_choisi);
        ?>
        
        <input type="submit" name="soumettre" value="Soumettre">
    </form>
    
    <?php
    if ($fruit_choisi !== null) {
        echo '<div class="resultat">';
        echo "Vous avez choisi : $fruit_choisi";
        echo '</div>';
    }
    ?>

</body>
</html>