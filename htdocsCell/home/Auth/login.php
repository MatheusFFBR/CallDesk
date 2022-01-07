<?php
include ("../../config/db_config.php");
if (!isset($_SESSION)){
    session_start();
}

echo "Verificando Campos";

//VAI VERIFICAR SE O CAMPO USUARIO OU O CAMPO SENHA ESTÃO VAZIOS
//SE ESTIVER VAZIO VAI RETORNAR PARA A PARGINA INDEX.PHP
if(empty($_POST['user_post_name']) || empty($_POST['user_post_pass'])){
    $_SESSION['post-vazio'] = true; // CRIA UM SESSION QUE DEFINE O POST VAZIO PARA O INDEX.PHP
    header('Location: ../../index.php'); //RETORNA PARA A PAGINA INDEX.PHP
    exit();
}else{
    $post_user_name = $_POST['user_post_name'];
    $post_user_pass = $_POST['user_post_pass'];
}

//GUARDA O NOME DE USUARIO E SENHA DO POST


//Conexao
$conn = new mysqli($servername, $username, $password, $database);
if($conn -> connect_error){
    die("Falha ao se conectar no banco de dados: ".mysqli_connect_error());
    exit();
}
echo "Conectado com Sucesso!";



if(isset($post_user_pass)){
    $query = mysqli_query($conn,"SELECT * FROM user_account WHERE user_login = '{$post_user_name}' AND user_pass = '{$post_user_pass}'") or die ("erro ao selecionar");
    $query2 = mysqli_query($conn, "SELECT * FROM db_config");

    if(mysqli_num_rows($query2)>=1){
        $row2 = mysqli_fetch_assoc($query2);

        if($row2['login_active'] == 1){
            //Verified se o login esta ativo no banco de dados

            if (mysqli_num_rows($query)<=0){
                $_SESSION['nao-autenticado'] = true;
                header('Location: ../../index.php');
                die("Ocorreu um erro ao buscar o usuario no banco de dados, contate o Administrador do Sistema");
            }else{
                $row = mysqli_fetch_assoc($query);
                $_SESSION['user_account_login'] = $row['user_login'];
                $_SESSION['user_account_pass'] = $row['user_pass'];
                $_SESSION['usuario-autenticado'] = true;
                $_SESSION['user_account_id'] = $row['id'];
                $_SESSION['user_account_rank'] = $row['user_rank'];
                echo "Usuario:".$row['user_account_login'];
                header('Location: ../../ocorrencias.php');
                exit();
            }
        }
        else{
            $_SESSION['system_error'] = true;
            $_SESSION['system_error_message'] = "system_login_inativo_db";
            header('Location: ../../index.php');
        }
    }
    else{
        die("Não foi possivel obter o status do login no Banco de dados (db_config)\nContate o Administrador do Sistema!");
    }
}
