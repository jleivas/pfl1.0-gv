<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
</head> 

<body> 
<?php

date_default_timezone_set("Chile/Continental");
$hoy = date('y-m-j');

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/private/dao/PresupuestoDao.php");
require_once($rootDir . "/private/dao/class.phpmailer.php");




try {

	if(!is_null($_FILES['upload']['size'])){

		$autor = $_POST['autor'];
		$proyecto = $_POST['proyecto'];
			$cliente= $_POST['nombre'];
			if(strlen($cliente)>2 && strlen($cliente)<90){
				$texto=  nl2br($_POST['mensaje']);
				if(strlen($texto)>2 && strlen($texto)<2000){
					$imagen= $_FILES['upload']['name'];
					$mail= $_POST['mail'];
					$autor= $_POST['autor'];

					//nombre de la imagen pueda ver.

					//inserto los datos en la clase
					$presupuesto = new Presupuesto();
					$id=PresupuestoDao::sqladdId();//tomo el id
					$presupuesto->setId($id);
					$presupuesto->setCliente($cliente);
					$presupuesto->setFecha($hoy);
					$presupuesto->setMail($mail);
					$presupuesto->setMensaje($texto);
					$presupuesto->setAutor($autor);
					$presupuesto->setEstado(1);
					//echo $publicacion->imprimir();


					//guardo la imagen con el id de la publicacion

					$nom=$id.".pdf";
					$target_path = "../pdf/";//$target_path: Es la ruta a la carpeta donde se almacenarán los archivos.


					//$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);//$_FILES['uploadedfile']['name']: Archivo finalmente guardado en la carpeta especificada.
					$target_path = $target_path .$nom;//$_FILES['uploadedfile']['name']: Archivo finalmente guardado en la carpeta especificada.


	         		$tamano=$_FILES['upload']['size'];//tamaño de la imagen
	         		
	  	     				
			        if($tamano==0){//si no se subio imagen, esto puede ser porque subio archivos de mas de 2MB de peso
			        ?>
						<script>
						alert('Ocurrió un error al subir la información\nDebe seleccionar un archivo en formato PDF.');
						window.location.href='javascript:history.go(-1);';
						</script>
					<?php
			        }else{//si selecciono imagen y se pudo subir.
			            if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_path)){ //si logra mover la imagen a la carpeta,
							 
			      			$presupuesto->setFile($nom);//inserto el nombre de la imagen en la clace publicacion
			      			PresupuestoDao::sqlInsert($presupuesto);//inserto todo en la base de datos
			      			if(enviarBoletin2($proyecto,$autor,$cliente,$texto,$mail,$nom)>0){
			      			?>
								<script>
									alert('Presupuesto enviado correctamente.');
									window.location.href='javascript:history.go(-1);';
								</script>
							<?php
							}else{
							?>
								<script>
									alert('Ocurrió un error al enviar el presupuesto.');
									window.location.href='javascript:history.go(-1);';
								</script>
							<?php
							}
						} else{
					        ?>
								<script>
									alert('Ocurrió un error al subir la información\nDebe seleccionar un archivo en formato PDF.');
									window.location.href='javascript:history.go(-1);';
								</script>
							<?php
					    }
					}

				}else//validacion texto
				{
		 			?>
					<script>
						alert('Debe escribir un mensaje a su destinataio.\nEL mensaje debe tener entre 3 y 2000 caracteres.');
						window.location.href='javascript:history.go(-1);';
					</script>
					<?php 
				} 
			}else//validacion titulo
			{
				?>
				<script>
					alert('El nombre del  cliente está mal ingresado.\nEl nombre debe tener entre 3 y 90 caracteres');
					window.location.href='javascript:history.go(-1);';
				</script>
				<?php
			} 
		}
	
				         
   


} catch (Exception $e) {
	
    ?>
	<script>
		alert('Ocurrió un error [ERROR L124]\nEs probable que el archivo pesa más de 2 MB.');
		//window.location.href='javascript:history.go(-1);';
	</script>
	<?php 
}finally  {
   
    ?>
	<script>
		alert('Ocurrió un error [ERROR L132]\nEs probable que el archivo pesa más de 2 MB.');
		//window.location.href='javascript:history.go(-1);';
	</script>
	<?php 
}


function enviarBoletin2($proyecto2,$autor2,$cliente2,$texto2,$mail2,$nombreArchivo)
{
	
	$mail = new PHPMailer();
	$mail->CharSet = 'UTF-8';
	$mail->Host = "mx1.hostinger.es";
	$mail->From = "no-reply@cimentasys.cl";
	$mail->FromName = "Cimenta S&S";
	$mail->Subject = "Presupuesto de ".$proyecto2." [cimentasys.cl]";
	$mail->IsHTML(true);
	$cont=0;
	// HTML body

	$mensaje = "<html>".
		"<head>".
		"<style type='text/css'>".
		  ".boton_personalizado{".
		    "text-decoration: none;".
		    "padding: 10px;".
		    "font-weight: 600;".
		    "font-size: 20px;".
		    "color: #ffffff;".
		    "background-color: #072170;".
		    "border-radius: 10px;".
		    "border: 2px #0016b0;".
		  "}".
		   ".boton_personalizado:hover{".
		    "color: #072170;".
		    "background-color: #ffffff;".
		  "}".
		  ".bloque {".
		  "background-color: #fafafa;".
		  "margin: 1rem;".
		  "padding: 1rem;".
		  "text-align: center;".
		"}".
		"</style>".
		"</head>".
		"<body>".
		"<div class='bloque' style='width:100%; height:auto;'>".
		"<font color='Blue' face='verdana'>".
		"<h1>Presupuesto de ".$proyecto2."</h1>".
		"<img align='center' src='https://www.softdirex.cl/imgMail/cimenta-logo-mail.png'><br>".
		"</font>".
		"<font face='verdana'>".
		  "Estimado ".$cliente2.", le informamos que se encuentra disponible el presupuesto para su proyecto:<br><br>".$texto2.
		  
		"</font>".
		"<br><br><br><a href='http://www.cimentasys.cl/' class='boton_personalizado'>Ir a cimentasys.cl</a><br><br><br>".
		"<font color='Blue' face='verdana'>".
		"<h3>Para visualizar el contenido, descargue el archivo adjunto.</h3>".
		"</font>".
		  
		
		  "Atentamente ".$autor2.
      		
		  "<hr><h6>Copyright 2018 por <a href='www.softdirex.cl' target='_blank' color='Blue'><b>Softdirex</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
		        <img align='center' src='https://www.softdirex.cl/assets/img/ft-cimenta.png'>      ".
		  "&nbsp;&nbsp;&nbsp;&nbsp;<a href='www.cimentasys.cl' target='_blank' color='Blue'><b>Cimenta S&S</b></a>".
		" Construimos tus sueños</h6>".
		"<hr>".
		"</div>".
		"</body>".
		  "</html>";
	// Configurar Email
    $archivo = '../pdf/'.$nombreArchivo;
    $mail->AddAttachment($archivo,$archivo);
	$mail->Body = $mensaje;
	//$mail->AltBody = $text;
	$mail->AddAddress($mail2);
	// Enviar el email
	if(!$mail->Send()) {
	?>
			<script>
				alert('Error al enviar a: <?php echo $mail; ?>.');
			</script>
	<?php
	}else{
		$cont++;
	}
	$mail->ClearAddresses();
	return $cont;
	//------------------------------------------------------------------------------------------------
	
	
}
?>

 

</body> 
</html>