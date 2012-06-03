<?php 
session_start();
include("security.php");
$name_user=$_SESSION["name"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pledge for hoper</title>
<link rel="stylesheet" type="text/css" href="css/estilos.css" media="all" />
<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="js/ui.js"></script>
<script language="javascript" type="text/javascript" src="js/csspopup.js"></script>
</head>
<body>
  <div id="capaPopUp"></div>
    <div id="popUpDiv">
        <div id="capaContent" class="<?php echo $_GET['proyect']; ?>">
		<a href="javascript:void(0);" title="Cerrar" id="cerrar" style="float: right;
margin-right: -32px;
font-weight: bold;
margin-top: -33px;
text-decoration: none;
color: 
#333;
font-weight: bold;">X</a>
            <div>
			<div class="button2 blue" value="100">
			100
		    </div>
			<div class="button2 blue" value="40">
			40
		    </div>
			<div class="button2 blue" value="20">
			20
		    </div>
			<div class="button2 blue" value="10">
			10
		    </div>
			<div class="button2 blue" value="other">
			Otros
		    </div>
			<br>
			<div style="width:535px;margin:0 auto;margin-top:30px;overflow:hidden;text-align:center;">
			<span style="margin-right:10px;font-size:12px;">Tu donacion</span> <b>$</b><input type="text" name="" id="camp_donation" style="font-size: 21px;font-weight: bold;width:325px;height:35px;outline:none;box-shadow: inset 2px 2px 6px #ddd;">
           
			</div>
			<div style="margin-left: 229px;margin-top: 26px;"><div class="button2 blue2" onclick="javascript:void(0);" id="submit_donation" style="width:100px;margin:0 auto;" value="submit">
			Donar
		    </div>
		    </div>
            </div>
            
        </div>
    </div>
<div id="header">
<a href="inicio.php">
<img src="img/logo.png" border="0" style="float:left;margin-top:8px;margin-left:10px;">
</a>
<div class="menu_header">
<ul style="margin-left: 118px;">
<li>
<a href="dashboard.php">
Dashboard
</a>
</li>
<li>
<a href="index.php">
Perfil 
</li>
<li>
<a href="all-proyects.php">
Proyectos
</a>
</li>
<li>
<input type="text" placeholder="Buscar..." style="margin-top: -10px;display:none;">
</li>
<li>
<a href="logout/">
Salir
</a>
</li>
</ul>
</div>
<a href="http://www.lolazoo.com/<?php echo $_SESSION["user_name"];?>" target="_blank" style="color:#fff;text-decoration:none;">
<div style="float:right;width:140px;margin-top:5px;height:55px;overflow:hidden;">
<img src="http://www.lolazoo.com/<?php echo $_SESSION["image_thum"];?>" style="float:left;" class="img_header">
<div style="margin-top: 13px;
margin-left: 41px;
font-size: 10px;">
<?php echo $_SESSION["name"]; ?>
</div>
</div>
</a>
</div>