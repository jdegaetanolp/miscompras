<?php
class appforms
{
	private $conexion;

    function __construct()
    {
		$this->conexion = $this->conectar();
		session_start();
		error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
		date_default_timezone_set("America/Argentina/Buenos_Aires");
    }
	
	public function __get($property) 
    {
		if (property_exists($this, $property)) 
        {
		    return $this->$property;
		}
	}

	function mostrar_errores()
	{
		error_reporting(E_ALL);
		ini_set('display_errors', '1');
	}

    function conectar()
    {
        include('datos_conexion.php');

        if(!$conectar = new mysqli($server, $usuario, $clave, $base))
		{
			die('No se ha podido realizar la conexion con la base de datos');
		}
		else
		{
			$conectar->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
		}

		return $conectar;
    }

    function limpiar_cadena($cadena)
    {   
        # Quita los caracteres especiales de una cadena para prevenir sql injection

        #$this->conexion = $this->conectar();
        
        return $this->conexion->real_escape_string($cadena);
	}  

	function die_msg($msg)
	{
		die('<div class="container text-center">
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>'.$msg.'<strong>
				</div>
			</div>');
	}

	function die_sql($sql)
	{
		die('<pre>'.$sql.'</pre>');
	}

	function get_ultimo_id()
	{
        # Retorna el id del ultimo registro insertado en esta conexion

        #$this->conexion = $this->conectar();        

		return $this->conexion->insert_id;
    }    
    
	function runCountSQL($sql)
	{
		if($res = $this->conexion->query($sql))
		{			
			return($res->num_rows);
		}
		else
		{
			$this->registrarError($sql);
		}
    }    
	
	function runExisteSQL($sql)
	{
		# Retorna 1 si existen rows con el sql pasado o 0 si no.

		#$this->conexion = $this->conectar();
		$sql = 'select exists('.$sql.') as existe';
		if($res = $this->conexion->query($sql))
		{
			$filas = $res->fetch_assoc();
			return($filas['existe']);
		}
		else
		{
			$this->registrarError($sql);
		}
	}       
		
	function runFilasSQL($sql)
	{
		# Retorna un array con el resultado de la consulta 

		#$this->conexion = $this->conectar();

		if($res = $this->conexion->query($sql))
		{
			if($res->num_rows > 0)
			{
				$filas = $res->fetch_assoc();

				return($filas);
			}
			else
			{
				return false;
			}
		}
		else
		{
			$this->registrarError($sql);
		}
	}   
	
    function runQuery($sql)
	{
        # Ejecuta una consulta UPDATE, INSERT o DELETE, retorna true o false

		#$this->conexion = $this->conectar();

		if($this->conexion->query($sql))
		{
			return(true);
		}
		else
		{
			$this->registrarError($sql);
			return(false);
		}
	} 
	
	function runSQL($sql)
	{
		# Ejecuta una consulta SELECT y retorna el resultado

		#$this->conexion = $this->conectar();

		if($res = $this->conexion->query($sql))
		{
			return($res);
		}
		else
		{
			$this->registrarError($sql);
			return(false);
		}
	}   
}
?>