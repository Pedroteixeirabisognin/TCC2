<?php

session_start();
if(!isset($_SESSION['usuario'])){

	header('Location: index.php?erro=1');

}	

	//CHAMA A CLASSE BD.CLASS
require_once('db.class.php');

	 //VIA POST OS DADOS NÃO FICAM EXPOSTOS NA URL, VIA GET SIM


$usuario = isset( $_SESSION['usuario'])? $_SESSION['usuario'] : 0; 
$titulo = isset( $_POST['titulo'])? $_POST['titulo'] : 0; 
$telefone = isset( $_POST['telefone'])? $_POST['telefone'] : 0; 
$registro = isset( $_POST['registro'])? $_POST['registro'] : 0; 
$descricao = isset( $_POST['descricao'])? $_POST['descricao'] : 0; 
$area = isset( $_POST['area'])? $_POST['area'] : 0; 
$id = isset( $_SESSION['id'])? $_SESSION['id'] : 0;

//IMAGENS

$total_arquivos = count($_FILES['arquivos']['name']);
	
	if ($total_arquivos > 1) {
		echo("Total de arquivos exedido!!");
	}
	else{
	//diretório de upload
	$diretorio_upload = 'uploads/';

	//percorre cada arquivo
	for ($i=0; $i < $total_arquivos; $i++) {
				
		/* DESCOMENTAR PARA DEBUG
		echo $_FILES['arquivos']['name'][$i].' - ';
		echo $_FILES['arquivos']['type'][$i].' - ';
		echo $_FILES['arquivos']['tmp_name'][$i].' - ';
		echo $_FILES['arquivos']['error'][$i].' - ';
		echo $_FILES['arquivos']['size'][$i];
		echo '<hr />';
		*/
		
		
		//move o arquivo temporario para o destino e muda o nome do arquivo pra ter um hash na frente
		$arquivo_upload = $diretorio_upload .md5(time()).basename($_FILES['arquivos']['name'][$i]);
		echo $arquivo_upload;

	
		if (move_uploaded_file($_FILES['arquivos']['tmp_name'][$i], $arquivo_upload)) {


		} else {
			echo "Erro<br />";
		}
    
	}

	}


$id_anuncio = isset( $_SESSION['alterar'])? $_SESSION['alterar'] : 0;

//TESTE DA VARIÁVEL
echo $id_anuncio;



$objDb = new db();

$link = $objDb->conecta_mysql();





	 // QUERY SQL (NOTA: QUANDO SE UTILIZA ASPAS DUPLAS " O PHP JÁ TENTA ENCONTRAR ALGUMA VARIÁVEL NO MEIO E TENTA ATRIBUIR O VALOR REFERENTE A ELA AO EXECUTAR A STRING)
if ($titulo != FALSE and $telefone != FALSE and $registro != FALSE and $descricao != FALSE and $id != FALSE) {
		# code...
	
	$sql = "UPDATE `anuncio_patente` SET `id_area`= '$area',`titulo`='$titulo',`descricao`='$descricao',`telefone`='$telefone',`num_registro`='$registro',`imagem`='$arquivo_upload' WHERE id = '$id_anuncio' and id_conta = '$id'";

	echo $sql;
	 //EXECUTAR A QUERY (NOTA: A FUNÇÃO MYSQLI_QUERY QUANDO DA ERRO RETORNA VALOR FALSE)
	if(mysqli_query($link,$sql)){

		$_SESSION['cadastro'] = 1; 
		header("Location: ../alterar_anuncio.php");    

	}else{

		$_SESSION['cadastro'] = 2; 
		header("Location: ../alterar_anuncio.php"); 

	}
}


?>