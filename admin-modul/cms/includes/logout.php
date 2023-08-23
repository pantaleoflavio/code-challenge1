<?php ob_start(); ?>
<?php session_start(); ?>
<?php 
    $_SESSION['sub_email'] = null;
    $_SESSION['username'] = null;
    $_SESSION['user_role'] = null;
    $_SESSION['user_email'] = null;
    header("Location: http://localhost/code-challenge/admin-modul/cms/index.php");
?>
