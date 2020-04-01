<!--

 1.- Crear una pagina, frontendadmin.php , donde pueda subir archivos de tipo JSON,
     PDF o XML al servidor. Al momento de subir y si se guardo bien el archivo,
    recibe una confirmación de que se guardo y la despliega en la pagina.

2.- Crear una pagina , backend.php, donde recibe los archivos de frontendadmin, 
    al momento de guardar los archivos, si no existe el folder de tipo de archivo(json,pdf,xml)
     lo crea y guarda el archivo en su debido folder. si se guardo correctamente manda una 
     confirmación a frontendadmin de que se guardo bien.

3.- Crear una pagina , frontenduser.php , donde mostrara los archivos que se han subido 
    al servidor y el tipo de archivo, tipo lista.

4.- Crear una pagina , mostrararchivo.php, donde al darle click a un archivo,
    va a desplegar de forma diferente dependiendo del tipo de archivo, para XML y JSON,
    tipo tabla de datos y para PDF, abrir el documento.

-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="descripcion" description="Ejercicio frontend-backend-php">
        <meta name="keywords" content="css, php, html">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Frontend Admin</title>
    </head>
    <body>
        <div class="contenedor">
            <section id="seccion1" class="seccion">
            <div><h2>Subir</h2></div>
            <form enctype="multipart/form-data"  action="backend.php" method="post">
                <label for="archivo">Archivo</label>
                <div>
                <input type="hidden" name="MAX_FILE_SIZW" value="1000"/>
                <input  name="archivo" type="file" id="archivo"acept=".json, .xml, .pdf"></div>
                <input type="submit">
            </form>
            
        </section>
            <section id="seccion2" class="seccion">
            <div><h2>Archivos</h2></div>

            </section>

        </div>
    

    </body>
</html>