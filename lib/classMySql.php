<?php 

include("connect/link.php");
?>
 
<?php
	/* Ayuda vrindada por foro del web  */

	
	
	/********************************Sona de Prueva*********************************/



	/********************************Sona de Prueva*********************************/

/******************************************************************************************************************/
	
function preparar_consulta($cadena)
	{
	 	$gpc = get_magic_quotes_gpc();
		if(function_exists("mysql_real_escape_string"))
			{
				if($gpc)
					{
						$consulta= stripslashes($cadena);
					}
				$consulta = mysql_real_escape_string($cadena);
			}
		else
			{
				if(!$gpc)
					{
					 	$consulta = addslashes($cadena);
					}
			}
		return $consulta;
	}
	
/******************************************************************************************************************/
	
//Esta function te permite insertar los datos 
function INSERT_INTO($table, $campos, $datos)
	{
	/**********Preparar la consulta**********/
		foreach($datos as $Valor)
		{
			preparar_consulta($Valor);
		}
		
	//Estas varialbes son obligatorias para los foreach compos y datos
	/*****************/ $com = count($campos); /*********************/
	/****************/ $dat = count($datos); /***********************/
	/****************************************************************/
	
	//Parte de la cadena insert
	$echo = "INSERT INTO `{$table}` ( ";
	
	//Muestra los campos
	foreach($campos as $Clave => $Valor)
		{
			$Valor = "`$Valor`";
			$echo .= $Valor;
			if ($Clave != $com-1)
			{$echo .= ', ';}
		}
	
	//Parte de la cadena insert	
	$echo .= " ) VALUES ( ";
	
	//Muestra los Values
	foreach($datos as $Clave => $Valor)
		{
			$Valor = "'$Valor'";
			$echo .= $Valor;
			if ($Clave != $dat-1)
			{ $echo .= ', '; }
		}
		
	//Parte de la cadena insert
	$echo .= " )";
	
		//Consutla Mysql
		$consulta = mysql_query ("{$echo}");
		
	}

	//INSERT_INTO($table, $campos, $datos);
	
/******************************************************************************************************************/
	
	//Esta function te permite actualizar los datos
	function UPDATE($table, $campos_datos, $checks)
	{
		//Muestra los campos y sus valores
		foreach ($campos_datos as $c => $v)
			{
				$udate .= ($udate ? ', ' : '') . " `{$c}` = '{$v}' ";
			}
		
		//Muestra los campos y valores despues del WHERE
		foreach ($checks as $c => $v)
			{
				$check .= ($check ? ', ' : '') . " `{$c}` = '{$v}' ";
			}
		
		//Este es el string de la consulta
		$echo = "UPDATE `{$table}` SET {$udate} WHERE {$check} LIMIT 1";

		//Consutla Mysql
		$consulta = mysql_query ("{$echo}")or die("ha habido un error");
	}
	
	//Actuliza las tablas
	//UPDATE($table, $campos_datos, $checks);
	
/******************************************************************************************************************/
	
	function DELETE($table, $check_dilite)
	{
		//Muestra los campos y sus valores para eliminar despues del WHERE
		foreach ($check_dilite as $c => $v)
			{
				$check_d .= ($check_d ? ', ' : '') . " `{$c}` = '{$v}' ";
			}
		$echo = "DELETE FROM `{$table}` WHERE {$check_d}";

		//Consutla Mysql
		$consulta = mysql_query ("{$echo}");
	}
	//Elimina un valor de la tabla
	//DELETE($table, $check_dilite)

/******************************************************************************************************************/
	
	//Crea la base de datos
	function Create_Database($dba, $conexion)
	{
		$Create_Database = mysql_query("CREATE DATABASE {$dba}",$conexion);
			if (!$Create_Database)
			  {
			  echo "Error creating database: " . mysql_error();
			  }
	}
	//Create_Database($dba, $conexion);
	
/******************************************************************************************************************/
	
	//Elimina la Tabla
	function DROP_TABLE($table)
	{
	mysql_query("DROP TABLE `{$table}`");
	}
	//Elimina Tabla
	//DROP_TABLE($table);
	
/******************************************************************************************************************/

	//Elimina la Base de Datos
	function Drop_dba($Drop_dba)
	{
	mysql_query("DROP DATABASE `{$Drop_dba}`");
	}
	//Elimina Base da Datos
	//Drop_dba($Drop_dba);
	
?>