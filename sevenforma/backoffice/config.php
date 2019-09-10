<?php

/*$host="localhost"; //Nome do Servidor.
$db_user="root"; // Utilizador MySQL.
$db_password=""; //Password MyQL.
$database="sevenforma";  //Base de Dados.*/

$servidor = "localhost";
$utilizador = "root";
$password = "";
$db = "sevenforma";

function TestaUtilizador($numcliente, $pass)
{
	global $servidor, $utilizador, $password, $db;
	
	mysql_connect($servidor,$utilizador,$password);
	mysql_select_db($db);
	//verificar username e password.
	$result=mysql_query("SELECT `id` FROM `utilizadores` WHERE `id` LIKE \"$numcliente\" AND `password` LIKE \"$pass\" LIMIT 1");
	$registo=mysql_fetch_array($result);
	if(mysql_num_rows($result)!= 0)
	{
		return TRUE;
	}else{
		return FALSE;
	}
}

function FazLogin($IdUser)
{
	$_SESSION['utilizador']=$IdUser;   //criar sessão username.
}

function FazLogout()
{
	session_destroy();
}

function nomeUtilizador($id)
{
	global $servidor, $utilizador, $password, $db;
	// conectar bases de dados. 
	mysql_connect($servidor,$utilizador,$password);
	mysql_select_db($db);
	$query="SELECT `nome` FROM `utilizadores` WHERE `id` LIKE \"$id\"";
	$result=mysql_query($query);
	$registo=mysql_fetch_array($result);
	//Devolve o Nome do Utilizador
	return $registo[0];
}

function TestaLogin()
{
	if($_SESSION['utilizador']==null)
	{
		header("Location: index.php");
	}
}

/*function criarFicheiro($nomeFicheiro)
{
$ourFileHandle = fopen($nomeFicheiro, 'w') or die("Imposivel Criar Ficheiro");
$stringData = "Bobby Bopper\n";
fwrite($ourFileHandle, $stringData);

fclose($ourFileHandle);
}*/
?>