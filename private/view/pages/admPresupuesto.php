<?php
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
require_once($rootDir . "/private/dao/UsuarioDao.php");
session_start();//carga la sesion
if(!$_SESSION){
?>
<script>
  alert('Acceso denegado: Debes iniciar sesión primero.');
  window.location.href='javascript:history.go(-1);';
</script>
<?php
}

$usuario1 = UsuarioDao::sqlCargar($_SESSION['usuario']->getMail());

if($usuario1->getTipo() != 1){
session_destroy();
?>
<script>
  alert('Acceso denegado: Debes iniciar sesión primero.');
window.location.href='javascript:history.go(-1);';
</script>
<?php
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SdxPlus - Cimenta S&S</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <?php include("contents/head.php") ?>

                
                <!-- /.navbar-top-links -->
                <?php include("contents/nav.php") ?>
                
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Enviar un nuevo presupuesto    </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Complete el siguiente formulario
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" enctype="multipart/form-data" action="../../fn/fnEnviar.php" method="post">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Nombre del proyecto" name="proyecto" required="required">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Nombre del cliente" name="nombre" required="required">
                                                <input type="hidden" class="form-control" placeholder="Autor" name="autor" value="<?php echo $_SESSION['usuario']->getNombre()." ".$_SESSION['usuario']->getApellido(); ?>" required="required">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Email del cliente" name="mail" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label>Adjuntar presupuesto en formato PDF</label>
                                                <input name="upload" type="file">
                                            </div>
                                            
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                                <label>Mensaje</label>
                                                <textarea class="form-control" rows="3" name="mensaje"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-circle btn-xl"><i class="fa fa-check"></i></button>
                                        <a href="javascript:history.go(-1);" class="btn btn-warning btn-circle btn-xl"><i class="fa fa-times"></i></a>
                                        </form>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->


        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../js/raphael.min.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
