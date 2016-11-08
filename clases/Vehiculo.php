<?php
class Vehiculo
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $patente;
 	private $entrada;
 	private $salida;
 	private $importe;

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
 	public function GetPatente()
	{
		return $this->patente;
	}
	public function GetEntrada()
	{
		return $this->entrada;
	}
	public function GetSalida()
	{
		return $this->salida;
	}
	public function GetImporte()
	{
		return $this->importe;
	}

	public function SetPatente($valor)
	{
		$this->patente = $valor;
	}
	public function SetEntrada($valor)
	{
		$this->entrada = $valor;
	}
	public function SetSalida($valor)
	{
		$this->salida = $valor;
	}
	public function SetImporte($valor)
	{
		$this->importe = $valor;
	}

//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($patente=NULL)
	{
		if($patente != NULL){
			$obj = Vehiculo::TraerPorPatente($patente);
			$this->patente = $obj->patente;
			$this->entrada = $obj->entrada;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->patente."  ".$this->entrada;
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODO DE CLASE
	public static function TraerPorPatente($patente) 
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta = $objetoAccesoDato->RetornarConsulta("SELECT patente, entrada FROM estacionados WHERE patente = :patente ");
		$consulta->bindValue(':patente', $patente, PDO::PARAM_STR);
		$consulta->execute();
		$vehBuscado = $consulta->fetchObject('Vehiculo');
		return $vehBuscado;
	}

	public static function Borrar($patente)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM estacionados WHERE patente = :patente");	
		$consulta->bindValue(':patente', $patente, PDO::PARAM_STR);		
		$consulta->execute();
		return $consulta->rowCount();
	}

	public static function TraerTodosLosEstacionados()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT patente,entrada FROM estacionados");
		$consulta->execute();

		//return $consulta->fetchall(PDO::FETCH_CLASS,"Vehiculo");
		return $consulta->fetchall();
	}

	public static function TraerTodosLosCobrados()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT patente,entrada,salida,importe FROM tickets");
		$consulta->execute();

		//return $consulta->fetchall(PDO::FETCH_CLASS,"Vehiculo");
		return $consulta->fetchall();
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE INSTANCIA
	public function InsertarEstacionado()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO estacionados (patente, entrada) values (:patente, :entrada)");
		$consulta->bindValue(':patente',$this->patente, PDO::PARAM_STR);
		$consulta->bindValue(':entrada',$this->entrada, PDO::PARAM_STR);
		$consulta->execute();
		//return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
	
	public function ModificarEstacionado()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE estacionados SET entrada=:entrada, patente=:patente,
			WHERE id=:id");
		$consulta->bindValue(':entrada',$this->entrada, PDO::PARAM_STR);
		$consulta->bindValue(':patente', $this->patente, PDO::PARAM_STR);
		$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
		$consulta->execute();		
		//return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}

	public function InsertarCobrado()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO tickets (patente,entrada,salida,importe) values (:patente,:entrada,:salida,:importe)");
		$consulta->bindValue(':patente',$this->patente, PDO::PARAM_STR);
		$consulta->bindValue(':entrada',$this->entrada, PDO::PARAM_STR);
		$consulta->bindValue(':salida',$this->salida, PDO::PARAM_STR);
		$consulta->bindValue(':importe',strval($this->importe), PDO::PARAM_STR);
		$consulta->execute();
		//return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
//--------------------------------------------------------------------------------//




}