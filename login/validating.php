<?php 
session_start();
include("../connect/connect.php");

//var
$user_id=$_POST['user_id'];
$username=$_POST['username'];
$name_large=$_POST['name_large'];
$email=$_POST['email'];
$sex=$_POST['sex'];
$birth=$_POST['birth'];
$old_date=$_POST['old_date'];
$date_register=$_POST['date_register'];
$about_me=$_POST['about_me'];
$ip=$_SERVER['REMOTE_ADDR'];
$image_user=$_POST['image_user'];
$image_thum=$_POST['image_thum'];

//session variable init

$_SESSION["user_id"]=$user_id;
$_SESSION["user_name"]=$username;
$_SESSION["email"]=$email;
$_SESSION["name"]=$name_large;
$_SESSION["image_user"]=$photo;
$_SESSION["image_thum"]=$image_thum;
$_SESSION["about_me"]=$about_me;
$_SESSION['adentro']=md5(1);

//check_init_session

$sql="select user_id from users where user_id='$user_id'";
$query=mysql_query($sql);
$num_rows=mysql_num_rows($query);
if($num_rows==0){
$sql_insert="INSERT INTO `users` 
(`id`,
 `user_id`,
 `username`, 
 `name_large`,  
 `Email`, 
 `sex`, 
 `birth`, 
 `old_date`, 
 `date_register`, 
 `term`, 
 `ip_user`, 
 `status`,
 `about_me`) 
 VALUES (
 NULL, 
 '$user_id', 
 '$username', 
 '$name_large', 
 '$email', 
 '$sex', 
 '$birth', 
 '$old_date', 
 '$date_register', 
 'yes',  
 '$ip', 
 'active',
 '$about_me');";
$query_insert=mysql_query($sql_insert) or die("No Has podido iniciar session");
}else{

$sql_insert="INSERT INTO `photo_select` (`id`, `user_id`, `photo`, `post`) VALUES (NULL, '$user_id', 'http://www.lolazoo.com/$image_user', 'http://www.lolazoo.com/$image_thum');";
$query_insert=mysql_query($sql_insert) or die("No Has podido iniciar session");

}
header("location:../inicio.php");
?>