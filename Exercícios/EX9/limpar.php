<?php
    session_start();
    $_SESSION["alunos"]=null;
    session_destroy();
    header("location:index.php");
?>