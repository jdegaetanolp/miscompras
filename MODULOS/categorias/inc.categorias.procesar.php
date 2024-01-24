<?php
include('../INC/api.php');
$Fun = new appforms;

$orden = $_POST['es_global'] ? 0 : $_POST['orden'];

if($_POST['id_presupuesto'] == 0)
{
    // Validar si ya existe la categoria
    $sql_validar = 'SELECT count(*) as total FROM presupuestos 
                    WHERE mes = '.$_POST['mes'].' AND anio = '.$_POST['anio'].' AND id_categoria = '.$_POST['categoria'];
    $fil_validar = $Fun->runFilasSQL($sql_validar);

    if($fil_validar['total'] == 0)
    {
        $sql_insert = 'INSERT INTO presupuestos(    anio,
                                                    mes,
                                                    id_categoria,
                                                    importe,
                                                    mostrar,
                                                    orden,
                                                    presupuesto_diario,
                                                    es_global,
                                                    fcarga,
                                                    compartido)
                        VALUES('.$_POST['anio'].',
                            '.$_POST['mes'].',
                            '.$_POST['categoria'].',
                            '.$_POST['importe'].',
                            "'.$_POST['mostrar'].'",
                            '.$orden.',
                            "'.$_POST['presupuesto_diario'].'",
                            "'.$_POST['es_global'].'",
                            "'.date('Y-m-d H:i:s').'",
                            "'.$_POST['compartido'].'")';

        if($Fun->runSQL($sql_insert))
        {
            $msg = 'El presupuesto fue agregado con éxito';
        }   
        else
        {
            $msg = 'No se pudo agregar el presupuesto';
        }
    }
    else
    {
        $msg = 'Ya existe un presupuesto para esa categoría';
    }
}
else
{
    // Validar si ya existe la categoria
    $sql_validar = 'SELECT count(*) as total FROM presupuestos 
                    WHERE mes = '.$_POST['mes'].' AND anio = '.$_POST['anio'].' 
                          AND id_categoria = '.$_POST['categoria'].' AND id_presupuesto <> '.$_POST['id_presupuesto'];

    $fil_validar = $Fun->runFilasSQL($sql_validar);

    if($fil_validar['total'] == 0)
    {
        $sql_update = ' UPDATE presupuestos 
                        SET anio = '.$_POST['anio'].',
                            mes = '.$_POST['mes'].',
                            id_categoria = '.$_POST['categoria'].',
                            importe = "'.$_POST['importe'].'",
                            mostrar = "'.$_POST['mostrar'].'",
                            orden = '.$orden.',
                            presupuesto_diario = "'.$_POST['presupuesto_diario'].'",
                            es_global = "'.$_POST['es_global'].'",
                            compartido = "'.$_POST['compartido'].'"                            
                            
                        WHERE id_presupuesto = '.$_POST['id_presupuesto'];

        if($Fun->runSQL($sql_update))
        {
            $msg = 'El presupuesto fue actualizado con éxito';
        }   
        else
        {
            $msg = 'No se pudo actualizar el presupuesto';
        }    
    }
    else
    {
        $msg = 'Ya existe un presupuesto para esa categoría';
    }
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

$('#nomina').load('presupuestos/inc.presupuestos.nomina.php',{'filtro_mes':'<?php echo($_POST['anio'].'-'.$_POST['mes']); ?>'});

$('#myModal').modal('hide');

</script>