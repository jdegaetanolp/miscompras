<?php
include('../../INC/api.php');
$Fun = new appforms;

if(isset($_POST['q']))
{
    $filtro_categoria = ' AND categoria LIKE "%'.$_POST['q'].'%"';
}

$sql_categorias = ' SELECT  id_categoria,
                            categoria
                            
                    FROM    categorias as c

                    WHERE   c.id_categoria > 0 '.$filtro_categoria.'
                            
                    ORDER BY c.categoria';

//$Fun->die_sql($sql_presupuestos);                    

$res_categorias = $Fun->runSQL($sql_categorias);
?>

<style>
.table {
    font-size: 0.8rem;
}
    
</style>

    <table class="table table-bordered table-striped">

        <tr>
            <th>Id categoria</th>
            <th>Categoria</th>
            <th>-</th>
        </tr>

    <?php
    while($fil_categorias = mysqli_fetch_array($res_categorias))
    {
        echo('  <tr>
                    <td><b>'.$fil_categorias['id_categoria'].'</b></td>
                    <td><b>'.$fil_categorias['categoria'].'</b></td>
                    <td><b>acciones</b></td>
                </tr>');                
    }
    ?>

    </table>