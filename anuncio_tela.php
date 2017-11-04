<?php
	
	session_start();
	if(!isset($_SESSION['usuario'])){

		header('Location: index.php?erro=1');

	}	

	$id = $_SESSION['id'];
	$id_usuario = $_SESSION['id_usuario'];
	$titulo = $_SESSION['titulo'];
	$descricao = $_SESSION['descricao'];
	$telefone = $_SESSION['telefone'];
	$registro = $_SESSION['registro'];
	$data_inclusao = $_SESSION['data_inclusao'];
	$imagem = $_SESSION['imagem'];
	//VARIAVEL PARA VERIFICAR SE O CADASTRO FOI OK
	$cadastro = intval(isset($_SESSION['cadastro']) ? $_SESSION['cadastro'] : 0) ;
?>


<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Invector</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="imagens/icone_invector.png" style="width: 50px; height: 50px;" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="index.php">Voltar para Home</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<br /><br />

	    	<div class="col-md-4"></div>
	    	<div class="col-md-4">
	    	




	    	Numero do anúncio: <?php echo $id;?>
			<br>
			Id do usuário: <?php echo $id_usuario;?>
			<br>
			Título: <?php echo $titulo;?>
			<br>
			Descrição: <?php echo $descricao;?>
			<br>
			Telefone: <?php echo $telefone;?>
			<br>
			Registro: <?php echo $registro;?>
			<br>
			Data da postagem: <?php echo $data_inclusao;?>
			<br>
			<img src="<?php echo $imagem;?>">
			
			</div>
			<div class="col-md-4"></div>

			<div class="clearfix"></div>
			<br />
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>

		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>