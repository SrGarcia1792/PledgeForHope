<?php
	require_once("Class.php");
	
	$str = 'Clave,Valor';
	echo "<br/>";
	// positive limit
	print_r(explode(',', $str, 2));
	echo "<br/>";
		$numeros = array();
			for ($AUTI = 0; $AUTI <= 3;  $AUTI += 1)
				{
					$numeros["AUTI"] = "a";
					$numeros["x"] = "a";
				}
		
		//print_r ($numeros);
		
if (isset($button)) 
{ 
   if (is_array($valor)) 
   { 
      foreach ($valor as $key => $val) 
      { 
           echo $array[$key]['valor'] = $val; 
		   echo "<br/>";
      } 
   }
   	$table = "projects";
	$checks = array("project_id" => $_POST["checks"]);
	$bd->UPDATE($table, $_POST["campos_datos"], $checks);
}
?>
<form method="post" action="Api.php".<?php echo $PHP_SELF; ?>>
<table id="table_results" >
    <tr >
      <th>project_name</th>
      <th><input name="project_name[$i]" type="text" value="" /></th>
    </tr>
    <tr>
      <th>description</th>
      <th><input name="description[$i]" type="text" value="" /></th>
    </tr>
    <tr>
      <th>categories</th>
      <th><input name="categories[$i]" type="text" value=""/></th>
    </tr>
    <tr>
      <th>location</th>
      <th><input name="location[$i]" type="text" value=""/></th>
    </tr>
</table>
    <input type="submit" name="button" id="button" value="Enviar">
</form>