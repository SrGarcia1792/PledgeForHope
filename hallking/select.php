<?php
require_once("Class.php");
require_once("../connect/connect.php");
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="">
<select name="customers" onchange="showCustomer(this.value)">
<option value=NULL>Select a customer:</option>
<?php 			
$result = mysql_query("SELECT categories FROM projects");	
	while($row = mysql_fetch_array($result))
		{
			echo "<option value=".$row['categories'].">".$row['categories']."</option>";
		}
?>
</select>
</form>
</body>
</html>
<script type="text/javascript" src="select.js"></script>