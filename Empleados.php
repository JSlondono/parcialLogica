<?php 


class Empleados
{
	var $codigo;
	var $nombre;
	var $documento;
	var $cargo;
	var $salario;
	
	function __construct($cod,$nombre,$documento,$cargo,$salario)
	{	
		$this->codigo=$cod;
		$this->nombre=$nombre;
		$this->documento=$documento;
		$this->cargo=$cargo;
		$this->salario=$salario;
	}

	function setCodigo($codigo){
		$this->codigo=$codigo;
	}
	function getCodigo(){
		return $this->codigo;
	}
	function setNombre($nombre){
		$this->nombre=$nombre;
	}
	function getNombre(){
		return $this->nombre;
	}

	function setDocumento($documento){
		$this->documento=$documento;
	}
	function getDocumento(){
		return $this->documento;
	}
	
	function setCargo($cargo){
		$this->cargo=$cargo;
	}
	function getCargo(){
		return $this->cargo;
	}

	function setSalario($salario){
		$this->salario=$salario;
	}
	function getSalario(){
		return $this->salario;
	}
}


 ?>       