<?php
    //Destroi a sessão do usuario, retornando a conexao para o inicio
if (!isset($_SESSION)){
    session_start();
}
    unset($_SESSION['usuario-autenticado']);
    session_destroy();
    header('Location: ../../index.php');
    exit();


    //Matheus F ;( 10/08/2021//
    //https://www.youtube.com/watch?v=PaXKf0JEzEA&ab_channel=Rousseau
    //Yann Tiersen - Comptine d'un autre été (Amélie) <3
?>

