<?php
/* copia de seguridad
function get_url() {
  $parametros = array();
  $url = parse_url($_SERVER['REQUEST_URI']);
  $i=0;
  foreach(explode("/", $url['path']) as $p){

	
   $parametros[$i] = $p;
$i++; 
  }
   return $parametros;
} */
function get_url() {
  $parametros = array();
  $url = parse_url($_SERVER['REQUEST_URI']);

  $i=0;
  foreach(explode("/", $url['path']) as $p){
   $parametros[$i] = urldecode($p);
$i++; 
  }
   return $parametros;
}

function corrige_slash($texto)
{
$texto=str_replace('%252F','%2F', $texto);
$texto=str_replace('%253F','%3F', $texto);

return $texto;

}

function crea_slash($texto)
{
	// si caracter == /, sustituir %2f por %252f
	$texto = str_replace('%2F','%252F', $texto);
	$texto = str_replace('%3F','%253F', $texto);
	return $texto;
}


function valida_parametro($parametro){
	// Evitamos inyección de código.
	$qclean = strtolower_tildes(mysql_real_escape_string_con_conexion($parametro));
	// Eliminamos espacios dobles
	while (strstr($qclean, "  ")) {
		$qclean = str_replace("  ", " ", $qclean);
	}


	// Codificamos como url
	$qclean = urlencode($qclean);
	$qclean = crea_slash($qclean);
        
	// Devolvemos parametro limpio
	return $qclean;
}

// Creación de una nueva conexión a la base de datos.
function crear_conexion_bbdd() {
    $resultado=false;

    // Conexion con el servidor bbdd
    $conn = mysqli_connect(SERVIDOR_BBDD,USUARIO_BBDD,CLAVE_BBDD);

    // Seleccion de bbdd
    if ($conn != false)
        $resultado=mysqli_select_db($conn, NOMBRE_BBDD);

    // Si todas las operaciones terminaron satisfactoriamente, devolver recurso.
    if($resultado) $resultado=$conn;

    return $resultado;
}

// Cierre de una conexión a la base de datos ($conn)
function cerrar_conexion_bbdd($conn) {
    return mysqli_close($conn);
}

function mysql_real_escape_string_con_conexion($parametro){
    $conn=crear_conexion_bbdd();
    if($conn!=false){
        $res=mysqli_real_escape_string($conn, $parametro);
    }
    cerrar_conexion_bbdd($conn);
    return $res;
}

