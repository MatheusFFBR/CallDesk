<?php
    include ("../../config/db_config.php");
    if(!isset($_SESSION)){
        session_start();
    }


    //Verifica se o campo está preenchido com algo
    if(empty($_POST['Filtro_filtro']) || empty($_POST['Filtro_campo'])){
        $_SESSION['post-vazio'] = 'filtro_vazio';
        header('Location: ../../ocorrencias.php');
        exit();
    }else{
        $post_filtro_value = $_POST['Filtro_Filtro']; //Qual filtro usar
        $post_filtro_campo = $_POST['Filtro_campo'];  //Valor do Filtro a ser pesquisado
    }



    //Conexão
    $conn = new mysqli($servername, $username, $password, $database);
    if($conn -> connect_error){
        die("Falha ao se conectar ao Banco de Dados: ".mysqli_connect_error());
        exit();
    }


    if(isset($post_filtro_campo)){
        $query = "";
        //Filtro por Cliente
        if($post_filtro_value == 4){
            $query = mysqli_query($conn, "SELECT * FROM ch_ocorrencias where cliente = '{$post_filtro_campo}'");
        }
        //Filtro por Data
        if($post_filtro_value == 6){

        }


        //Scrip Buscar
        if(mysqli_num_rows($query)<=0){
            $_SESSION['filtro_message'] = "filtro_vazio";
            header('Location: ../../ocorrencias.php');
        }else{
            $row = mysqli_fetch_assoc($query);
            $_SESSION['filtro_result'] = $row;
            echo $_SESSION['filtro_result'];
        }
    }
?>
