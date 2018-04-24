<?php
if(!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/private/BD/bd.php");

$id = $_GET['id'];
if(!isset($id)){
  ?>
<script>
  alert('Acceso denegado: No se reibieron los parametros necesarios.');
  window.location.href='javascript:history.go(-1);';
</script>
<?php
}
$res = BD::getInstance()->sqlSelectTodo("UPDATE `publicacion` SET pu_estado=0 WHERE pu_id={$id}");
 if($res == 1){
 	?>
<script>
  alert('El registro ha sido eliminado con éxito.');
  window.location.href='javascript:history.go(-1);';
</script>
<?php
 }
 	?>
<script>
  alert('El registro no se pudo eliminar.');
  window.location.href='javascript:history.go(-1);';
</script>
<?php

?>