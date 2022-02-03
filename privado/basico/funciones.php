<?php

//Funciones para manejar URL

function get_url() {
    $parametros = array();
    $url = parse_url(substr($_SERVER['REQUEST_URI'], 1));
    $i = 0;
    foreach (explode("/", $url['path']) as $p) {
        $parametros[$i] = corrige_slash(urldecode($p));
        $i++;
    }
    return $parametros;
}

function corrige_slash($texto) {
    $texto = str_replace('%252F', '%2F', $texto);
    $texto = str_replace('%253F', '%3F', $texto);

    return $texto;
}

function crea_slash($texto) {
    // si caracter == /, sustituir %2f por %252f
    $texto = str_replace('%2F', '%252F', $texto);
    $texto = str_replace('%3F', '%253F', $texto);
    return $texto;
}

// Funciones para la base de datos
// Creación de una nueva conexión a la base de datos.
function db_connect() {
    $resultado = false;

    // Conexion con el servidor bbdd
    $conn = mysqli_connect(SERVIDOR_BBDD, USUARIO_BBDD, CLAVE_BBDD);

    // Seleccion de bbdd
    if ($conn != false)
        $resultado = mysqli_select_db($conn, NOMBRE_BBDD);

    // Si todas las operaciones terminaron satisfactoriamente, devolver recurso.
    if ($resultado)
        $resultado = $conn;

    return $resultado;
}

// Cierre de una conexión a la base de datos ($conn)
function db_close($conn) {
    return mysqli_close($conn);
}

/**
 *  ace una consulta
 *
 * @param   $sentencia_sql      Sentencia SQL a procesar
 * @return                      Resultado devuelto por mysql_query (true, false o un recurso)
 *                              Devuelve falso si hubo problemas en la conexión o selección a la base de datos
 */
function db_query($sentencia_sql, $sentencia_insert = FALSE) {

    $conn = db_connect();

    $idx = mysqli_query($conn, $sentencia_sql);
    if ($sentencia_insert && $idx) {
        $idx = mysqli_insert_id($conn);
    }

    return $idx;
}

// Devuelve el número de resultados obtenidos en la última sentencia select ejecutada
// (ojo: sólo si se incluyó "SELECT SQL_CALC_FOUND_ROWS * FROM..."
function db_num_results() {

     $conn = mysqli_connect(SERVIDOR_BBDD, USUARIO_BBDD, CLAVE_BBDD, NOMBRE_BBDD);

    $idx = mysqli_fetch_row(mysqli_query("SELECT FOUND_ROWS()"));
    return $idx[0];
}

/*
 * Devuelve el numero de resultados producido por query_proy (entero).
 */

function db_query_num_results($idx) {
    return mysqli_num_rows($idx);
}

function db_user_is_admin($uvus) {
    $sentencia_sql = "SELECT EXISTS(SELECT 1 FROM `user` WHERE uvus = '" . $uvus . "' LIMIT 1)";
    //echo $sentencia_sql; echo "</br>";
    $resultado_sql = mysqli_fetch_array(db_query($sentencia_sql));
   
    return $resultado_sql[0];
}


