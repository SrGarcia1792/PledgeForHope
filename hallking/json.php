<?php
//decodifico el valor de $encode
$decode = json_decode(file_get_contents('http://www.lolazoo.com/api/ji/users'));

//impirmo el resultado de $decode
foreach ($decode as $valor) 
{  
	foreach ($valor as $clave1 => $valor1) 
	{
		echo $clave1." : ".$valor1."<br>";
	}
}
?>