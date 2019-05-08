var tabla;
 function init(){
     mostrarform(false);
     listar();
 }
 function limpiar(){
     $("#nombre").val("");
     $("#descripcion").val("");
     $("#idcategoria").val("");
 }
 function mostrarform(){
        limpiar();
        if (bandera) {
            $("#listadoregistros").hide();
            $("#formularioregistros").show();
            $("#btnGuardar").prop("disabled",false);
            $("#btnagregar").hide();
        }
        else{
            $("#listadoregistros").show();
            $("#formularioregistros").hide();
            $("#btnagregar").show();
        }
 }
 function cancelarform()