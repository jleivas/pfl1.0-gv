<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/private/dao/UsuarioDao.php");
$dominio = $_SERVER['HTTP_HOST']; 


//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir

$user = $_POST['mail'];
$pass = $_POST['pass'];
if(isset($user)){
	
//Ejecutamos sqlDelete pasando la instancia creada 
// Es conveniente pasar la instancia
// Así se pasa encapsulados los datos

	$usuario1 = UsuarioDao::sqlCargar($user);
// sqlFetchActor llena los valores que faltan
// de nuestra instancia Usuario1
//UsuarioDao::sqlFetchUsuario($usuario1);
// Como el método es Static, no es necesario 
// crear una variable de la clase ActorDao

// Desplegamos los valores llenados
	if($usuario1 == null){
		?>
		<script>
		alert('El Email ingresado no existe.');
		window.location.href='javascript:history.go(-1);';
		</script>
		<?php
	}else{
		$dbHash = $usuario1->getPassword();
		$pass = strtolower($pass);
		if (strcmp($pass, $dbHash) === 0){
			session_start();
			$_SESSION['usuario'] = $usuario1;
		    if($_SESSION['usuario']->getEstado() == 0){
				session_destroy();
				?>
				<script>
				alert('Lo sentimos <?php echo $_SESSION['usuario']->getNombre(); ?>, te encuentras bloqueado.');
				window.location.href='javascript:history.go(-1);';
				</script>
				<?php
			}else{
				if($usuario1->getTipo()==1){
				?>
				<script>
				alert('<?php echo $_SESSION['usuario']->getNombre(); ?>: Bienvenido.');
				window.location.href='../view/pages/index.php';
				</script>
				<?php
				}else{
				?>
				<script>
				alert(' Esto es raro, No puedes entrar.');
				window.location.href='javascript:history.go(-1);';
				</script>
				<?php
				}	
			}
		}
		else{
		    ?>
			<script>
			alert('La contraseña ingresada es incorrecta.');
			window.location.href='javascript:history.go(-1);';
			</script>
			<?php
		}
		
		//$_SESSION['pass'] = $usuario1->getPassword();
		//$_SESSION['tipo'] = $usuario1->getTipo();
		//$_SESSION['activo'] = $usuario1->getActivo();
			
	}
	//echo "Usuario1 Rut : {$usuario1->getRut()}<br>" ;
	
}else{
?>
<script>
alert('Ha ocurrido un error inesperado en la conexión. Por favor, póngase en contacto con nosotros.');
window.location.href='javascript:history.go(-2);';
</script>
<?php
}
?>