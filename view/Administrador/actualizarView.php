
<?php


include (dirname(__DIR__).'/nav.php');
?>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form role="form"  action="<?php echo $helper->url("Administrador","actualizar"); ?>" method="post" class="col-lg-5">
                    <div class="form-group">
                        <input type="hidden" value="<?php echo $i->id;?>" name="id" class="form-control"/>
                        <label class="control-label">Correo Electronico</label>
                        <input class="form-control" type="email" name="mail" value="<?php echo $i->mail;?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Contraseña</label>
                        <input class="form-control"type="password" name="pass" value="<?php echo $i->pass;?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirmar Contraseña</label>
                        <input class="form-control" type="password">
                    </div>
                    <button type="submit" class="btn btn-default">Enviar<br></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"?>
</body>
</html>