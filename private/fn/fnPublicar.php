<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
</head> 

<body> 
<?php



if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/private/dao/PublicacionDao.php");




try {

	if(!is_null($_FILES['upload']['size'])){

		$autor = $_POST['autor'];
		if(strlen($autor)>3 && strlen($autor)<45){
			$titulo= $_POST['titulo'];
			if(strlen($titulo)>2 && strlen($titulo)<45){
				$texto=  nl2br($_POST['contenido']);
				if(strlen($texto)>2 && strlen($texto)<2000){
					$imagen= $_FILES['upload']['name'];


					//nombre de la imagen pueda ver.

					//inserto los datos en la clase
					$publicacion = new Publicacion();
					$id=PublicacionDao::sqladdId();//tomo el id
					$publicacion->setId($id);
					$publicacion->setAutor($autor);
					$publicacion->setTitulo($titulo);
					$publicacion->setContenido($texto);
					//echo $publicacion->imprimir();


					//guardo la imagen con el id de la publicacion

					$nom=$id.".jpg";
					$target_path = "../img/";//$target_path: Es la ruta a la carpeta donde se almacenarán los archivos.


					//$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);//$_FILES['uploadedfile']['name']: Archivo finalmente guardado en la carpeta especificada.
					$target_path = $target_path .$nom;//$_FILES['uploadedfile']['name']: Archivo finalmente guardado en la carpeta especificada.


	         		$tamano=$_FILES['upload']['size'];//tamaño de la imagen
	         		
	  	     				
			        if($tamano==0){//si no se subio imagen, esto puede ser porque subio archivos de mas de 2MB de peso
			        ?>
						<script>
						alert('Ocurrió un error al subir la imagen\nDebe seleccionar una imagen en formato Jpeg.');
						window.location.href='javascript:history.go(-1);';
						</script>
					<?php
			        }else{//si selecciono imagen y se pudo subir.
			            if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)){ //si logra mover la imagen a la carpeta,
							 
			      			$publicacion->setImagen($nom);//inserto el nombre de la imagen en la clace publicacion
			      			PublicacionDao::sqlInsert($publicacion);//inserto todo en la base de datos
			      			?>
								<script>
									alert('Contenido publicado correctamente.');
									window.location.href='javascript:history.go(-1);';
								</script>
							<?php
						} else{
					        ?>
								<script>
									alert('Ocurrió un error al subir la imagen\nDebe seleccionar una imagen en formato Jpeg.');
									window.location.href='javascript:history.go(-1);';
								</script>
							<?php
					    }
					}

				}else//validacion texto
				{
		 			?>
					<script>
						alert('Ocurrió un error al subir la imagen\nEsto se debe a que el texto está mal ingresado.\nEL texto debe tener entre 3 y 2000 caracteres.');
						window.location.href='javascript:history.go(-1);';
					</script>
					<?php 
				} 
			}else//validacion titulo
			{
				?>
				<script>
					alert('Ocurrió un error al subir la imagen\nEsto se debe a que el titulo  está mal ingresado.\nEL titulo debe tener entre 3 y 44 caracteres');
					window.location.href='javascript:history.go(-1);';
				</script>
				<?php
			} 
		}else//validacion autor
		{
			?>
			<script>
				alert('Ocurrió un error al subir la imagen\nEsto se debe a que el nombre del autor está mal ingresado.\nEl nombre del autor debe tener entre 4 y 44 caracteres');
				window.location.href='javascript:history.go(-1);';
			</script>
			<?php
		}	
	}
				         
    ?>
		<script>
			alert('Ocurrió un error al subir la imagen.');
			//window.location.href='javascript:history.go(-1);';
		</script>
	<?php


} catch (Exception $e) {
	
    ?>
	<script>
		alert('Ocurrió un error al subir la imagen [ERROR L124]\nEs probable que la imagen pesa más de 2 MB.');
		//window.location.href='javascript:history.go(-1);';
	</script>
	<?php 
}finally  {
   
    ?>
	<script>
		alert('Ocurrió un error al subir la imagen [ERROR L132]\nEs probable que la imagen pesa más de 2 MB.');
		//window.location.href='javascript:history.go(-1);';
	</script>
	<?php 
}
?>

 

</body> 
</html>