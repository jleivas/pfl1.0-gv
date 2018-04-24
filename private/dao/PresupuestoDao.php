<?PHP
// Declaramos una variable $rootDir si es que no existe
// isset==> si existe o no una variable
if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
//Agregamos desde BD.PHPy la Entitie publicacion
// desde el Path raiz ==> $rootDir
require_once($rootDir . "/private/BD/bd.php");
require_once($rootDir . "/private/entities/Presupuesto.php");
class PresupuestoDao {
   public static function sqlInsert( $presupuesto)
   {
        $stSql  = "insert into presupuesto (";
        $stSql .= " pr_id ,pr_cliente, pr_fecha,pr_email, pr_mensaje, pr_file, pr_autor, pr_estado";
        $stSql .= " )values (";
        $stSql .= " '{$presupuesto->getId()}'"
                . ",'{$presupuesto->getCliente()}'"
                . ",'{$presupuesto->getFecha()}'"
                . ",'{$presupuesto->getMail()}'"
                . ",'{$presupuesto->getMensaje()}'"
                . ",'{$presupuesto->getFile()}'"
                . ",'{$presupuesto->getAutor()}'"
                . ",'{$presupuesto->getEstado()}'"
                . ")";
		return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlContar($param)
   {
        $stSql = "select * from presupuesto";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlExiste($param)
   {
        $stSql = "select * from presupuesto WHERE pr_id = '{$param}'";
        return BD::getInstance()->sqlEjecutar($stSql);
   }
    public static function sqlBuscar($param)
   {
        $stSql = "select * from presupuesto WHERE pr_id = '{$param}'";
        return BD::getInstance()->sqlSelectTodo($stSql);
   }
   public static function sqladdId(){
         $bd=new BD();
        $misRegistros= $bd->sqlSelectTodo("SELECT MAX(pr_id) FROM `presupuesto`");
         foreach($misRegistros as $fila) 
         {$var=$fila['MAX(pr_id)'];}
       //le sumo 1
        $var=$var+1;
        return $var;
   }
   public static function sqlUpdate( $presupuesto)
   {
        $stSql =  "update presupuesto SET ";
        $stSql .= " pr_cliente='{$presupuesto->getCliente()}'"
                . ",pr_fecha='{$presupuesto->getFecha()}'"
                . ",pr_email='{$presupuesto->getMail()}'"
                . ",pr_mensaje='{$presupuesto->getMensaje()}'"
                . ",pr_file='{$presupuesto->getFile()}'"
                . ",pr_autor='{$presupuesto->getAutor()}'"
                . ",pr_estado='{$presupuesto->getEstado()}'"
                       ;
        $stSql .= " Where  pr_id='{$presupuesto->getId()}'"
                       ;
        return BD::getInstance()->sqlEjecutar($stSql);
   }
   public static function sqlCargar( $id)
   {
        $stSql =  "select *  from  presupuesto ";
        $stSql .= " Where  pr_id ='{$id}'"
                          ;
        $resultado= BD::getInstance()->sqlSelect($stSql);
  //if(!$resultado) return null;
  $fila= BD::getInstance()->sqlFetch();
  // Si fila esta vacia,no hay registro devuelve null
  if (!$fila) return null;
  // Llena los valores que faltan a la instancia
  // entregada por parámetro $actor
  $presupuestoAux = new Presupuesto($fila["pr_id"]
          ,$fila["pr_cliente"]
          ,$fila["pr_fecha"]
          ,$fila["pr_email"]
          ,$fila["pr_mensaje"]
          ,$fila["pr_file"]
          ,$fila["pr_autor"]
          ,$fila["pr_estado"]);
        return $presupuestoAux;
   }
   // Método que ejecuta una sentencia,
   // Sin embargo no retorna ningún registro
   public static function sqlSelect( $presupuesto)
   {
        $stSql =  "select *  from  presupuesto ";
        $stSql .= " Where  pr_id ='{$presupuesto->getId()}'"
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
  $presupuestoAux = new Presupuesto($fila["pr_id"]
          ,$fila["pr_cliente"]
          ,$fila["pr_fecha"]
          ,$fila["pr_email"]
          ,$fila["pr_mensaje"]
          ,$fila["pr_file"]
          ,$fila["pr_autor"]
          ,$fila["pr_estado"]);
        return $presupuestoAux;
   }
   public static function sqlFetchPresupuesto($presupuesto)
   {
	// Retorna un registro
	$fila= BD::getInstance()->sqlFetch();
	// Si fila esta vacia,no hay registro devuelve false
        if (!$fila) return false;
	// Llena los valores que faltan a la instancia
	// entregada por parámetro $actor
        $presupuesto->setId($fila["pr_id"]);
        $presupuesto->setCliente($fila["pr_cliente"]);
        $presupuesto->setFecha($fila["pr_fecha"]);
        $presupuesto->setMail($fila["pr_email"]);
        $presupuesto->setMensaje($fila["pr_mensaje"]);
        $presupuesto->setFile($fila["pr_file"]);
        $presupuesto->setAutor($fila["pr_autor"]);
        $presupuesto->setEstado($fila["pr_estado"]);
        return true;						  
   }
   public static function sqlTodo()
   {   //$bd=new BD();
       
       $misRegistros= BD::getInstance()->sqlSelectTodo("SELECT * FROM `presupuesto` WHERE `pr_estado`=1  ORDER BY `pr_id` DESC");
       return $misRegistros;
   }
}
?>