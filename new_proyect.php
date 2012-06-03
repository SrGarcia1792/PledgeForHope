<?php include("header.php"); ?>
<?php include("connect/connect.php"); ?>
<form method="post" action="<?php if(!empty($_GET['action'])){?>./update_project.php<?php ;}else{?>./project_controller.php<?php;} ?>">
	<div id="body">
	<div id="box-registro">
	<?php if(empty($_GET['action'])){?>
	<h3>Crear un proyecto</h3>
	<?php;}else{ ?>
	<h3>Editar proyecto</h3>
	
	<?php
	$id_proyect=$_GET['proyect'];
	$sql="select * from projects where secundary_id_rand='$id_proyect'";
	$query=mysql_query($sql);
	$rows_proyect=mysql_fetch_array($query);
		
	;} ?>
	<div class="c-1">
	<input type="hidden" name="projectId" value="<?php echo $rows_proyect['project_id'];?>" />
	<input type="hidden" name="secundaryId" value="<?php echo $id_proyect;?>" />
	Nombre del proyecto:<br />
	<input type="text" name="name" value="<?php echo $rows_proyect['project_name'];?>" /><br />
	Descripcion del Proyecto y compromisos:<br />
	<textarea name="description" ><?php echo $rows_proyect['description'];?></textarea><br />
	Que nos mueve a realisar el Proyecto?<br />
	<textarea name="motivation" ><?php echo $rows_proyect['motivation'];?></textarea><br />
	Cuanto necesitamos?<br />
	<input name="found" value="<?php echo $rows_proyect['found'];?>" ><br />

	</div>
	<div class="c-1">
	Categoria<br />
	<select name="categories">
	<option>-----</option>
	<option value="AGRICULTURA">Agricultura</option>
	<option value="DESASTRES">Desastres Naturales</option>
	<option value="EDUCACION">Educacion</option>
	<option value="IGUALDAD">Medio Ambiente</option>
	<option value="SALUD">Salud</option>
	</select><br />
	URL de la imagen<br />
	<input type="text" name="url_image" value="<?php echo $rows_proyect['url_image'];?>"/><br />
	URL video de Youtube<br />
	<textarea name="embed_youtube" ><?php echo $rows_proyect['embed_youtube'];?></textarea><br />
	Escribir ubicacion de la ayuda<br />
	<input type="text" name="location" value="<?php echo $rows_proyect['location'];?>"/><br />
	<button type="submit">Guardar</button>
	</div>
	</div>
	</div>
	
</form>
</body>
</html>
