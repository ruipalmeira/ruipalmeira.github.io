<?php
session_start();
include_once('config.php');
$numcliente = addslashes($_POST['username']);
$pass = addslashes($_POST['password']);
$pass = md5($pass);
if(isset($_POST['entrar']))
{
	if(TestaUtilizador($numcliente, $pass)==TRUE)
	{
		FazLogin($numcliente);
		header("Location: main.php");     //Redirecciona para main.php
	}else{
		FazLogout();
		header("Location: index.php");    //Redirecciona para index.php
	}
}else{
	FazLogout();
	header("Location: index.php");    //Redirecciona para index.php
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="stylelogin.css" rel="stylesheet" type="text/css">
<title></title>
</head>
<body>
</body>
</html>