function valida_url_buscar($parametros){
//https://biblus.us.es/bibing/proyectos/buscar/wifi/en/todo/and//en/todo/limitado_a/todos/entre/1970/y/2009/solo_recursos_e
$resultado=TRUE;
$i=2;

// Comprobamos campos fijos en url
if ( $parametros[$i] != 'buscar' || $parametros[$i+2] != 'en' 
	|| $parametros[$i+6] != 'en' || $parametros[$i+8] != 'limitado_a'
	|| $parametros[$i+10] != 'entre' || $parametros[$i+12] !='y')
		$resultado=FALSE;


// Comprobamos campos de busqueda (buscar wifi en..)
if ( ( $parametros[$i+3] != 'todo' && $parametros[$i+3] != 'titulo' 
	&& $parametros[$i+3] != 'autor' && $parametros[$i+3] != 'palabra_clave' 
	&& $parametros[$i+3] != 'numero' && $parametros[$i+3] != 'director' 
        && $parametros[$i+3] != 'materia'&& $parametros[$i+3] != 'materia_exacta')
  && ($parametros[$i+7] != 'todo'  && $parametros[$i+7] != 'titulo'
	&& $parametros[$i+7] != 'autor' && $parametros[$i+7] != 'palabra_clave' 
	&& $parametros[$i+7] != 'numero' && $parametros[$i+7] != 'director' 
        && $parametros[$i+7] != 'materia' && $parametros[$i+7] != 'materia_exacta') )
	$resultado=FALSE;

	

// Comprobamos valores posibles en limitado_a
if (  $parametros[$i+9] !='todos' && $parametros[$i+9] !='itodos'
	&& $parametros[$i+9] !='iae' && $parametros[$i+9] !='iau'
	&& $parametros[$i+9] !='ie' && $parametros[$i+9] !='ii'
	&& $parametros[$i+9] !='io' && $parametros[$i+9] !='iq'
	&& $parametros[$i+9] !='it' && $parametros[$i+9] !='mtodos'
	&& $parametros[$i+9] !='maurt' && $parametros[$i+9] !='mdaim'
	&& $parametros[$i+9] !='metsc' && $parametros[$i+9] !='moige'
	&& $parametros[$i+9] !='msee' && $parametros[$i+9] !='mtqa'
        && $parametros[$i+9] !='erasmus'  && $parametros[$i+9] !='tg')
	$resultado=FALSE;

// Comprobamos fecha entre 1970 y ano actual

$yearmin=(int)$parametros[$i+11];
$yearmax=(int)$parametros[$i+13];
$tmin=1970;
$tmax=date('Y');
$tmax=(int)$tmax;

//echo 'tmin: '.$tmin.' tmax: '.$tmax.' yearmin: '.$yearmin.' yearmax: '.$yearmax;

if ( $yearmin < $tmin ||  $yearmin > $tmax)
	$resultado=FALSE;

if ( $yearmax < $tmin ||  $yearmax > $tmax)
	$resultado=FALSE;

if( $yearmin > $yearmax )
	$resultado=FALSE;


if(($parametros[$i+9] != 'todos' && $parametros[$i+9] != 'itodos' && $parametros[$i+9] != 'tg' && $parametros[$i+1] == ' ')
        || (strlen($parametros[$i+1])>1 && $parametros[$i+1]!=''))
    return $parametros[$i+1];
else {
    return FALSE;
}
}


function set_url(){

$direccion = "";
$error = 0;

$separador1="/";
$separador2="/en/";
$separador3="/limitado_a/";
$separador4="/entre/";
$separador5="/y/";


	// Generamos todas las variables pasadas por POST

	foreach($_POST as $nombre_campo => $valor){
            $valor=valida_parametro($valor);
            $asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
            eval($asignacion);
	}

	// limitacion
	$limitacion="todos";
	

	//Periodo de busqueda
	$inicio_fecha=1970;
	$fin_fecha=date('Y');
	

	// Concatenacion de variables.
	
	$direccion=$direccion.$texto1.'/en/todo/and//en/todo/limitado_a/todos/entre/1970/y/'.$fin_fecha.'///1';


	//$direccion = $direccion.$separador1.$recursos_e.$separador1."1"; //Se añade el 1 al final para indicar que se va a ver la primera página
	

	return $direccion;

}

function select_proyect_to_open($numero5dig)
{
 $error_numero5dig=false;
	if(!is_integer(intval($numero5dig))) $error_numero5dig=true;

	if ($numero5dig < 10000) {
	    $titulacion = 'INDUSTRIAL';
	    $numero = $numero5dig;
	} elseif ($numero5dig < 20000) {
	    $titulacion = 'TELECOMUNICACIÓN';
	    $numero = $numero5dig-10000;
	} elseif ($numero5dig < 30000) {
	    $titulacion = 'QUÍMICA';
	    $numero = $numero5dig-20000;
	} elseif ($numero5dig < 40000) {
    	$titulacion = 'ORGANIZACIÓN';
	    $numero = $numero5dig-30000;
	} elseif ($numero5dig < 50000) {
	    $titulacion = 'ELECTRÓNICA';
	    $numero = $numero5dig-40000;
	} elseif ($numero5dig < 60000) {
	    $titulacion = 'AUTOMÁTICA';
	    $numero = $numero5dig-50000;
	} else if ($numero5dig < 70000) {
	    $titulacion = 'AERONÁUTICA';
	    $numero = $numero5dig-60000;
	} else if ($numero5dig < 80000) {
	    $titulacion = 'MASTER';
	    $numero = $numero5dig-70000;
	}else if ($numero5dig < 90000) {
	    $titulacion = 'ERASMUS';
	    $numero = $numero5dig-80000;
	}else if ($numero5dig < 100000) {
	    $titulacion = 'GRADO';
	    $numero = $numero5dig-90000;
	}

	if( $error_numero5dig ) $numero = -1;

	$valor_devuelto[0]=str_pad($numero, 4, "0", STR_PAD_LEFT);;
	$valor_devuelto[1]=$titulacion;

	return $valor_devuelto;

}

