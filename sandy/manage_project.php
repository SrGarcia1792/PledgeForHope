<?php
	include("../connect/connect.php");
?>
<script language="javascript" src="../js/jquery.js"></script>
<script language="javascript">
$(document).ready(function(){
	
		function loadData(){
			var categorias = "";
			if($("input#agricultura").attr("checked")){
				categorias = categorias+""+$("input#agricultura").attr("value")+",";
			}
						
			if($("input#desastres").attr("checked")){
				categorias = categorias +""+$("input#desastres").attr("value")+",";
			}
					
			if($("input#educacion").attr("checked")){
				categorias = categorias+""+$("input#educacion").attr("value")+",";
			}
						
			if($("input#igualdad").attr("checked")){
				categorias = categorias+""+$("input#igualdad").attr("value")+",";
			}
						
			if($("input#salud").attr("checked")){
				categorias = categorias+""+$("input#salud").attr("value")+",";
			}
			$("#categoryData").value = categorias;
		}
});
</script>

<form method="post" action="./project.php">
	<input type="hidden" name="categoryData" id="categoryData" onsubmit="loadData();" />
	<div>Nombre del Proyecto:<input type="text" name="name" /></div>
	<div>Descripcion del proyecto y compromiso:<textarea name="description"></textarea>
	<div>
		Categorias:
		<input type="checkbox" name="category" id="agricultura" value="AGRICULTURA" class="categories">Agricultura</input>
		<input type="checkbox" name="category" id="desastres" value="DESASTRES" class="categories">Desastres naturales</input>
		<input type="checkbox" name="category" id="educacion" value="EDUCACION" class="categories">Educación</input>
		<input type="checkbox" name="category" id="igualdad" value="IGUALDAD" class="categories">Igualdad de Genero</input>
		<input type="checkbox" name="category" id="salud" value="SALUD" class="categories">Salud</input>
	</div>
	
	<div>Localizacion:<input type="text" name="location" /></div>
	<button type="submit">Guardar</button>
	
</form>