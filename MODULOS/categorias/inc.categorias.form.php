<?php
include('../../INC/api.php');
$Fun = new appforms;

if(isset($_POST['id_categoria']))
{
    $sql_categorias = 'SELECT * FROM categorias WHERE id_categoria = '.$_POST['id_categoria'];
    $fil_categorias = $Fun->runFilasSQL($sql_categorias);
}
?>

<input type="hidden" id="id_categoria" name="id_categoria" value="<?php echo(isset($_POST['id_categoria']) ? $_POST['id_categoria'] : 0); ?>">

<table class="table table-bordered">
    <tr>
        <td>
            
            <label for="mes">Categoría:</label>
            <input type="text" class="form-control form-control-sm" value="<?php echo($fil_categorias['categoria']); ?>" name="categoria">            

        </td>
    </tr>

    <tr>
        <td class="text-right" colspan="3">
            <a href="javascript:cancelar();" class="btn btn-sm btn-danger">CANCELAR</a>            
            <a href="javascript:guardar_categoria();" class="btn btn-sm btn-primary">GUARDAR</a>
        </td>
    </tr>
</table>

<div id="msg_categoria"></div>

<script>

function guardar_categoria()
{
    let id_categoria = $('#id_categoria').val();
    let categoria = $('#categoria').val();

    $('#msg_categoria').load('categorias/inc.categorias.procesar.php', {id_categoria, categoria});
}

function cancelar()
{
    $('#myModal').modal('hide');
    return false;
}

</script>

