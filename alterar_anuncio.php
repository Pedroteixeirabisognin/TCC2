<?php

session_start();
if(!isset($_SESSION['usuario'])){

	header('Location: index.php?erro=1');

}

//CHAMA A CLASSE BD.CLASS
require_once('php/db.class.php');

$objDb = new db();

$link = $objDb->conecta_mysql();


$sql = "select * from area";


$sql_resposta = mysqli_query($link,$sql);

$_SESSION['alterar'] = intval(isset($_GET['id']) ? $_GET['id'] : 0) ;
	//VARIAVEL PARA VERIFICAR SE O CADASTRO FOI OK
$cadastro = intval(isset($_SESSION['cadastro']) ? $_SESSION['cadastro'] : 0) ;
	//VARIÁVEL PARA VERIFICAR SE A URL ESTÁ CERTA
$valida_url = intval(isset($_SESSION['valida_url']) ? $_SESSION['valida_url'] : 0) ;




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
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="./js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
	<script src="./js/plugins/sortable.min.js" type="text/javascript"></script>
	<script src="./js/plugins/purify.min.js" type="text/javascript"></script>
	<script src="./js/fileinput.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="./themes/fa/theme.js"></script>
	<script src="./js/locales/<lang>.js"></script>	

			<script type="text/javascript">
			$(document).ready( function() {
			
				// initialize with defaults
				$("#arquivos").fileinput();

				// with plugin options
				$("#arquivos").fileinput({'showUpload':false, 'previewFileType':'any' });
				
			});
			</script>
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
				<a href="home.php"><img src="imagens/icone_invector.png" style="width: 50px; height: 50px;" /></a>
			</div>
			
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="home.php">Voltar para Home</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>


	<div class="container">
		
		<br /><br />

		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h3>Alterar anuncio</h3>
			<br />
			<!--FORM PARA CADASTRO DO ANUNCIO-->
			<form action="php/alterar_anuncio.php" id="form_anuncio" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="titulo">Título</label>
					<input type="text" class="form-control" id="titulo_id" name="titulo" placeholder="Insira um título..." required>
				</div>
				<div class="form-group">
					<label for="telefone">Telefone</label>
					<input type="tel" pattern="^\d{2} \d{5} \d{4}$" class="form-control" name="telefone" id="telefone_id" placeholder="Ex: xx xxxxx xxxx" required>
				</div>
				<div class="form-group">
					<label for="registro">Numero do registro</label>
					<input type="text" class="form-control" id="registro_id" name="registro" placeholder="Ex: BRXXXXXXXXX" required>
				</div>
				<div class="form-group">
					<label for="descricao">Descrição</label>
					<textarea class="form-control"  name="descricao" form="form_anuncio" required></textarea>
				</div>
				<div>
					<label>Área</label>
					
					<select class="form-control input-sm" name="area">
						
					<?php while($area = $sql_resposta->fetch_assoc()){ ?>
						<option value="<?php echo $area['id'];?>"><?php echo $area['nome'];?></option>
					<?php }?>						        
					</select>
		        </div>
				<div class="form-group">
				
					
						<div style="width: 400px; padding-left: 0;">
							<label class="control-label">Selecione o arquivo desejado:</label>
							<input id="arquivos" name="arquivos[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" >
						</div>
					
				
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" required> Estou de acordo com a divulgação desse anúncio.
					</label>
				</div>
				<button type="submit" class="btn btn-default">Enviar</button>
			</form>
			<!--VERIFICA SE FOI CADASTRADO CORRETAMENTE-->
			<?php if ($cadastro == 1){ $_SESSION['cadastro'] = 0;?>
			<span>Alterado com sucesso</span>
			<?php } ?>
			<!--VERIFICA SE NÃO FOI CADASTRADO CORRETAMENTE-->
			<?php if ($cadastro == 2){ $_SESSION['cadastro'] = 0;?>
			<span>Erro ao alterar anuncio</span>
			<?php } ?>
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