<?php


include(dirname(__DIR__) . '/nav.php');

if (count($lista)<=0){
    echo '<script> alert("No se encontraron cabañas disponibles en estas fechas") </script>';

}

?>
<style>
    .carousel .item {
        height: 300px;
    }

    .item img {
        position: absolute;
        object-fit: contain;
        top: 0;
        left: 0;
        min-height: 300px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php if ($inicio != "" && $fin != "") { ?>
                <h4>Cabañas disponibles desde: <span><?php echo date("d/m/Y", strtotime($inicio)) ?> </span></h4>
                <h4>Cabañas disponibles hasta: <span><?php echo date("d/m/Y", strtotime($fin)) ?> </span></h4>
            <?php } ?>
            <?php if (!is_null($cliente)) { ?>
                <h4>Cliente: <span><?php echo $cliente->nombre ?> </span></h4>

            <?php } ?>

            <?php if ($inicio == "" && $fin == "") { ?>
                <h4 class="warning">Para poder realizar reserva debe seleccionar las fechas de la estadia y el cliente
                    <a href="<?php echo $helper->url("reserva", "insertar"); ?>" class="btn btn-primary">Aqui</a></h4>
            <?php } ?>
        </div>
    </div>


</div>

<?php if (isset($lista)) { ?>

    <?php foreach ($lista as $i) { ?>
        <div class="section form-group">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <div id="<?php echo $i->id ?>" class="carousel slide" data-ride="carousel">


                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">

                                <?php //return var_dump( count($i->imagenes)) ?>

                                <?php if (isset($i->imagenes) && count($i->imagenes)>0) { ?>
                                    <?php for ($x = 0; $x < count($i->imagenes); $x++) { ?>
                                        <?php if ($x == 0) { ?>
                                            <div class="item active max">
                                                <img src="../images/<?php echo $i->imagenes[$x]->uri ?>"
                                                     class="img-responsive">
                                            </div>
                                        <?php } else { ?>

                                            <div class="item">
                                                <img src="../images/<?php echo $i->imagenes[$x]->uri ?>"
                                                     class="img-responsive">
                                            </div>

                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <?php if (!isset($i->imagenes)  || count($i->imagenes)==0) { ?>
                                    <div class="item active max">
                                        <img src="https://i.imgur.com/RzfOP05.png" class="img-responsive">
                                    </div>

                                <?php } ?>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#<?php echo $i->id ?>" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="right carousel-control" href="#<?php echo $i->id ?>" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Proximo</span>
                            </a>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <?php if ($inicio != "" && $fin != "" && !is_null($cliente)){ ?>
                        <form role="form" action="<?php echo $helper->url("reserva", "crear"); ?>" method="post"
                              class="col-lg-5">


                            <input hidden name="inicio" type="text" value="<?php echo $inicio ?>">
                            <input hidden type="text" value="<?php echo $fin ?>" name="fin">
                            <input hidden type="text" value="<?php echo $i->id ?>" name="idCabania">
                            <input hidden type="text" value="<?php echo $cliente->id ?>" name="idCliente">
                            <button type="submit" class="btn btn-primary">Reservar</button>
                        </form>
                    </div>


                    <?php } ?>
                    <h1><?php echo $i->localidad ?></h1>
                    <h3><?php echo $i->domicilio ?></h3>
                    <h3><?php echo "Capacidad: " . $i->capacidad . " personas" ?></h3>
                    <h3><?php echo "$" . $i->precio ?> por día
                        | <?php echo "$" . ((strtotime($fin) - strtotime($inicio)) / (60 * 60 * 24)) * $i->precio ?>
                        total por estadía</h3>
                    <h3></h3>

                    <p><?php echo $i->observaciones ?></p>
                </div>
            </div>
        </div>
        </div>

    <?php } ?>
<?php } ?>
<?php include "footer.php"?>

</body>

</html>