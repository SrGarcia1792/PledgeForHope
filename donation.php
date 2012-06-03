<?php 
session_start();
include("connect/connect.php");
$user_id=$_SESSION['user_id'];
$id_project=$_POST['id_project'];
$value=$_POST['value'];

$sql="INSERT INTO  `recaudaciones` (
`id_recaudacion` ,
`user_id` ,
`id_project` ,
`value` ,
`date`
)
VALUES (NULL ,  '$user_id',  '$id_project',  '$value',  now());
";

$query=mysql_query($sql);

//insert updates
$sql="INSERT INTO `updates` (`update_id`, `user_id`, `update`,`date`,`id_proyect`) VALUES (NULL, '$user_id', 'se ha unido a la causa',now(),'$id_project');";
$query_updates=mysql_query($sql);


 $sql0="SELECT * FROM  `projects` where secundary_id_rand='$id_project'";
$query0=mysql_query($sql0);
$rows=mysql_fetch_array($query0);
$value=$rows['accomulate']+$value;
$sql="UPDATE  `projects` SET  `accomulate` =  '$value' WHERE  `secundary_id_rand` ='$id_project';";
$query=mysql_query($sql);
?>