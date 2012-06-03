<?php
session_start();

function URL(){

$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$url=base64_encode($url);
return $url;

}

if($_SESSION['adentro']!=md5(1)){
?>
<script>
location.href="login/?logout=automatic&callback=<?php echo URL();?>"
</script>
<?php }else{

}
?>