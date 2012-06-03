<?php
	/*Ayuda vrindada por foro del web*/
	/*Copyright otorgado a el nucleo de LolazoO y Hallking Quesada*/

	/********************************Example*********************************/

	//$conex = array("server" => "localhost" , "username" => "root", "password" => "", "dba" => "name_dba");
	//$dba = "name_dba"; Nombre de la base de datos
	//$table = "name_table"; Aquí colocamos el nombre de la tabla con la que trabajaremos consta variable se vacea la tabla.
	//$campos = array("Campos","Campos"); Los campos de la tabla con la que trabajaremos
	//$datos = array("Valores","Valores"); Los Valores a Insertar
	//$campos_datos = array("Campos" => "Valores"); //Para Actualizar los campos usamos este tipo de array, especificando los campos y sus respectivos Valores
	//$checks = array("Campos" => "Valores"); Este array tambien para actulizar pero este es se utliza despues del WHERE este formato tambien es valido para la variable $check_dilite
	//Para Elimina la tabla solo creamos una variable con el nombre de la tabla
	//Elimila la base de datos solo creamos una variable con el nombre de la base de datos

	/********************************Example*********************************/

class MySql
{
	/******************************************************************************************************************/
		
	//Conecta con la base de datos y selecciona la tabla
		private $conexion;
		private $error_consulta;
		private $mq_activado;
		private $real_escape_string;
		
		public function __construct($conex)
			{
				$this->Conectar($conex);
				$this-> mq_activado = get_magic_quotes_gpc();
				$this-> real_escape_string = function_exists("mysql_real_escape_string"); 
			}
				
		public function Conectar($conex)
			{	
				$this->conexion = mysql_connect($conex['server'], $conex['username'], $conex['password']);
				if(!$this->conexion)
				{
					die("Error Conex 0001:<br />". mysql_error());
				}
				else
				{
					$mysql_select_db = mysql_select_db($conex['dba'], $this->conexion);
							if(!$mysql_select_db)
							{
								die("Error Select 0002:<br />". mysql_error());
							}
				}
			}
						
/******************************************************************************************************************/
		
	//Desconecta la base da datos
		function close_connect()
			{
				if(isset($this->conexion))
					{
						mysql_close($this->conexion);
					}
			}

/******************************************************************************************************************/
	
	//Permite realizar la consulta a MYSQL
	public function consultar($sql)
		{
			$this->error_consulta = $sql;
			$resultado = mysql_query($sql,$this->conexion);
			$this-> verificar_consulta($resultado);
			return $resultado;
		}
	
/******************************************************************************************************************/
	
	//Verifica que la consulta se realizo corectamente
	private function verificar_consulta($consulta)
		{
			if(!$consulta)
				{
					die("Error en la consulta: <br />". $this->error_consulta ."<br />".mysql_error());
				}
		}
	
/******************************************************************************************************************/

	//Prepara los datos para luego ser insertados	
	public function preparar_consulta($consulta)
			{
			  if($this->real_escape_string)
				  {
					  if($this->mq_activado)
						  {
							  $consulta = stripslashes($consulta);	
						  }
					  $consulta = mysql_real_escape_string($consulta);
				  }
			  else
				  {
					  if(!$this->mq_activado)
						  {
							  $consulta = addslashes($consulta);
						  }
				  }
			  return $consulta;
			}
		
/******************************************************************************************************************/
		
	//Esta function te permite insertar los datos 
	function INSERT_INTO($table, $campos, $datos)
		{
			
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
			$this->consultar($echo);
		}
		
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
			$this->consultar($echo);
		}

/******************************************************************************************************************/
		
	//Esta funcion elimina los datos
		function DELETE($table, $check_dilite)
		{
			//Muestra los campos y sus valores para eliminar despues del WHERE
			foreach ($check_dilite as $c => $v)
				{
					$check_d .= ($check_d ? ', ' : '') . " `{$c}` = '{$v}' ";
				}
			$echo = "DELETE FROM `{$table}` WHERE {$check_d}";

			//Consutla Mysql
			$this->consultar($echo);
		}

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

/******************************************************************************************************************/
		
	//Elimina la Tabla
		function DROP_TABLE($table)
		{
			$this->consultar("DROP TABLE `{$table}`");
		}
		
/******************************************************************************************************************/

	//Elimina la Base de Datos
		function Drop_dba($Drop_dba)
		{
			$this->consultar("DROP DATABASE `{$Drop_dba}`");
		}
	
/******************************************************************************************************************/
	
	//Vacea la tabla
	function Trucate($table)
		{
			$this->consultar("TRUNCATE TABLE `{$table}`");
		}

/******************************************************************************************************************/

	function select($table)
		{
			$result = mysql_query("SELECT * FROM {$table}");
			//echo "<h1> Json Enconde 0.1 </h1>";
		
			echo '{"api":[';
			while($row = mysql_fetch_array($result))
			  {
				 echo json_encode($row).",";
				 echo "<br/>";
			  }
			  echo "]}";
			  /*
			  echo "<h1> XML Enconde 0.1 </h1>";
			  while($row = mysql_fetch_array($result))
			  {
				echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>
				<caja>
				<ja>".$row['name']."</ja>
				</caja>";
			  }
			  */
		}

/******************************************************************************************************************/
	function api_select($Api_key, $table)
		{
			$api_key ="SELECT  `password` FROM  `usuario` WHERE PASSWORD =  '$Api_key' LIMIT 1";  
			$resultado = mysql_query($api_key);
			if (mysql_affected_rows() !== 0)
				{	
					$conex = array("server" => "localhost" , "username" => "root", "password" => "", "dba" => "pruevas");
					$bd = new MySql($conex);
					$bd->select($table);
					$bd->close_connect();
				}
		}


}

	$conex = array("server" => "localhost" , "username" => "root", "password" => "", "dba" => "pruevas");
	//$table = "new";
	//$campos = array("name", "las_nam");
	//$datos = array("Hallking", "Quesada");
	//$campos_datos = array("name" => "Pedro", "las_nam" => "Tejada");
	//$checks = array("Id" => 2);

//$bd = new MySql($conex);
//$bd->select($table);
//$bd->preparar_consulta($datos);
//$bd->INSERT_INTO($table, $campos, $datos);
//$bd->UPDATE($table, $campos_datos, $checks);
//$bd->Trucate($table);
//$bd->close_connect();


	/*Ayuda vrindada por foro del web*/
	/*Copyright otorgado a el nucleo de LolazoO y Hallking Quesada*/

?>