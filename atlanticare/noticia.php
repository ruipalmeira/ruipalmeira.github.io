<!doctype html>
<html lang="pt">
	
<?php
	$server = "hostingmssql04";
	$user = "atlanticare_simply__winspace_com_pt_root";
	$password = "939323";
	$database = "atlanticare_simply__winspace_com_pt_ola";

	//ligação a base de dados
	$conn = odbc_connect("Driver={SQL Server Native Client 10.0};Server=$server;Database=$database;", $user, $password);
	if ($conn)
  	{
		echo "Connected sucsefuly";
	}
	else
	{
		echo "Error creating database: " . odbc_error($conn);
	}
		
	//$selected = mssql_select_db($db, $conn)
		//or dir("Não foi possivel abrir a base de dados!");
		
	//declarar a query
	$getID = $_GET['id'];
	
	$query = "SELECT * FROM Noticias";
	
	//executar a query
	$result = odbc_exec($conn, $query);
	if(!$result){
		exit("Error in SQL");
	}

?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
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
			<div id="logo_header"><a href="index.html"><img src="imagens/header/logo.png" alt="Atlanticare" /></a>
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
					    	  <li><a href="politica_qualidade.html">POLÍTICA DA QUALIDADE</a></li>
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
			    		      <!--<li><a href="#">PEDIDO DE INFORMAÇÕES</a></li>-->
			    		    </ul>
					    </li>
					    <li><a href="#">NOTÍCIAS</a></li>
					    <li><a href="contactos.html">CONTACTOS</a></li>
					</ul>
				</div>
			</div>
		</div>

	<div id="container" class="container_12" align="justify">
		  <!--CONTENT AREA-->			
		<div id="colunaEsq" class="grid_3">
			<h2>Historial</h2>
			<br/>
			<?php
			
				$historialquery = "SELECT NoticiaID, Titulo, Data FROM Noticias ORDER BY Data DESC";
	
				//executar a query
				$historialresult = odbc_exec($conn, $historialquery);
				$i =0;
				
				while (odbc_fetch_row($historialresult) && $i <5){
						
					$id = odbc_result($historialresult, "NoticiaID");
					$titulo = odbc_result($historialresult, "Titulo");
					$data = odbc_result($historialresult, "Data"); 
			?>
			<ul>
				<?php
					if($id != $getID)
					{
			    		echo "<li><a href=\"noticia.php?id=$id\"> $titulo</a></li>";
			    		echo "<div><img src=\"imagens/body/separador.png\"/></div>";
						$i++;
					}
				}
			?>
			</ul>
			
			
		</div>		
		<div id="colunaCentro" class="grid_6" align="justify">
			<h1>Notícias</h1>
			<br />
			<?php
						//mostrar resultados da query
						while(odbc_fetch_row($result))
						{
							$id = odbc_result($result, "NoticiaID");
							
							if($id == $getID)
							{
								$titulo = odbc_result($result, "Titulo");
								$conteudo = odbc_result($result, "Conteudo");
								$data = odbc_result($result, "Data");
								$imagem = odbc_result($result, "Imagem");
								
								if(isset($titulo) && isset($conteudo)){
								echo "<p><h3>$titulo</h3></p>"; 
								
								echo "<p>$conteudo</p><br/>";
								echo "<p><small>$data</small></p>";
								}
							}
							
						}						

						
 
			?>
			
			<p><a href="noticias.php">Voltar a notícias</a></p>
		</div>
    	<div id="colunaDir" class="grid_3">
	  		<div id"banners_DIREITA">
	  			<?php
	  				
	  				if(isset($imagem))
	  					echo "<img src=\"imagens/noticias/$imagem\">";
					
	  				//fechar ligação
					odbc_close($conn);
	  			?>
	  		</div>
    	</div>
	</div>
	<div class="clearfix"></div>
	<br/>
	<!-- FOOTER -->
	<div id="footer-wrapper">
		<div id="footer" class="container_12">
			<div class="grid_2">
				<a href="pedido_informacao.php"><img src="imagens/footer/proposta_.png" alt="proposta" onmouseover="this.src='imagens/footer/proposta_blue2.png'" onmouseout="this.src='imagens/footer/proposta_.png'"/></a>
			</div>
			<div class="grid_2">
				<img src="imagens/footer/callus.png" alt="call us" />
			</div>
			<div class="grid_2">
			  	<img src="imagens/footer/empresa_.png" alt="empresa" />
			</div>
		 	<div class="grid_1">
			    <a href="http://www.sgs.com/certifiedclients" target="_blank"> <img src="imagens/footer/sgs.png" alt="SGS" /></a>
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