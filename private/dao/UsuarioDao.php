<?PHP
// Declaramos una variable $rootDir si es que no existe
// isset==> si existe o no una variable
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
//Agregamos desde BD.PHPy la Entitie Usuario
// desde el Path raiz ==> $rootDir
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/Usuario.php");
class UsuarioDao {
   public static function sqlInsert( $usuario)
   {
        $stSql  = "insert into usuario (";
        $stSql .= " us_id ,us_nombre ,us_apellido, us_mail, us_telefono, us_tipo, us_password, us_estado";
        $stSql .= " )values (";
        $stSql .= " '{$usuario->getId()}'"
                . ",'{$usuario->getNombre()}'"
                . ",'{$usuario->getApellido()}'"
                . ",'{$usuario->getMail()}'"
                . ",'{$usuario->getTelefono()}'"
                . ",'{$usuario->getTipo()}'"
                . ",'{$usuario->getPassword()}'"
                . ",'{$usuario->getEstado()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlContar($param)
   {
        $stSql = "select * from usuario WHERE (us_nombre LIKE '%{$param}%' OR us_apellido LIKE '%{$param}%') OR (rut LIKE '%{$param}%' OR medidor = '{$param}')";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from usuario WHERE us_id = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from usuario WHERE (us_nombre LIKE '%{$param}%' OR us_apellido LIKE '%{$param}%')";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqlUpdate( $usuario)
   {
        $stSql =  "update usuario SET ";
        $stSql .= " us_nombre='{$usuario->getNombre()}'"
                . ",us_apellido='{$usuario->getApellido()}'"
                . ",us_mail='{$usuario->getMail()}'"
                . ",us_telefono='{$usuario->getTelefono()}'"
                . ",us_tipo='{$usuario->getTipo()}'"
                . ",us_password='{$usuario->getPassword()}'"
                . ",us_estado='{$usuario->getEstado()}'"
                       ;
        $stSql .= " Where  us_id='{$usuario->getId()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlCargar( $mail)
   {
        $stSql =  "select *  from  usuario ";
        $stSql .= " Where  us_mail ='{$mail}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  //if(!$resultado) return null;
  $fila= BD::getInstance()->sqlFetch();
  // Si fila esta vacia,no hay registro devuelve null
  if (!$fila) return null;
  // Llena los valores que faltan a la instancia
  // entregada por parámetro $actor
  $usuarioAux = new Usuario($fila["us_id"]
          ,$fila["us_nombre"]
          ,$fila["us_apellido"]
          ,$fila["us_mail"]
          ,$fila["us_telefono"]
          ,$fila["us_tipo"]
          ,$fila["us_password"]
          ,$fila["us_estado"]);
        return $usuarioAux;
   }
   // Método que ejecuta una sentencia,
   // Sin embargo no retorna ningún registro
   public static function sqlSelect( $usuario)
   {
        $stSql =  "select *  from  usuario ";
        $stSql .= " Where  us_id ='{$usuario->getId()}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
   }
    // Método que ejecuta una sentencia,
   // Sin embargo no retorna ningún registro
   public static function sqlValida( $user,$pass)
   {
        $stSql =  "select *  from  usuario ";
        $stSql .= " Where  us_id ='{$user}' AND us_password ='{$pass}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  //if(!$resultado) return null;
  $fila= BD::getInstance()->sqlFetch();
  // Si fila esta vacia,no hay registro devuelve null
  if (!$fila) return null;
  // Llena los valores que faltan a la instancia
  // entregada por parámetro $actor
  $usuarioAux = new Usuario($fila["us_id"]
          ,$fila["us_nombre"]
          ,$fila["us_apellido"]
          ,$fila["us_mail"]
          ,$fila["us_telefono"]
          ,$fila["us_tipo"]
          ,$fila["us_password"]
          ,$fila["us_estado"]);
        return $usuarioAux;
   }
   // Método que busca el siguiente registro disponible
   // De acuerdo a la sentencia sql ejecutada por sqlSelect
   // crea una instancia de actory la devuelve
   // Observe que no recibe parámetro, ya que retorna un actor
   public static function sqlFetch()
   {
  // Retorna un registro
  $fila= BD::getInstance()->sqlFetch();
  // Si fila esta vacia,no hay registro devuelve null
  if (!$fila) return null;
  // Llena los valores que faltan a la instancia
  // entregada por parámetro $actor
  $usuarioAux = new Usuario($fila["us_id"]
          ,$fila["us_nombre"]
          ,$fila["us_apellido"]
          ,$fila["us_mail"]
          ,$fila["us_telefono"]
          ,$fila["us_tipo"]
          ,$fila["us_password"]
          ,$fila["us_estado"]);
        return $usuarioAux;
   }
   public static function sqlFetchUsuario($usuario)
   {
	// Retorna un registro
	$fila= BD::getInstance()->sqlFetch();
	// Si fila esta vacia,no hay registro devuelve false
        if (!$fila) return false;
	// Llena los valores que faltan a la instancia
	// entregada por parámetro $actor
        $usuario->setId($fila["us_id"]);
        $usuario->setNombre($fila["us_nombre"]);
        $usuario->setApellido($fila["us_apellido"]);
        $usuario->setMail($fila["us_mail"]);
        $usuario->setTelefono($fila["us_telefono"]);
        $usuario->setTipo($fila["us_tipo"]);
        $usuario->setPassword($fila["us_password"]);
        $usuario->setEstado($fila["us_estado"]);
        return true;						  
   }
}
?>