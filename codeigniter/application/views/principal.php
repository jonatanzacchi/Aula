<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
		
        <title><?php echo $titulo; ?></title>
        <link href="<?php echo base_url(); ?>bootstrap-4/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>fontawesome-5/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>bootstrap-4/dataTables/jquery.dataTables.min.css" rel="stylesheet"/>
		
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>bootstrap-4/icone/icone.ico">
    </head>
    <body>


<script>
	function changeCSS(cssFile, cssLinkIndex) {
		var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);

		var newlink = document.createElement("link");
		newlink.setAttribute("rel", "stylesheet");
		newlink.setAttribute("type", "text/css");
		newlink.setAttribute("href", cssFile);

		document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
	}
</script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="<?php echo base_url().'pessoa'?>"><i class="fas fa-home fa-lg"></i></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url().'pessoa'?>">Cadastro</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url().'listar'?>">Lista</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url().'estado'?>">Estados</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url().'usuario'?>">Usuários</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url().'alterarSenha'?>">Alterar Senha</a>
			</li>       
		</ul>  
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Layout
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a href="#" onclick="changeCSS('bootstrap-4/css/bootstrap.min.css', 0);" class="dropdown-item">Claro</a>
					<div class="dropdown-divider"></div>
					<a href="#" onclick="changeCSS('bootstrap-4/css/bootstrap.min.dark.css', 0);" class="dropdown-item">Escuro</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url().'login/logout'?>"><i class="fas fa-sign-out-alt fa-lg"></i> Desconectar </a>
			</li>
			
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user fa-lg"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?php echo base_url().'alterarSenha'?>">Alterar Senha</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?php echo base_url().'login/logout'?>">Sair</a>
				</div>
			</li>
        </ul>
		
            
  </div>
</nav>
	
        <?php
			$this->load->view($pagina);
        ?>
		
    </body>

    <script src="<?php echo base_url(); ?>jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo base_url(); ?>popper.min.js"></script>
    <script src="<?php echo base_url(); ?>bootstrap-4/js/bootstrap.min.js"></script>

    <!-- Atente-se para a ordem: primeiro jquery, depois locastyle, depois o JS do Bootstrap. -->
    <script type="text/javascript" src="<?php echo base_url(); ?>locastyle.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap-4/dataTables/jquery.dataTables.min.js"></script>
	
	<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable();
		} );
	</script>
	

</html>