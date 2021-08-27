<?php 
require_once ("./privado/comun/funciones.php");
$variables = get_url();
// Analisis de url
// Indice de parametros
$i=3;
$pagina="";
// Primer parámetro. Opciones

switch ($variables[$i]) {
	case PESTANA1:
		$activa=1;
		$pagina=FORMULARIOS;
		$i++;
	break;
    
        case 'coleccion':
		$pagina= 55;
		$i++;
	break;
	
        case PESTANA2:
		if ($_POST['texto_materia'])
		{
			$direccion=valida_parametro($_POST['texto_materia']);
			if ($direccion != '')header ( 'Location: '.DIRBASE.'materia/'.$direccion );
		}
		$activa=2;
		$pagina=FORMULARIOS;
		$i++;
	break;
	case PESTANA3:
		$activa=3;
		$pagina=FORMULARIOS;
		$i++;
	break;
	case "":
		$activa=1;
		$pagina=FORMULARIOS;
	break;
	case SEARCH:
		if ($_POST['texto1'] && (strlen($_POST['texto1']) > 3) 
                        && ($_POST['texto1'] != 'proyecto') 
                        && ($_POST['texto1'] != 'trabajo') ){
			$direccion=set_url();
                        //$direccion="1913/en/numero/and//en/todo/limitado_a/it/entre/1970/y/2011//1";
			if ($direccion != '')header ( 'Location: '.DIRBASE.'buscar/'.$direccion );
		}
	break;
	case "buscar":
		$direccion=valida_url_buscar($variables);
		if($direccion) $pagina=RESULTADOS;
	break;
	case ABRIR_PROYECTO:
		$pagina=LIBRE;
		$i++;
	break;
	case ABRIR_PROYECTO_PRIVADO:
		$i++;
		if($variables[$i] == ABRIR_PROYECTO) 
		{
			$pagina=PRIVADO;
			$i++;
		}
		else{

		// INICIO COMPROBACION COMPATIBILIDAD FAMA (proyecto=XXXXX libre)
		// Selecionamos =XXXXXX
		$proyecto_fama= strrchr($_SERVER['REQUEST_URI'], '=');
		// Eliminamos el simbolo '='
		if($proyecto_fama)
		$proyecto_fama=(int)substr($proyecto_fama, 1);
		//Si el proyecto es un numero entre 0 y 100.000, abrir proyecto.
		if( ($proyecto_fama >= 1) && ($proyecto_fama <= 100000) ){
			header ( 'Location: '.DIRBASE.ABRIR_PROYECTO_PRIVADO.'/'.ABRIR_PROYECTO.'/'.$proyecto_fama.'/');
			}
		// FIN COMPROBACION COMPATIBILIDAD FAMA (proyecto=XXXXX libre)
		}
		
	break;
	case LISTA:
		$pagina=MILISTA;
	break;
	case AYUDA:
		$pagina=PAG_AYUDA;
	break;
        case ACERCA:
		$pagina=PAG_ACERCA;
	break;
	case CONTACTO:
		$pagina=PAG_CONTACTO;
	break;
	case RECIENTES:
		$pagina=PAG_RECIENTES;
	break;
	case OTROS_RECURSOS:
		$pagina=PAG_RECURSOS;
	break;
        case 'exportar_refworks_marcados':
            $i++;
            
            $trabajos=explode(",",$variables[$i]);
            include ("./privado/html/exportar/exportar_refworks_marcados.php");
            exit();
            break;
	default:
	// INICIO COMPROBACION COMPATIBILIDAD FAMA (proyecto=XXXXX libre)
	// Selecionamos =XXXXXX
	$proyecto_fama= strrchr($_SERVER['REQUEST_URI'], '=');
	// Eliminamos el simbolo '='
	if($proyecto_fama)
	$proyecto_fama=(int)substr($proyecto_fama, 1);
	//Si el proyecto es un numero entre 0 y 100.000, abrir proyecto.
	if( ($proyecto_fama >= 1) && ($proyecto_fama <= 100000) ){
		header ( 'Location: '.DIRBASE.ABRIR_PROYECTO.'/'.$proyecto_fama.'/');
	}
	// FIN COMPROBACION COMPATIBILIDAD FAMA (proyecto=XXXXX libre)
		$activa=1;
}


// Si se solicita explorar un proyecto
if ($pagina == LIBRE || $pagina == PRIVADO) 
{
	require_once("./privado/html/navegador/funciones.php");
	require_once("./privado/navegador/acceso.php");
	$proyecto_actual=$variables[$i];
	$i++;

	////////////////////////////////////////////////////////////////////////////////
	// Compbrobamos el nivel de acceso del proyecto.
	$acceso=acceso($proyecto_actual);
	// Si el proyecto es privado, pero el solicitante no es fama, redirigir a fama.

	if( ($pagina == LIBRE && $acceso > 2) || ($pagina == PRIVADO && $_SERVER['REMOTE_ADDR'] == IP_FAMA ) ){
	$direccion= DIRBASEPYF.ABRIR_PROYECTO_PRIVADO.'/'.ABRIR_PROYECTO.'/'.$proyecto_actual.'/';
	//
        header( 'Location: '.$direccion);
	}

	/////////////////////////////////////////////////////////////////////////////////
	switch ($variables[$i]) {
		case "descargar_fichero":
			$i++;
			$dir_root=PROY_PATH.$proyecto_actual;
                        $direccion_relativa=urldecode(corrige_slash($variables[$i]));
			$file=$dir_root.'/'.$direccion_relativa;
			if( file_exists( $file ) ) $enviado_ok=enviar_fichero($file, "download");
			//if ($enviado_ok== FALSE) $pagina="";
			

			break;
		case "descargar_proyecto":

			break;
		case "":
		case "direccion":
			$i++;
			$dir_root=PROY_PATH.$proyecto_actual;
			$direccion_relativa=urldecode(corrige_slash($variables[$i]));
			$dirlist=getFileList($dir_root, $direccion_relativa);
			if(is_array($dirlist)) usort($dirlist, 'ordena_listado');
                        else $trabajo_sin_contenido=true;
			// else $pagina="";
			break;
		case "fichero":
			$i++;
			$dir_root=PROY_PATH.$proyecto_actual;
			$direccion_relativa=urldecode(corrige_slash($variables[$i]));
			$file=$dir_root.'/'.$direccion_relativa;
			if( file_exists( $file ) ) $enviado_ok=enviar_fichero($file, "inline");
			//if ($enviado_ok== FALSE) $pagina="";
			break;
		default:
			$pagina ="";
	}



}


if(isset($_POST['exportar_marcados']) && !isset($_POST['guardar'])){
	include ("./privado/html/exportar/exportar_refworks_marcados.php");
}





?>
