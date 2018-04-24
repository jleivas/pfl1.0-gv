<?php



if(isset($_POST['email'])) {
 
    // Edita las dos líneas siguientes con tu dirección de correo y asunto personalizados
 
    $para = "contacto@softdirex.cl";
 
    $email_subject = "Contacto [OSTENDE - SOFTDIREX.CL]";   

    $error_message ="";
 
    function died($error) {
 
        // si hay algún error, el formulario puede desplegar su mensaje de aviso
?>
        <script>
        alert('Lo sentimos, hubo un error en sus datos:\n\n <?php echo $error;?>');
        window.location.href='javascript:history.go(-1);';
        </script>
<?php 
        die();
    }
 
    // Se valida que los campos del formulairo estén llenos
 
    if(!isset($_POST['nombre']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['mensaje'])) {
 
        died('Debe ingresar su nombre, correo y un mensaje.');       
 
    }
 //En esta parte el valor "name" nos sirve para crear las variables que recolectaran la información de cada campo
    
    $nombre = $_POST['nombre']; // requerido
 
    $mail = $_POST['email']; // requerido

    $mensaje = $_POST['mensaje']; // requerido 

//En esta parte se verifica que la dirección de correo sea válida 
    
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$mail)) {
 
    $error_message .= 'La dirección de correo proporcionada no es válida.\n\n';
 
  }

//En esta parte se validan las cadenas de texto

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$nombre)) {
 
    $error_message .= 'El formato del nombre no es válido\n\n';
 
  }
 
  if(strlen($mensaje) < 2) {
 
    $error_message .= 'El formato del texto no es válido.\n\n';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
//A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo


 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $nombreMail = "Nombre: ".clean_string($nombre);
 
    $mailMail = "Email: ".clean_string($mail);
 
    $mensajeMail = "Mensaje: ".clean_string($mensaje);

// Inicio mensaje ------------------------------------------------------------------------------------------------------
    $titulo = 'Contacto | OSTENDE.SOFTDIREX.CL';
     
    $email_message = "<html>".
    "<head>".
    "<style type='text/css'>".
      ".boton_personalizado{".
        "text-decoration: none;".
        "padding: 10px;".
        "font-weight: 600;".
        "font-size: 20px;".
        "color: #ffffff;".
        "background-color: #ff8000;".
        "border-radius: 10px;".
        "border: 2px #0016b0;".
      "}".
       ".boton_personalizado:hover{".
        "color: #ff8000;".
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
    "<font color='Orange' face='verdana'>".
    "<h1>Tienes un nuevo mensaje desde un formulario de contacto</h1>".
    "<img align='center' src='https://www.softdirex.cl/assets/img/softdirex_logo.png'><br>".
    "<br>".
    "</font>".
    "<font face='verdana'>".
      "<hr><h2>Los contenidos del mensaje son:</h2><hr><br><br>".
      "<p align='left'>".
    $nombreMail."<br><br>".$mailMail."<br><br><h3>Mensaje:</h3><br>".$mensajeMail.
      "</p>".
    "</font>".
      "<hr><br><br><br>".
      "No responda a este correo electrónico, mensaje enviado desde el servidor.<br><br><br>".
      "<hr><h6>Copyright 2017 por Softdirex&nbsp;&nbsp;&nbsp;&nbsp;
            <img align='center' src='https://www.softdirex.cl/assets/img/footer-logo.png'>      ".
      "&nbsp;&nbsp;&nbsp;&nbsp;<a href='www.softdirex.cl' color='Orange'><b>Softdirex</b></a>".
    " Un nuevo concepto para tu empresa</h6>".
    "</div>".
    "</body>".
      "</html>";

    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $cabeceras .= 'From: Softdirex<no-responder@softdirex.cl>';

      
     
     
    @mail($para, $titulo, $email_message, $cabeceras);

// fin mensaje ------------------------------------------------------------------------------------------------------
   
 

?>
<script>
  alert('¡Su mensaje ha sido enviado satisfactoriamente!\nNos pondremos en contacto contigo a la brevedad.');
  window.location.href='javascript:history.go(-1);';
</script>
<?php 

}



?>