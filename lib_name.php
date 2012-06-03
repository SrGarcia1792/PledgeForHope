<?php 
include("connect/connect.php");
function get_name($user_id){
$sql="SELECT name_large FROM  `users` where  user_id='$user_id' limit 1";
$query=mysql_query($sql);
while($rows=mysql_fetch_array($query)){
return $rows["name_large"];
}
}

function image_user($user_id){
$sql="SELECT post FROM  `photo_select` where  user_id='$user_id' limit 1";
$query=mysql_query($sql);
while($rows=mysql_fetch_array($query)){
return $rows['post'];
}
}

?>