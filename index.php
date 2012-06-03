<?php
session_start();
 include("header.php"); 
include("connect/connect.php");
if(empty($_GET['user'])){
$user_id=$_SESSION['user_id'];
}else{
$user_id=$_GET['user'];
}
$sql="SELECT u.name_large,u.about_me,i.photo FROM  users u, photo_select i where u.user_id=i.user_id  and u.user_id='$user_id' LIMIT 1";
$query=mysql_query($sql);
$rows_inf=mysql_fetch_array($query);
$name=$rows_inf["name_large"];
$about_me=$rows_inf["about_me"];
$img_user=$rows_inf["photo"];
?>
<div id="body">
<div id="box" class="box01">
  <div class="img-usuario"><img src="<?php echo $img_user; ?>" width="208" height="208" /></div>
  <div class="descripcion">
    <h2><?php echo $name; ?></h2>
    <p class="informacion"><?php echo $about_me;?></p>
  </div>
</div>
<div id="box" class="box02">
  <h2>Proyectos realizados</h2>
   <?php
 $sql="select * from projects where owner_id='$user_id'";
$query=mysql_query($sql) or die("Lista no obtenida");
$num_rows=mysql_num_rows($query);
while($rows_proyect=mysql_fetch_array($query)){
 ?>
 <a href="proyect.php?proyect=<?php echo $rows_proyect['secundary_id_rand']; ?>">
  <div><img src="<?php echo $rows_proyect['url_image']; ?>" width="208" height="116"/>
    <h3><?php echo $rows_proyect['project_name']; ?></h3>
    <p class="info-proyecto"><?php echo substr($rows_proyect['description'],0,190)."..."; ?></p>
  </div>
  </a>
<?php ;}
if($num_rows==0){
?>

<table style="width:200px;height:50px;margin:0 auto;background-color: 
#F6F6F6;margin-top:40px;margin-bottom:40px;text-align:center;box-shadow: 
#999 0 0 3px;">
<tr>
<td>
No tienes proyectos creados.
</td>
</tr>
</table>
<?php

}?>


</div>
<div id="box" class="box02" style="display:none;">
  <h2>Proyectos en los que ha aportado</h2>
  <div>
  <span><img src="img/proyecto-img-3.jpg" width="90" height="87"/> ha aportado #200</span>
    <h3>nombre del proyecto</h3>
    <p class="info-proyecto"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
  </div>
</div>
</div>
</body>
</html>
