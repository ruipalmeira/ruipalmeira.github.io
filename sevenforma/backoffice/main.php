<?php
session_start();
require_once('config.php');
TestaLogin();
$user = $_SESSION['utilizador'];
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="stylelogin.css" rel="stylesheet" type="text/css">
<title><?php print("Bem Vindo "); echo nomeUtilizador($user);?></title>
</head>
<body>
<div id="container-top"></div>
	<div id="container">
		<?php
            print("<p>Bem Vindo "); echo nomeUtilizador($user); echo "</p>";
        ?>
        <!--<div id="menu">-->
            <?php
                print("<p>Clique <a href=\"login.php\" target=\"_self\">Aqui</a> para fazer logout");
            ?>
            <br>
            <a href="cliente.php" target="_self">Gerir Conta</a>
        <!--</div>-->    
	</div>
<div id="container-bottom"></div>
</body>

</html>
