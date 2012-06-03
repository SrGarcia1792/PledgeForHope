<?php
if(isset($_POST['strip']))
{
require_once("Class.php");
require_once("../connect/connect.php");
$bd->select($_POST['strip']);
}
?>
<html>
<head>
</head>
<body>
<h3>Buscador</h3>
<form action="" method="post"> 
Proyecto a Buscar: <input type="text" name="strip"/>
<button type="button">Buscar</button>
</form>
<p>Resultado: <br/><br/> <span id="txtHint"></span></p> 
</body>
</html>