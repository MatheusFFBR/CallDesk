<?php
include ("home/auth/autenticador.php");
if (!isset($_SESSION)){
    session_start();
}
?>
<html>
<head>
    <title>Painel Administrativo</title>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href=""/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/admin_panel_css.css" type="text/css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

</head>
<body id="corpo-geral">

<!-- Navbar Superior -->
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar-fundo">
        <a class="navbar-brand" href="home.php" id="navbar-title">CallDesk</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#"                    style="font-size: 14px;color: #e7e7e7;"   >Home</a>
                <a class="nav-item nav-link active" href="ocorrencias.php"             style="font-size: 14px;color: #e7e7e7;"   >Ocorrencias</a>
            </div>

            <div id="menu_superior_direito" style="text-align: right;">

                <a class="nav-item nav-link" href="" style="font-size: 14px; color: white;display: inline-block;">Painel Admin</a>
                <!-- Cria o botao de Sair -->
                <a class="nav-item nav-link" href="home/Auth/logout.php" style="font-size: 14px; color: #e7e7e7;display: inline-block;">Sair</a>
            </div>
        </div>
    </nav>



    <!-- Painel Admin -->
    <div>
        <div class="row" style="margin: 0px;margin-top: 10px;height: 90%;">

            <!-- Menu Lateral-->
            <div class="col-2" id="menu_lateral_box" style="height: 100%;">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Pagina Inicial</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Cadastro de Clientes</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Cadastro de Usuarios</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Configurações do Sistema</a>
                </div>
            </div>



            <!-- Conteudo aberto pelos botoes do menu lateral -->
            <div class="col-sm" id="conteudo_direito_box" style="background-color: white;padding:0px; margin-right: 10px;">
                
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">Pagina Inicial</div>


                    <!-- Cadastro de Clientes -->
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <!-- Cabeçalho da Pagina -->
                        <div id="Cabecalho_pagina_clientes">
                            <!-- Botoes-->
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="width: 350px;margin-left: auto;margin-right: auto;">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="color: white;">Lista de Clientes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="color: white;">Cadastrar Novo Cliente</a>
                                        </li>
                                </ul>
                        </div>

                        <!-- Conteudo Modal -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                        </div>
                    </div>


                    <!-- Cadastro de Usuarios -->
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <!-- Cabeçalho da Pagina -->
                        <div id="Cabecalho_pagina_clientes">
                            <!-- Botoes-->
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="width: 350px;margin-left: auto;margin-right: auto;">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="color: white;">Lista de Clientes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="color: white;">Cadastrar Novo Cliente</a>
                                        </li>
                                </ul>
                        </div>

                        <!-- Conteudo Modal -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                        </div>
                    </div>


                    <!-- Configurações do Sistema -->
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                        <!-- Cabeçalho da Pagina -->
                        <div id="Cabecalho_pagina_clientes">
                            <!-- Botoes-->
                                <h1 class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="width: 350px;margin-left: auto;margin-right: auto;color: white;">Configurações</h1>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>



























    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>
