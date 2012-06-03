<?php
//error_reporting(0);
	$connect = mysql_connect("localhost","root","");
		if(!$connect)
		{
			die("Error Conex 0001:". mysql_error());
		}
	$mysql_select_db = mysql_select_db("holpe", $connect);
		if(!$mysql_select_db)
		{
			die("Error Select 0002:". mysql_error());
		}
?>
