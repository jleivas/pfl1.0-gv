<?PHP
// Incluimos el archivo de excepciones
//if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
   class Publicacion {
           // Atributos¿
   		private $id;
		private $titulo;
		private $contenido;
		private $imagen;		   
		private $autor;
		private $estado;

		   
         
		public function getId()
		{
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		public function getTitulo()
		{
			return $this->titulo;
		}
		public function setTitulo($titulo)
		{
			$this->titulo = $titulo;
		}
		public function getContenido()
		{
			return $this->contenido;
		}
		public function setContenido($contenido)
		{
			$this->contenido = $contenido;
		}
		public function getImagen()
		{
			return $this->imagen;
		}		
		public function setImagen($imagen)
		{
			$this->imagen = $imagen;
		}
		public function getAutor()
		{
			return $this->autor;
		}		
		public function setAutor($autor)
		{
			$this->autor = $autor;
		}
		
		public function getEstado()
		{
			return $this->estado;
		}		
		public function setEstado($estado)
		{
			$this->estado = $estado;
		}	   
           // Constructor
		public function Publicacion($id=0, $titulo="null",$contenido="null",$imagen="null",$autor="null",$estado=1)
		{
			$this->setId($id);
			$this->setTitulo($titulo);
			$this->setContenido($contenido);
			$this->setImagen($imagen);
			$this->setAutor($autor);
			$this->setEstado($estado);
		}
// Destructor
	    function __destruct() {
		echo "<a></a>";
            }
		   // Constructor
		//public function Usuario($rut=1111111, $dv=1, $medidor=0, $nombre="null",$apellido="null",$mail=null,$telefono=null,$direccion="null",$tipo="USER",$password="null")
		
         
			   
           // toString
           // imprimir
        public function __toString(){
        // Registro JSon
		return "{" 
		          . chr(34) . "Id" . chr(34) . ":" . chr(34) . $this->getId() . chr(34) 
		    . "," . chr(34) . "Titulo" . chr(34) . ":" . chr(34) . $this->getTitulo() . chr(34) 
		    . "," . chr(34) . "Imagen" . chr(34) . ":" . chr(34) . $this->getImagen() . chr(34) 
		    . "," . chr(34) . "Autor" . chr(34) . ":" . chr(34) . $this->getAutor() . chr(34) 
		 . "}";
   		}   
   		public function imprimir()
   		{
        	echo $this->__toString();
   		}
   }
   
// Una vez que este Listo eliminar este código   
//$usuario = new Usuario();
//var_dump($usuario);
//$usuario = new Usuario(234,null,"Valdivia","2017-01-01");
//var_dump($actor);
// Para realizar pruebas
//$actor = new Actor(325,"Juan","Valdivia");
//echo "Imprimir ";
//$actor->imprimir(); // llama imprimir el cual reutiliza __toString()
//echo "ToString : " . $actor; // al concatenar, automáticamente llama a __toString
?>