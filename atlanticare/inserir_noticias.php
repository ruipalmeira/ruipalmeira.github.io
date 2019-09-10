<?php
	$server = "hostingmssql04";
	$user = "atlanticare_simply__winspace_com_pt_root";
	$password = "939323";
	$database = "atlanticare_simply__winspace_com_pt_ola";

	//ligação a base de dados
	$conn = odbc_connect("Driver={SQL Server Native Client 10.0};Server=$server;Database=$database;", $user, $password);
	
	
	if ($_POST['cadastrar'])
	{
	// Recupera os dados dos campos
	$titulo = $_POST['titulo'];
	$conteudo = $_POST['conteudo'];
	$data = $_POST['data'];
	$imagem = $_FILES["imagem"];
	
	// Se a foto estiver sido selecionada
	if (!empty($imagem["name"])) {
		
		// Largura máxima em pixels
		$largura = 300;
		// Altura máxima em pixels
		$altura = 300;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 4000;

    	// Verifica se o arquivo é uma imagem
    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagem["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
	
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($imagem["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}

		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($arquivo["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
	}

		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
			
			
        	if(isset($imagem))
        	{
        		// Gera um nome único para a imagem
        		$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        		
        		// Caminho de onde ficará a imagem
        		$caminho_imagem = "./imagens/noticias/" . $nome_imagem;
        		
        		// Faz o upload da imagem para seu respectivo caminho
        		move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
			}
		
			// Insere os dados no banco
			if(isset($nome_imagem)) $query = "INSERT INTO Noticias VALUES ('$titulo', '$conteudo', '$data', '$nome_imagem')";
			else $query = "INSERT INTO Noticias VALUES ('$titulo', '$conteudo', '$data', NULL)";
			
			$sql = odbc_exec($conn, $query);
		
			// Se os dados forem inseridos com sucesso
			if ($sql){
				?>
 				<script>alert("Noticia inserida com sucesso!")</script>
 				<?php
			}
			else 
			{
				?>
 				<script>alert("Erro: <?= odbc_error($conn)?>.")</script>
 				<script>alert("Erro: <?= odbc_errormsg($conn) ?>.")</script>
 				<?php
			}
		}
	
		// Se houver mensagens de erro, exibe-as
		if (count($error) != 0)
		{
			foreach ($error as $erro)
			{
				?>
 				<script>alert("Erro: <?= $erro ?>.")</script>
 				<?php
			}
		}
	}

	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html lang="pt">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <title>Atlanticare - Serviços de Saúde S.A.</title>

    <link rel="stylesheet" href="css/reset.css" type="text/css" />
	<link rel="stylesheet" href="css/960.css" type="text/css" />
	<!--<link rel="stylesheet" href="css/text.css" type="text/css" />-->
	<link rel="stylesheet" href="css/style_1.css" type="text/css" />	
    <script type="text/javascript">
			function clearDefault(el) {
			if (el.defaultValue==el.value) el.value = ""
		}
	
		function returnMe(formfield){
			if (formfield.value=="")
				formfield.value = formfield.defaultValue
		} 
	</script>
</head>
<body>
	<div id="container" class="container_12">
		<div id="header" class="grid_12">
			<div id="logo_header"><a href="#"><img src="imagens/header/logo.png" alt="Atlanticare" /></a>
				<div id="textHeader">Inovação em Serviços de Segurança<div>e Saúde no Trabalho</div></div>
				<div id="areaReservada">
    				<a href="http://careview.atlanticare.pt/ext/default.asp" target="_blank"><div id="botao_areaReservada"><p>Área Reservada</p>
    				<img src="imagens/header/cadeado.png"/></div></a><br>
    				<a href="resultados_pesquisa.html"><div id="botao_areaReservada"><p style="margin-right: 27px;">Pesquisar</p>
    					<img style="width: 14px; height:14px; margin-top: 4px;" src="imagens/header/lupa.png"/></div></a>
    			</div>		
			</div>
		</div>	
	</div>
	<div class="clearfix"></div>

    	<div id="fundoMenu">
		<div id="menu" class="container_12">
				<div class="grid_12">
					<ul id="navBar">
					    <li><a href="index.html">HOME</a></li>
					    <li><a href="#">ATLANTICARE</a>
					    	<ul class="subLink">
					    	  <li><a href="quem_somos.html">QUEM SOMOS</a></li>
					    	  <li><a href="visaomissao.html">VISÃO E MISSÃO</a></li>
					    	  <li><a href="politica_qualidade.html">POLÍTICA DE QUALIDADE</a></li>
					    	</ul>
					    </li>
					    <li><a href="#">SERVIÇOS</a>
							<ul class="subLink">
			    		      <li><a href="saude_trabalho.html">SAÚDE NO TRABALHO</a></li>
			    		      <li><a href="seguranca_trabalho.html">SEGURANÇA NO TRABALHO</a></li>
			    		      <li><a href="ramovida.html">RAMO VIDA</a></li>
			    		      <li><a href="checkup.html">CHECK-UP</a></li>
			    		    </ul>
			    		</li>
					    <li><a href="#">CLÍNICAS ATLANTICARE</a>
					    	<ul class="subLink">
			    		      <li><a href="clinica_lisboa.html">CLÍNICA LISBOA</a></li>
			    		      <li><a href="clinica_porto.html">CLÍNICA PORTO</a></li>
			    		    </ul>
			    		</li>
					    <li><a href="rede_prestadores.html">REDE DE PRESTADORES</a></li>
					    <li><a href="#">APOIO AO CLIENTE</a>
					    	<ul class="subLink">
			    		      <li><a href="plataforma_web.html">PLATAFORMA WEB</a></li>
			    		      <li><a href="satisfacao_cliente.html">SATISFAÇÃO DO CLIENTE</a></li>
			    		      <li><a href="gestor_cliente.html">GESTOR DE CLIENTE</a></li>
			    		      <li><a href="legislacao.html">LEGISLAÇÃO ÚTIL</a></li>
			    		    </ul>
					    </li>
					    <li><a href="#">NOTÍCIAS</a></li>
					    <li><a href="contactos.html">CONTACTOS</a></li>
					</ul>
				</div>
			</div>
		</div>
	<div id="container" class="container_12">
		  <!--CONTENT AREA-->
		<div id="colunaCentro" class="grid_4">
			<h1>Inserir Notícia</h1>
			<br/>
				<div id="pedidoInfo">
					<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="inserir_noticias" >
					<p>Título<br/>
					<input style='width: 200px;' value='' type='text' name='titulo' id='pesquisa_caixaTxt'  onfocus='clearDefault(this)' onblur='returnMe(this)'/>
					</p>
					<p>Data<br />
					<input style='width: 200px;' value='' type='date' name='data'  id='pesquisa_caixaTxt' onfocus='clearDefault(this)' onblur='returnMe(this)'/>
					</p><br/><br/>
					<p>Imagem da notícia:<br />
					<input type="file" name="imagem" id='pesquisa_caixaTxt'/>
					</p><br /><br />
					<p> Conteúdo da notícia <br/>
					<textarea rows='10' value='' style='resize: none;' name='conteudo' cols='100' id='pesquisa_caixaTxt' onfocus='clearDefault(this)' onblur='returnMe(this)'></textarea><br/><br/>
					<input type="submit" name="cadastrar" value="cadastrar" />
					</form>
				</div>
			
		</div>	
	</div>
	<div class="clearfix"></div>
	<br/>
	<!-- FOOTER -->
	<div id="footer-wrapper">
		<div id="footer" class="container_12">
			<div class="grid_2">
				<a href="pedido_informacao.php"><img src="imagens/footer/proposta_.png" alt="proposta" /></a>   
			</div>
			<div class="grid_2">
				<a href="#"><img src="imagens/footer/callus.png" alt="call us" /></a>
			</div>
			<div class="grid_2">
			  	<a href="#"><img src="imagens/footer/empresa_.png" alt="empresa" /></a>
			</div>
		 	<div class="grid_1">
			    <img src="imagens/footer/sgs.png" alt="SGS" />
			</div>
			<div id="mail" class="grid_3">
			    <blockquote>Subscrever Newsletter<img src="imagens/footer/mail.png" alt="Mail" class="mail"/></blockquote>
			    <input type="email" name="email" value="e-mail"/>
			    <span class="submit"><input type="image" src="imagens/footer/submit.png"/></span>
			</div>				
		</div>
	</div>
</body>
</html>