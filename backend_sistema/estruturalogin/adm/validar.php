<?php
    session_start();
    if($_SESSION["permissao"] == 1){
        echo "Bem vindo! " . $_SESSION["CPF_usuario"];
    }else{
        header("Location: ../login.php");
    }
?>