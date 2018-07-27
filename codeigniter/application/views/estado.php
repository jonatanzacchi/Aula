<?php
	
	@$idUsuario = $_SESSION['idUsuario'];
	@$usuario = $_SESSION['usuario'];
	
	if ((!isset($_SESSION['idUsuario']) == true) and (!isset ($_SESSION['usuario']) == true)) {
		unset($_SESSION['idUsuario']);
		unset($_SESSION['usuario']);
		header('location:login');
	}
?>
	<div class="col-sm-9 col-sm-offset-3 col-md-12 col-md-offset-2 main">            
		<div id="container">
			<h1 align="center">Estados</h1>
			<hr>	
			<form action="<?php echo base_url() . 'estado/editar' ?>" name="formulario" method="post">
				<div class="row">
					<div id="container" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h5><i class="fas fa-address-card"></i> Cadastro de Estados </h5>
						<hr>
					</div>
					<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<label>ID:</label>
						<input type="text" name="idEstado" id="idEstado" class="form-control" value="<?php echo (!isset($idEstado) ? "" : $idEstado); ?>">
					</div>
					<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">			
						<label>UF:</label>
						<input type="text" maxlength="2" name="uf" id="uf" class="form-control" value="<?php echo (!isset($uf) ? "" : $uf); ?>" required>
					</div>
					<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<label>Nome:</label>
						<input type="text" name="nomeEstado" id="nomeEstado" class="form-control" value="<?php echo (!isset($nomeEstado) ? "" : $nomeEstado); ?>" required>
					</div>			
					<div class="form-group col-md-12" align="right">				
						<input type="submit" class="btn btn-success" value="Enviar">
					</div>			
				</div>
			</form>
			<?php
			if ($listaEstado == NULL) {
				?>
				<div class="alert alert-success" role="alert">
					Para incluir informações acesse a página inicial.
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
										<td align=center class="success"> UF </td>
										<td align=center class="success"> Estado </td>
										<td align=center class="success"> Ações </td>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($listaEstado as $listarEstado) {
										?>
										<tr>
											<td align=center><?php echo $listarEstado->idEstado ?> </td>
											<td align=center><?php echo $listarEstado->uf ?> </td>
											<td align=center><?php echo $listarEstado->nomeEstado ?> </td>
											<td align=center>
												<a href="<?php echo base_url() . "estado/edit/$listarEstado->idEstado"?>"><button class="btn btn-success">Editar</button></a>
												<a href="<?php echo base_url() . "estado/deleteEstado?idEstado=" . $listarEstado->idEstado ?>"><button class="btn btn-danger">Deletar</button></a>
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