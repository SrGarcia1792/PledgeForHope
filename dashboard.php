<?php include("header.php"); 
include("lib_name.php");
?>

<div id="body">

<div id="box"  style="width: 640px;overflow:hidden;float:left;">
<div class="title_content_updates">
Colaboraciones
</div>
<div class="updates">

<?php 
$sql="SELECT u.user_id,u.update,u.date,p.secundary_id_rand,p.project_name FROM  updates u,projects p where p.secundary_id_rand=u.id_proyect ORDER BY u.update_id DESC  ";
$query=mysql_query($sql);
while($rows_updates=mysql_fetch_array($query)){
?>

<div class="block_updates">
<div class="img_block_updates">
<img src="<?php echo image_user($rows_updates['user_id']);?>">
</div>
<div class="inf_block">
<div class="public_name"><?php echo get_name($rows_updates['user_id']);?></div>
<div class="content_block_public">
<?php echo $rows_updates['update']; ?>: <a href="proyect.php?proyect=<?php echo $rows_updates["secundary_id_rand"];?>"><?php echo $rows_updates["project_name"];?></a>
</div>
<div class="timeline">
<?php echo $rows_updates['date']; ?>
</div>
</div>
</div>
<?php ;}?>

</div>


</div>
<a href="new_proyect.php">
<div class="buttom_left_updates">
Crear nuevo proyecto
</div>
</a>
<div class="left_dasboard">
<div class="title_content_updates_left" style="color:#fff;background-color: #069;">
Proyectos mas populares
</div>
<div class="block_inf">
<?php 
$sql="select o.secundary_id_rand,o.owner_id,o.project_name,o.accomulate,o.found,COUNT( o.secundary_id_rand ) AS total from projects o , popolarity_proyect p where o.secundary_id_rand=p.secundary_id_rand ORDER BY total desc LIMIT 10";
$query=mysql_query($sql);
$num_rows=mysql_num_rows($query);
while($rows_proyect=mysql_fetch_array($query)){
?>
<div class="block_updates" style="width: 95%;">
 <a href="index.php?user=<?php echo $rows_proyect['owner_id']; ?>" style="color:#444;text-decoration:none;">
<div class="img_block_updates">
<img src="<?php echo image_user($rows_proyect['owner_id']);?>">
</div>
</a>
<div class="inf_block" style="margin-top:0px;margin-left:83px;">
 <a href="proyect.php?proyect=<?php echo $rows_proyect['secundary_id_rand']; ?>" style="color:#444;text-decoration:none;">
<div class="public_name"><?php echo $rows_proyect['project_name']; ?></div>
</a>
<div class="content_block_public" style="margin-top: 2px;">
<div class="content_meta">
<div style="float:left;">
<span class="leyend_money">
Recaudado
</span><br>
<span style="color:#f60;font-weight:bold;">$<?php echo $rows_proyect['accomulate']; ?></span>
</div>
<div style="float:right;">
<span class="leyend_money">
Meta
</span><br>
<span >$<?php echo $rows_proyect['found']; ?></span>
</div>
</div>
</div>
 <?php 
		  $porciento_barra=100/$rows_proyect['found']*$rows_proyect['accomulate'];
		  
		  ?>
<div class="bar_status">
<div class="slide_bar" style="width:<?php echo $porciento_barra; ?>%;"></div>
</div>
</div>
</div>
</a>
</a>
<?php ;}?>
</div>
<div class="title_content_updates_left" style="color:#fff;background-color: #069;">
Proyectos mas recientes
</div>
<div class="block_inf">
<?php 
$sql="select * from projects order by project_id DESC limit 5";
$query=mysql_query($sql);
$num_rows=mysql_num_rows($query);
while($rows_proyect=mysql_fetch_array($query)){
?>
<div class="block_updates" style="width: 95%;">
 <a href="index.php?user=<?php echo $rows_proyect['owner_id']; ?>" style="color:#444;text-decoration:none;">
<div class="img_block_updates">
<img src="<?php echo image_user($rows_proyect['owner_id']);?>">
</div>
</a>
 <a href="index.php?user=<?php echo $rows_proyect['owner_id']; ?>" style="color:#444;text-decoration:none;">
<div class="inf_block" style="margin-top:0px;margin-left:83px;">
</a>
 <a href="proyect.php?proyect=<?php echo $rows_proyect['secundary_id_rand']; ?>" style="color:#444;text-decoration:none;">
<div class="public_name"><?php echo $rows_proyect['project_name']; ?></div>
</a>
<div class="content_block_public" style="margin-top: 2px;">
<div class="content_meta">
<div style="float:left;">
<span class="leyend_money">
Recaudado
</span><br>
<span style="color:#f60;font-weight:bold;">$<?php echo $rows_proyect['accomulate']; ?></span>
</div>
<div style="float:right;">
<span class="leyend_money">
Meta
</span><br>
<span >$<?php echo $rows_proyect['found']; ?></span>
</div>
</div>
</div>
 <?php 
		  $porciento_barra=100/$rows_proyect['found']*$rows_proyect['accomulate'];
		  
		  ?>
<div class="bar_status">
<div class="slide_bar" style="width:<?php echo $porciento_barra; ?>%;"></div>
</div>
</div>
</div>

<?php ;}?>

</div>
</div>
</div>