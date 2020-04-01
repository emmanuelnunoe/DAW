<?php

    #Definimos carpetas
    $carpetaPdf ='/pdf';
    $carpetaJson="json/";
    $carpetaXml="xml/";

    #revisa si hay algun archivo para subir
    if(isset($_FILES["archivo"])) {

        #revisamos el formato del archivo

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if( false === $ext = array_search(
            $finfo->file($_FILES['archivo']['tmp_name']),
            array(
                'pdf' => 'application/pdf',
                'json' => 'application/json',
                'xml'=>'application/xml'
            ),
            true
        )){
            throw new RuntimeException('Invalid file Format.');
        }
        else { 

            # revisa si existe la carpeta destino 
            if( file_exists($carpetaPdf)||
                mkdir($carpetaPdf) ) {
                    $origen=$_FILES['archivo'];
                    $destino=$carpetaPdf;
               
                } else {
                    echo "<br>No se ha podido crear la carpeta: ".$carpetaPdf;
                 
                }
             /*if ( file_exists($carpetaJson) ||
                 mkdir($carpetaJson)) {
                    $origen=$_FILES["archivo"];
                    $destino=$carpetaJson.$_FILES["archivo"];

            }else {
                echo "<br>No se ha podido crear la carpeta: ".$carpetaJson;
            }

            if( file_exists($carpetaXml) ||
                mkdir($carpetaXml)) {
                    $origen=$_FILES["archivo"];
                    $destino=$carpetaXml.$_FILES["archivo"];
    
           }else {
            echo "<br>No se ha podido crear la carpeta: ".$carpetaXml;
             }*/
        }/*else {
            echo "<br>Intente con otro archivo";
        }*/

    }else {
        echo "<br> No se a seleccionado archivo";
    }
?>