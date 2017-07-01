<?php
class BDDManager
{
    public function conectar()
    {

        if (!isset($conexion)) {
            $conexion = mysqli_connect("localhost", "root", "", "cine");
            if ($conexion == false) {
                echo "Error en la conexion a la base de datos" . $conexion;
                die("Error en la conexion a la base de datos");
            }
            return $conexion;
        }
    }

    public function ejecutarConsultatarConsulta($consultaSQL)
    {
        $conexion = $this -> conectar();
        $resultado = mysqli_query($conexion, $consultaSQL);
            
        if (!$resultado) {
            echo "Error en la consulta: " . $consultaSQL;
            die ("Error en la consulta: " . $consultaSQL);
        }
            
        return resultado;
    }

    public function select($consultaSQL)
    {
        $filas = $arrayName;
        $resultado = $this -> ejecutarConsulta($consultaSQL);
        if (!$resultado) {
            return false;
        }
        while ($fila = $resultado -> fetch_assoc()) {
            $filas[] = $fila;
        }
        return $filas;
    }
}
