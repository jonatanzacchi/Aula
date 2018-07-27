<?php
	
	@$idUsuario = $_SESSION['idUsuario'];
	@$usuario = $_SESSION['usuario'];
	
	if ((!isset($_SESSION['idUsuario']) == true) and (!isset ($_SESSION['usuario']) == true)) {
		unset($_SESSION['idUsuario']);
		unset($_SESSION['usuario']);
		header('location:login');
	}
?>
<script>
	function mostraIdEstado(idEstado){
		alert(idEstado);
	}
</script>
	<div class="col-sm-9 col-sm-offset-3 col-md-12 col-md-offset-2 main">
		<div id="container">
			<h1 align="center">Formulário</h1>
			<hr>	
			<form action="<?php echo base_url() . 'pessoa/salvar' ?>" name="formulario" method="post">
				<div class="row">
					<div id="container" class="col-md-12">
						<h5><i class="fas fa-address-card"></i> Dados Pessoais </h5>
						<hr>
					</div>
					<div class="form-group col-md-6">			
						<label>Nome:</label>
						<input type="text" name="nome" id="nome" class="form-control" required>
					</div>
					<div class="form-group col-md-6">
						<label>Data de Nascimento:</label>
						<input type="date" name="dt_nasc" id="dt_nasc" class="form-control" required>
					</div>
					<div class="form-group col-md-6">
						<label>Documento:</label>
						<input type="text" name="documento" id="documento" class="form-control" placeholder="Ex.: 000.000.000-00" data-mask="000.000.000-00" maxlength="12" required>
					</div>
					<div class="form-group col-md-6">
						<label>Fone:</label>
						<input type="text" name="fone" id="fone" placeholder="Ex.: (00)00000-0000" data-mask="(99)99999-9999" class="form-control" required>
					</div>
					<div id="container" class="col-md-12">
						<h5><i class="fas fa-search-plus"></i> Dados Adicionais </h5>
						<hr>
					</div>			
					<div class="form-group col-md-6">
						<label>Endereço:</label>
						<input type="text" name="endereco" id="endereco" class="form-control" required>
					</div>
					<div class="form-group col-md-6">
						<label>Número:</label>
						<input type="text" name="numero" id="numero" class="form-control" required>
					</div>
					<div class="form-group col-md-6">
						<label>País:</label>
						<input type="text" name="pais" id="pais" class="form-control" required>
					</div>
					<div class="form-group col-md-4">
						<label>Cidade:</label>
						<input type="text" name="cidade" id="cidade" class="form-control" required>
					</div>
					<div class="form-group col-md-2">
						<label>UF:</label>
						<select class="form-control"  name ="uf" onchange='mostraIdEstado($(this).val())' required>
							<option value="" disabled selected>Selecione</option>
							<?php foreach ($listaestados as $listar){ ?>
								<option value="<?php echo $listar->idEstado ?>"><?php echo $listar->uf ?></option>
							<?php 
								}
							?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>E-Mail:</label>
						<input type="email" name="email" id="email" class="form-control" required>
					</div>			
					<div class="form-group col-md-12" align="right">				
						<input type="submit" class="btn btn-success" value="Enviar">
					</div>			
				</div>
			</form>
			<?php
			if ($lista == NULL) {
			?>
				<div class="alert alert-success" role="alert">
					<span>Para incluir informações acesse a página inicial.</span>
				</div>
			<?php
			} else {
			?>
				<div class="col-md-12">
					<div class="panel panel-success">                        
						<div class="panel-body">
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<td align=center class="success"> ID </td>
										<td align=center class="success"> Nome </td>
										<td align=center class="success"> Documento </td>
										<td align=center class="success"> Data de Nascimento </td>
										<td align=center class="success"> Ações </td>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($lista as $listar) {
										?>
										<tr>
											<td align=center><?php echo $listar->id ?> </td>
											<td align=center><?php echo $listar->nome ?> </td>
											<td align=center><?php echo $listar->documento ?> </td>
											<td align=center><?php echo $listar->data_nasc ?> </td>
											<?php
											echo "<td><a href='index.php/pessoa/deletedata?id=" . $listar->id . "'>Delete</a> ";
											?>																		
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