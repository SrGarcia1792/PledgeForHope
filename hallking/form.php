<?php 
require_once("Class.php");
if(isset($_POST['submit']))
{
		$valor = array();
		for( $i = 0 ; $i < 4 ; $i++ )
		{
			$valor[$i] = $_POST['numero_'.$i];
		}
			$campo = array("project_name","description","categories","location");
			$array = array();
			$num = 0;
				foreach ($campo as $c) 
					{ 
						$valor[$num];
						$array[$c]=$valor[$num]; 
						$num++;
					}
	$table = "projects";
	$checks = array("project_id" => $_GET["checks"]);
	$bd->UPDATE($table, $array, $checks);
}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Formulario</title>
</head>
<body>
    <form action="form.php?checks=1" method="post">
    <?php for( $i = 0 ; $i < 4 ; $i++ ): ?>
        <input type="text" name="numero_<?php echo $i; ?>"/><br>
    <?php endfor; ?>    
    <input type="submit" name="submit" value="Enviar" />
    </form>
</body>
</html>