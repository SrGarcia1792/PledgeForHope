<?php 
	include("./connect/connect.php");
	include("header.php"); 
?>
<div id="body">
<!--<div id="box" class="box01">
<?php //include("./hallking/select.php"); ?>
</div> -->
<div id="box" class="box02">
<?php 
	$query = "select * from projects";
	$results = mysql_query($query);

	while($reg = mysql_fetch_array($results)){
		echo "<div><a href='proyect.php?proyect={$reg['secundary_id_rand']}'><img src=".$reg['url_image']. " width='208' height='116' /></a>";
		echo "<h3>".$reg['project_name']."</h3>";
		echo "<p class='info-proyecto'>".substr($reg['description'],0,150)."<a href='proyect.php?proyect={$reg['secundary_id_rand']}'>.(M&aacute;s informaci&oacute;n)</a></p></div>";
	}
?>
</div>

</div>
</div>
</body>
</html>
