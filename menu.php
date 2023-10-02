<?php
    session_start();
    require_once 'models/gestionBdd.php' ;
    $categories=getCategories();
?>
    <body>
    <div class="conteneur">
    <header>
        <h1> La Fleur</h1>
        <h3>Fleurs d'ornements pour jardins<h3>
    <?php 
    if (isset($_SESSION["utilisateurConnecter"])){
        echo '<p class="center">Utilisateur connecter : ' . $_SESSION["utilisateurConnecter"] . "</p>";
    }
    ?>
    </header>
    <nav class="menu">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="account.php">Mon Compte</a></li>
        </ul>
        <hr>
        <p> Nos produits :</p>
        <ul>
        <?php
        foreach ($categories as $categorie) {
            $lib = $categorie['cat_libelle'];
            $lien = "lesproduits.php?cat=".$categorie['cat_code']."&lib=".$lib;
            echo '<li><a href="' . $lien . '">' . $lib . '</a></li>';
        }
        echo '</ul>';
        echo '<hr>';
        if (isset($_SESSION["utilisateurConnecter"])){
            echo '<p><a href="logout.php">Se déconnecter</a></p>';
        }
        else {
            echo '<p><a href="signup.php">S inscrire</a></p>';
            echo '<p><a href="login.php">Se connecter</a></p>';
        }

    echo '</nav>';
?>
