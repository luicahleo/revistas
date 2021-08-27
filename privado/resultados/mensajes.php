<?php

// Este fichero contiene todas las variables y funciones necesarias para 
// mostrar correctamente los diferentes mensajes de texto en 
// la pagina resultados.php.



$variables = get_url();
$busqueda_sc=$variables[4];

$busqueda2_sc=$variables[8];

$link=$variables[7];
$busqueda = urldecode($busqueda_sc);
$busqueda = corrige_slash($busqueda);
$busqueda2= urldecode($busqueda2_sc);
$busqueda2 = corrige_slash($busqueda2);

// Da formato correcto al mensaje que indica el número de proyectos devueltos.
// Ejem: "Su búsqueda wifi ha devuelta 4 resultados.
function proyectos_devueltos($busqueda, $busqueda2, $link, $num_resultados){

	$frase =''.gettext("El resultado de la b&uacute;squeda").' <b><i>';
	$frase .=$busqueda;

	if ( $busqueda2!=NULL   &&   $link=='and' )
		$frase .=gettext(' y ').$busqueda2;
	elseif ( $busqueda2!=NULL   &&   $link=='or' )
		$frase .=gettext(' o ').$busqueda2;
	elseif ( $busqueda2!=NULL   &&   $link=='and_not')
		$frase .=gettext(' y no ').$busqueda2;

	$frase .='</i></b> '.gettext("ha devuelto").' <b>';
	$frase .=$num_resultados;
	$frase .=gettext(' trabajo');

	if( $num_resultados>=2 || $num_resultados==0 ) 
		$frase .=gettext('s');
	$frase .='</b>';
	return $frase;
}


//LÍNEA INICIAL DE PAGINACIÓN  -- hacer que se puedan seleccionar 5 páginas más la primera y la última
// tratar de hacer una especie de tabla o al menos algo que quede bien
// hacer un css para que los enlaces de los números aparezcan en rojo


function paginacion($num_pags, $pagina_actual, $uri_sin_pag)
{
echo '<div id="paginacion">';
$i=1;
while($i<=$num_pags){


	// si es menor que 3 mostrar hasta 6 y numpags
	if($pagina_actual<=3){
		if($i <= 6 || $i == $num_pags) {
			echo '<div class="numero"><a href="'.DIRBASE2.$uri_sin_pag.$i.'">';
			if($i == $pagina_actual){
			echo '<b><i>'.$i.'</i></b></a> </div>';
			}
			else{
			echo $i.'</a></div> ';
			}
		}
	}

	// si es mayor que numpags-3 mostrar 1 y los 5 últimos
	else if($pagina_actual>=$num_pags-3){
		if($i >= $num_pags-5 || $i == 1) {
			echo '<div class="numero"><a href="'.DIRBASE2.$uri_sin_pag.$i.'">';
			if($i == $pagina_actual){
			echo '<b><i>'.$i.'</i></b></a></div> ';
			}
			else{
			echo $i.'</a></div> ';
			}
		}
	}

	// los demás casos
	else{
		if($i == 1 || $i == $num_pags || $i==$pagina_actual || $i==($pagina_actual-1) 
	   	|| $i==($pagina_actual-2) || $i==($pagina_actual+1) || $i==($pagina_actual+2)){
			echo '<div class="numero"><a href="'.DIRBASE2.$uri_sin_pag.$i.'">';
			if($i == $pagina_actual){
			echo '<b><i>'.$i.'</i></b></a></div> ';
			}
			else{
			echo $i.'</a></div> ';
			}
		}
	}

	$i++;
}
echo "</div>";

//FIN LÍNEA INICIAL DE PAGINACIÓN
}


?>
