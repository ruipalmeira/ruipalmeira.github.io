<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<link href="festilo.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title>Bem Vindo - SevenForma</title>
</head>
<body>
<?php
	include('config.php');
	$lng = $_GET['lng'];
	if($lng == "")
	{
		$lng = "pt";
	}
	include("Linguas/$lng.php");
?>
	<div id="top">
		<div id="banner"><a href="#"><img class="logotipo" src="Imagens/logotipo.png" width="300" height="65" alt="Sevenforma"></a></div>        
	</div>
    
    <div id="container">
    	<div id="pubwraper">
   	    	<img src="Imagens/img-banner.png" width="900" height="200">
       	</div>
        
  <div id="menu">
        	<div id="menuPosition">
    			<?php
				
					/*
					***Zona reservada ao menu principal, este sera gerado automaticamente, tendo em conta o a lingua seleccionada
					*/
					
					$query="SELECT `links_primarios`.`nome`, `links_primarios`.`link`, `links_primarios`.`idconteudo` FROM `links_primarios` WHERE `links_primarios`.`lingua` LIKE \"$lng\" AND `links_primarios`.`principal` LIKE 1 ORDER BY `links_primarios`.`posicao` ASC";
										
					$resultado=mysql_db_query ($db, $query);
					if ($resultado){
						while ($registo=mysql_fetch_array($resultado)) {
							$nome=$registo["nome"];
							$link=$registo["link"];
							$conteudo=$registo["idconteudo"];
							if($conteudo==null){
								print("<a href=\"$link?lng=$lng\" class=\"Menu\">$nome</a>");
							}else{
								print("<a href=\"$link?lng=$lng&conteudo=$conteudo\" class=\"Menu\">$nome</a>");
							}
						}
					}
					mysql_free_result($resultado);
				?>
            </div>
            
		</div> 
    	<div id="corpo">
		<?php 
				/*
					*** Zona de noticias, caso o url nao contenha nenhum "id" de noticia, este cria uma lista com
					*** as noticias referentes a lingua a ser usada.
				*/

				$noticia=$_GET["noticia"];
				if($noticia=="") {
					$query="SELECT `noticias`.`id`, `noticias`.`titulo`, `noticias`.`noticia`, `utilizadores`.`nome`, `noticias`.`data` FROM `noticias`, `utilizadores` WHERE `lingua` LIKE \"$lng\" AND `utilizadores`.`id` LIKE `noticias`.`utilizador`";
					$resultado=mysql_db_query ($db, $query);
					if ($resultado) {
						while ($registo=mysql_fetch_array($resultado)) {
							$id=$registo["id"];
							$titulo=$registo["titulo"];
							$noticia=$registo["noticia"];
							$nome=$registo["nome"];
							$data=$registo["data"];
							$subnoticia=reduz($noticia);
							
							print("<div id=\"caixanoticias\">");
							echo("<a href=\"noticias.php?lng=$lng&noticia=$id\" target=\"_self\">");
							print("<h2>$titulo</h2>");
							print("<p>Colocado por: $nome em $data</p>");
							print("<p>$subnoticia</p>");
							echo("</a>");
							print("</div>");
						}
					}
					mysql_free_result($resultado);
				
				/*
					*** Se o url tranferir um "id" da noticia, então o codigo seguinte irá à base de dados 
					*** buscar os dados referentes a essa notícia.
				*/
				
				}else{
					$query="SELECT * FROM `noticias` WHERE `id` LIKE '$noticia' AND `lingua` LIKE '$lng'";
					$resultado=mysql_db_query ($db, $query);
					if ($resultado){
						while ($registo=mysql_fetch_array($resultado)) {
							$titulo=$registo["titulo"];
							$noticia=$registo["noticia"];
							$imagem=$registo["imagem"];
							$utilizador=$registo["utilizador"];
							$data=$registo["data"];
						}
					}else{
					print ("Não Existem Registos na Base de Dados");
					}
					mysql_free_result($resultado);
					echo ("$titulo<br>");
					echo ("Noticia Adicionada por: $utilizador em $data<br><br>");
					echo ("$noticia<br>");
					echo ("$imagem");
				}
					
					
				?>
      </div>
          <div id="esquerda">
            <a href="<?php print("index.php?lng=pt"); ?>" title="pt" target="_self">Portugal</a>
            <br>
            <a href="<?php print("index.php?lng=es"); ?>" title="pt" target="_self">Espanha</a>
            <br>
            <a href="<?php print("index.php?lng=en"); ?>" title="pt" target="_self">Inglaterra</a>
          </div>
        <div id="footer">
        	<?php 
					$query="SELECT `links_primarios`.`nome`, `links_primarios`.`link`, `links_primarios`.`idconteudo` FROM `links_primarios` WHERE `links_primarios`.`lingua` LIKE \"$lng\" ORDER BY `links_primarios`.`posicao` ASC";
										
					$resultado=mysql_db_query ($db, $query);
					if ($resultado){
						while ($registo=mysql_fetch_array($resultado)) {
							$nome=$registo["nome"];
							$link=$registo["link"];
							$conteudo=$registo["idconteudo"];
							if($conteudo==null){
								print("<a href=\"$link?lng=$lng\">$nome</a>");
							}else{
								print("<a href=\"$link?lng=$lng&conteudo=$conteudo\">$nome</a>");
							}
						}
					}else{
					print ("Não Existem Registos na Base de Dados");
					}
					mysql_free_result($resultado);
			?>	
    	</div>
    </div>
</div>
</body>
</html>