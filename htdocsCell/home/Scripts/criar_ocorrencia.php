<?php
include ("../../config/db_config.php");
if (!isset($_SESSION)){
    session_start();
}


// Script responsavel por criar uma nova Ocorrencia

if(empty($_POST['Input_cliente']) || empty($_POST['Input_titulo']) || empty($_POST['Input_importancia']) || empty($_POST['Input_status']) || empty($_POST['Input_obs'])){
    $_SESSION['post-vazio'] = true;
    header('Location: ../../ocorrencias.php');
    exit();
    echo "Post Vazio";
}
else{
    date_default_timezone_set('America/Sao_Paulo');

    $post_Input_cliente = $_POST['Input_cliente'];
    $post_Input_titulo = $_POST['Input_titulo'];
    $post_Input_importancia = $_POST['Input_importancia'];
    $post_input_status = $_POST['Input_status'];
    $post_input_obs = $_POST['Input_obs'];
    $Session_dono = $_SESSION['user_account_id'];
    $sistem_hora = date('h:i:s');
    $sistem_data = date('d/m/Y');

    
    //echo $post_Input_cliente;
    //echo $post_Input_titulo;
    //echo $post_Input_importancia;
    //echo $post_input_status;
    //echo $post_input_obs;


    $conn = new mysqli($servername, $username, $password, $database);
    $query = mysqli_query($conn, "
    INSERT INTO ch_ocorrencias (
        titulo,
        descricao,
        importancia,
        criado_por,
        cliente,
        status,
        data,
        hora)
        VALUE (
            '$post_Input_titulo',
            '$post_Input_obs',
            '$post_Input_importancia',
            '$Session_dono',
            '$post_Input_cliente',
            '$post_input_status',
            '$sistem_data',
            '$sistem_hora')
            
    ");
    $_SESSION['sql_mensagem'] = "Cadastrado com Sucesso!";
    header('Location: ../../ocorrencias.php');  
}






?>