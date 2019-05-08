<?php
include("../config/Conexion.php");

class categoria
{
    public function _construct()
    {

    }

    public function insertar($nombre,$descripcion)
    {
        $sql="INSERT INTO categoria 
        VALUES ('$nombre','$descripcion','1')";
        return ejecutarConsulta($sql);
    }
    public function editar($nombre,$descripcion,$idcategoria)
    {
        $sql="UPDATE categoria 
        SET nombre='$nombre',descripcion='$descripcion',
        WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);
    }
    public function desactivar($idcategoria)
    {
        $sql="UPDATE categoria 
        SET $idcategoria='0',
        WHERE idcategoria=$idcategoria";
        return ejecutarConsulta($sql);
    }
    public function activar($idcategoria)
    {
        $sql="UPDATE categoria 
        SET $idcategoria='1',
        WHERE idcategoria=$idcategoria";
        return ejecutarConsulta($sql);
    }
    public function listar($idcategoria)
    {
        $sql="SELECT categoria 
        FROM $idcategoria=0";
        return ejecutarConsulta($sql);
    }
    public function mostrar($idcategoria)
    {
        $sql="SELECT categoria 
        FROM $idcategoria=1
        WHERE idCategoria=$idcategoria";
        return consultarUnaFila($sql);
    }
}

?>