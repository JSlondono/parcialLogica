<?php
error_reporting(E_ALL ^ E_NOTICE);

include("configBd.php");
include("Empleados.php");
include("ControlEmpleados.php");
include("ControlConexion.php");
try{

    $cod=$_POST["txtCodigo"];
    $nom=$_POST["txtNombre"];
    $doc=$_POST["txtDocumento"];
    $car=$_POST["txtCargo"];

    if ($_POST["txtSalario"] < $GLOBALS['salarioMinimo'] * 2) {
        
        $sal= $_POST["txtSalario"] + $GLOBALS['auxilioTransporte'];
    }
    else{
        $sal= $_POST["txtSalario"];
    }

    $bot=$_POST["btn"];


 switch ($bot) {
    case "Guardar": // Ingresar el empleado
        $objEmpleado= new Empleados($cod,$nom,$doc,$car, $sal);
        $objControlEmpleado= new ControlEmpleados($objEmpleado);
        $objEmpleado=$objControlEmpleado->registrarEmpleado();
        break;

    case "Listar":
        $objEmpleado= new Empleados("","","","","");
        $objControlEmpleado= new ControlEmpleados($objEmpleado);
        $mat=$objControlEmpleado->cuantoConsignar();
        break;

    case "ListarUnoyDos":
        $objEmpleado= new Empleados("","","","","");
        $objControlEmpleado= new ControlEmpleados($objEmpleado);
        $mat=$objControlEmpleado->entreUnoyDos();
        break;
    case "ListarMasDeDos":
        $objEmpleado= new Empleados("","","","","");
        $objControlEmpleado= new ControlEmpleados($objEmpleado);
        $mat=$objControlEmpleado->masDeDos();
        break;
    case "totalEmpresa":
        $objEmpleados= new Empleados($cod,"","","","");
        $objControlEmpleados= new ControlEmpleados($objEmpleados);
        $objEmpleados=$objControlEmpleados->totalEmpresa();
        break;
    case "promedio":
        $objEmpleados= new Empleados($cod,"","","","");
        $objControlEmpleados= new ControlEmpleados($objEmpleados);
        $objEmpleados=$objControlEmpleados->promedioSalarios();
        break;   
} 

}
catch (Exception $objExp) {
    echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
}
echo"
<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
    <body>
        <form method='post' action='vistaEmpleados.php'>
            <table>
                <tr>
                <td colspan='2'>Empleados</td>
                </tr>
                <tr>
                <td>Código</td><td><input type='text' name='txtCodigo' value='".$cod."'></td>
                </tr>
                <tr>
                <td>Nombre</td><td><input type='text' name='txtNombre' value='".$nom."'></td>
                </tr>
                <tr>
                <td>Documento</td><td><input type='text' name='txtDocumento' value='".$doc."'></td>
                </tr>
                 <tr>
                <td>Cargo</td><td><input type='text' name='txtCargo' value='".$car."'></td>
                </tr>
                 <tr>
                <td>Salario</td><td><input type='text' name='txtSalario' value='".$sal."'></td>
                </tr>
            </table>
            <table>
            <tr>
                <td><input type='submit' name='btn' value='Guardar'></td>
                <td><input type='submit' name='btn' value='Listar'></td>
                <td><input type='submit' name='btn' value='ListarUnoyDos'></td>
                <td><input type='submit' name='btn' value='ListarMasDeDos'></td>
                <td><input type='submit' name='btn' value='totalEmpresa'></td>
                <td><input type='submit' name='btn' value='promedio'></td>
            </tr>
            </table>";
        echo "<table>";
            for($i=0;$i<sizeof($mat);$i++) {
                echo "<tr>
                    <td>".$mat[$i][0]."</td><td>".$mat[$i][1]."</td><td>".$mat[$i][2]."</td><td>".$mat[$i][3]."</td><td>".$mat[$i][4]."</td>
                    </tr>";
         }
        echo "</table>";
            
        echo "</form>
    </body>
</html>
";
?>