<?PHP
// Incluimos el archivo de excepciones
//if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
   class Usuario {
           // Atributos¿
   		private $id;
		private $nombre;
		private $apellido;
		private $mail;		   
		private $telefono;
		private $tipo;
		private $password;
		private $estado;

		   
         
		public function getId()
		{
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		public function getNombre()
		{
			return $this->nombre;
		}
		public function setNombre($nombre)
		{
			$this->nombre = $nombre;
		}
		public function getApellido()
		{
			return $this->apellido;
		}
		public function setApellido($apellido)
		{
			$this->apellido = $apellido;
		}
		public function getMail()
		{
			return $this->mail;
		}		
		public function setMail($mail)
		{
			$this->mail = $mail;
		}
		public function getTelefono()
		{
			return $this->telefono;
		}		
		public function setTelefono($telefono)
		{
			$this->telefono = $telefono;
		}
		public function getTipo()
		{
			return $this->tipo;
		}		
		public function setTipo($tipo)
		{
			$this->tipo = $tipo;
		}	
		public function getPassword()
		{
			return $this->password;
		}		
		public function setPassword($password)
		{
			$this->password = $password;
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
		public function Usuario($id=0, $nombre="null",$apellido="null",$mail="null",$telefono="null",$tipo=0,$password="null",$estado=0)
		{
			$this->setId($id);
			$this->setNombre($nombre);
			$this->setApellido($apellido);
			$this->setMail($mail);
			$this->setTelefono($telefono);
			$this->setTipo($tipo);
			$this->setPassword($password);
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
		    . "," . chr(34) . "Nombre" . chr(34) . ":" . chr(34) . $this->getNombre() . chr(34) 
		    . "," . chr(34) . "Apellido" . chr(34) . ":" . chr(34) . $this->getApellido() . chr(34) 
		    . "," . chr(34) . "Mail" . chr(34) . ":" . chr(34) . $this->getMail() . chr(34) 
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