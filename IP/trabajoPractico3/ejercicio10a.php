<?php
//PROGRAMA encriptar
//Este programa encripta un numero de 4 digitos
//int num, encriptado, encriptadoAux, aux, aux2, es10, menorMil, menorCien, menorDiez, cero
$encriptadoAux = 0;
$encriptado = 0;

echo "Ingrese un numero: ";
$num = trim(fgets(STDIN));

//CUARTO DIGITO
$aux = (($num % 10) % 10) + 7;
$es10 = $aux >= 10; //Verifico si el auxiliar es mayor o igual a 10 despues de la suma
$es10 ? $aux = $aux % 10 : $aux = $aux; //Si es mayor saca el resto de dividir por 10, sino lo deja
$encriptadoAux += $aux;

//TERCER DIGITO
$aux = ((int)(($num % 100) / 10) % 10) + 7;
$es10 = $aux >= 10;
$es10 ? $aux = $aux % 10 : $aux = $aux;
$encriptadoAux += ((int)$aux * 10);

//SEGUNDO DIGITO
$aux = ((int)(($num % 1000) / 100) % 10) + 7;
$es10 = $aux >= 10;
$es10 ? $aux = $aux % 10 : $aux = $aux;
$encriptadoAux += ((int)$aux * 100);

//PRIMER DIGITO
$aux = ((int)($num / 1000) % 10) + 7;
$es10 = $aux >= 10; 
$es10 ? $aux = $aux % 10 : $aux = $aux;
$encriptadoAux += (int)($aux * 1000);

//REEMPLAZO DE DIGITOS
$aux = (int)($encriptadoAux / 1000); //PRIMER DIGITO
$aux2 = (int)(($encriptadoAux % 100) / 10); //TERCER DIGITO
$encriptado += ($aux * 10);
$encriptado += ($aux2 * 1000);
$aux = $encriptadoAux % 10; //CUARTO DIGITO
$aux2 = (int)(($encriptadoAux % 1000) / 100); //SEGUNDO DIGITO
$encriptado += ($aux * 100);
$encriptado += $aux2;

$menorMil = $encriptado < 1000; //Verifico si al numero le quedo un 0 adelante, por lo que seria menor a 1.000
$menorMil ? $encriptado = "0".$encriptado : $encriptado = $encriptado; //Si es menor le concatena un 0 al principio

$menorCien = $encriptado < 100;
$menorCien ? $encriptado = "0".$encriptado : $encriptado = $encriptado;

$menorDiez = $encriptado < 10;
$menorDiez ? $encriptado = "0".$encriptado : $encriptado = $encriptado;

echo $num. " encriptado es: ". $encriptado;