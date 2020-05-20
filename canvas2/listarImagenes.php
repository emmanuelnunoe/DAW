    <?php
    /*
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
    */
    ?>