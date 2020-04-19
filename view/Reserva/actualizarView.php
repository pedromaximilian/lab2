
<?php


include(dirname(__DIR__) . '/nav.php');
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form role="form"  action="<?php echo $helper->url("Reserva","actualizar"); ?>" method="post" class="col-lg-5">
                    <div class="form-group" hidden>
                        <input  class="form-control" type="date" name="id" value="<?php echo $i->id ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Inicio</label>
                        <input class="form-control" type="date" name="inicio" value="<?php echo $i->inicio ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Fin</label>
                        <input class="form-control" type="date" name="inicio" value="<?php echo $i->inicio ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Costo</label>
                        <input class="form-control" placeholder="Ingrese localidad" type="text" name="localidad" value="<?php echo $i->localidad ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Cliente</label>

                        <select required name="propietario" class="form-control"/>


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
                        <label class="control-label">Cabaña</label>

                        <select required name="propietario" class="form-control"/>


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