function obten_numero5dig($titulacion,$numero)
{
	$numero5dig=0;
	if ($titulacion=='INDUSTRIAL') {
		$numero5dig = $numero;
    }else if ($titulacion=='TELECOMUNICACIÓN') {
		$numero5dig = $numero + 10000;
    }else if ($titulacion=='QUÍMICA') {
		$numero5dig = $numero + 20000;
    }else if ($titulacion == 'ORGANIZACIÓN') {
		$numero5dig = $numero + 30000;
    }else if ($titulacion == 'ELECTRÓNICA') {
		$numero5dig = $numero + 40000;
    }else if ($titulacion == 'AUTOMÁTICA') {
		$numero5dig = $numero + 50000;
    }else if ($titulacion == 'AERONÁUTICA') {
		$numero5dig = $numero + 60000;
	}else if ($titulacion == 'MASTER') {
		$numero5dig = $numero + 70000;
        }else if ($titulacion == 'ERASMUS') {
                $numero5dig = $numero + 80000;
        }
	else if ($titulacion == 'GRADO') {
                $numero5dig = $numero + 90000;
        }
	return $numero5dig;
}

function limitar_busqueda($limitar)
{

	if($limitar == "todos"){
		$limit_sql = "";
	} else if($limitar == "itodos"){
		$limit_sql = "AND (titulacion = 'telecomunicacion' OR titulacion = 'electronica' OR titulacion = 'industrial' ";
		$limit_sql.= "OR titulacion = 'automatica' OR titulacion = 'aeronautica' OR titulacion = 'organizacion' ";
		$limit_sql.= "OR titulacion = 'quimica')"; 
	} else if($limitar == "iae"){
		$limit_sql = "AND (titulacion = 'aeronautica')";
	} else if($limitar == "iau"){
		$limit_sql = "AND (titulacion = 'automatica')";
	} else if($limitar == "ie"){
		$limit_sql = "AND (titulacion = 'electronica')";
	} else if($limitar == "ii"){
		$limit_sql = "AND (titulacion = 'industrial')";
	} else if($limitar == "io"){
		$limit_sql = "AND (titulacion = 'organizacion')";
	} else if($limitar == "iq"){
		$limit_sql = "AND (titulacion = 'quimica')";
	} else if($limitar == "it"){
		$limit_sql = "AND (titulacion = 'telecomunicacion')";
                
        // MASTER
	} else if($limitar == "mtodos"){
		$limit_sql = "AND (titulacion = 'master')";
                
        }else if($limitar == "mtodos1"){
		$limit_sql = "AND (titulacion = 'master') AND (esp_master=1)";
   
        }else if($limitar == "mtodos2"){
		$limit_sql = "AND (titulacion = 'master') AND (esp_master=2)";
    
        }else if($limitar == "mtodos3"){
		$limit_sql = "AND (titulacion = 'master') AND (esp_master=3)";
                
        }else if($limitar == "mtodos4"){
		$limit_sql = "AND (titulacion = 'master') AND (esp_master=4)";
         
        }else if($limitar == "mtodos5"){
		$limit_sql = "AND (titulacion = 'master') AND (esp_master=5)";
         
        }else if($limitar == "mtodos6"){
		$limit_sql = "AND (titulacion = 'master') AND (esp_master=6)";
       
        }else if($limitar == "mtodos7"){
		$limit_sql = "AND (titulacion = 'master') AND (esp_master=7)";
         
        }else if($limitar == "mtodos8"){
		$limit_sql = "AND (titulacion = 'master') AND (esp_master=8)";
          
        }else if($limitar == "mtodos9"){
		$limit_sql = "AND (titulacion = 'master') AND (esp_master=9)";
               
        }else if($limitar == "mtodos10"){
		$limit_sql = "AND (titulacion = 'master') AND (esp_master=10)";
 
        }else if($limitar == "mtodos11"){
		$limit_sql = "AND (titulacion = 'master') AND (esp_master=11)";
                
        }else if($limitar == "mtodos12"){
		$limit_sql = "AND (titulacion = 'master') AND (esp_master=12)";
		
		} else if($limitar == "mtodos13") {
		$limit_sql = "AND (titulacion = 'master') AND (esp_master=13)";
        //GRADOS        
        } else if($limitar == "tg"){
		$limit_sql = "AND (titulacion = 'grado')";
     
	}else if($limitar == "tg1"){
		$limit_sql = "AND (titulacion = 'grado') AND (rama_grado=1)";
     
	}else if($limitar == "tg2"){
		$limit_sql = "AND (titulacion = 'grado') AND (rama_grado=2)";
     
	}else if($limitar == "tg3"){
		$limit_sql = "AND (titulacion = 'grado') AND (rama_grado=3)";
     
	}else if($limitar == "tg4"){
		$limit_sql = "AND (titulacion = 'grado') AND (rama_grado=4)";
     
	}else if($limitar == "tg5"){
		$limit_sql = "AND (titulacion = 'grado') AND (rama_grado=5)";
     
	}else if($limitar == "tg6"){
		$limit_sql = "AND (titulacion = 'grado') AND (rama_grado=6)";
     
	}else if($limitar == "tg7"){
		$limit_sql = "AND (titulacion = 'grado') AND (rama_grado=7)";
     
	}else if($limitar == "tg8"){
		$limit_sql = "AND (titulacion = 'grado') AND (rama_grado=8)";
     
	}else if($limitar == "tg9"){
		$limit_sql = "AND (titulacion = 'grado') AND (rama_grado=9)";
        //////////////////////////////////////////////////////        
	} else if($limitar == "erasmus"){
                $limit_sql = "AND (titulacion = 'erasmus')";
        }
        // AÑADIR MÁS LIMITACIONES PARA LOS DISTINTOS TIPOS DE MÁSTER
	return $limit_sql;
}

