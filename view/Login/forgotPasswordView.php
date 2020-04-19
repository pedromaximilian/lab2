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
            <div class="col-md-12"><h1>Ingrese su correo de registro para verificar su identidad</h1></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form role="form"  action="<?php echo $helper->url("Cliente","crear"); ?>" method="post" class="col-lg-5">
                    <div class="form-group">
                        <label class="control-label" >
                            Correo electrónico
                        </label>
                        <input class="form-control" " placeholder="ejemplo@correo.com" type="email" required>
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