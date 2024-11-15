// aquie se realiza la conexion de la base de datos 
$(document).ready(function(){

    function cargarDatos(){
        $.ajax({
            type:"POST",
            url:"data_base.php",
            data: {tipo:tipo},
            dataType:"json",
            
        })
    }
})