// Funciones para problemas con tildes y eñes en el manejo de textos para exportar
// Se le ha añadido que no respete las tildes y las omita para solventar problemas con las busquedas

function strtolower_tildes($string){
  $convert_to = array(
    "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u",
    "v", "w", "x", "y", "z", "à", "a", "â", "ã", "ä", "å", "æ", "ç", "è", "e", "ê", "ë", "ì", "i", "î", "ï",
    "ð", "ñ", "ò", "o", "ô", "õ", "ö", "ø", "ù", "u", "û", "u", "ý", "а", "б", "в", "г", "д", "е", "ё", "ж",
    "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы",
    "ь", "э", "ю", "я", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q",
    "r", "s", "t", "u", "v", "w", "x", "y", "z", "à", "a", "â", "ã", "ä", "å", "æ", "ç", "è", "e", "ê", "ë",
    "ì", "i", "î", "ï", "ð", "ñ", "ò", "o", "ô", "õ", "ö", "ø", "ù", "u", "û", "u", "ý", "а", "б", "в", "г",
    "д", "е", "ё", "ж", "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч",
    "ш", "щ", "ъ", "ы", "ь", "э", "ю", "я"
  );

  $convert_from = array(
    "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U",
    "V", "W", "X", "Y", "Z", "À", "Á", "Â", "Ã", "Ä", "Å", "Æ", "Ç", "È", "É", "Ê", "Ë", "Ì", "Í", "Î", "Ï",
    "Ð", "Ñ", "Ò", "Ó", "Ô", "Õ", "Ö", "Ø", "Ù", "Ú", "Û", "Ü", "Ý", "А", "Б", "В", "Г", "Д", "Е", "Ё", "Ж",
    "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ъ",
    "Ь", "Э", "Ю", "Я", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q",
    "r", "s", "t", "u", "v", "w", "x", "y", "z", "à", "á", "â", "ã", "ä", "å", "æ", "ç", "è", "é", "ê", "ë",
    "ì", "í", "î", "ï", "ð", "ñ", "ò", "ó", "ô", "õ", "ö", "ø", "ù", "ú", "û", "ü", "ý", "а", "б", "в", "г",
    "д", "е", "ё", "ж", "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч",
    "ш", "щ", "ъ", "ы", "ь", "э", "ю", "я",
  );

  return str_replace($convert_from, $convert_to, $string);
} 

