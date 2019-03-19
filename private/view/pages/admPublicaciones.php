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

if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
    require_once($rootDir . "/private/dao/PublicacionDao.php");
    $datos=PublicacionDao::sqlTodo();
    $ruta_imagen="../../../../private/img/";
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
                        <h1 class="page-header">Todas las publicaciones del portafolio</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Tabla de registros
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Autor</th>
                                                <th>Imagen</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($datos as $fila) 
                                            {
                                                $aux_id = $fila['pu_id'];
                                            ?>
                                            <tr class="gradeU">

                                                <td><?php echo $fila['pu_titulo']; ?></td>
                                                <td><?php echo $fila['pu_autor']; ?></td>
                                                <td>
                                                <div class="col-md-3 p-l-0 p-r-0">
                                                    <img src="<?php echo $ruta_imagen.$fila['pu_imagen']; ?>" class="img-responsive" alt="Responsive image">
                                                </div>
                                                </td>
                                                <td class="center"><a href=<?php echo "../../fn/fnBorrarPublicacion.php?id={$aux_id}"; ?> class="btn btn-mini btn-danger" on=$accion&pagina=$pagina onclick="return confirm('¿Estas seguro que quieres eliminar este registro?')">X</a></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                                
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

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>


    </body>
</html>
