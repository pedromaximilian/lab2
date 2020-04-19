
<?php


include(dirname(__DIR__) . '/nav.php');
?>
<div class="section">
    <div class="container">
        <h1>Busqueda de cabañas</h1>
        <div class="row">
            <div class="col-md-12">
                <form role="form"  action="<?php echo $helper->url("Reserva","disponibles"); ?>" method="post" class="col-lg-3">

                    <div class="form-group">
                        <label class="control-label">Cliente</label>

                        <select name="idCliente" class="form-control seleccion"/>
                        <option value="-1">Seleccione un Cliente</option>



                        <?php
                        if (isset($clientes)) {

                            foreach ($clientes as $cliente) {


                                echo "<option value=\"$cliente->id\"> $cliente->nombre " . ' - ' . " $cliente->dni </option> ";

                            }
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Fecha Inicio</label>
                        <input class="form-control" type="date" name="inicio" >
                    </div>
                    <div class="form-group">
                        <label class="control-label">Fecha Fin</label>
                        <input class="form-control" type="date" name="fin" >
                    </div>
                    <div class="form-group">
                        <label class="control-label">Domicilio</label>
                        <input class="form-control" type="text" name="domicilio" >
                    </div>
                    <div class="form-group">
                        <label class="control-label">Localidad</label>
                        <input class="form-control" type="text" name="localidad" >
                    </div>
                    <div class="form-group">
                        <label class="control-label">Capacidad</label>
                        <input class="form-control" type="number" name="capacidad" >
                    </div>
                    <div class="form-group">
                        <label class="control-label">Precio</label>
                        <input class="form-control" type="number" name="precio" >
                    </div>

                    <button type="submit" class="btn btn-primary">Buscar
                        <br>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>
</body>

</html>