function mb_ucwords($str) {
    $str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
    return ($str);
}

function ucfirst_tildes($string, $e ='utf-8') {
    if (function_exists('mb_strtoupper') && function_exists('mb_substr') && !empty($string)) {
        $string = mb_strtolower($string, $e);
        $upper = mb_strtoupper($string, $e);
            preg_match('#(.)#us', $upper, $matches);
            $string = $matches[1] . mb_substr($string, 1, mb_strlen($string, $e), $e);
    }
    else {
        $string = ucfirst($string);
    }
    return $string;
} 


// Función para comprobar que una cadena tiene el formato de una dirección de correo

function comprobar_email($email){
    $mail_correcto = 0;
    //compruebo unas cosas primeras
    if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
       if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
          //miro si tiene caracter .
          if (substr_count($email,".")>= 1){
             //obtengo la terminacion del dominio
             $term_dom = substr(strrchr ($email, '.'),1);
             //compruebo que la terminación del dominio sea correcta
             if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
                //compruebo que lo de antes del dominio sea correcto
                $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
                $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
                if ($caracter_ult != "@" && $caracter_ult != "."){
                   $mail_correcto = 1;
                }
             }
          }
       }
    }
    if ($mail_correcto)
       return TRUE;
    else
       return FALSE;
} 

function mysql_numero_filas($idx){
    return mysqli_num_rows($idx);
}

function truncate($text, $chars = 25) {
    
    $text = $text." ";
    
    /* Antigua forma para hacerlo
        $text = substr($text,0,$chars);
        //$text = substr($text,0,strrpos($text,' '));
    */
    
    // Usando funciones para multiple bytes characters
    $text = mb_substr($text,0,$chars, 'utf-8');
    
    $text = $text."...";
    
    return $text;
}

function titulacion_grado($rama){
       
    //busqueda titulacion
    $consulta = "SELECT * FROM `tit_grado` WHERE id = $rama LIMIT 1";
         
    $conn = mysqli_connect(SERVIDOR_BBDD, USUARIO_BBDD, CLAVE_BBDD) or die("Error de conexi�n a la base de datos");
    if (mysqli_select_db($conn, NOMBRE_BBDD) or die("Error de selecci�n de base de datos")) {

        $consulta = utf8_decode($consulta);
        $idx = mysqli_query($conn, $consulta);
    }

    //echo $sentencia_sql;
    while ($row = mysqli_fetch_array($idx)) {
        $resultado[] = $row;
    }
    
    mysqli_close($conn);

    return $resultado[0];
}

function especialidad_master($esp){
       
    //busqueda titulacion
    $consulta = "SELECT * FROM `esp_master` WHERE id = $esp LIMIT 1";
         
    $conn = mysqli_connect(SERVIDOR_BBDD, USUARIO_BBDD, CLAVE_BBDD) or die("Error de conexi�n a la base de datos");
    if (mysqli_select_db($conn, NOMBRE_BBDD) or die("Error de selecci�n de base de datos")) {

        $consulta = utf8_decode($consulta);
        $idx = mysqli_query($conn, $consulta);
    }

    //echo $sentencia_sql;
    while ($row = mysqli_fetch_array($idx)) {
        $resultado[] = $row;
    }
    
    mysqli_close($conn);

    return $resultado[0];
}

