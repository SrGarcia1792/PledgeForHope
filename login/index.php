<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>
body {
	background-color:#f3f3f3;
	font-family:Arial, Helvetica, sans-serif;
}
a{
	font-size:11px;
	text-decoration:none;
	color:#999999;
}
.iniciar{ 
display: block;
width: 115px;
text-align: center;
font-weight: bold;
background-color:#069;
color: white;
text-decoration: none;
border-radius: 4px;
float: right;
margin-right: 8px;
margin-top: 10px;
font-size: 12px;}

.login{
	display:block;
	width:346px;
	margin:auto;
	margin-top:60px;
	height:269px;
	background-color:#fff;
	border-radius:4px;
	box-shadow:#999 0 0 3px;
	padding:2px;
}
input{
	border:2px solid #eee;
	width:312px;
	margin-left:12px;
	height:30px;
	border-radius:4px;
	margin-top:10px;
	padding:5px;
	font-size:16px;
	color:#CCCCCC;
}
.header{
	margin: 0 auto;
	padding: 10px;
	font: bold 18px Helvetica Neue, Helvetica, sans-serif;
	text-shadow: 0 1px 0 white;
	background:#fbfbfb;
	height:40px;
	background-image:url(../img/logo-login.png);
	background-repeat:no-repeat;
	background-position: 11px 11px;
	}
.foot{
margin: 0;
padding: 10px;
font: bold 18px Helvetica Neue, Helvetica, sans-serif;
text-shadow: 0 1px 0 white;
background:#FBFBFB;
width: 329px;
margin-left: -1px;
margin-bottom: -6px;
height: 15px;
display: block;
margin-top: 67px;
}
.reg-lolz{
	float:right;
	color:#006699;
	}
</style>
</head>

<body>
<div class="login">
<div class="header"></div>
<form action="http://www.lolazoo.com/api/ji/login" method="post">

<input type="text" name="email" placeholder="Escribe un nombre"="Correo Electronico">


<input  type="password" name="pwd" placeholder="Contraseña">
<input type="submit" class="iniciar" value="Iniciar Seccion">
</form>
<div class="foot">
<a href="http://www.lolazoo.com/recovery/?ac=request">¿No recuerdas tu contraseña?</a>
<a href="http://www.lolazoo.com/sign/" class="reg-lolz">Registrate con LolazoO!!</a>
</div>
</div>
</body>
</html>
