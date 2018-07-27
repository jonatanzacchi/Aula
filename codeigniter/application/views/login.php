<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>bootstrap-4/icone/icone.ico">
        <title>Login</title>
        <link href="bootstrap-4/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="fontawesome-5/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet"/>
        <link href="bootstrap-4/css/formLogin.css" rel="stylesheet"/>

        <script src="jquery-3.3.1.slim.min.js"></script>
        <script src="popper.min.js"></script>
        <script src="bootstrap-4/js/bootstrap.min.js"></script>
    </head>
    <style>
        body{
            background: #f3f3f3;
            margin-top: 5%;
        }
    </style>
    <?php
        $dataativacao = date('d/m/y h:m:s');
    ?>

    <body>    
        <!--<center>-->
        <div class="container col-md-offset-4 col-lg-4 col-md-3 col-sm-12 col-xs-12 formLogin">
            <div class="row">
                <div class="card">
                    <div class="card-header"><span>Login</span></div>
                    <div class="card-body">
                        <form action="<?php echo base_url() . 'login/logarUsuario' ?>" method="post">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Usuário</span>
                                </div>
                                <input id="usuario" type="text" class="form-control" name="usuario" value="" placeholder="Usuário">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Senha</span>
                                </div>
                                <input id="senha" type="password" class="form-control" name="senha" placeholder="Senha">
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <div>
                            <a href="<?php echo base_url() . 'usuario' ?>">Cadastre-se</a>
                        </div>
                        <span>Curso Web 2018 ©</span>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        Novo Usuário
                    </button>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Cadastro de Usuário</h4>
                            <button type="button" class="close" data-dismiss="modal">X</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="<?php echo base_url() . 'usuario/novo' ?>" name="formulario" method="post">
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">			
                                        <label>Usuário:</label>
                                        <input type="text" name="usuario" id="usuario" class="form-control" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <label>Senha:</label>
                                        <input type="password" name="senha" id="senha" class="form-control" required>
                                    </div>
                                    <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                        <label>Status:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status" value="1" checked>
                                            <label class="form-check-label" for="status">Ativo</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="status" value="2">
                                            <label class="form-check-label" for="status">Desativado</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <label>Data Ativação:</label>
                                        <input type="datetime" name="dataativacao" id="dataativacao" readonly class="form-control" value="<?php echo $dataativacao ?>" required>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <label>Data Inativação:</label>
                                        <input type="datetime-local" name="datainativacao" id="datainativacao" class="form-control" value="" required>
                                    </div>

                                    <div class="form-group col-md-12" align="right">				
                                        <input type="submit" class="btn btn-success" value="Enviar">
                                    </div>			
                                </div>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>  
        </div>           

        <!--</center>-->
    </body> 
</html>