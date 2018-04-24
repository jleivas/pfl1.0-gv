<?PHP
// Incluimos el archivo de excepciones
//if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
   class Presupuesto {
           // Atributos¿
   		private $id;
		private $cliente;
		private $fecha;
		private $mail;
		private $mensaje;
		private $file;		   
		private $autor;
		private $estado;

		   
         
		public function getId()
		{
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		public function getCliente()
		{
			return $this->cliente;
		}
		public function setCliente($cliente)
		{
			$this->cliente = $cliente;
		}
		public function getFecha()
		{
			return $this->fecha;
		}
		public function setFecha($fecha)
		{
			$this->fecha = $fecha;
		}
		public function getMail()
		{
			return $this->mail;
		}
		public function setMail($mail)
		{
			$this->mail = $mail;
		}
		public function getMensaje()
		{
			return $this->mensaje;
		}		
		public function setMensaje($mensaje)
		{
			$this->mensaje = $mensaje;
		}
		public function getFile()
		{
			return $this->file;
		}		
		public function setFile($file)
		{
			$this->file = $file;
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
		public function Presupuesto($id=0, $cliente="null", $fecha=null, $mail="null",$mensaje="null",$file="null",$autor="null",$estado=1)
		{
			$this->setId($id);
			$this->setCliente($cliente);
			$this->setFecha($fecha);
			$this->setMail($mail);
			$this->setMensaje($mensaje);
			$this->setFile($file);
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
		    . "," . chr(34) . "Cliente" . chr(34) . ":" . chr(34) . $this->getCliente() . chr(34) 
		    . "," . chr(34) . "Mensaje" . chr(34) . ":" . chr(34) . $this->getMensaje() . chr(34) 
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