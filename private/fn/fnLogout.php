<?php
date_default_timezone_set("Chile/Continental");
$ahora = date('H');
session_start();
if($_SESSION['usuario']){
	session_destroy();
if ($ahora < 12 && $ahora > 2){
?>
<script>
alert('Has cerrado sesión. Que tengas un buen día!');
window.location.href='../../index.php';
</script>
<?php
}
else if ($ahora < 19 && $ahora > 11){
?>
<script>
alert('Has cerrado sesión. Que tengas una buena tarde!');
window.location.href='../../index.php';
</script>
<?php
}
else{
?>
<script>
alert('Has cerrado sesión. Buenas noches!');
window.location.href='../../index.php';
</script>
<?php
}

}else{
?>
<script>
window.location.href='../../index.php';
</script>
<?php
}
?>