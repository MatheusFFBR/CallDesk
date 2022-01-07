<?php
include ("home/auth/autenticador.php");
if (!isset($_SESSION)){
    session_start();
}
?>

<html>
<head>
    <title>CallDesk - Ocorrencias</title>

    <meta charset="UTF-8">
    <link rel="shortcut icon" href=""/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/ocorrencias_css.css" type="text/css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <script src="home/Scripts/ocorrencias.js""></script>


    <script>
        //Quando salva uma ocorrencia mostra um modal
        //alert('<?php echo $_SESSION["sql_mensagem"]; ?>');
        function salvar_ocorrencia(){
            if('<?php echo $_SESSION["sql_mensagem"]; ?>' == "Cadastrado com Sucesso!"){
                alert("Ocorrencia criada com Sucesso!");               
            }         
        }
    </script>

</head>
<body id="corpo-geral" onload="salvar_ocorrencia()">

    <!-- Deleta a Session utilizada no JavaScript acima -->
    <?php 
     unset($_SESSION['sql_mensagem']);
    ?>

    <!--
    <script language="javascript" type="text/javascript">
        //Verifica se o usuario é um Administrador e habilita o Painel de Admin
        var rank1 = '<?php echo $_SESSION["user_account_rank"];?>';
        rank1 = admin_panel_verify(rank1);
    </script>
-->


