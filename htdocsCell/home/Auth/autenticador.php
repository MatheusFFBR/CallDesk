<?php
//Verifica se a conexao esta autenticada, se nao estiver, retorna a conexao para a index.php
if (!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['usuario-autenticado'])){
    session_destroy();
    header('Location: ../../index.php');
    exit();
}
?>