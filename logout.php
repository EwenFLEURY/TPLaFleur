<?php 
include 'header.php' ;
require_once 'menu.php' ;
if (isset($_SESSION["utilisateurConnecter"])){
    echo '<meta http-equiv="refresh" content="3;url=login.php" />';
    echo '<main class="page">';
    echo '  <br><h3>Vous avez bien été déconnecter</h3>';
    echo '</main>';
    session_destroy();
}
else {
    header("Location: login.php");
}
include 'piedpage.php' ;
?>

