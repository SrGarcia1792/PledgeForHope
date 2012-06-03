<?php
function buscar($strip)
{
require_once("Class.php");
require_once("../connect/connect.php");
$bd->select($strip);
}
?>