
<?php


include(dirname(__DIR__) . '/nav.php');
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form role="form"  action="<?php echo $helper->url("Cabania","actualizar"); ?>" method="post" class="col-lg-5">
                    <div class="form-group" hidden>
                        <input  class="form-control" type="text" name="id" value="<?php echo $i->id ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Domicilio</label>
                        <input class="form-control" placeholder="Ingrese su domicilio" type="text" name="domicilio" value="<?php echo $i->domicilio ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Localidad
                            <br>
                        </label>
                        <input class="form-control" placeholder="Ingrese localidad" type="text" name="localidad" value="<?php echo $i->localidad ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Capacidad</label>
                        <input class="form-control" placeholder="Ingrese su plazas disponibles" type="number" name="capacidad" value="<?php echo $i->capacidad ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Observaciones</label>
                        <textarea class="form-control" name="observaciones"><?php echo $i->observaciones ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Propietario</label>

                        <select name="propietario" class="form-control"/>


                        <?php foreach($propietarios as $propietario) {
                            //Solo marco como seleccionada la provincia que tiene el usuario
                            if($i->idPropietario==$propietario->id){
                                echo "<option value=\"$propietario->id\" selected> $propietario->nombre </option> ";
                            }
                            else{
                                echo "<option value=\"$propietario->id\"> $propietario->nombre </option> ";
                            }
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Precio por dia</label>
                        <input class="form-control" placeholder="Ingrese precio por día" type="text" name="precio" value="<?php echo $i->precio ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar
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