function coleccion_proyectos(){
    //Numero total de PFC y por titulacion
    $consulta1 = "SELECT COUNT(numero) AS num FROM `proyectos` WHERE `titulacion` NOT LIKE 'GRADO' AND `titulacion` NOT LIKE 'MASTER' AND publicar = 'true' AND YEAR( fecha ) >=1970";
    $consulta2 = "SELECT titulacion, sig, COUNT(numero) AS num  FROM `proyectos`,`titulaciones` WHERE nombre=titulacion AND `titulacion` NOT LIKE 'GRADO' AND `titulacion` NOT LIKE 'MASTER' AND publicar = 'true' AND YEAR( fecha ) >=1970  GROUP BY titulacion ORDER BY num DESC";
    //numero total de TFG y por titulacion
    $consulta3 = "SELECT COUNT(numero) AS num  FROM `proyectos` WHERE `titulacion` LIKE 'GRADO' AND publicar = 'true' AND YEAR( fecha ) >=1970 ";
    $consulta4 = "SELECT nombre, id, COUNT(numero) AS num  FROM `proyectos`,`tit_grado` WHERE `titulacion` LIKE 'GRADO'  AND tit_grado.id = proyectos.rama_grado AND publicar = 'true' AND YEAR( fecha ) >=1970  GROUP BY rama_grado ORDER BY num DESC";
    //Numero total de master
    $consulta5 = "SELECT COUNT(numero) AS num  FROM `proyectos` WHERE `titulacion` LIKE 'MASTER' AND publicar = 'true' AND YEAR( fecha ) >=1970";
    $consulta6 = "SELECT nombre, id, COUNT(numero) AS num  FROM `proyectos`,`esp_master` WHERE `titulacion` LIKE 'MASTER'  AND `esp_master`.id = proyectos.esp_master AND publicar = 'true' AND YEAR( fecha ) >=1970  GROUP BY esp_master ORDER BY num DESC";
         
    $conn = mysqli_connect(SERVIDOR_BBDD, USUARIO_BBDD, CLAVE_BBDD) or die("Error de conexión a la base de datos");
    if (mysqli_select_db($conn, NOMBRE_BBDD) or die("Error de selecci�n de base de datos")) {
        $consulta = utf8_decode($consulta);
        $idx = mysqli_query($conn, $consulta1);
    }
   
    while ($row = mysqli_fetch_array($idx)) {
        $coleccion1[] = $row;
    }
    ///////////////////////////////
    if (mysqli_select_db($conn, NOMBRE_BBDD) or die("Error de selecci�n de base de datos")) {
        $consulta = utf8_decode($consulta);
        $idx = mysqli_query($conn, $consulta2);
    }
    while ($row = mysqli_fetch_array($idx)) {
        $coleccion2[] = $row;
    }
    ///////////////////////////////
    if (mysqli_select_db($conn, NOMBRE_BBDD) or die("Error de selecci�n de base de datos")) {
        $consulta = utf8_decode($consulta);
        $idx = mysqli_query($conn, $consulta3);
    }
    while ($row = mysqli_fetch_array($idx)) {
        $coleccion3[] = $row;
    }
    ///////////////////////////////
    if (mysqli_select_db($conn, NOMBRE_BBDD) or die("Error de selecci�n de base de datos")) {
        $consulta = utf8_decode($consulta);
        $idx = mysqli_query($conn, $consulta4);
    }
    while ($row = mysqli_fetch_array($idx)) {
        $coleccion4[] = $row;
    }
    ///////////////////////////////
    if (mysqli_select_db($conn, NOMBRE_BBDD) or die("Error de selecci�n de base de datos")) {
        $consulta = utf8_decode($consulta);
        $idx = mysqli_query($conn, $consulta5);
    }
    while ($row = mysqli_fetch_array($idx)) {
        $coleccion5[] = $row;
    }
    ///////////////////////////////
    if (mysqli_select_db($conn, NOMBRE_BBDD) or die("Error de selecci�n de base de datos")) {
        $consulta = utf8_decode($consulta);
        $idx = mysqli_query($conn, $consulta6);
    }
    while ($row = mysqli_fetch_array($idx)) {
        $coleccion6[] = $row;
    }
    ///////////////////////////////
    
    mysqli_close($conn);
    
    $coleccion['pfc'] = $coleccion1;
    $coleccion['pfc_tit'] = $coleccion2;
    $coleccion['tfg'] = $coleccion3;
    $coleccion['tfg_tit'] = $coleccion4;
    $coleccion['tfm'] = $coleccion5;
    $coleccion['tfm_esp'] = $coleccion6;
    return $coleccion;
}
?>