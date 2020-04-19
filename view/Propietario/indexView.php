
<?php


include (dirname(__DIR__).'/nav.php');
?>

<div class="section">
    <div class="container">
        <a href="<?php echo $helper->url("Propietario", "insertar"); ?>" class="btn btn-info">Agregar Nuevo
            Propietario</a>
        <div class="row">
            <div class="col-md-12"><h1>Propietario - Inicio</h1>
                <table class="table">
                    <thead>
                    <tr>

                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Domicilio</th>
                        <th>Mail</th>
                        <th>Telefono</th>
                        <th>Operaciones</th>

                    </tr>

                    </thead>
                    <tbody>


                    <?php if (isset($lista)) { ?>

                            <?php foreach ($lista as $i){ ?>
                    <tr>
                        <td>    <?php echo $i->nombre; ?> </td>
                        <td>    <?php echo $i->apellido; ?> </td>
                        <td>    <?php echo $i->dni; ?> </td>
                        <td>    <?php echo $i->domicilio; ?> </td>
                        <td>    <?php echo $i->mail; ?> </td>
                        <td>    <?php echo $i->telefono; ?> </td>

                        <td>
                            <a href="<?php echo $helper->url("Propietario","borrar"); ?>&id=<?php echo $i->id; ?>" class="btn btn-danger">Borrar</a>
                            <a href="<?php echo $helper->url("Propietario","editar"); ?>&id=<?php echo $i->id; ?>" class="btn btn-info">Actualizar</a>
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

<?php include "footer.php"?>
</body>
</html>