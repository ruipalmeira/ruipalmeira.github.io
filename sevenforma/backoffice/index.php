<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Cliente</title>
<link href="stylelogin.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="logingeral">
<div id="titulologin">Login Cliente</div>
<div id="form">
<div id="smserro"><?php echo $error; ?></div>
<div id="fromcampos">
<form action="login.php" method="POST" name="Login">
Nº de Cliente:<input name="username" type="text" size="25" maxlength="25">
Password:<input name="password" type="password" size="25" maxlength="25">
<input name="entrar" type="Submit" value="Entrar">
</form>
</div>
</div>
</div>
<div id="rodape">Diogo Louro 2010</div>
</body>
</html>