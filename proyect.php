<?php
session_start();
include("connect/connect.php");
include("header.php");
include("lib_name.php");
$id_proyect=$_GET['proyect'];
$time=time();
//var
$sql_view="INSERT INTO  `popolarity_proyect` (
`user_id` ,
`secundary_id_rand` ,
`date` ,
`timeline`
)
VALUES (
'$_SESSION[user_id]','$id_proyect', now(),  '$time'
)";


$query_view=mysql_query($sql_view);


$sql="select * from projects where secundary_id_rand='$id_proyect'";
$query=mysql_query($sql);
$rows_proyect=mysql_fetch_array($query);
 ?>

<div id="body">
  <div id="box-p">
    <div class="galery" style="text-align:center;overflow:hidden;">
	
	<img src="<?php echo $rows_proyect['url_image']; ?>" style="margin:0 auto;width:640px;">
	
</div>
<br /><h2>Descripción del proyecto</h2>
    <div class="descripcion">
      
      <p><?php echo $rows_proyect['description']; ?></p>
      <h3>QUÉ NOS MUEVE A REALIZARLO</h3>
      <p><?php echo $rows_proyect['motivation']; ?></p>
      <h3>CUÁNTO DINERO NECESITAMOS Y PARA QUÉ</h3>
      <p><?php echo $rows_proyect['found']; ?></p>
      <h3>CUÁNDO EMPEZAMOS</h3>
      <p><?php echo $rows_proyect['start_day']; ?></p>
    </div>
  </div>
  <div id="box2" class="box01">
    <h2><?php echo $rows_proyect['project_name']; ?></h2>
    <div>
    <a href="index.php?user=<?php echo $rows_proyect['owner_id']; ?>" style="color:#444;text-decoration:none;">  <p class="info-proyecto"> <div class="block_updates" style="width: 95%;">
        <div class="img_block_updates"> <img src="<?php echo image_user($rows_proyect['owner_id']);?>"> </div>
        <div class="inf_block" style="margin-top:0px;margin-left:83px;">
          <div class="public_name"><?php echo get_name($rows_proyect['owner_id']);?></div>
          <div class="content_block_public" style="margin-top: 2px;">
            <div class="content_meta">
              <div style="float:left;"> <span class="leyend_money"> Recaudado </span><br>
                <span style="color:#f60;font-weight:bold;">$<?php echo $rows_proyect['accomulate']; ?></span> </div>
              <div style="float:right;"> <span class="leyend_money"> Meta </span><br>
                <span >$<?php echo $rows_proyect['found']; ?></span> </div>
            </div>
          </div>
		  <?php 
		  $porciento_barra=100/$rows_proyect['found']*$rows_proyect['accomulate'];
		  
		  ?>
          <div class="bar_status">
            <div class="slide_bar" style="width:<?php echo $porciento_barra; ?>%;"></div>
          </div>
        </div>
          </p></a>
      <p> Categoria: <?php echo $rows_proyect['categories']; ?> </p>
    </div>
	<br>
	<?php if($rows_proyect['owner_id']==$_SESSION['user_id']){?>
	<div>
	<a href="new_proyect.php?action=edit&proyect=<?php echo $id_proyect; ?>" style="padding:5px;text-decoration:none;color:#fff;background:#F60;;">Editar proyecto</a>
	</div>
	<?php ;}?>
    <div class="foot-usuario" style="display:none;">Una idea de: <a href="#">usuario</a> </div>
  </div>
  </div> <a href="javascript:void(0);" title="Abrir PopUp" id="abrirPop">Aporta </a>
</body>
</html>
