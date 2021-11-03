<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
<?php 
/**
 * 
 */
class Conexion extends PDO
{
	private $tipo_de_base='mysql';
	private $host='localhost';
	private $nombre_de_base='administrador_tareas';
	private $usuario='root';
	private $contrasena='';
	function __construct()
	{
		//sobreescribir el metodo constructor de la clase PDO
		try {
			parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base,$this->usuario,$this->contrasena);
			
		} catch (PDOException $e) {
			echo "errro en base datos". $e->getMessage();
			exit;
			
		}
	}
}
 ?>
</body>
</html>