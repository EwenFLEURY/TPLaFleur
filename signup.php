<?php
    include 'header.php' ;
    require_once 'menu.php' ;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        
        setUtilisateur($nom, $prenom, $email, $password);

        echo '<meta http-equiv="refresh" content="3;url=login.php" />';
        echo "<br>Utilisateur creer avec succès.";
    } 
    catch (PDOException $e) {
        die("Erreur lors de la connexion à la base de données : " . $e->getMessage());
    }
}
else {
        echo '<main class="page">';
        if (isset($_SESSION["utilisateurConnecter"])) {
            echo "<br>Déjà connecter sous l'utilisateur suivant : " . $_SESSION["utilisateurConnecter"];
            echo '<meta http-equiv="refresh" content="3;url=index.php" />';
        }
        else {
            echo '<h1>Formulaire LaFleur</h1>';
            echo '<form action="signup.php" method="post">';
                echo '<label for="nom">Nom :</label>';
                echo '<input type="text" name="nom" required><br><br>';
                
                echo '<label for="prenom">Prénom :</label>';
                echo '<input type="text" name="prenom" required><br><br>';
                
                echo '<label for="email">Email :</label>';
                echo '<input type="email" name="email" required><br><br>';

                echo '<label for="password">Mot de passe :</label>';
                echo '<input type="password" name="password" minlength="8" required><br><br>';
                
                echo '<input type="submit" value="Envoyer">';
            echo '</form>';
        }
        echo '</main>';
}
include 'piedpage.php' ;
?>
