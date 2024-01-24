<?php
include('../INC/api.php');
$Fun = new appforms;

if(isset($_POST['id_presupuesto']))
{
    // Validar si tiene movimientos
    $sql_movimientos = 'SELECT count(*) as total FROM movimientos WHERE id_presupuesto = '.$_POST['id_presupuesto'];
    $fil_movimientos = $Fun->runFilasSQL($sql_movimientos);

    if($fil_movimientos['total'] == 0)
    {
        $sql_delete = 'DELETE FROM presupuestos WHERE id_presupuesto = '.$_POST['id_presupuesto'];

        if($Fun->runSQL($sql_delete))
        {
            $msg = 'El presupuesto fue eliminado con éxito';
        }   
        else
        {
            $msg = 'No se pudo eliminar el presupuesto';
        } 
    }
    else
    {
        $msg = 'No se pudo eliminar el Presupuesto porque tiene movimientos asociados';
    }
}
else
{
    $msg = 'Es necesario indicar que Movimiento desea eliminar';
}
?>

<script>

Toastify({

    text: "<?php echo($msg); ?>",

    duration: 3000,
    close: true,
    gravity: "bottom", // `top` or `bottom`
    position: "left"

}).showToast();

$('#listaPresupuestos').load('presupuestos/index.php', {'id_presupuesto':<?php echo($_POST['id_presupuesto']); ?>});

</script>