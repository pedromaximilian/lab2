
<?php



include(dirname(__DIR__) . '/nav.php');
?>

<div class="section">
    <div class="container">

        <a href="<?php echo $helper->url("Reserva", "insertar"); ?>" class="btn btn-info">Agregar Nueva
            Reserva</a>
        <div class="row">
            <div class="col-md-12"><h1>Cabañas - Inicio</h1>
                <table class="table">
                    <thead>
                    <tr>

                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Cliente</th>
                        <th>Cabania</th>
                        <th>Costo</th>
                        <th>Operacion</th>

                    </tr>

                    </thead>
                    <tbody>


                    <?php if (isset($lista)) { ?>

                            <?php foreach ($lista as $i){ ?>
                    <tr>
                        <td>    <?php echo $i->inicio; ?> </td>
                        <td>    <?php echo $i->fin; ?> </td>
                        <td>    <?php echo $i->idCliente; ?> </td>
                        <td>    <?php echo $i->idCabania; ?> </td>
                        <td>    <?php echo $i->costo; ?> </td>


                        <td>
                            <a href="<?php echo $helper->url("reserva","borrar"); ?>&id=<?php echo $i->id; ?>" class="btn btn-danger">Borrar</a>
                            <a href="<?php echo $helper->url("reserva","editar"); ?>&id=<?php echo $i->id; ?>" class="btn btn-info">Actualizar</a>

                        </td>
                    </tr>

                            <?php } ?>
                    <?php  } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>






<?php include "footer.php" ?>
</body>
</html>