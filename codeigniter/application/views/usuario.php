<?php	
    if ((!isset($_SESSION['id']) == true) and (!isset ($_SESSION['user']) == true)) {
            unset($_SESSION['id']);
            unset($_SESSION['user']);
            header('location:login');
    }
    $idLogado = $_SESSION['id'];
?>

<script src="<?php echo base_url(); ?>bootstrap-4/js/personalizados/usuarios.js"></script>

    <div class="col-sm-9 col-sm-offset-3 col-md-12 col-md-offset-2 main">            
        <div id="container">
            <h1 align="center">Usuários</h1>
            <?php
                echo "Usuário: " . $idLogado;
            ?>
            <hr>	
            <form action="<?php echo base_url() . 'usuario/novo' ?>" name="formulario" method="post">
                <div class="row">
                    <div id="container" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h5><i class="fas fa-address-card"></i> Cadastro de Usuários </h5>
                        <hr>
                    </div>
                    <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <label>ID:</label>
                        <input type="text" name="id" id="id" readonly="yes" class="form-control" <?php echo (empty($id) ? "" : "readonly='yes'"); ?> value="<?php echo (!isset($id) ? "" : $id); ?>">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">			
                        <label>Usuário:</label>
                        <input type="text" name="usuario" id="usuario" class="form-control" <?php echo (empty($id) ? "" : "readonly='yes'"); ?> value="<?php echo (!isset($usuario) ? "" : $usuario); ?>" required>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label>Senha:</label>
                        <input type="password" name="senha" id="senha" class="form-control" <?php echo (empty($id) ? "" : "readonly='yes'"); ?> value="<?php echo (!isset($senha) ? "" : $senha); ?>" required>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label>Status:</label>
                        <select class="form-control" id="status" name ="status" required>
                            <option disabled selected>Selecione</option>
                            <option value="1" <?php if(!isset($status)){ echo "";}elseif($status == "1"){echo "selected";} ?>>Ativo</option>
                            <option value="2" <?php if(!isset($status)){ echo "";}elseif($status == "2"){echo "selected";} ?>>Desabilidado</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label>Data Ativação:</label>
                        <input type="text" name="dataativacao" id="dataativacao" class="form-control" value="<?php echo (!isset($dataativacao) ? "" : $dataativacao); ?>" required>
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label>Data Inativação:</label>
                            <input type="text" name="datainativacao" id="datainativacao" class="form-control" value="<?php echo (!isset($datainativacao) ? "" : $datainativacao); ?>">
                        </div>

                    <div class="form-group col-md-12" align="right">
                        <a href="<?php echo base_url(). 'usuario' ?>" class="btn btn-danger">Cancelar</a>
                        <input type="submit" class="btn btn-success" value="Enviar">
                    </div>			
                </div>
            </form>
            <?php
            if ($listaUsuario == NULL) {
                ?>
                <div class="alert alert-success" role="alert">
                    <span>Para incluir informações acesse a página inicial.</span>
                </div>
                <?php
            } else {
                ?>
                <div class="col-md-12">
                    <div class="card card-success">                        
                        <div class="card-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <td align=center class="success"> ID </td>
                                        <td align=center class="success"> Usuário </td>
                                        <td align=center class="success"> Status </td>
                                        <td align=center class="success"> Ações </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listaUsuario as $listaUsuario) {
                                        ?>
                                        <tr>
                                            <td align=center><?php echo $listaUsuario->id; ?> </td>
                                            <td align=center><?php echo $listaUsuario->user; ?> </td>
                                            <td align=center><?php echo $listaUsuario->dataativacao; ?> </td>
                                            <td align=center>
                                                <a href="<?php echo base_url() . "usuario/edit/$listaUsuario->id"?>"><button class="btn btn-success">Editar</button></a>
                                                <a href="<?php echo base_url() . "usuario/deleteUsuario?id=" . $listaUsuario->id ?>"><button class="btn btn-danger">Deletar</button></a>                                                
                                            </td>																		
                                        </tr>		
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>                           
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    $this->load->view('footer');
?>