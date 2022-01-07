<?php
include ("home/auth/autenticador.php");
if (!isset($_SESSION)){
    session_start();
}
?>

<html>
<head>
    <title>CallDesk - Registros Telefonicos</title>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href=""/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/ocorrencias_css.css" type="text/css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

</head>
<body id="corpo-geral" onload="salvar_ocorrencia()">

<!-- Navbar Superior -->
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar-fundo">
        <a class="navbar-brand" href="home.php" id="navbar-title">CallDesk</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#"                    style="font-size: 14px;"   >Home</a>
                <a class="nav-item nav-link active" href="#"             style="font-size: 14px;"   >Ocorrencias<span class="sr-only">(current)</span></a>
            </div>
            <div id="menu_superior_direito" style="text-align: right;">

                <!-- Cria o menu do Painel do Administrador -->
                <script>
                    //Verifica se o usuario é um Administrador e habilita o Painel de Admin
                    var rank1 = '<?php echo $_SESSION["user_account_rank"];?>';
                    rank1 = admin_panel_verify(rank1);
                    if(rank1 == true){
                       document.write('<a class="nav-item nav-link" href="admin_panel.php" style="font-size: 14px; color: #e7e7e7;display: inline-block;">Painel Admin</a>');
                    }                       
                </script>
                <!-- Cria o botao de Sair -->
                <a class="nav-item nav-link" href="home/Auth/logout.php" style="font-size: 14px; color: #e7e7e7;display: inline-block;">Sair</a>
            </div>
        </div>
    </nav>





 


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>
