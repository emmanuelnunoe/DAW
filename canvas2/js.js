

function getJSON(archivo,callback)
{
    var JSONrequest = new XMLHttpRequest();
    JSONrequest.open("GET",archivo,true); 
    JSONrequest.setRequestHeader("Content-Type","application/json");
    
    /*Event*/
    JSONrequest.onreadystatechange = function()
    {
        if (JSONrequest.readyState === 4 && JSONrequest.status == 200)
        {
            
            callback(JSONrequest.responseText);
        }
    }
    JSONrequest.send();
   
}

function  loadJSON(json)
{
    miJson = JSON.parse(json)
 

}


function dibujar ()
{   


    var canvas = document.getElementById('micanvas');
    if(canvas.getContext)
    {
        var renglones = 5;
        var columnas = 5;
        var x = 10;
        var y = 10;
        var ancho =100;
        var alto=100;
        
        getJSON("imagenes.json",loadJSON); 
        console.log(XMLHttpRequest.toString())
    
        for( j= 1 ; j< renglones; j++ ){
            for ( i = 1 ; i<renglones; i++)
            {
   
                var contexto = canvas.getContext('2d');
                var cuadro = new Path2D();
                cuadro.rect(x,y,ancho,alto);
                


                if( j %2 !=0)
                {
                        contexto.stroke(cuadro);
                if( i%2== 0 )
                    {
                        contexto.fill(cuadro)
                    }
     
                 }
                 
                 if( j %2== 0) {
                    var circulo = new Path2D();
                    circulo.moveTo(x+100,y+50);
                    /*circulo.arc( X,Y,RADIO,INICIO,FINAL,CONTRASENTIDO)*/
                    circulo.arc(x+50,y+50,50,0,2 * Math.PI);
                    contexto.stroke(circulo)
                    if( i%2!=0)
                    {
                        contexto.fill(circulo);
                     
                    }

                 }
                    /*mover x*/
                    x+=ancho+10;
                 
            }
            /*mover y*/
            y+=alto+15
            /* mover x al origen +10 */
            x=10

            
        } /*fin ciclo columnas*/
    }
    
}