<!-- Navbar Superior -->
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar-fundo">
        <a class="navbar-brand" href="home.php" id="navbar-title">CallDesk</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <!-- ITENS DO MENU PRINCIPAL -->
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#"                    style="font-size: 14px;"   >Home</a>              
                <!-- MENU DROPDOWN-->
                <div class="dropdown">
                    <a class="nav-item nav-link active" href="#"  type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 14px;">Chamados<span class="sr-only">(current)</span></a>
                    <!--<button class="btn btn-secondary " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"    style="background: none;border: none;color: white;font-size: 14px;";>
                        Chamados
                    </button>-->
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="ocorrencias.php" style="font-size: 14px;">Chamados via Fone</a></li>
                    </ul>
                </div>




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





    <!-- Lista de Ocorrencias -->
    <div>
        <!-- Cabeçalho Inferior -->
        <div id="quadro-superior" style="display: flex;">

            <!-- Botao criar ocorrencia -->
            <div>
                <button id="campo_botao_criar_ocorrencia" data-toggle="modal" data-target=".bd-example-modal-lg" type="button" class="btn btn btn-primary" style="display: block;height: 38px;"   onclick="buscar_ocorrencia()">Criar Ocorrencia</button>
            </div>




            <!-- Campo de busca | Filtro -->
            <div id="campo_busca_box" ">
                <div class="input-group mb-3" id="campo_busca">
                    <div class="input-group-prepend">
                        <!-- Botão Dropdown -->
                        <select class="custom-select bordas" id="inputGroupSelect01" name="filtro_filtro">
                            <option value="null" selected>Filtro</option>
                            <option value="1">Codigo</option>
                            <option value="2">Importancia</option>
                            <option value="3">Titulo</option>
                            <option value="4">Cliente</option>
                            <option value="5">Aberto por</option>
                            <option value="6">Data</option>
                        </select>
                    </div>
                    <input type="text" class="form-control bordas" aria-label="Text input with dropdown button" id="campo_filtro" name="Filtro_campo" >
                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="filtro_js()">Pesquisar</button>
                </div>
            </div>
        </div>

        <!-- Quadro Tabela -->
        <div id="quadro-tabela">
            <!-- Tabela -->
            <div id="tabela">
                <table class="table table-sm" id="tabela-lay" style="color: #656262;">
                    <thead class="thead-forma">
                    <tr class="tr-forma">
                        <th class="tr-forma" scope="col" style="width: 10px;"   >Codigo</th>
                        <th class="tr-forma" scope="col" style="width: 25px;"   >Importancia</th>
                        <th class="tr-forma" scope="col" style="width:  40%;"    >Titulo</th>
                        <th class="tr-forma" scope="col" style="width: 30px;"   >Cliente</th>
                        <th class="tr-forma" scope="col" style="width: 30px;"   >Status</th>
                        <th class="tr-forma" scope="col" style="width: 30px;"   >Aberto Por</th>
                        <th class="tr-forma" scope="col" style="width: 20px;"   >Data</th>
                        <th class="tr-forma" scope="col" style="width: 20px;"   >Hora</th>
                        <th class="tr-forma" scope="col" style="width: 35px;"   >Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        <div>
                            <?php
                            include "config/db_config.php";
                            $conn = new mysqli($servername, $username, $password, $database);
                            $query = mysqli_query($conn, "SELECT * FROM ch_ocorrencias order by codigo desc");
                            $limite = 25; //Limite de itens na pagina principal
                            if(mysqli_num_rows($query)<=0){
                                echo "<br><strong>Nenhum resultado encontrado</strong>";
                            }else{
                                while ($row = mysqli_fetch_assoc($query) and $limite != 0){
                                    $limite = $limite - 1;
                                    echo '
                                <tr class="td-forma" id="row-tabela">
                                <td>'.$row["codigo"].'</td>
                                <td>'.$row["importancia"].'</td>
                                <td>'.$row["titulo"].'</td>
                                <td>'.$row["cliente"].'</td>
                                <td>'.$row["status"].'</td>
                                <td>'.$row["criado_por"].'</td>
                                <td>'.$row["data"].'</td>
                                <td>'.$row["hora"].'</td>
                                <td>                         
                                <div style="display: inline-block;" ><i class="bi bi-eye-fill"></i></div>                     <!-- Botão Visualizar -->
                                <div style="display: inline-block;" ><i class="bi bi-pencil-fill"></i></div>                  <!-- Botão Editar -->
                                <div style="display: inline-block;" ><i class="bi bi-trash-fill"></i></div>                   <!-- Botão Exluir -->        
                                </td>
                                
                                
                                
                                ';
                                }
                            }
                            ?>
                        </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>









    <!-- MODAL CRIAR OCORRENCIA -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div id="box_modal" class="modal-content">

                <!-- Cabeçalho do Modal -->
                <div id="box_cabecalho_modal">
                    <h6 id="titulo_modal">Criar Ocorrencia</h6>
                    <!-- Conteudo Modal -->
                    <div>
                        <!-- Botoes-->
                        <!--
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="margin-left: 41%">
                            <li class="nav-item botao_modal_menu">
                                <a style="color: white;"    class="nav-link btn-sm active btn-outline-success" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Dados</a>
                            </li>
                            <li class="nav-item botao_modal_menu">
                                <a style="color: white;"    class="nav-link btn-sm btn-outline-success" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Observações</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <form>
                                    <div class="form-row" style="">
                                    -->

                                        <!-- Botão Cliente -->
                        <!--
                                        <div class="col-2" style="margin-left: 16px;margin-right: 4px;">
                                            <select id="inputState" class="form-control" style="width: 150px;">
                                                <option selected>Cliente</option>
                                                <option>GSAT</option>
                                                <option>JBS</option>
                                                <option>Rodomeu</option>
                                            </select>
                                        </div>
                                        -->

                                        <!-- Botão Titulo -->
                                        <!--
                                        <div class="col-7" style="margin-left: 4px;margin-right: 4px; width: 100%;">
                                            <input type="text" class="form-control" placeholder="Titulo">
                                        </div>
                                        -->

                                        <!-- Botão Importancia -->
                                        <!--
                                        <div class="col" style="margin-right: 8px;">
                                            <select id="inputState" class="form-control" style="width: 150px;">
                                                <option selected>Importancia</option>
                                                <option>Critico</option>
                                                <option>Importante</option>
                                                <option>Normal</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                        </div>
                        -->
                    </div> <!-- CODIGO COM MODAL DESATIVADO | PRONTO -->



                    <!-- Modal -->
                    <div>
                        <form action="home/Scripts/criar_ocorrencia.php" method="post">
                            <div class="form-row" style="margin-top: 30px;">

                                <!-- Botão Cliente -->
                                <div class="col-2" style="margin-left: 16px;margin-right: 4px;">
                                    <select id="Input_cliente" class="form-control" style="width: 150px;" name="Input_cliente">
                                        <option selected>Cliente</option>        
                                        <?php
                                        include "config/db_config.php";
                                        $conn = new mysqli($servername, $username, $password, $database);
                                        $query = mysqli_query($conn, "SELECT nome FROM ch_clientes");
                                        if(mysqli_num_rows($query)<=0){
                                            echo "<br><strong>Nenhum resultado encontrado</strong>";
                                        }else{
                                            while ($row = mysqli_fetch_assoc($query)){
                                                echo '
                                                    <option>'.$row["nome"].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div> 

                                <!-- Botão Titulo -->
                                <div class="col-9" style="margin-left: 4px;margin-right: 4px; width: 100%;">
                                    <input type="text" class="form-control" placeholder="Titulo" id="Input_titulo" name="Input_titulo">
                                </div>
                            </div>


                            <div class="form-row" style="margin-top: 10px;">

                                <!-- Botão Importancia -->
                                <div class="col-2" style="margin-left: 16px;margin-right: 4px;">
                                    <select id="Input_importancia" class="form-control" style="width: 150px;" name="Input_importancia">
                                        <option selected>Importancia</option>
                                        <option>Critico</option>
                                        <option>Importante</option>
                                        <option>Normal</option>
                                    </select>
                                </div>

                                <!-- Botão Status -->
                                <div class="col-2" style="margin-left: 4px;margin-right: 4px;">
                                    <select id="input_status" class="form-control" style="width: 150px;" name="Input_status">
                                        <option selected>Status</option>
                                        <option>Finalizado</option>
                                        <option>Em Tratativa</option>
                                    </select>
                                </div>
                            </div>


                            <!-- Campo Observações -->                       
                            <div class="form-row" style="margin-top: 15px;">
                                <div class="col" style="margin-left: 16px;margin-right: 16px;">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Observações</label>
                                        <textarea name="Input_obs" class="form-control" id="input_obs" rows="3" style="max-height: 238px;min-height: 238;height: 238px;"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Botão Salvar -->
                            <div class="form-row" style="margin-top: 5px;width: 100%;align-self: end;">
                                <div class="col" style="width: 100%;">
                                    <button type="submit" class="btn btn-sm btn-primary" style="margin-left: 48%;">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Tratativas de Erros -->
<!-- Verifica se o cadastro foi realizado com sucesso -->
<!--
<?php
    if(isset($_SESSION['sql_mensagem'])):
        ?>
        <div>
            <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>
        </div>
    <?php
    unset($_SESSION['cadastro-sucesso']);
    endif;
?>


    -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>
