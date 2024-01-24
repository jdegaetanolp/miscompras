<table class="table table-bordered table-striped">

<tr>
    <td colspan="9">

        <div class="row d-flex justify-content-around">
            <div class="col-12 pb-2"><b>CATEGORIAS</b></div>

            <div class="col-12 d-flex">           

                <input type="search" name="buscar" id="buscar" class="form-control form-control-sm mr-1" value="<?php echo(@$_POST['buscar']); ?>">                

                <a href="javascript:filtrar()" class="btn btn-sm btn-info mr-1">
                    <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                </a>

                <a href="javascript:nueva_categoria()" class="btn btn-sm btn-primary">
                    <i class="fa-sharp fa-solid fa-plus" style="color: #ffffff;"></i>
                </a>

            </div>
        </div>
   
    </td>
</tr>
</table>


<div id="nomina"></div>

<script>

$( document ).ready(function() {
        
    $('#nomina').load('MODULOS/categorias/inc.categorias.nomina.php');

}); 


function filtrar()
{
    let q = $('#buscar').val();    

    $('#nomina').load('MODULOS/categorias/inc.categorias.nomina.php', {q});
}        

</script>