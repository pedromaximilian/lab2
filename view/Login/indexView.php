<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet"
          type="text/css">
</head>
<body>


<div class="section">

    <div class="container">
        <div class="row">
            <div class="col-md-12"><h1>Inicio de sesion</h1></div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <?php if (!empty($error)) { ?>

                    <div class="alert alert-danger" role="alert" class="col-lg-5">
                        <?php echo $error; ?>
                    </div>

                <?php } ?>
                <form role="form"  action="<?php echo $helper->url("Login","login"); ?>" method="post" class="col-lg-5" autocomplete="off">
                    <div class="form-group">
                        <label class="control-label" >
                            Correo electrónico
                        </label>
                        <input class="form-control" " placeholder="ejemplo@correo.com" type="email" name="mail" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" >
                            Contraseña
                        </label>
                        <input class="form-control"  placeholder="su contraseña" type="password" name="pass" required>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rol"  value="admin">
                        <label class="form-check-label">
                            Administrador
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rol" value="propietario" checked>
                        <label class="form-check-label" for="exampleRadios2">
                            Propietario
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Ingresar<br>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>