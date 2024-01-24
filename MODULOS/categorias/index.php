<div id="listaCategorias"></div>

<script>

$( document ).ready(function() {
        
    $('#listaCategorias').load('MODULOS/categorias/inc.categorias.listar.php');

});    

function nueva_categoria()
{
    <!-- Asignar encabezado -->
    $("#myModal .modal-header").html('<h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
    <!-- Fin asignar encabezado -->

    <!-- Asignar Cuerpo -->
    $("#myModal .modal-body").load('MODULOS/categorias/inc.categorias.form.php');
    <!-- Fin asignar Cuerpo -->

    $("#myModal").modal("show");    
}

function editar_categoria(id_categoria)
{
    <!-- Asignar encabezado -->
    $("#myModal .modal-header").html('<h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
    <!-- Fin asignar encabezado -->

    <!-- Asignar Cuerpo -->
    $("#myModal .modal-body").load('MODULOS/categorias/inc.categorias.form.php', {id_categoria});
    <!-- Fin asignar Cuerpo -->

    $("#myModal").modal("show");    
}

function eliminar_categoria(id_categoria)
{  
    swal.fire({
        title: 'Esta seguro de eliminar la categoria seleccionada?',
        text: "Se eliminara y no se podrá recuperar",
        type: 'warning',
        reverseButtons: true,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminarla!'
    
    }).then((result) => {

        if (result.isConfirmed) 
        {
            $('#listaCategorias').load('MODULOS/categorias/inc.categorias.eliminar.php', {id_categoria});
        }

    })      
}
</script>