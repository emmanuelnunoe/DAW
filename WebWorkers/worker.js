/**
 * Hacer una pagina que calcule la multiplicación de dos matrices

Enviarle dos objetos (matrizA,matrizB) al webworker
El webworker debe verificar si es posible multiplicar matrizA con matrizB
si es posible, hacer la multiplicación y regresar un objeto ( la matriz resultante)
si no es posible, regresar que no se pueden multiplicara
 */


self.onmessage = function( e )
{
    var num = Number( e.data )
    this.multiplicaMatrices( num );

}


function multiplicaMatrices( num)
{
    if( num != 0 )
    {
        console.log("Se multiplicaron las matrices")
    }
}