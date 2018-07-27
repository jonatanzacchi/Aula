<?php
	
	@$idUsuario = $_SESSION['idUsuario'];
	@$usuario = $_SESSION['usuario'];
	
	if ((!isset($_SESSION['idUsuario']) == true) and (!isset ($_SESSION['usuario']) == true)) {
		unset($_SESSION['idUsuario']);
		unset($_SESSION['usuario']);
		header('location:login');
	}

    $userLogged = $_SESSION['usuario'];
    $x;
    foreach ($listaUsuario as $listaLogado) {
        if ($userLogged == $listaLogado -> usuario){
          $usuarioLogado=$listaLogado -> usuario;
          $idLogado = $listaLogado -> idUsuario;
          $statusLogado = $listaLogado -> status;
       }
    }
?>
	<div class="col-sm-9 col-sm-offset-3 col-md-12 col-md-offset-2 main">            
		<div id="container">
			<h1 align="center">Usuários</h1>
			<?php
				echo "Usuário: " . $userLogged;
			   ?>
			<hr>	
			<form action="<?php echo base_url() . 'usuario/editarSenha' ?>" name="formulario" method="post">
				<div class="row">
					<div id="container" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h5><i class="fas fa-address-card"></i> Cadastro de Usuários </h5>
						<hr>
					</div>
					<div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
						<label>ID:</label>
						<input type="text" name="idUsuario" id="idUsuario" readonly="yes" class="form-control" value="<?php echo $idLogado; ?>">
					</div>
					<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">			
						<label>Usuário:</label>
						<input type="text" name="usuario" id="usuario" readonly="yes" class="form-control" value="<?php echo $usuarioLogado; ?>" required>
					</div>
					<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<label>Senha:</label>
						<input type="password" name="senha" id="senha" class="form-control" required>
					</div>
					<div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
						<label>Status:</label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="status" id="status" value="1" <?php if($statusLogado == "Ativo"){echo "checked=\"checked\"";} ?>>
							<label class="form-check-label" for="status">Ativo</label>
						</div>
						<div class="form-check">
								<input class="form-check-input" type="radio" name="status" id="status" value="2" <?php if($statusLogado == "Não"){echo "checked=\"checked\"";} ?>>
								<label class="form-check-label" for="status">Desativado</label>
						</div>                            
					</div>                        
					<div class="form-group col-md-12" align="right">				
						<input type="submit" class="btn btn-success" value="Enviar">
					</div>			
				</div>
			</form>
		</div>
	</div>
<?php
    $this->load->view('footer');
?>