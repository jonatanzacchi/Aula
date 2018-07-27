<?php
	if ((!isset($_SESSION['idUsuario']) == true) and (!isset ($_SESSION['usuario']) == true)) {
            unset($_SESSION['idUsuario']);
            unset($_SESSION['usuario']);
            header('location:login');
    }
	
	@$idLogado = $_SESSION['idUsuario'];
	@$saldoLogado = $_SESSION['saldo'];
?>
<script language="JavaScript">
    function validaRadio() {
            if(document.formulario.saldo.value < 0){
                    alert('Movimentação cancelada por falta de saldo.');
                    return false;
            }
			if(document.formulario.saldoLogado.value < 0){
                    alert('Movimentação cancelada por falta de saldo.');
                    return false;
            }
			if(document.formulario.idUsuario.value == document.formulario.idLogado.value){
                    alert('Você não pode ser feita para o mesmo usuário.');
                    return false;
            }
            return true;
    }
</script>
<div class="col-sm-9 col-sm-offset-3 col-md-12 col-md-offset-2 main">            
    <div id="container">
        <h1 align="center">Saldo</h1>
        <hr>
		<?php
			echo "Saldo Logado: " . $saldoLogado;
		?>	
		

        <form method="post">
            <div class="row">                        
                <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <label>Valor da Movimentação:</label>
                    <input type="text" name="valor" id="valor" class="form-control"/>
                </div>
                <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <label>Saldo Atual:</label>
                    <input type="text" name="saldoAtual" id="saldoAtual" readonly="yes" class="form-control" value="<?php echo $saldo ?>"/>
                </div>    
                <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <label>Status:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="+">
                        <label class="form-check-label" for="status">Depósito</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="-">
                        <label class="form-check-label" for="status">Saque</label>
                    </div>
					<div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="status" value="+-">
                        <label class="form-check-label" for="status">Transferência</label>
                    </div>
                </div>
                <div class="form-group col-md-12" align="right">
                    <input type="submit" class="btn btn-success" value="Enviar">
                </div>                        
            </div>                    
        </form>

        <?php
            @$valor = $_POST['valor'];
            @$status = $_POST['status'];                    

            if($status == "+"){
                $valorTotal = $saldo + $valor;
                echo "Total: " . $valorTotal;
            }else if($status == "-"){    
                $valorTotal = $saldo - $valor;
                echo "Total: " . $valorTotal;
            }else if($status == "+-"){
				//Recebe Saldo
                $valorTotal = $saldo + $valor;
				
				//Logado
				$valorTotalLogado = $saldoLogado - $valor;
                echo "Total: " . $valorTotal;
				echo "Total Logado: " . $valorTotalLogado;
            }
			
        ?>

        <form action="<?php echo base_url() . 'usuario/atualizarSaldo' ?>" name="formulario" onSubmit="return validaRadio();" name="formulario" method="post">				
            <div class="row">
                <div id="container" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h5><i class="fas fa-address-card"></i> Cadastro de Usuários </h5>
                    <hr>
                </div>
                <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <label>ID:</label>
                    <input type="text" name="idUsuario" id="idUsuario" readonly="yes" class="form-control" <?php echo (empty($idUsuario) ? "" : "readonly='yes'"); ?> value="<?php echo (!isset($idUsuario) ? "" : $idUsuario); ?>">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">			
                    <label>Usuário:</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" <?php echo (empty($idUsuario) ? "" : "readonly='yes'"); ?> value="<?php echo (!isset($usuario) ? "" : $usuario); ?>" required>
                </div>                   
                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <label>Saldo:</label>
                    <input type="text" name="saldo" id="saldo" class="form-control" value="<?php echo (!isset($valorTotal) ? "" : $valorTotal); ?>" required>
                </div>
				<?php
					if($status == "+-"){
						
				?>
				<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <label>ID Logado:</label>
                    <input type="text" name="idLogado" id="idLogado" class="form-control" value="<?php echo (!isset($idLogado) ? "" : $idLogado); ?>" required>
                </div>
				<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <label>Saldo Logado:</label>
                    <input type="text" name="saldoLogado" id="saldoLogado" class="form-control" value="<?php echo (!isset($valorTotalLogado) ? "" : $valorTotalLogado); ?>" required>
                </div>
				<?php
					}
				?>
                <div class="form-group col-md-12" align="right">
                    <a href="<?php echo base_url(). 'usuario' ?>" class="btn btn-danger">Cancelar</a>
                    <input type="submit" class="btn btn-success" value="Enviar">
                </div>
            </div>
        </form>
    </div>	
</div>