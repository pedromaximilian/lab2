
<?php



include(dirname(__DIR__) . '/nav.php');
?>

<div class="section">
    <div class="container">
        <a href="<?php echo $helper->url("Cabania", "insertar"); ?>" class="btn btn-info">Agregar Nueva
            Cabaña</a>
        <div class="row">
            <div class="col-md-12"><h1>Mis Cabañas - Inicio</h1>
                <table class="table">
                    <thead>
                    <tr>

                        <th>Domicilio</th>
                        <th>Localidad</th>
                        <th>Capacidad</th>
                        <th>Observacion</th>
                        <th>Propietario</th>
                        <th>Precio Dia</th>
                        <th>Operacion</th>

                    </tr>

                    </thead>
                    <tbody>


                    <?php if (isset($lista)) { ?>

                            <?php foreach ($lista as $i){ ?>
                    <tr>
                        <td>    <?php echo $i->domicilio; ?> </td>
                        <td>    <?php echo $i->localidad; ?> </td>
                        <td>    <?php echo $i->capacidad; ?> </td>
                        <td>    <?php echo $i->observaciones; ?> </td>
                        <td>    <?php echo $i->idPropietario; ?> </td>
                        <td>    <?php echo $i->precio; ?> </td>

                        <td>
                            <a href="<?php echo $helper->url("cabania","borrar"); ?>&id=<?php echo $i->id; ?>" class="btn btn-danger">Borrar</a>
                            <a href="<?php echo $helper->url("cabania","editar"); ?>&id=<?php echo $i->id; ?>" class="btn btn-info">Actualizar</a>
                            <a href="<?php echo $helper->url("imagen","insertar"); ?>&id=<?php echo $i->id; ?>" class="btn btn-warning">Imagenes</a>
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