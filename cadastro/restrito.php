<?php 
    session_start();
    unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email']);

    $_SESSION['msg'] = "Área Restrita";
    header("Location: ../inicio.php");
?>