<?php include "listarImagenes.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="descripcion" description="Ejercicio canvas 2">
        <meta name="keywords" content="css, php, html">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="js.js"></script>
        <title>Frontend Subir Imagen</title>
        
        
        <script>
  
    </script>
    </head>
    
    <body onload="dibujar()">
        <div class="contenedor">
            <section id="seccion1" class="seccion">
            <div><h2>Subir</h2></div>
            <form enctype="multipart/form-data"  action="backend.php" method="post">
                <label for="archivo">Imagen</label>
                <div>
                <input  name="archivo" type="file" id="archivo">
                </div>
                <input type="submit">
            </form>
            
        </section>
            <section id="seccion2" class="seccion">
            <div><h2>Imagenes</h2></div>
            <?php 
                if(isset($_REQUEST['msg']) ) {
                    $msg = $_REQUEST['msg'];
                    echo $msg;
                } else{
                    echo "Esperando respuesta del servidor..";
                }
                echo "</br></br>";
              
            ?>
            
            <canvas id="micanvas" width="600" height="200">
            </canvas>
            <script>
    
            </script>
            </section>

                    

        </div>
    

    </body>
</html>