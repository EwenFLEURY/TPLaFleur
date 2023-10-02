<?php
    include 'header.php' ;
    require_once 'menu.php' ;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (modifyUtilisateur($_POST)) {
        echo '<main class="page"><br>Succès.</main>';
    } 
    else {
        echo '<main class="page"><br>Identifiants incorrects. Veuillez réessayer.</main>';
        echo '<meta http-equiv="refresh" content="3;url=account.php" />';
    }
}
else {
    echo '<main class="page">';
    if (!isset($_SESSION["utilisateurConnecter"])) {
        echo "<br>Veuillez d'abord vous connectez.";
        echo '<meta http-equiv="refresh" content="3;url=login.php" />';
    }
    else {
        echo '<h1>Votre compte :</h1>';
        echo '<form action="account.php" method="post">';
            echo '<label for="nom">Changer le nom : </label>';
            echo '<input type="text" name="nom"><br><br>';
            
            echo '<label for="prenom">Changer le prénom : </label>';
            echo '<input type="text" name="prenom"><br><br>';
            
            echo '<label for="email">Changer l\'email : </label>';
            echo '<input type="email" name="email"><br><br>';

            echo '<label for="password">Changer le mot de passe : </label>';
            echo '<input type="password" name="password" minlength="8"><br><br>';
            
            echo '<label for="password">Entrez votre ancien mot de passe : </label>';
            echo '<input type="password" name="passwordVerif" minlength="8" required><br><br>';

            echo '<input type="submit" value="Envoyer">';
        echo '</form>';
    }
}
echo '</main>';
include 'piedpage.php' ;
?>
