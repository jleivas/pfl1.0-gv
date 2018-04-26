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

        <?php include("../../../complements/ostende.php") ?>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

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
                <?php include("contents/nav.php") ?><!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nuevo conenido</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Generar nueva pagina
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12   ">
                                    <form role="form" enctype="multipart/form-data" action="../../fn/fnParseHtml.php" method="post">
                                            <div class="form-group">
                                                <label>Nombre del contenido</label>
                                                <input class="form-control" placeholder="Ingrese el nombre de la página." name="name" id="name" minlength="10" maxlength="100" required="">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Título</label>
                                                <input class="form-control" placeholder="Título del contenido." name="title" id="title" minlength="10" maxlength="50" required="">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Subir una imagen</label>
                                                <input type="file" name="img">
                                            </div>
                                            <div class="form-group">
                                                <label>Contenido de la publicación</label>
                                                <textarea class="form-control" rows="20" name="content"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Autor</label>
                                                <input class="form-control" value="Nombre de usuario" name="author" id="author" minlength="5" maxlength="50" required="">
                                                
                                            </div>

                                            <button type="submit" class="btn btn-success btn-circle btn-xl"><i class="fa fa-check"></i></button>
                                            <a href="javascript:history.go(-1);" style="padding: 17px;" class="btn btn-warning btn-circle btn-xl"><i class="fa fa-times"></i></a>
                                            
                                        </form>
                                    </div>
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
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

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
