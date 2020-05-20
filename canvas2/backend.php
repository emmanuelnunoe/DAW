<?php 
    /*
    Hacer una pagina que:
    - Cargue un conjunto de imágenes de un folder del servidor usando php
    - ponerlas en una etiqueta <img>
    Con javascript hacer:
    - Las imágenes que estan en las etiquetas <img>, ponerlas en un canvas en hileras de 5 elementos
    - Al ponerlas en el canvas, Dibujarle un marco ( cuadrado o circular ) con un color de fondo y un borde
    similar como se ve en la imagen adjunta

    subir una imagen del resultado final.


    */
    #header
    header('Content-Type: text/plain; charset=utf-8');


    #Definimos carpetas
    $root = $_SERVER["DOCUMENT_ROOT"].'/DAW/canvas2/';
    $carpetaImg = $root. '/img/';
    $nombreArchivo= basename($_FILES['archivo']['name']);
    $hashName = sha1_file($_FILES['archivo']['tmp_name']);
    $msg ="";
    $uploads= [];
    

        
    if(!is_dir($carpetaImg))
       {
           mkdir($carpetaImg, 0775,true);
       }
    
    try{
        // undefined | varios archivos | $_FILES corruption attack

        if(
            !isset($_FILES['archivo']['error']) ||
            is_array($_FILES['archivo']['error'])
        ){
            throw new RuntimeException('Invalid parameter.');
        }
        
        // Check $_FILES['archivo]['error]value.
        switch ($_FILES['archivo']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded ffilesize limit.');
            default:
                throw new RuntimeException('Unkown erros.');
        }
        
        // Check file size
        if ( $_FILES['archivo']['size'] > 1000000 ) {
            throw new RuntimeException('Exceeded filesize limit.');
        }
        
        // Check for MIME file type
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if ( false === $ext = array_search(
            $finfo->file($_FILES['archivo']['tmp_name']),
            array(
               'jpg'=>'image/jpeg',
               'png'=>'image/png',
               'gif'=>'image/gif'
            ),
            true
        ) ) {
            throw new RuntimeException('Invalid file format');
        }
        
        // Asign unique name for file
        // Obtnain safe name unique name for its binary data.
        if ( !move_uploaded_file(
            $_FILES['archivo']['tmp_name'],
            sprintf('./%s.%s',
                    sha1_file($_FILES['archivo']['tmp_name']),
                    $ext
                    )
        ) ) {
            throw new RuntimeException('Failed to move uploaded file.');
        }
        
        // mensaje de exito 
        $msg='La imagen se subio correctamente';
        listarImagenes();
        
        
      /*  $root = $_SERVER["DOCUMENT_ROOT"].'/DAW/canvas2/';
        // escanea el directorio
       $directorioPrincipal = scandir($root);
       $json_imagenes =  json_encode($directorioPrincipal);
       $file = 'imagenes.json';
       file_put_contents($file, $json_imagenes);
       */
       
       
        /// Regresar a pagina inicial
       header( "Location: frontendSubir.php?msg='$msg'");

        
        
        
    }catch( RuntimeException $e){
        echo $e->getMessage();
    } 
    
    
        
    class Imagen{
        public $url;
        public $name;
        public $hash;
        
        function set_url($url) {
          $this->url = $url;
        }
        function set_name($name) {
          return $this->name;
        }
        function set_hash($hash) {
          return $this->$hash;
        }
        
        
      }
      
      function listarImagenes() {
          $root = $_SERVER["DOCUMENT_ROOT"].'/DAW/canvas2/';
          $nombreArchivo= basename($_FILES['archivo']['name']);
          $hashName = sha1_file($_FILES['archivo']['tmp_name']);
          $arrayImagenes = [];
          // escanea el directorio
          $directorioPrincipal = scandir($root);
           
          // imprime src de imagenes en el directorio 
          $id=0;
           foreach ( $directorioPrincipal as $dir  )
           {
               if($dir != '..' &&
                  $dir != '.'&&
                 pathinfo($dir,PATHINFO_EXTENSION) == 'png') {
                   $img='<img id="'.$id.'"src="'.$dir.'"></img>';
                   $imagen = new Imagen();
                   $imagen->set_url($img);
                   $imagen->set_name($nombreArchivo);
                   $imagen->set_hash($hashName);
                   array_push($arrayImagenes,$imagen);

                   //echo '<script language="JavaScript" src="js.js>'; 
                   //echo '</script>';
                   //echo '<img id="'.$id.'"src="'.$dir.'"></img>'."</br>";
                   $id++;
                 }
                 
           }
           
          $json_imagenes =  json_encode($arrayImagenes);
          $file = 'imagenes.json';
          file_put_contents($file, $json_imagenes);
          
         
  
        }
    
        


    
?>