<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["usuario"])) {

    if ($_SESSION["rol"] != "admin") {

        $this->redirect("login", "index");
        var_dump("Error la session usuario no parece estar definida");


    }
}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">
    <link href="https://bootswatch.com/3/flatly/bootstrap.min.css" rel="stylesheet"
          type="text/css">



    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>
<body>
<style>
    select2-bootstrap3.css
        /**
        * Change three lines
        *
        /* line 11 */
    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 34px;
        user-select: none;
        -webkit-user-select: none;
    }

    /* line 131 */
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 32px;
    }

    /* line 139 */
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 32px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 20px;
    }

    /* Make Select2 boxes match Bootstrap3 heights: */
    .select2-selection__rendered {
        line-height: 32px !important;
    }

    .select2-selection {
        height: 34px !important;
    }

    .select2-selection__arrow {
        height: 34px !important;
    }

    .modal-body {
        margin: auto;
        max-width: 100%;
    }
</style>
<script>
    $(document).ready(function () {
        $('.seleccion').select2();
    });
</script>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php  echo NOMBRE_APP ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li id="admin"><a href="<?php echo $helper->url("Administrador", "index"); ?>">Administrador</a></li>
                <li id="cliente"><a href="<?php echo $helper->url("Cliente", "index"); ?>">Cliente</a></li>
                <li id="propietario"><a href="<?php echo $helper->url("Propietario", "index"); ?>">Propietario</a></li>
                <li id="cabania"><a href="<?php echo $helper->url("Cabania", "index"); ?>">Cabañas</a></li>
                <li id="reserva"><a href="<?php echo $helper->url("Reserva", "index"); ?>">Reserva</a></li>

            </ul>


            <ul class="nav navbar-nav navbar-right">
                <li><a><?php echo $_SESSION["nombre"] ?></a></li>
                <li id="login"><a href="<?php echo $helper->url("Login", "salir"); ?>">Salir</a></li>


            </ul>


        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>


<?php if (!empty($error)) { ?>
    <div class="container">
        <div class="alert alert-danger" role="alert" class="col-lg-5">
            <?php echo $error; ?>
        </div>
    </div>
<?php } ?>
<?php if (!empty($exito)) { ?>
    <div class="container">
        <div class="alert alert-success" role="alert" class="col-lg-5">
            <?php echo $exito; ?>
        </div>
    </div>
<?php } ?>
