<?php 
include("connect/connect.php");
/*include("lib/classMySql.php");

$table = "projects"; 

$campos_datos = array("cat_name" => $name_category); //Para Actualizar los campos usamos este tipo de array, especificando los campos y sus respectivos Valores

$checks = array("id_cat" => $id_category); //Este array tambien para actulizar pero este es se utliza despues del WHERE
	
$validar=validar_datos($name_category);

if($validar=="True"){
UPDATE($table, $campos_datos, $checks);*/
	$project_id = $_POST['projectId'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$location = $_POST['location'];
	$motivation =$_POST['motivation'];
	$found=$_POST['found'];
	$start_day=$_POST['start_day'];
	$categories=$_POST['categories'];
	$url_image=$_POST['url_image'];
	$embed_youtube=$_POST['embed_youtube'];
	$secundary_id_rand= $_POST['secundaryId'];
	updateData($project_id, $name, $description, $categories, $location,$motivation,$found,$start_day,$url_image,$embed_youtube,$secundary_id_rand);
	
	function updateData($project_id, $name, $description, $categories, $location,$motivation,$found,$start_day,$url_image,$embed_youtube,$secundary_id_rand){
	
		$query = "update projects SET project_name = '$name', description = '$description', motivation = '$motivation',	found = '$found', start_day = '$start_day', categories = '$categories', 		url_image = '$url_image', embed_youtube = '$embed_youtube', location = '$location' WHERE project_id = $project_id";
		mysql_query($query);
	}
?>
<script>
location.href="proyect.php?proyect=<?php echo $secundary_id_rand;?>";
</script>