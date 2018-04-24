<?PHP
// Declaramos una variable $rootDir si es que no existe
// isset==> si existe o no una variable
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
//Agregamos desde BD.PHPy la Entitie publicacion
// desde el Path raiz ==> $rootDir
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/Publicacion.php");
class PublicacionDao {
   public static function sqlInsert( $publicacion)
   {
        $stSql  = "insert into publicacion (";
        $stSql .= " pu_id ,pu_titulo ,pu_contenido, pu_imagen, pu_autor, pu_estado";
        $stSql .= " )values (";
        $stSql .= " '{$publicacion->getId()}'"
                . ",'{$publicacion->getTitulo()}'"
                . ",'{$publicacion->getContenido()}'"
                . ",'{$publicacion->getImagen()}'"
                . ",'{$publicacion->getAutor()}'"
                . ",'{$publicacion->getEstado()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlContar($param)
   {
        $stSql = "select * from publicacion";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from publicacion WHERE pu_id = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from publicacion WHERE pu_id = '{$param}'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqladdId(){
         $bd=new BD();
        $misRegistros= $bd->sqlSelectTodo("SELECT MAX(pu_id) FROM `publicacion`");
         foreach($misRegistros as $fila) 
         {$var=$fila['MAX(pu_id)'];}
       //le sumo 1
        $var=$var+1;
        return $var;
   }
   public static function sqlUpdate( $publicacion)
   {
        $stSql =  "update publicacion SET ";
        $stSql .= " pu_titulo='{$publicacion->getTitulo()}'"
                . ",pu_contenido='{$publicacion->getContenido()}'"
                . ",pu_imagen='{$publicacion->getImagen()}'"
                . ",pu_autor='{$publicacion->getAutor()}'"
                . ",pu_estado='{$publicacion->getEstado()}'"
                       ;
        $stSql .= " Where  pu_id='{$publicacion->getId()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlCargar( $id)
   {
        $stSql =  "select *  from  publicacion ";
        $stSql .= " Where  pu_id ='{$id}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  //if(!$resultado) return null;
  $fila= BD::getInstance()->sqlFetch();
  // Si fila esta vacia,no hay registro devuelve null
  if (!$fila) return null;
  // Llena los valores que faltan a la instancia
  // entregada por parámetro $actor
  $publicacionAux = new Publicacion($fila["pu_id"]
          ,$fila["pu_titulo"]
          ,$fila["pu_contenido"]
          ,$fila["pu_imagen"]
          ,$fila["pu_autor"]
          ,$fila["pu_estado"]);
        return $publicacionAux;
   }
   // Método que ejecuta una sentencia,
   // Sin embargo no retorna ningún registro
   public static function sqlSelect( $publicacion)
   {
        $stSql =  "select *  from  publicacion ";
        $stSql .= " Where  pu_id ='{$publicacion->getId()}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
	if(!$resultado) return false;
	return true;
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
  $publicacionAux = new Publicacion($fila["pu_id"]
          ,$fila["pu_titulo"]
          ,$fila["pu_contenido"]
          ,$fila["pu_imagen"]
          ,$fila["pu_autor"]
          ,$fila["pu_estado"]);
        return $publicacionAux;
   }
   public static function sqlFetchpublicacion($publicacion)
   {
	// Retorna un registro
	$fila= BD::getInstance()->sqlFetch();
	// Si fila esta vacia,no hay registro devuelve false
        if (!$fila) return false;
	// Llena los valores que faltan a la instancia
	// entregada por parámetro $actor
        $publicacion->setId($fila["pu_id"]);
        $publicacion->setNombre($fila["pu_titulo"]);
        $publicacion->setApellido($fila["pu_contenido"]);
        $publicacion->setMail($fila["pu_imagen"]);
        $publicacion->setAutor($fila["pu_autor"]);
        $publicacion->setEstado($fila["pu_estado"]);
        return true;						  
   }
   public static function sqlTodo()
   {   //$bd=new BD();
       
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `publicacion` WHERE `pu_estado`=1  ORDER BY `pu_id` DESC");
       return $misRegistros;
   }
}
?>