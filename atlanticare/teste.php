<!doctype html>
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
			<h1>Pedido de Informações</h1>
			<br/>
				<div id="pedidoInfo">
					
					<?php
						$user = 'site_atl';
						$password = 'pw_site_atl';
						$server = 'localhost';
						$database = 'db_Site_ATL';
						
						$conn = odbc_connect("Driver={SQL Server Native Client 10.0};Server=$server;Database=$database;", $user, $password);
						if ($conn)
  						{
							echo "Connected sucsefuly<br>";
						}
						else
						{
							echo "Error creating database: " . odbc_error($conn);
						}
						
						/*$query = "DROP TABLE Noticias";
						
						if(odbc_exec($conn,$query)) echo "Database persons droped.";
						else echo "Error droping database: " . odbc_error($rs);
						
						$query2 = "CREATE TABLE Noticias
									(
 									NoticiaID int IDENTITY(1,1) PRIMARY KEY NOT NULL,
									Titulo text,
									Conteudo text,
									Data date,
									Imagem text
									)";
						
						if(odbc_exec($conn,$query2)) echo "Database Noticias created.";
						else echo "Error creating database: " . odbc_error($rs);*/
						
						$query = "DELETE FROM Noticias WHERE NoticiaID=13";
						
						if(odbc_exec($conn,$query)) echo "Noticia Removida.";
						else echo "Error droping database: " . odbc_error($rs);
  							
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