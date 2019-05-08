<?php
include("../modelos/Categoria.php");

$categoria=new Categoria();

$idcategoria="";
$nombre="";
$descripcion="";

if (isset($_POST["idcategoria"])) {
    $idcategoria=$_POST["idcategoria"];
}
if (isset($_POST["nombre"])) {
    $nombre=$_POST["nombre"];
}
if (isset($_POST["descripcion"])) {
    $descripcion=$_POST["descripcion"];
}

switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($idcategoria)) {
            $rspta=$categoria->insertar($nombre,$descripcion);
            echo $rspta ? "Categoria registrada":"Categoria no se pudo registrar";
        }
        else {
            $rspta=$categoria->editar($idcategoria,$nombre,$descripcion);
            echo $rspta ? "Categoria actualizada":"Categoria no se pudo actualizar";
        }
    break;

    case 'desactivar':
        $rspta=$categoria->desactivar($idcategoria);
        echo $rspta ? "Categoria desactivada":"Categoria no se pudo desactivar";
        break;    
    break;

    case 'activar':
        $rspta=$categoria->activar($idcategoria);
        echo $rspta ? "Categoria activada":"Categoria no se pudo activar";
        break;    
    break;

    case 'mostrar':
        $rspta=$categoria->mostrar($idcategoria);
        echo json_encode($rspta);
        break;    
    break;
    
    case 'listar':
        $rspta=$categoria->listar();
        $data = Array();

        while ($reg=$rspta->fetch_object()) {
            $data[]=array(
                "0"=>($reg->idcategoria),
                "1"=>$reg->nombre,
                "2"=>$reg->descripcion,
                "3"=>($reg->condicion)
            );  
        }
        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);

            echo json_encode($results);
    
    break;
}
?>