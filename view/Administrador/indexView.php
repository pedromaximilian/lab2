
<?php


include (dirname(__DIR__).'/nav.php');
?>

<div class="section">
    <div class="container">
        <a href="<?php echo $helper->url("Administrador", "insertar"); ?>" class="btn btn-info">Agregar Nuevo
            Administrador</a>
        <div class="row">
            <div class="col-md-12"><h1>Administrador - Inicio</h1>
                <table class="table">
                    <thead>
                    <tr>

                        <th>Mail</th>
                        <th>Operaciones
                        </th>

                    </tr>

                    </thead>
                    <tbody>


                    <?php if (isset($lista)) { ?>

                            <?php foreach ($lista as $i){ ?>
                    <tr>
                        <td>    <?php echo $i->mail; ?> </td>

                        <td>
                            <a href="<?php echo $helper->url("administrador","borrar"); ?>&id=<?php echo $i->id; ?>" class="btn btn-danger">Borrar</a>
                            <a href="<?php echo $helper->url("administrador","editar"); ?>&id=<?php echo $i->id; ?>" class="btn btn-info">Actualizar</a>
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