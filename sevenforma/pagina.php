<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<link href="festilo.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

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
        
        /*
        ***Carregamento dos dados referentes ao id transferido pelo url
        */
        
        $conteudo=$_GET["conteudo"];
        $query="SELECT `titulo`, `texto`, `imagem` FROM `paginas` WHERE `id` LIKE \"$conteudo\" ";
        $resultado=mysql_db_query ($db, $query);
        if ($resultado){
            while ($registo=mysql_fetch_array($resultado)) {
                $titulo=$registo["titulo"];
                $texto=$registo["texto"];
                $imagem=$registo["imagem"];
            }
        }
        mysql_free_result($resultado);
    ?>
	<div id="top">
		<div id="banner"><a href="#"><img class="logotipo" src="Imagens/logotipo.png" width="300" height="65" alt="Sevenforma"></a></div>        
	</div>
    
    <div id="container">
    	<div id="pubwraper">
        	<?php
				
					/*
					***Selecção do banner respectivo
					*/
					
					$query="SELECT `banners`.`imagem`, `banners`.`descricao`  FROM `banners`, `paginas`  WHERE `banners`.`id` LIKE `paginas`.`banner` AND `paginas`.`id` LIKE \"$conteudo\"";
					
					$resultado=mysql_db_query ($db, $query);					
					$registo=mysql_fetch_array($resultado);
					$banner=$registo["imagem"];
					$descricao=$registo["descricao"];
					mysql_free_result($resultado);
					print("<img src=\"Imagens/$banner\" title=\"$descricao\" width=\"650\" height=\"200\" >");
			?>
			<div id="login">
			
			</div>
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
        <div id="menu_secundario">
            	<?php
				
					/*
					***Zona reservada ao menu secundário, este sera gerado automaticamente, tendo em
					***conta o a pagina que foi carregada e a lingua.
					***Cada zona da pagina, que faça uso de dados transferidos por url, é necessario envia-los primeiro
					***para uma variável, senão estes não poderam ser usados.
					*/
					
					$conteudo=$_GET["conteudo"];
					$query="SELECT `links_secundarios`.`link`, `links_secundarios`.`idconteudo`, `links_secundarios`.`lingua`, `paginas`.`titulo` FROM `links_secundarios`, `paginas` WHERE `links_secundarios`.`idprimario` LIKE \"$conteudo\" AND `links_secundarios`.`idconteudo` LIKE `paginas`.`id` AND `links_secundarios`.`lingua` LIKE \"$lng\"";

					$resultado=mysql_db_query ($db, $query);
					if ($resultado){
						while ($registo=mysql_fetch_array($resultado)) {
							$link=$registo["link"];
							$idconteudo=$registo["idconteudo"];
							$lingua=$registo["lingua"];
							$titulo=$registo["titulo"];
							print("<a href=\"$link?lng=$lingua&conteudo=$idconteudo\">$titulo</a>");
						}
					}
					mysql_free_result($resultado);
				?>
            </div>
            <br>
		<?php
				
				echo ("<h1>$titulo</h1>");
				echo ("<p>$texto</p>");
				echo ("$imagem");
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