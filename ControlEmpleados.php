<?php 
error_reporting(0);
class controlEmpleados
{
	
	function __construct($objEmpleados)
	{
		$this->objEmpleados=$objEmpleados;
	}

	function registrarEmpleado(){
		$cod=$this->objEmpleados->getCodigo();
		$nom=$this->objEmpleados->getNombre();
		$doc=$this->objEmpleados->getDocumento();
		$car=$this->objEmpleados->getCargo();
		$sal=$this->objEmpleados->getSalario();
		$objConexion= new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		 $comandosql="INSERT INTO `empleados`(`id`, `nombre`, `documento`, `cargo`, `salario`) VALUES ('".$cod."','".$nom."','".$doc."','".$car."','".$sal."')";
		$objConexion->ejecutarComandoSql($comandosql);
		$objConexion->cerrarBd();
	}

	function cuantoConsignar(){ 
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandosql="SELECT * FROM empleados"; 
		$recordSet=$objConexion->ejecutarSelect($comandosql);
		$i=0;
		$mat=null;
		while ($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
			
			$mat[$i][0]=  $registro['codigo'];
			$mat[$i][1]=  $registro['nombre'];
			$mat[$i][2]=  $registro['documento'];
			$mat[$i][3]=  $registro['cargo'];
			$mat[$i][4]=  $registro['salario'];
			$i=$i+1;
		}		

		$objConexion->cerrarBd();
		return $mat;
	}

	function  entreUnoyDos(){
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandosql="SELECT * FROM empleados where salario < '".$GLOBALS['salarioMinimo']."' * 2"; //Rellenar con el nombre tabla
		$recordSet=$objConexion->ejecutarSelect($comandosql);
		$i=0;
		$mat=null;
		while ($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
			
			$mat[$i][0]=  $registro['codigo'];
			$mat[$i][1]=  $registro['nombre'];
			$mat[$i][2]=  $registro['documento'];
			$mat[$i][3]=  $registro['cargo'];
			$mat[$i][4]=  $registro['salario'];
			$i=$i+1;
		}		

		$objConexion->cerrarBd();
		return $mat;
	}

	function  masDeDos(){
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandosql="SELECT * FROM empleados where salario > '".$GLOBALS['salarioMinimo']."' * 2"; //Rellenar con el nombre tabla
		$recordSet=$objConexion->ejecutarSelect($comandosql);
		$i=0;
		$mat=null;
		while ($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
			
			$mat[$i][0]=  $registro['codigo'];
			$mat[$i][1]=  $registro['nombre'];
			$mat[$i][2]=  $registro['documento'];
			$mat[$i][3]=  $registro['cargo'];
			$mat[$i][4]=  $registro['salario'];
			$i=$i+1;
		}		

		$objConexion->cerrarBd();
		return $mat;
	}


	function  totalEmpresa(){
		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandosql="SELECT sum(salario) FROM empleados"; //Rellenar con el nombre tabla
		$recordSet=$objConexion->ejecutarSelect($comandosql);
		$i=0;
		$mat=null;
		while ($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
			echo "<br><b>El TOTAL de la empresa que debe pagar en salarios es: </b>";
			echo $registro[0];
		}		

		$objConexion->cerrarBd();
		return $mat;

	}
	function  promedioSalarios(){
		
		$objConexion = new ControlConexion();
		$objConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandosql="SELECT AVG(salario) FROM empleados"; //Rellenar con el nombre tabla
		$recordSet=$objConexion->ejecutarSelect($comandosql);
		$i=0;
		$mat=null;
		while ($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
			echo "<br><b>El PROMEDIO de la empresa que debe pagar en salarios es: </b>";
			echo $registro[0];
		}		

		$objConexion->cerrarBd();
		return $mat;

	}


}






 ?>