/************ ADMIN ********/
function db_insertar_user($uvus) {

    // Se construye la sentencia
    $sentencia = "INSERT INTO `user` ( `uvus` ) VALUES ('$uvus')"; //
    //echo $sentencia;
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

function db_eliminar_user($id) {
    
        $sentencia = "DELETE FROM `user` WHERE `id`=" . (int) $id;
        $sentencia.=" LIMIT 1";
        // Se hace la consulta
        $idx = db_query($sentencia);

    return $idx;
}

function db_listar_user() {
    $sentencia_sql = "SELECT * FROM `user` ";
    //echo $sentencia_sql;
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}


//////////// CONTADORES ////////////////////////////////////////////////////

function db_insertar_registro($fecha, $v1,$v2,$v3,$v4, $uvus) {

    /*antes de insertar controlamos los 4 valores por si hubiera algun error
     *Por ejemplo, si solo se han tomado los de la tarde, cremaos un valor medio
     *      */
    if($v1 == 0 && $v2 == 0 && $v3 > 0 && $v4 > 0){
        $reg_ant = db_listar_registro_anterior($fecha);
        if($reg_ant['t_i_valor'] && $reg_ant['t_d_valor']){
            $v1 = $reg_ant['t_i_valor'] + ($v3-$reg_ant['t_i_valor'])/2;
            $v2 = $reg_ant['t_d_valor'] + ($v4-$reg_ant['t_d_valor'])/2;
        }
        else{
            $v1 = $reg_ant['m_i_valor'] + ($v3-$reg_ant['m_i_valor'])/2;
            $v2 = $reg_ant['m_d_valor'] + ($v4-$reg_ant['m_d_valor'])/2;
        }
        
    }
    
    
    $sentencia = "INSERT INTO `registros` ( `fecha`,`m_i_valor`,`m_d_valor`";
    
     if($v3 !='' && $v4 !='')
        $sentencia.= ",`t_i_valor`,`t_d_valor`";
     
    $sentencia.= ",`last_user`) VALUES (";
    $sentencia.="'$fecha',";
    $sentencia.="$v1,";
    $sentencia.="$v2";
    if($v3 !='' && $v4 !=''){
        $sentencia.=",$v3,";
        $sentencia.="$v4";
    }
    $sentencia.= ",'$uvus')"; // ojo al par�ntesis final
    //echo $sentencia;
    
    $idx = db_query($sentencia);
    return $idx;
}

function db_actualizar_registro($fecha, $v1,$v2,$v3,$v4, $uvus) {
    /*antes de insertar controlamos los 4 valores por si hubiera algun error
     *Por ejemplo, si solo se han tomado los de la tarde, cremaos un valor medio
     */
    if($v1 == 0 && $v2 == 0 && $v3 > 0 && $v4 > 0){
        $reg_ant = db_listar_registro_anterior($fecha);
        if($reg_ant['t_i_valor'] && $reg_ant['t_d_valor']){
            $v1 = $reg_ant['t_i_valor'] + ($v3-$reg_ant['t_i_valor'])/2;
            $v2 = $reg_ant['t_d_valor'] + ($v4-$reg_ant['t_d_valor'])/2;
        }
        else{
            $v1 = $reg_ant['m_i_valor'] + ($v3-$reg_ant['m_i_valor'])/2;
            $v2 = $reg_ant['m_d_valor'] + ($v4-$reg_ant['m_d_valor'])/2;
        }
    }
    
    $sentencia = "UPDATE `registros` ";
    $sentencia.="SET `m_i_valor` = '" . $v1 . "' ,";
    $sentencia.="`m_d_valor` = '" . $v2 . "' ";
    $sentencia.=",`t_i_valor` = '" . $v3 . "' ,";
    $sentencia.="`t_d_valor` = '" . $v4 . "' ,";
    $sentencia.="`last_user` = '" . $uvus . "' ";
    
    $sentencia.=" WHERE fecha = '" . $fecha . "' LIMIT 1"; 
    //echo $sentencia;
    $idx = db_query($sentencia);
    return $idx;
}


function db_listar_registro_concreto($fecha) {

    $sentencia_sql = "SELECT * FROM `registros` WHERE fecha = '$fecha' ";
    $resultado_sql = db_query($sentencia_sql);
    //echo $sentencia_sql;
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado[0];
    
}

function db_listar_registro_anterior($fecha) {

    $sentencia_sql = "SELECT * FROM `registros` WHERE fecha < '$fecha' ORDER BY fecha DESC LIMIT 1";
    $resultado_sql = db_query($sentencia_sql);
    //echo $sentencia_sql;
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado[0];
    
}

function db_listar_registro_posterior($fecha) {

    $sentencia_sql = "SELECT * FROM `registros` WHERE fecha > '$fecha' ORDER BY fecha DESC LIMIT 1";
    $resultado_sql = db_query($sentencia_sql);
    //echo $sentencia_sql;
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado[0];
    
}

function db_listar_registros_mes($fecha){
    
    $sentencia_sql = "SELECT * FROM `registros` WHERE MONTH(fecha) = MONTH('$fecha') AND YEAR(fecha) = YEAR('$fecha') ORDER BY fecha ASC";
    $resultado_sql = db_query($sentencia_sql);
    //echo $sentencia_sql;
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}

function db_listar_registros_fechas($fecha_ini, $fecha_fin){
    
    $sentencia_sql = "SELECT * FROM `registros` WHERE fecha >= '$fecha_ini' AND fecha <= '$fecha_fin' ORDER BY fecha ASC";
    $resultado_sql = db_query($sentencia_sql);
    //echo $sentencia_sql;
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
    
    
}

function db_listar_year() {

    $sentencia_sql = "SELECT YEAR(fecha) from registros GROUP BY YEAR(fecha) DESC ";
    $resultado_sql = db_query($sentencia_sql);
    //echo $sentencia_sql;
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}


/////////////////////////////////////////////////////////////////////////////////

function  calcular_total_mes($fecha){
    
    $ini_mes = date("Y", strtotime($fecha)).'-'.date("n", strtotime($fecha)).'-01';
    $reg_ant = db_listar_registro_anterior ($ini_mes);
    $registros = db_listar_registros_mes($fecha);

    $total_mes['n_dias']=0;
    $total_mes['manana']=0;
    $total_mes['tarde']=0;
    $total_mes['total']=0;
    $total_mes['n_manana']=0;
    $total_mes['n_tarde']=0;
    
    $total_mes['n_sab']=0;
    $total_mes['sabados']=0;
    
    
    foreach ($registros as $reg){
        if($reg){

            if($reg_ant['t_i_valor'] && $reg['t_d_valor'])
                $total_manna = ceil(($reg['m_i_valor'] + $reg['m_d_valor'] - $reg_ant['t_i_valor'] - $reg_ant['t_d_valor'])/2);
            else
                $total_manna = ceil(($reg['m_i_valor'] + $reg['m_d_valor'] - $reg_ant['m_i_valor'] - $reg_ant['m_d_valor'])/2);
                
            $total_tarde = ceil(($reg['t_i_valor'] + $reg['t_d_valor'] - $reg['m_d_valor'] - $reg['m_i_valor'])/2);
            
            if(($total_manna < COTA_INF_RESET) //contolamos los reset
                && ($reg['m_i_valor'] < COTA_SUP_RESET) 
                && ($reg['m_d_valor'] < COTA_SUP_RESET)){
                $total_manna = ceil(($reg['m_i_valor'] + $reg['m_d_valor'])/2);
            }
            
            if(($total_tarde < COTA_INF_RESET) //contolamos los reset
                && ($reg['t_i_valor'] < COTA_SUP_RESET) 
                && ($reg['t_d_valor'] < COTA_SUP_RESET)){
                $total_tarde = ceil(($reg['t_i_valor'] + $reg['t_d_valor'])/2);
            }

            
            $total_dia   = ($total_tarde + $total_manna);  
           //echo '* '.$total_manna.' -> '.$total_tarde . ' -> '.$total_dia.'<br>';
            if($total_dia > 0)
            $total_mes['dias']++;
            
            if($total_manna > 0)
            $total_mes['n_manana']++;
            
            if($total_tarde > 0)
            $total_mes['n_tarde']++;

            if(($total_dia > 0) && (obtener_dia($reg['fecha']) == 'Sat')){
                    $total_mes['n_sab']++;
                    $total_mes['sabados']+=$total_dia;
                }
            
            $total_mes['manana']+= $total_manna;
            $total_mes['tarde'] += $total_tarde;
            $total_mes['total'] += $total_dia;
            
            $reg_ant=$reg;
        } 
    }
    
    return $total_mes;
}


//funciones para cambiar formato fecha
function fecha_eurp($fecha){
    return date("d-m-Y",strtotime($fecha));
}

function fecha_eeuu($fecha){
    return date("Y-m-d",strtotime($fecha));
}

//devuelve siglas del dia en ingles: Sun,Mon...
function obtener_dia($fecha){
    $fecha_aux = explode('-', fecha_eurp($fecha)); 
    return (date('D', mktime (0, 0, 0, (int)$fecha_aux[1],  (int)$fecha_aux[0],  (int)$fecha_aux[2])));
}

//Calula la semana en un vector segun la fecha actual para postrarla
function calcular_semana($fecha){
    $dia_sem = obtener_dia($fecha);
    $indice_dia;

    switch ($dia_sem){
        case 'Mon':
            $indice_dia = 0;
            break;
        case 'Tue':
            $indice_dia = -1;
            break;
        case 'Wed':
            $indice_dia = -2;
            break;
        case 'Thu':
            $indice_dia = -3;
            break;
        case 'Fri':
            $indice_dia = -4;
            break;
        case 'Sat':
            $indice_dia = -5;
            break;
        case 'Sun':
            $indice_dia = -6;
            break;
        default:
            $indice_dia = 1;
            break;
    }       

    
    $dia_inicio_sem = date('Y-m-d',strtotime($fecha) + (60*60*24*$indice_dia));
    
    for($i=0; $i<7; $i++){
        $fecha_a = date('Y-m-d',strtotime($dia_inicio_sem) + (60*60*24*$i));
        
        //echo $fecha_a.' - '.date("n",strtotime($fecha_a)).' - '.date("n",strtotime($fecha)).' <br>';
        
        if(date("n",strtotime($fecha_a)) == date("n",strtotime($fecha))) 
            $semana[$i] = $fecha_a;     
        else
            $semana[$i] = '';       
        }
    
    
    return $semana;
}

//Esta funcion crea una semana que sirve de apoyo para mostrala junto con 
//la semana calculada en la funcion anterior
function calcular_semana_guia($fecha){
    $dia_sem = obtener_dia($fecha);
    $indice_dia;

    switch ($dia_sem){
        case 'Mon':
            $indice_dia = 0;
            break;
        case 'Tue':
            $indice_dia = -1;
            break;
        case 'Wed':
            $indice_dia = -2;
            break;
        case 'Thu':
            $indice_dia = -3;
            break;
        case 'Fri':
            $indice_dia = -4;
            break;
        case 'Sat':
            $indice_dia = -5;
            break;
        case 'Sun':
            $indice_dia = -6;
            break;
        default:
            $indice_dia = 1;
            break;
    }       

    
    $dia_inicio_sem = date('Y-m-d',strtotime($fecha) + (60*60*24*$indice_dia));
    
    for($i=0; $i<7; $i++){
        $fecha_a = date('Y-m-d',strtotime($dia_inicio_sem) + (60*60*24*$i));
        $semana[$i] = $fecha_a;     
    }
    
    return $semana;
}

function mostrar_fecha($fecha){
    $meses = array('','Enero','Febero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre','',);
    $fecha_aux = explode('-', $fecha); 
    switch (date('D', mktime (0, 0, 0, $fecha_aux[1],  $fecha_aux[0],  $fecha_aux[2]))){ 
        case 'Mon': echo 'Lunes, ';         break;
        case 'Tue': echo 'Martes, ';        break;
        case 'Wed': echo 'Mi&eacute;rcoles, ';     break;
        case 'Thu': echo 'Jueves, ';        break;
        case 'Fri': echo 'Viernes, ';       break;
        case 'Sat': echo 'S&aacute;bado, '; break;
        case 'Sun': echo 'Domingo, ';         break;   
    } 
    echo (int)$fecha_aux[0];//' de ' . $meses[(int)$fecha_aux[1]]. ' de ' .$fecha_aux[2];      
}

//funcion que evalua si se produce un cambio de mes en la semana mostrada
function cambio_mes($semana){
    
    //echo date("n",strtotime($semana[0])) . ' - ' . date("n",strtotime(date('Y-m-d',strtotime($semana[0]) + (60*60*24*7))));
    return date("n",strtotime($semana[0])) < date("n",strtotime(date('Y-m-d',strtotime($semana[0]) + (60*60*24*7))));
}
?>
