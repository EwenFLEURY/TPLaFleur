<?php
    include 'header.php' ;
    require_once 'menu.php' ;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $row = getUtilisateur($email, $password);

        if ($row) {
            echo '<meta http-equiv="refresh" content="3;url=index.php" />';
            echo '<main class="page"><br>Connexion réussie. Bienvenue, ' . $row['email'] . "!</main>";
            $_SESSION["utilisateurConnecter"] = $row["nom"] . "-" . $row["prenom"];
            $_SESSION["email"] = $row["email"];
        } 
        else {
            echo '<main class="page"><br>Identifiants incorrects. Veuillez réessayer.</main>';
            echo '<meta http-equiv="refresh" content="3;url=login.php" />';
        }
    }
    catch (PDOException $e) {
        die("Erreur lors de la connexion à la base de données : " . $e->getMessage());
    }
}
else {
    echo '<main class="page">';
    if (isset($_SESSION["utilisateurConnecter"])){
        echo '<br>';
        echo "Déjà connecter sous l'utilisateur suivant : " . $_SESSION["utilisateurConnecter"];
        echo '<meta http-equiv="refresh" content="3;url=index.php" />';
    }
    else {
        echo '<h1>Formulaire LaFleur</h1>';
        echo '<form action="login.php" method="post">';
        echo '    <label for="email">Votre e-mail :</label>';
        echo '    <input type="email" name="email" required><br><br>';
        echo '    <label for="password">Votre mot de passe :</label>';
        echo '    <input type="password" name="password" minlength="8" required><br><br>';
        echo '    <input type="submit" value="Envoyer">';
        echo '</form>';
    }
    echo '</main>';
}
include 'piedpage.php' ;
?>
