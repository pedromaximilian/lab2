
<?php


include (dirname(__DIR__).'/nav.php');
?>


<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <form class="form-group" action="<?php echo $helper->url("imagen", "actualizar"); ?>" method="POST" enctype="multipart/form-data">
                <label>Agregar Imagenes</label>
                <input type="text" name="id" value="<?php echo $i->id; ?>" hidden>
                <input class="form-control-file" id="file" type="file" name="file[]" size="20" accept="image/x-png, image/gif, image/jpeg" multiple><br>


                <input type="submit" value="Guardar" class="btn btn-info">

                <div id="vista-previa">

                </div>

            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <ul id="fotos" class="list-group list-inline">

            </ul>

        </div>

    </div>



</div>



<div class="section ">
    <div class="container bg-success">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Galería</h1>

            </div>
        </div>


        <div class="row form-group">
            <?php  for ($i = 0; $i < count($imagenes); $i++) { ?>
                <div class="col-md-3">
                <img class="img-responsive" src="../images/<?php echo $imagenes[$i]->uri ?>"/>
                    <a href="<?php echo $helper->url("imagen","borrar"); ?>&id=<?php echo $imagenes[$i]->id; ?>&idCabania=<?php echo $imagenes[$i]->idCabania ?>" class="btn btn-danger">Borrar</a>
                </div>


                <?php if (($i+1) % 4 == 0) {?>
                    </div><div class="row form-group">
                <?php } ?>
            <?php } ?>
        </div>

        </div>
    </div>
</div>







<script>
    $(function () {
        $("#file").on("change", function () {
            /*Limpiar imagenes*/
            $("#vista-previa").html('');

            //alert("entro a la funcion");
            var archivos = document.getElementById('file').files;
            var navegador = window.URL || window.webkitURL;

            /* recorrer array file */

            for (var i = 0; i < archivos.length; i++) {
                var size = archivos[i].size;
                var type = archivos[i].type;
                var name = archivos[i].name;
                //alert(archivos[i].name);

                if (size > 1024 * 1024) {
                    //alert("entro por tamaño")
                    $("#vista-previa").append("<div id='size' class='alert alert-warning' role='alert'>El archivo " + name + " tiene un tamaño superio a 1Mb</p>")
                } else if (type != 'image/jpg' && type != 'image/jpeg' && type != 'image/png') {

                    $("#vista-previa").append("<div id='size' class='alert alert-warning' role='alert'>El archivo " + name + " posee un formato de extension no admitido</p>");
                } else {
                    var objeto_url = navegador.createObjectURL(archivos[i]);
                    $("#fotos").append("<li class='list-group-item'><img src=" + objeto_url + " width='200' class='img-rounded' width='304' height='236'></li>");
                }
            }
        });
    });
</script>
</body>
</html>