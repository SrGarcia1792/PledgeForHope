<?php
session_start();
session_destroy();
setcookie("stem_aut",$pass, 0,"/",""); 
setcookie("stem_aut_u",$pass, 0,"/");
setcookie("stem_aut_p",$pass, 0,"/");
setcookie("stem_aut_i",$pass, 0,"/");
header("location:http://www.lolazoo.com/")
?>