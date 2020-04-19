
<?php


include (dirname(__DIR__).'/nav.php');
?>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form role="form"  action="<?php echo $helper->url("Administrador","crear"); ?>" method="post" class="col-lg-5">
                    <div class="form-group">
                        <label class="control-label" for="exampleInputEmail1">Correo Electronico</label>
                        <input class="form-control" id="exampleInputEmail1" placeholder="Enter email" type="email" name="mail">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputPassword1">Contraseña</label>
                        <input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password" name="pass">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputPassword1">Confirmar Contraseña</label>
                        <input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password">
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