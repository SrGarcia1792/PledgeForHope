<?php
session_start();
	include("./connect/connect.php");
	
	//var
	
	
	$name = $_POST['name'];
	$description = $_POST['description'];
	$location = $_POST['location'];
	$motivation =$_POST['motivation'];
	$found=$_POST['found'];
	$start_day=$_POST['start_day'];
	$categories=$_POST['categories'];
	$url_image=$_POST['url_image'];
	$embed_youtube=$_POST['embed_youtube'];
	$secundary_id_rand=substr(uniqid(rand()),0,22);
	
	$pro = new project();
	$pro->sendData($name, $description, $categories, $location,$motivation,$found,$start_day,$url_image,$embed_youtube,$secundary_id_rand);
	
	class project{
	
		var $name = "";
		var $description = "";
		var $categories = "";
		var $location = "";
		
		public function __construct(){
			
		}
		
		public function setName($name){
			$this->name = $name;
		}
		
		public function getName(){
			return $name;
		}
		
		public function setDescription($description){
			$this->description = $description;
		}
		
		public function getDescription(){
			return $description;
		}
		
		public function setCategories($categories){
			$this->categories = $categories;
		}
		
		public function getCategories(){
			return $categories;
		}
		
		public function setLocation($location){
			$this->location = $location;
		}

		public function getLocation(){
			return $location;
		}
		
		public function sendData($name, $description, $categories, $location,$motivation,$found,$start_day,$url_image,$embed_youtube,$secundary_id_rand){
			$query = "INSERT INTO projects(
			owner_id,
			project_name, 
			description,
			motivation,
			found,
			start_day,
			categories,
			url_image,
			embed_youtube, 
			location,
			secundary_id_rand
			) VALUES('$_SESSION[user_id]', '$name', '$description','$motivation','$found',now(),'$categories','$url_image','$embed_youtube', '$location','$secundary_id_rand')";
			mysql_query($query) or die("Problemas en la conexion al tratar de establecer la conexion");
		
		}
		
	}


?>
<script>
location.href="proyect.php?proyect=<?php echo $secundary_id_rand;?>";
</script>