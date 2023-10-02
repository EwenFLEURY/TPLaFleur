<?php
    function getConnection() {
        try {
            $connexion = new PDO("mysql:host=localhost;dbname=lafleur;charset=utf8", 'utilfleur', 'secret');
        }
        catch(PDOException $e)
            {
            die($e->getMessage());
            }
        return $connexion ;
    }

    function getCategories() {
        $connexion = getConnection();
        $stm = $connexion->query("SELECT cat_code, cat_libelle FROM categorie");
        $categories=$stm->fetchAll();
        return $categories ;
    }

    function getProduits($cat) {
        $connexion = getConnection();
        $stm = $connexion->prepare("SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image
                                    FROM produit where pdt_categorie = :cat");
        $stm->bindParam(':cat', $cat, PDO::PARAM_INT);
        $stm->execute();
        $produits=$stm->fetchAll();
        return $produits ;

    }

    function getTousProduits() {
        $connexion = getConnection();
        $stm = $connexion->query("SELECT pdt_ref, pdt_designation, pdt_prix, pdt_image FROM produit");
        $produits=$stm->fetchAll();
        return $produits ;

    }

    function setUtilisateur($nom, $prenom, $email, $password) {
        $pdo = getConnection();
        $sql = "INSERT INTO utilisateurs (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    }

    function getUtilisateur($email, $password) {
        $pdo = getConnection();
        $sql = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $resultat = $stmt->fetch();
        if ($resultat) {
            if (!password_verify($password, $resultat["password"])){
                $resultat = [];
            }
        }
        return $resultat;
    }

    function modifyUtilisateur($arguments){
        $email = $_SESSION["email"];
        $password = $arguments["passwordVerif"];
        $row = getUtilisateur($email, $password);
        if ($row){
            $nom = $row["nom"];
            $prenom = $row["prenom"];
            $email = $row["email"];
            $password = $row["password"];
            $ancienpassword = $row["password"];
            if (!empty($arguments["nom"])) {
                $nom = htmlspecialchars($arguments["nom"]);
            }
            if (!empty($arguments["prenom"])) {
                $prenom = htmlspecialchars($arguments["prenom"]);
            }
            if (!empty($arguments["email"])) {
                $email = htmlspecialchars($arguments["email"]);
            }
            if (!empty($arguments["password"])) {
                $password = password_hash($arguments["password"], PASSWORD_BCRYPT);
            }
            $pdo = getConnection();
            $sql = "UPDATE table SET nom = :nom, prenom = :prenom, email = :email, password = :password WHERE email = :ancienmail AND password = :ancienmotdepasse";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':ancienmail', $_SESSION["email"]);
            $stmt->bindParam(':ancienmotdepasse', $ancienpassword);
            $stmt->execute();
            return true;
        }
        else {
            return false;
        }
    }
