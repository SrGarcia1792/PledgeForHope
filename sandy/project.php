<?php
	include("../connect/connect.php");
	include("../lib/ClassMysql.php");
	//var
	$id_rand=substr(uniqid(rand()),0,22);;
	$pro = new project();
	$pro->sendData($_POST['name'], $_POST['description'], $_POST['categoryData'], $_POST['location']);
	
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
		
		public function sendData($name, $description, $categories, $location){
			$query = "INSERT INTO projects(owner_id, project_name, description, categories, location) VALUES('458585658', '$name', '$description', '$categories', '$location')";
			mysql_query($query) or die("Problemas en la conexion al tratar de establecer la conexion");
			echo "<h1>Proyecto creado correctamente!</h1>";
		}
		
	}


?>

<button onclick="window.location = './view.php'">Continuar</button>