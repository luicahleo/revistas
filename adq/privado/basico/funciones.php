<?php
//$conn = mysqli_connect(SERVIDOR_BBDD, USUARIO_BBDD, CLAVE_BBDD);
//Funciones para manejar URL

error_reporting(E_ALL ^ E_NOTICE);

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

# Version php7 Octubre 2020
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

    //mysqli_set_charset($conn,"utf8");

    return $resultado;
}

// Cierre de una conexión a la base de datos ($conn)
function db_close($conn) {
    return mysqli_close($conn);
}

/**
 *  hace una consulta
 *
 * @param   $sentencia_sql      Sentencia SQL a procesar
 * @return                      Resultado devuelto por mysqli_query (true, false o un recurso)
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

    $conn = db_connect();

    $idx = mysqli_fetch_row(mysqli_query($conn, "SELECT FOUND_ROWS()"));
    return $idx[0];

    // $sentencia_sql = "SELECT FOUND_ROWS()";
    // $result = mysqli_query($conn, $sentencia_sql);
    // $idx = mysqli_fetch_row($result);
    // return $idx[0];
}

/*
 * Devuelve el numero de resultados producido por query_proy (entero).
 */

function db_query_num_results($idx) {
    return mysqli_num_rows($idx);
}

function db_insertar_pedido($fechapedido, $fecharecepcion, $observacionespublicas, $observacionesprivadas, $observacionesusuario, $titulo, $autor, $editorial, $edicion, $any, $isbn, $numerofactura, $ejemplares, $responsable, $correoresponsable, $peticionario, $peticionario_uvus, $proveedor_id, $situacion_id, $unidad_id, $presupuesto_id, $organica, $tipo_de_material_id, $status, $correo, $telefono, $titulacion, $notificar, $bibliografia_asignatura, $bibliografia_titulacion, $bibliografia_curso) {

    // Se construye la sentencia
    $sentencia = "INSERT INTO `pedido` ( `fechaPedido` , `fechaRecepcion` ,
         `observacionesPublicas` , `observacionesPrivadas` ,
         `observacionesUsuario` , `titulo` , `autor` , `editorial` , `edicion` ,
         `any` , `isbn` , `numeroFactura` , `ejemplares`, `responsable`,
         `correoResponsable`, `peticionario`, `peticionario_uvus`,
         `proveedor_id`, `situacion_id`, `unidad_id`, `presupuesto_id`,
         `organica`, `tipo_de_material_id`, `status`, `correo`, `telefono`,
         `titulacion`, `notificar`, `bibliografia_asignatura`,
         `bibliografia_titulacion`, `bibliografia_curso`)
         VALUES (";
    $sentencia.="'$fechapedido',";
    $sentencia.="'$fecharecepcion',";
    $sentencia.="'$observacionespublicas',";
    $sentencia.="'$observacionesprivadas',";
    $sentencia.="'$observacionesusuario',";
    $sentencia.="'$titulo',";
    $sentencia.="'$autor',";
    $sentencia.="'$editorial',";
    $sentencia.="'$edicion',";
    $sentencia.="'$any',";
    $sentencia.="'$isbn',";
    $sentencia.="'$numerofactura',";
    $sentencia.="'$ejemplares',";
    $sentencia.="'$responsable',";
    $sentencia.="'$correoresponsable',";
    $sentencia.="'$peticionario',";
    $sentencia.="'$peticionario_uvus',";
    $sentencia.="'$proveedor_id',";
    $sentencia.="'$situacion_id',";
    $sentencia.="'$unidad_id',";
    $sentencia.="'$presupuesto_id',";
    $sentencia.="'$organica',";
    $sentencia.="'$tipo_de_material_id',";
    $sentencia.="'$status',";
    $sentencia.="'$correo',";
    $sentencia.="'$telefono',";
    $sentencia.="'$titulacion',";
    $sentencia.="'$notificar',";
    $sentencia.="'$bibliografia_asignatura',";
    $sentencia.="'$bibliografia_titulacion',";
    $sentencia.="'$bibliografia_curso')"; // ojo al paréntesis final
    // Se hace la consulta
    $idx = db_query($sentencia, TRUE);


    return $idx;
}

function db_insertar_presupuesto($nombre) {

    // Se construye la sentencia
    $sentencia = "INSERT INTO `presupuesto` ( `nombre`)
         VALUES (";
    $sentencia.="'$nombre')"; // ojo al paréntesis final
    //echo $sentencia;
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

function db_insertar_proveedor($nombre, $nif, $abreviatura, $direccion, $poblacion, $provincia, $codigopostal, $pais, $telefono, $fax, $correo, $visible, $observaciones) {

    // Se construye la sentencia
    $sentencia = "INSERT INTO `proveedor` ( `nombre` , `nif` , `abreviatura` ,
         `direccion` , `poblacion` , `provincia` , `codigoPostal` , `pais` ,
         `telefono` , `fax` , `correo` , `visible`,`observaciones`)
         VALUES (";
    $sentencia.="'$nombre',";
    $sentencia.="'$nif',";
    $sentencia.="'$abreviatura',";
    $sentencia.="'$direccion',";
    $sentencia.="'$poblacion',";
    $sentencia.="'$provincia',";
    $sentencia.="'$codigopostal',";
    $sentencia.="'$pais',";
    $sentencia.="'$telefono',";
    $sentencia.="'$fax',";
    $sentencia.="'$correo',";
    $sentencia.="'$visible',";
    $sentencia.="'$observaciones')"; // ojo al paréntesis final
    //echo $sentencia;
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

function db_insertar_situacion($nombre) {

    // Se construye la sentencia
    $sentencia = "INSERT INTO `situacion` ( `nombre`)
         VALUES (";
    $sentencia.="'$nombre')"; // ojo al paréntesis final
    //echo $sentencia;
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

function db_insertar_tipomaterial($nombre) {

    // Se construye la sentencia
    $sentencia = "INSERT INTO `tipoMaterial` ( `nombre`)
         VALUES (";
    $sentencia.="'$nombre')"; // ojo al paréntesis final
    //echo $sentencia;
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

function db_insertar_unidad($nombre, $unidad_solicitante, $fondo, $uvus_responsable, $nombre_responsable, $email_responsable, $visible) {

    // Se construye la sentencia
    $sentencia = "INSERT INTO `unidad` ( `nombre`, `unidad_solicitante`,`fondo`,`uvus_responsable`, 
        `nombre_responsable`, `email_responsable`, `visible`)
         VALUES (";
    $sentencia.="'$nombre',";
    $sentencia.="'$unidad_solicitante',";
    $sentencia.="'$fondo',";
    $sentencia.="'$uvus_responsable',";
    $sentencia.="'$nombre_responsable',";
    $sentencia.="'$email_responsable',";
    $sentencia.="'$visible')"; // ojo al paréntesis final
    //echo $sentencia;
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

function db_insertar_administrador($uvus) {

    // Se construye la sentencia
    $sentencia = "INSERT INTO `administrador` ( `uvus`)
         VALUES (";
    $sentencia.="'$uvus')"; // ojo al paréntesis final
    //echo $sentencia;
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

function db_insertar_catalogador($uvus) {

    // Se construye la sentencia
    $sentencia = "INSERT INTO `catalogador` ( `uvus`)
         VALUES (";
    $sentencia.="'$uvus')"; // ojo al paréntesis final
    //echo $sentencia;
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

function db_insertar_mostrador($uvus) {

    // Se construye la sentencia
    $sentencia = "INSERT INTO `mostrador` ( `uvus`)
         VALUES (";
    $sentencia.="'$uvus')"; // ojo al paréntesis final
    //echo $sentencia;
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

////////////////**************** historico

function db_insertar_historico($pedido_id, $situacion_id, $email_asunto,$destinatarios, $cn) {

    $cn = strtolower($cn);
    $cn = ucwords($cn);
    // Se construye la sentencia
    $sentencia = "INSERT INTO `historico` ( `fecha`, `pedido`,`situacion`, `asunto`, `destinatarios`, `usuario`)
         VALUES (";
    $fecha = date("Y-m-d G:i:s");
    $sentencia.="'$fecha',";
    $sentencia.="'$pedido_id',";
    $sentencia.="'$situacion_id',";

    if($destinatarios){
        $sentencia.="'$email_asunto',";
        $sentencia.="'$destinatarios',";
    }
    else{
        $sentencia.="' - No se enviaron correos - ',";
        $sentencia.="' -- -- ',";
    }

    $sentencia.="'$cn')"; // ojo al paréntesis final
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

//funcion que comprueba si el usuario es realizador del pedido
function db_propietario($peticionario_uvus, $id) {

    $sentencia_sql = "SELECT *
            FROM `pedido`
            WHERE id=" . $id . " 
            AND peticionario_uvus = '"
        . $peticionario_uvus . "' ";

    //echo $sentencia_sql;
    $resultado_sql = db_query($sentencia_sql);
    $resultado = mysqli_fetch_array($resultado_sql);
    // echo $resultado;

    return $resultado;
}

function db_listar_pedido($id) {

    $sentencia_sql = "SELECT pedido.* , situacion.nombre AS `situacion_nombre`,
        situacion.label AS situacion_color,
        tipoMaterial.nombre AS tipo_de_material_nombre,
        unidad.nombre AS unidad_nombre,
        unidad.unidad_solicitante AS unidad_solicitante,
        unidad.email_responsable AS unidad_email,  
        unidad.uvus_responsable AS uvus_responsable,
        unidad.nombre_responsable AS nombre_responsable,
        presupuesto.nombre AS presupuesto_nombre, 
        proveedor.abreviatura AS proveedor_abreviatura,
        proveedor.nombre AS proveedor_nombre,
        proveedor.correo AS proveedor_correo
        FROM `pedido`, `situacion`, `tipoMaterial`, `presupuesto`, `unidad`, `proveedor`
        WHERE pedido.id=" . $id . " AND 
        pedido.situacion_id = situacion.id 
        AND pedido.tipo_de_material_id = tipoMaterial.id 
        AND pedido.unidad_id = unidad.id
        AND pedido.presupuesto_id = presupuesto.id
        AND pedido.proveedor_id = proveedor.id
            LIMIT 1";
    //echo $sentencia_sql;
    $resultado_sql = db_query($sentencia_sql);
    $resultado = mysqli_fetch_array($resultado_sql);

    return $resultado;
}

/*function db_listar_pedido_especifico($id){

    $sentencia_sql = "SELECT * FROM `pedido` WHERE id =" . $id;
    vv($sentencia_sql);

    $resultado_sql = db_query($sentencia_sql);
    vv($resultado_sql);

    $resultado = mysqli_fetch_array($resultado_sql);
    vv($resultado);

    return $resultado;
}*/

function db_listar_historico($id) {

    $sentencia_sql = "SELECT  historico.* , situacion.nombre AS `situacion_nombre`,
        situacion.label AS situacion_color,
        situacion.descripcion AS situacion_descripcion,
        pedido.titulo AS titulo,
        pedido.id AS pedido_id,
        pedido.peticionario AS peticionario,
        pedido.responsable AS responsable
        FROM `historico`, `situacion`, `pedido`
        WHERE historico.pedido=" . $id . " 
        AND historico.situacion = situacion.id 
        AND historico.pedido = pedido.id
        ORDER BY fecha DESC
       ";
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    //echo "resultado_sql: "; var_dump($resultado_sql);
    return $resultado;
}

////////////////////////////////////////////////////////////

function db_listar_pedidos($peticionario_uvus = false, $limite = FALSE, $tamano_pagina = FALSE) {

    $sentencia_sql = "SELECT SQL_CALC_FOUND_ROWS pedido.*, situacion.nombre AS `situacion_nombre`,
            situacion.label AS situacion_color,
            situacion.descripcion AS situacion_descripcion,
            tipoMaterial.nombre AS tipo_de_material_nombre,
            presupuesto.nombre AS presupuesto_nombre,
            proveedor.abreviatura AS proveedor_abreviatura
            FROM `pedido`, `situacion`, `tipoMaterial`, `presupuesto`, proveedor
            WHERE pedido.situacion_id = situacion.id
            AND pedido.tipo_de_material_id = tipoMaterial.id
            AND pedido.presupuesto_id = presupuesto.id
            AND pedido.proveedor_id = proveedor.id";


    if ($peticionario_uvus) {
        $sentencia_sql.=" AND pedido.peticionario_uvus = '"
            . $peticionario_uvus . "' ";
        $sentencia_sql.=" ORDER BY fechapedido DESC ";


    } else {
        $sentencia_sql.=" ORDER BY CASE WHEN situacion_id=13 THEN 2 ELSE situacion_id END ASC, fechapedido DESC ";
    }

    if ($limite || $tamano_pagina) {
        $sentencia_sql.=" LIMIT " . $limite . ", " . $tamano_pagina;
    }
    //echo $sentencia_sql;

    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }


    return $resultado;
}

function db_listar_pedidos_ord($peticionario_uvus = false, $limite = FALSE, $tamano_pagina = FALSE, $orden = FALSE) {

    $sentencia_sql = "SELECT SQL_CALC_FOUND_ROWS pedido.*, situacion.nombre AS `situacion_nombre`,
            situacion.label AS situacion_color,
            situacion.descripcion AS situacion_descripcion,
            tipoMaterial.nombre AS tipo_de_material_nombre,
            presupuesto.nombre AS presupuesto_nombre,
            proveedor.abreviatura AS proveedor_abreviatura,
            unidad.fondo AS fondo
            FROM `pedido`, `situacion`, `tipoMaterial`, `presupuesto`, proveedor, unidad
            WHERE pedido.situacion_id = situacion.id
            AND pedido.unidad_id = unidad.id 
            AND pedido.tipo_de_material_id = tipoMaterial.id
            AND pedido.presupuesto_id = presupuesto.id
            AND pedido.proveedor_id = proveedor.id";

    if ($peticionario_uvus) {
        $sentencia_sql.=" AND pedido.peticionario_uvus = '"
            . $peticionario_uvus . "' ";
        $sentencia_sql.=" ORDER BY fechapedido DESC ";


    } else {
        switch ($orden){
            case 'nd':
                $sentencia_sql.=" ORDER BY id DESC, CASE WHEN situacion_id=13 THEN 2 ELSE situacion_id END ASC ";
                break;
            case 'na':
                $sentencia_sql.=" ORDER BY id ASC, CASE WHEN situacion_id=13 THEN 2 ELSE situacion_id END ASC ";
                break;
            case 'fd':
                $sentencia_sql.=" ORDER BY fondo DESC, CASE WHEN situacion_id=13 THEN 2 ELSE situacion_id END ASC";
                break;
            case 'fa':
                $sentencia_sql.=" ORDER BY fondo ASC, CASE WHEN situacion_id=13 THEN 2 ELSE situacion_id END ASC";
                break;
            case 'dd':
                $sentencia_sql.=" ORDER BY fechaPedido DESC, CASE WHEN situacion_id=13 THEN 2 ELSE situacion_id END ASC";
                break;
            case 'da':
                $sentencia_sql.=" ORDER BY fechaPedido ASC, CASE WHEN situacion_id=13 THEN 2 ELSE situacion_id END ASC";
                break;
            case 'td':
                $sentencia_sql.=" ORDER BY titulo DESC, CASE WHEN situacion_id=13 THEN 2 ELSE situacion_id END ASC";
                break;
            case 'ta':
                $sentencia_sql.=" ORDER BY titulo ASC, CASE WHEN situacion_id=13 THEN 2 ELSE situacion_id END ASC";
                break;
            case 'id':
                $sentencia_sql.=" ORDER BY isbn DESC, CASE WHEN situacion_id=13 THEN 2 ELSE situacion_id END ASC";
                break;
            case 'ia':
                $sentencia_sql.=" ORDER BY isbn ASC, CASE WHEN situacion_id=13 THEN 2 ELSE situacion_id END ASC";
                break;
            case 'ud':
                $sentencia_sql.=" ORDER BY peticionario DESC, CASE WHEN situacion_id=13 THEN 2 ELSE situacion_id END ASC";
                break;
            case 'ua':
                $sentencia_sql.=" ORDER BY peticionario ASC, CASE WHEN situacion_id=13 THEN 2 ELSE situacion_id END ASC";
                break;
            case 'ed':
                $sentencia_sql.=" ORDER BY CASE WHEN situacion_id=13 THEN 2 ELSE situacion_id END DESC, fechapedido ASC ";
                break;
            default:
                $sentencia_sql.=" ORDER BY CASE WHEN situacion_id=13 THEN 2 ELSE situacion_id END ASC, fechapedido DESC ";
                break;
        }

    }

    if ($limite || $tamano_pagina) {
        $sentencia_sql.=" LIMIT " . $limite . ", " . $tamano_pagina;
    }
    //echo $sentencia_sql;
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;

    }

    return $resultado;
}

function db_listar_todo(){

    $sentencia_sql = "SELECT * FROM pedido";

    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;

    }
    return $resultado;

}


/*CATALOGADOR */////////////////////////////////////////////////////////////////////////////////

function db_listar_pedido_ctlg($id) {

    $sentencia_sql = "SELECT pedido.* , situacion.nombre AS `situacion_nombre`,
        situacion.label AS situacion_color,
        tipoMaterial.nombre AS tipo_de_material_nombre,
        unidad.nombre AS unidad_nombre,
        unidad.unidad_solicitante AS unidad_solicitante,
        unidad.email_responsable AS unidad_email,  
        unidad.uvus_responsable AS uvus_responsable,
        unidad.nombre_responsable AS nombre_responsable,
        presupuesto.nombre AS presupuesto_nombre, 
        proveedor.abreviatura AS proveedor_abreviatura,
        proveedor.nombre AS proveedor_nombre,
        proveedor.correo AS proveedor_correo
        FROM `pedido`, `situacion`, `tipoMaterial`, `presupuesto`, `unidad`, `proveedor`
        WHERE pedido.id=" . $id . " AND 
        pedido.situacion_id = situacion.id 
        AND ( pedido.situacion_id = 4
             OR pedido.situacion_id = 5
             OR pedido.situacion_id = 6
             OR pedido.situacion_id = 10
             OR pedido.situacion_id = 11
             OR pedido.situacion_id = 14)
        AND pedido.tipo_de_material_id = tipoMaterial.id 
        AND pedido.unidad_id = unidad.id
        AND pedido.presupuesto_id = presupuesto.id
        AND pedido.proveedor_id = proveedor.id
        AND pedido
            LIMIT 1";
    //echo $sentencia_sql;
    $resultado_sql = db_query($sentencia_sql);
    $resultado = mysqli_fetch_array($resultado_sql);
    //echo $resultado['titulo'];
    return $resultado;
}

function db_listar_pedidos_ctlg($peticionario_uvus = false, $limite = FALSE, $tamano_pagina = FALSE) {

    $sentencia_sql = "SELECT SQL_CALC_FOUND_ROWS pedido.*, situacion.nombre AS `situacion_nombre`,
            situacion.label AS situacion_color,
            situacion.descripcion AS situacion_descripcion,
            tipoMaterial.nombre AS tipo_de_material_nombre,
            presupuesto.nombre AS presupuesto_nombre,
            proveedor.abreviatura AS proveedor_abreviatura
            FROM `pedido`, `situacion`, `tipoMaterial`, `presupuesto`, proveedor
            WHERE pedido.situacion_id = situacion.id
            AND ( pedido.situacion_id = 4
             OR pedido.situacion_id = 5
             OR pedido.situacion_id = 6
             OR pedido.situacion_id = 10
             OR pedido.situacion_id = 11
             OR pedido.situacion_id = 14)
            AND pedido.tipo_de_material_id = tipoMaterial.id
            AND pedido.presupuesto_id = presupuesto.id
            AND pedido.proveedor_id = proveedor.id";

    //$sentencia_sql = "SELECT * FROM `pedido` WHERE `situacion_id` BETWEEN 4 AND 6";

    if ($peticionario_uvus) {
        $sentencia_sql.=" AND pedido.peticionario_uvus = '"
            . $peticionario_uvus . "' ";
        $sentencia_sql.=" ORDER BY fechapedido DESC ";
    } else {
        $sentencia_sql.=" ORDER BY situacion_id ASC, fechapedido DESC ";
    }

    if ($limite || $tamano_pagina) {
        $sentencia_sql.=" LIMIT " . $limite . ", " . $tamano_pagina;
    }
    //echo $sentencia_sql;
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }

    return $resultado;
}
///////////////////////////////////////////////////////////////////////////////////

function db_contar_pedidos_aprobados_por_responsable($peticionario_uvus = FALSE) {

    $sentencia_sql = "SELECT COUNT(*) FROM pedido
            WHERE   pedido.situacion_id = 1";
    if ($peticionario_uvus)
        $sentencia_sql.=" AND pedido.peticionario_uvus = '" . $peticionario_uvus . "'";
    $resultado_sql = db_query($sentencia_sql);
    // echo $sentencia_sql;
    $row = mysqli_fetch_array($resultado_sql);
    return $row[0];
}

function db_contar_pedidos($peticionario_uvus) {

    $sentencia_sql = "SELECT COUNT(*) FROM pedido
            WHERE pedido.peticionario_uvus = '" . $peticionario_uvus . "'";
    $resultado_sql = db_query($sentencia_sql);
    // echo $sentencia_sql;
    $row = mysqli_fetch_array($resultado_sql);
    return $row[0];
}

function db_listar_proveedores($solo_visibles = FALSE) {

    $sentencia_sql = "SELECT * FROM `proveedor`";
    if ($solo_visibles) {
        $sentencia_sql.=" WHERE `proveedor`.`visible`=1 ORDER BY `visible` DESC, `id` ASC";
    }
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}

function db_listar_proveedor($id) {

    $sentencia_sql = "SELECT * FROM `proveedor` WHERE `proveedor`.`id` =" . $id . " LIMIT 1";
    $resultado_sql = db_query($sentencia_sql);
    $resultado = mysqli_fetch_array($resultado_sql);
    return $resultado;
}

function db_listar_presupuestos() {

    $sentencia_sql = "SELECT * FROM `presupuesto`";
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}

// Funcion añadida para obtener el nombre del presupuestario,
// necesario cuando se envia el correo al responsble notificando la solicitud.
function db_listar_nombre_presupuestos($id) {

    $sentencia_sql = "SELECT `nombre` FROM `presupuesto` WHERE id =".$id."";
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado = $row;
    }
    return $resultado;
}

function db_listar_situaciones() {

    $sentencia_sql = "SELECT * FROM `situacion` ORDER BY `id`";
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}

// SITUACIONES--> CATALOGADOR *****************************************************************/
function db_listar_situaciones_ctlg() {

    $sentencia_sql = "SELECT * FROM `situacion` WHERE id =4 OR id=5 OR id=6 OR id=10 OR id=11 OR id=14 ORDER BY `id`";
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}
///////////////////////////////////////////////////////////////////////////////

function db_listar_tipomateriales($solo_visible = FALSE) {

    $sentencia_sql = "SELECT * FROM `tipoMaterial`";
    if ($solo_visibles) {
        $sentencia_sql.=" WHERE `tipoMaterial`.`visible`=1 ORDER BY `visible` DESC, `id` ASC";
    }
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}

function db_listar_tipomaterial($id) {

    $sentencia_sql = "SELECT * FROM `tipoMaterial` WHERE `tipoMaterial`.`id` =" . $id . " LIMIT 1";
    $resultado_sql = db_query($sentencia_sql);
    $resultado = mysqli_fetch_array($resultado_sql);
    //echo $sentencia_sql;
    return $resultado;
}

function db_listar_unidades($solo_visible = FALSE) {

    $sentencia_sql = "SELECT * FROM `unidad`";
    if ($solo_visible) {
        $sentencia_sql.=" WHERE `unidad`.`visible`=1 ORDER BY `visible` DESC, `id` ASC";
    }
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}

function db_listar_unidad(
    $unidad_id) {

    $sentencia_sql = "SELECT * FROM `unidad` WHERE unidad.id = '" . $unidad_id . "' LIMIT 1";
    $resultado_sql = db_query($sentencia_sql);
    $resultado= mysqli_fetch_array($resultado_sql);
    //echo $sentencia_sql;
    return $resultado;
}

function db_listar_fondo(
    $unidad_id) {

    $sentencia_sql = "SELECT `fondo` FROM `unidad` WHERE unidad.id = '" . $unidad_id . "' LIMIT 1";
    $resultado_sql = db_query($sentencia_sql);
    $resultado= mysqli_fetch_array($resultado_sql);
    //echo $sentencia_sql;

    if ($resultado == FALSE){
        $resultado == "error";
    }

    return $resultado[0];
}

function db_listar_preferencias() {

    $sentencia_sql = "SELECT * FROM `preferencias` ";
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}

function db_listar_preferencia($nombre) {

    $sentencia_sql = "SELECT * FROM `preferencias` WHERE preferencias.nombre = '" . $nombre . "' LIMIT 1";
    $resultado_sql = db_query($sentencia_sql);
    $resultado = mysqli_fetch_array($resultado_sql);
    //echo $sentencia_sql;

    //dd($resultado);


    return $resultado['valor'];
}

function db_listar_preferencia_id($id) {

    $sentencia_sql = "SELECT * FROM `preferencias` WHERE preferencias.id = " . $id . " LIMIT 1";
    $resultado_sql = db_query($sentencia_sql);
    $resultado = mysqli_fetch_array($resultado_sql);
    //echo $sentencia_sql;
    return $resultado;
}

function db_listar_administradores() {

    $sentencia_sql = "SELECT * FROM `administrador` ";
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}

function db_listar_catalogadores() {

    $sentencia_sql = "SELECT * FROM `catalogador` ";
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}

function db_listar_users_mostrador() {

    $sentencia_sql = "SELECT * FROM `mostrador` ";
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}

// function db_listar_mostrador() {

//     $conn = db_connect();

//     $sentencia_sql = "SELECT * FROM `mostrador` ";
//     $result = mysqli_query($conn, $sentencia_sql);
//     //$resultado_sql = db_query($sentencia_sql);
//     while ($row = mysqli_fetch_array($result)) {
//         $resultado[] = $row;
//     }
//     return $resultado;
// }

function db_user_is_responsable_gasto(
    $peticionario_uvus, $unidad_id) {

    $sentencia_sql = "SELECT EXISTS(SELECT 1 FROM `unidad`
            WHERE uvus_responsable = '" . $peticionario_uvus .
        "' AND id = " . $unidad_id . " LIMIT 1)";
    $resultado_sql = db_query($sentencia_sql);
    $resultado = mysqli_fetch_array($resultado_sql);
    // echo $sentencia_sql;
    return $resultado[0];
}

// php5
// function db_user_is_admin(
// $uvus) {
//     $sentencia_sql = "SELECT EXISTS(SELECT 1 FROM `administrador` WHERE uvus = '" . $uvus . "' LIMIT 1)";
//     $resultado_sql = mysqli_fetch_array($conn, db_query($sentencia_sql));
//     // echo $sentencia_sql;
//     return $resultado_sql[0];
// }

// php7
function db_user_is_admin(
    $uvus) {

    $sentencia_sql = "SELECT EXISTS(SELECT 1 FROM `administrador` WHERE uvus = '" . $uvus . "' LIMIT 1)";
    $resultado_sql = db_query($sentencia_sql);
    $resultado = mysqli_fetch_array($resultado_sql);
    // echo $sentencia_sql;
    return $resultado[0];
}

function db_user_is_catalog(
    $uvus) {

    $sentencia_sql = "SELECT EXISTS(SELECT 1 FROM `catalogador` WHERE uvus = '" . $uvus . "' LIMIT 1)";
    $resultado_sql = db_query($sentencia_sql);
    $resultado = mysqli_fetch_array($resultado_sql);
    // echo $sentencia_sql;
    return $resultado[0];
}

function db_user_is_mostrador(
    $uvus) {

    $sentencia_sql = "SELECT EXISTS(SELECT 1 FROM `mostrador` WHERE uvus = '" . $uvus . "' LIMIT 1)";
    $resultado_sql = db_query($sentencia_sql);
    $resultado= mysqli_fetch_array($resultado_sql);
    //echo $sentencia_sql;
    return $resultado[0];
}

// ACTUALIZAR
// **
// **

function db_actualizar_pedido(
    $id, $fechapedido, $fecharecepcion, $observacionespublicas, $observacionesprivadas, $observacionesusuario, $titulo, $autor, $editorial, $edicion, $any, $isbn, $numerofactura, $ejemplares, $responsable, $correoresponsable, $peticionario, $peticionario_uvus, $proveedor_id, $situacion_id, $unidad_id, $presupuesto_id, $organica, $tipo_de_material_id, $status, $correo, $telefono, $titulacion, $notificar, $bibliografia_asignatura, $bibliografia_titulacion, $bibliografia_curso) {

    // Se construye la sentencia
    $sentencia = "UPDATE `pedido`";
    $sentencia.=" SET `fechaPedido` = '" . $fechapedido . "', ";
    $sentencia.="`fechaRecepcion` = '" . $fecharecepcion . "', ";
    $sentencia.="`observacionesPublicas` = '" . $observacionespublicas . "', ";
    $sentencia.="`observacionesPrivadas` = '" . $observacionesprivadas . "', ";
    $sentencia.="`observacionesUsuario` = '" . $observacionesusuario . "', ";
    $sentencia.="`titulo` = '" . $titulo . "', ";
    $sentencia.="`autor` = '" . $autor . "', ";
    $sentencia.="`editorial` = '" . $editorial . "', ";
    $sentencia.="`edicion` = '" . $edicion . "', ";
    $sentencia.="`any` = '" . $any . "', ";
    $sentencia.="`isbn` = '" . $isbn . "', ";
    $sentencia.="`numeroFactura` = '" . $numerofactura . "', ";
    $sentencia.="`ejemplares` = '" . $ejemplares . "', ";
    $sentencia.="`responsable` = '" . $responsable . "', ";
    $sentencia.="`correoResponsable` = '" . $correoresponsable . "', ";
    $sentencia.="`peticionario` = '" . $peticionario . "', ";
    $sentencia.="`peticionario_uvus` = '" . $peticionario_uvus . "', ";
    $sentencia.="`proveedor_id` = '" . $proveedor_id . "', ";
    $sentencia.="`situacion_id` = '" . $situacion_id . "', ";
    $sentencia.="`unidad_id` = '" . $unidad_id . "', ";
    $sentencia.="`presupuesto_id` = '" . $presupuesto_id . "', ";
    $sentencia.="`organica` = '" . $organica . "', ";
    $sentencia.="`tipo_de_material_id` = '" . $tipo_de_material_id . "', ";
    $sentencia.="`status` = '" . $status . "', ";
    $sentencia.="`correo` = '" . $correo . "', ";
    $sentencia.="`telefono` = '" . $telefono . "', ";
    $sentencia.="`titulacion` = '" . $titulacion . "', ";
    $sentencia.="`notificar` = '" . $notificar . "', ";
    $sentencia.="`bibliografia_asignatura` = '" . $bibliografia_asignatura . "', ";
    $sentencia.="`bibliografia_titulacion` = '" . $bibliografia_titulacion . "', ";
    $sentencia.="`bibliografia_curso` = '" . $bibliografia_curso . "' ";
    $sentencia.="WHERE `pedido`.`id` = " . (int) $id . " LIMIT 1";

    //
    //
    // echo $sentencia;
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

function db_actualizar_pedido_proveedor($id_pedido, $proveedor_id) {
    // Se construye la sentencia
    $sentencia = "UPDATE `pedido` ";
    $sentencia.="SET `proveedor_id` = '" . $proveedor_id . "' ";
    $sentencia.=" WHERE `pedido`.`id` = " . (int) $id_pedido . " LIMIT 1";
    // echo $sentencia;
    $idx = db_query($sentencia);

    return $idx;
}

function db_actualizar_pedido_situacion($id_pedido, $situacion_id, $uvus_log, $nombre_log, $observacionesPublicas = FALSE) {
    // Se construye la sentencia

    /*
    //Caso especial del eBook
    if($situacion_id == 13)
       $situacion_id = 2;
    */

    $sentencia = "UPDATE `pedido` ";
    $sentencia.="SET `situacion_id` = '" . $situacion_id . "'";
    if ( ($situacion_id == 1) || ($situacion_id == 7) ){
        $sentencia.=", " . "`AprobadoPor_uvus` = '" . $uvus_log . "' ";
        $sentencia.=", " . "`AprobadoPor_nombre` = '" . $nombre_log . "' ";
        $fecha_aux = date("Y-m-d H:i:s");
        $sentencia.=", " . "`AprobadoPor_fechaAprobacion` = '" . $fecha_aux . "' ";
    }
    if ($observacionesPublicas)
        $sentencia.=", " . "`observacionesPublicas` = '" . $observacionesPublicas . "' ";
    $sentencia.=" WHERE `pedido`.`id` = " . (int) $id_pedido . " LIMIT 1";
    // echo $sentencia;
    $idx = db_query($sentencia);

    return $idx;
}

function db_actualizar_pedido_fechaRecepcion($id_pedido, $fechaRecepcion) {
    // Se construye la sentencia
    $sentencia = "UPDATE `pedido` ";
    $sentencia.="SET `fechaRecepcion` = '" . $fechaRecepcion . "' ";
    $sentencia.=" WHERE `pedido`.`id` = " . (int) $id_pedido . " LIMIT 1";
    //echo $sentencia;
    $idx = db_query($sentencia);

    return $idx;
}

// Si algún pedido ha estado en la situación 13 -- En trámite: Libro electrónico
// activamos una bandera indicándolo.
// Será útil para generar el informe Millenium una vez que el pedido haya cambiado
// de estado
function db_actualizar_pedido_flagEnTramiteLibroElec($id_pedido, $flag) {
    // Se construye la sentencia
    $sentencia = "UPDATE `pedido` ";
    $sentencia.="SET `flagEnTramiteLibroElec` = '" . $flag . "' ";
    $sentencia.=" WHERE `pedido`.`id` = " . (int) $id_pedido . " LIMIT 1";

    // Se ejecuta la sentencia
    $idx = db_query($sentencia);

    return $idx;
}

function db_actualizar_proveedor($id, $nombre, $nif, $abreviatura, $direccion, $poblacion, $provincia, $codigoPostal, $pais, $telefono, $fax, $correo, $visible, $observaciones) {

    // Se construye la sentencia
    $sentencia = "UPDATE `proveedor` ";
    $sentencia.="SET `proveedor`.`nombre` = '" . $nombre . "' ,";
    $sentencia.="`proveedor`.`nif` = '" . $nif . "' ,";
    $sentencia.="`proveedor`.`abreviatura` = '" . $abreviatura . "' ,";
    $sentencia.="`proveedor`.`direccion` = '" . $direccion . "' ,";
    $sentencia.="`proveedor`.`poblacion` = '" . $poblacion . "' ,";
    $sentencia.="`proveedor`.`provincia` = '" . $provincia . "' ,";
    $sentencia.="`proveedor`.`codigoPostal` = '" . $codigoPostal . "' ,";
    $sentencia.="`proveedor`.`pais` = '" . $pais . "' ,";
    $sentencia.="`proveedor`.`telefono` = '" . $telefono . "' ,";
    $sentencia.="`proveedor`.`fax` = '" . $fax . "' ,";
    $sentencia.="`proveedor`.`correo` = '" . $correo . "' ,";
    $sentencia.="`proveedor`.`visible` = '" . $visible . "' ,";
    $sentencia.="`proveedor`.`observaciones` = '" . $observaciones . "' ";
    $sentencia.=" WHERE `proveedor`.`id` = " . (int) $id . " LIMIT 1";

    //echo $sentencia;
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

function db_actualizar_unidad($id, $nombre, $unidad_solicitante, $fondo, $uvus_responsable, $nombre_responsable, $email_responsable, $visible) {

    // Se construye la sentencia
    $sentencia = "UPDATE `unidad` ";
    $sentencia.="SET `unidad`.`nombre` = '" . $nombre . "' ,";
    $sentencia.="`unidad`.`unidad_solicitante` = '" . $unidad_solicitante . "' ,";
    $sentencia.="`unidad`.`fondo` = '" . $fondo . "' ,";
    $sentencia.="`unidad`.`uvus_responsable` = '" . $uvus_responsable . "' ,";
    $sentencia.="`unidad`.`nombre_responsable` = '" . $nombre_responsable . "' ,";
    $sentencia.="`unidad`.`email_responsable` = '" . $email_responsable . "' ,";
    $sentencia.="`unidad`.`visible` = '" . $visible . "' ";
    $sentencia.=" WHERE `unidad`.`id` = " . (int) $id . " LIMIT 1";

    //echo $sentencia;
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

function db_actualizar_tipomateriales($id, $nombre, $visible) {

    // Se construye la sentencia
    $sentencia = "UPDATE `tipoMaterial` ";
    $sentencia.="SET `tipoMaterial`.`nombre` = '" . $nombre . "' ,";
    $sentencia.="`tipoMaterial`.`visible` = '" . $visible . "' ";
    $sentencia.=" WHERE `tipoMaterial`.`id` = " . (int) $id . " LIMIT 1";

    //echo $sentencia;
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

function db_actualizar_preferencia($id, $valor) {

    // Se construye la sentencia
    $sentencia = "UPDATE `preferencias` ";
    $sentencia.="SET `preferencias`.`valor` = '" . $valor . "' ";
    $sentencia.=" WHERE `preferencias`.`id` = " . (int) $id . " LIMIT 1";
    //echo $sentencia;
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

function db_eliminar_administrador($id) {

    // Se construye la sentencia
    $sentencia = "DELETE FROM `administrador` WHERE ";
    $sentencia.="`administrador`.`id`=" . (int) $id;
    $sentencia.=" LIMIT 1";
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

function db_eliminar_catalogador($id) {

    // Se construye la sentencia
    $sentencia = "DELETE FROM `catalogador` WHERE ";
    $sentencia.="`catalogador`.`id`=" . (int) $id;
    $sentencia.=" LIMIT 1";
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

function db_eliminar_mostrador($id) {

    // Se construye la sentencia
    $sentencia = "DELETE FROM `mostrador` WHERE ";
    $sentencia.="`mostrador`.`id`=" . (int) $id;
    $sentencia.=" LIMIT 1";
    // Se hace la consulta
    $idx = db_query($sentencia);

    return $idx;
}

/* Devuelve un array con la siguiente información:
 * * - Número inicial del paginador
 * - Número final del paginador
 * - Página actual marcada como active
 *
 */

function db_paginar_resultados($pagina_a_mostrar = 1, $tamano_pagina) {

    $resultado = array();
// número de registros devueltos por la consulta
    $num_total_registros = db_num_results();

// Número total de páginas necesarias para mostrar esultados
    $total_paginas[] = ceil($num_total_registros / $tamano_pagina);

// Página a mostrar.
    if ($pagina_a_mostrar > $total_paginas)
        $pagina_a_mostrar = $total_paginas;


    // Definimos los márgenes inferior y superior del paginador
    // Mostraremos 10 (5 a izquierda y 5 a derecha)
    if ($pagina_a_mostrar > 10) {
        $paginador_limite_inferior = $pagina_a_mostrar - 5;
        $paginador_limite_superior = $pagina_a_mostrar + 5;
    } else {
        $paginador_limite_inferior = 1;
        if ($total_paginas < 10)
            $paginador_limite_superior = $total_paginas;
        else
            $paginador_limite_superior = 10;
    }

    // Comprobamos que el límite superior no sea mayor que el número de paginas
    if ($paginador_limite_superior > $total_paginas){

        $paginador_limite_superior = $total_paginas;
    }

    // Calculamos el registro a partir del cual mostrar resultados
    // en la página actual (es decir, la variable que irá dentro de la
    // sentencia SQL: SELECT ... LIMIT $tamano_pagina, $limite
    $limite = ($pagina_a_mostrar * $tamano_pagina) - $tamano_pagina;

    // Encadenamos los resultados para devolverlos:
    $resultado['total_paginas'] = (int)$total_paginas;
    $resultado['limite_inferior'] = $paginador_limite_inferior;
    $resultado['limite_superior'] = $paginador_limite_superior;
    $resultado['limite_sql'] = $limite;

    return $resultado;
}

function fecha_pedido_mas_antiguo() {

    $sentencia_sql = "SELECT * FROM `pedido` ORDER BY pedido.fechaPedido ASC LIMIT 1";
    $resultado_sql = db_query($sentencia_sql);
    $resultado_sql = mysqli_fetch_array($resultado_sql);
    //echo $sentencia_sql;
    //return $resultado_sql['fechaPedido'];
    $resultado = date('Y-m-d', strtotime($resultado_sql['fechaPedido']));
    return $resultado;
}

function busqueda_avanzada($texto, $campo_busqueda, $orden, $sentido, $fecha_desde, $fecha_hasta, $estado_id, $tipo_de_material_id, $unidad_solicitante) {

    $sentencia_sql = "SELECT SQL_CALC_FOUND_ROWS pedido.*, situacion.nombre AS `situacion_nombre`,
            situacion.label AS situacion_color,
            situacion.descripcion AS situacion_descripcion,
            tipoMaterial.nombre AS tipo_de_material_nombre,
            presupuesto.nombre AS presupuesto_nombre,
            proveedor.abreviatura AS proveedor_abreviatura
            FROM `pedido`, `situacion`, `tipoMaterial`, `presupuesto`, proveedor
            WHERE pedido.situacion_id = situacion.id
            AND pedido.tipo_de_material_id = tipoMaterial.id
            AND pedido.presupuesto_id = presupuesto.id
            AND pedido.proveedor_id = proveedor.id";
    $sentencia_sql.=" AND pedido." . $campo_busqueda . " LIKE '%" . $texto . "%'";
    $sentencia_sql.=" AND pedido.fechapedido > '" . $fecha_desde . "'";
    $sentencia_sql.=" AND pedido.fechapedido < '" . $fecha_hasta . "'";

    if ($estado_id)
        $sentencia_sql.=" AND pedido.situacion_id = " . $estado_id;
    if ($tipo_de_material_id)
        $sentencia_sql.=" AND pedido.tipo_de_material_id = " . $tipo_de_material_id;
    if ($unidad_solicitante)
        $sentencia_sql.=" AND pedido.unidad_id = " . $unidad_solicitante;
    $sentencia_sql.=" ORDER BY pedido." . $orden . " " . $sentido . " ";
    /*
      if ($limite || $tamano_pagina) {
      $sentencia_sql.=" LIMIT " . $limite . ", " . $tamano_pagina;
      }
     *
     */

    //echo $sentencia_sql;
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}
/* CATALOGADOR /////////////////////////////////////////////////////////////////////////////////////// */

function busqueda_avanzada_ctlg($texto, $campo_busqueda, $orden, $sentido, $fecha_desde, $fecha_hasta, $estado_id, $tipo_de_material_id, $unidad_solicitante) {

    $sentencia_sql = "SELECT SQL_CALC_FOUND_ROWS pedido.*, situacion.nombre AS `situacion_nombre`,
            situacion.label AS situacion_color,
            situacion.descripcion AS situacion_descripcion,
            tipoMaterial.nombre AS tipo_de_material_nombre,
            presupuesto.nombre AS presupuesto_nombre,
            proveedor.abreviatura AS proveedor_abreviatura
            FROM `pedido`, `situacion`, `tipoMaterial`, `presupuesto`, proveedor
            WHERE pedido.situacion_id = situacion.id
            AND pedido.tipo_de_material_id = tipoMaterial.id
            AND pedido.presupuesto_id = presupuesto.id
            AND pedido.proveedor_id = proveedor.id";
    $sentencia_sql.=" AND pedido." . $campo_busqueda . " LIKE '%" . $texto . "%'";
    $sentencia_sql.=" AND pedido.fechapedido > '" . $fecha_desde . "'";
    $sentencia_sql.=" AND pedido.fechapedido < '" . $fecha_hasta . "'";

    if ($estado_id)
        $sentencia_sql.=" AND pedido.situacion_id = " . $estado_id;
    else
        $sentencia_sql.=" AND ( pedido.situacion_id = 4
             OR pedido.situacion_id = 5
             OR pedido.situacion_id = 6
             OR pedido.situacion_id = 10
             OR pedido.situacion_id = 11
             OR pedido.situacion_id = 14)";

    if ($tipo_de_material_id)
        $sentencia_sql.=" AND pedido.tipo_de_material_id = " . $tipo_de_material_id;
    if ($unidad_solicitante)
        $sentencia_sql.=" AND pedido.unidad_id = " . $unidad_solicitante;
    $sentencia_sql.=" ORDER BY pedido." . $orden . " " . $sentido . " ";

    /*
      if ($limite || $tamano_pagina) {
      $sentencia_sql.=" LIMIT " . $limite . ", " . $tamano_pagina;
      }
     *
     */

    //echo $sentencia_sql;
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado;
}

function comprobarAlertas ($nombreResponsableGasto, $nombrePersonaAprueba){

    // Eliminamos las tildes de ambas cadenas
    $cad1 = quitar_tildes($nombreResponsableGasto);
    $cad2 = quitar_tildes($nombrePersonaAprueba);

    // Comprobamos si los nombres son iguales. En caso de serlo se devuelve 0 -- NO HAY ALERTA
    $alerta = strcasecmp($cad1, $cad2);

    If ($alerta != 0){
        // Dividimos ambas cadenas en tokens
        // Utiliza tabulador, espacioy nueva línea como caracteres de tokenización
        // cadena $nombreResponsableGasto
        $i = 0;
        $tok1[$i] = strtok($cad1, " \n\t");
        while ($tok1[$i] !== false) {
            $i++;
            $tok1[$i] = strtok(" \n\t");
        }
        // cadena $nombrePersonaAprueba
        $j = 0;
        $tok2[$j] = strtok($cad2, " \n\t");
        while ($tok2[$j] !== false) {
            $j++;
            $tok2[$j] = strtok(" \n\t");
        }

        $coincidencias = 0;
        for ($ii = 0; $ii < $i; $ii++){
            for ($jj = 0; $jj < $j; $jj++){
                if ( (strcasecmp($tok1[$ii], $tok2[$jj])) == 0){
                    $coincidencias++;
                }
            }
        }

        // Comprobamos si se produjeron coincidencias
        if ($coincidencias == 0){
            $alerta = 1; // Ninguna coincidencia -> ALERTA TOTAL
        }else if ($coincidencias == 1){
            $alerta = 2; //Una coincidencia -> WARNING
        }else{
            $alerta = 0; // Más de una coincidencia -> NO HAY ALARMA
        }

    }

    return($alerta);
}

// Función para eliminar tildes de una cadena
function quitar_tildes($cadena) {
    $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
    $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
    $texto = str_replace($no_permitidas, $permitidas ,$cadena);

    return ($texto);
}

// Busca en el historial si ya se han enviado recordatorios al responsable de gasto con anterioridad
function numeroRecordatoriosEnviados($pedido_id){

    $historial = db_listar_historico($pedido_id);
    $contador = 0;
    $cadena = "Le recordamos que debe aprobar o denegar el pedido n. ".$pedido_id.". Biblioteca ETSI";
    foreach ($historial as $historico) {
        if ($historico['asunto'] == $cadena)
            $contador++;
    }

    return ($contador);
}

function anio_pedido($id){
    $sentencia_sql = "SELECT YEAR(fechaPedido) as year FROM `pedido` WHERE `id` = $id";
    //echo $sentencia_sql;
    $resultado_sql = db_query($sentencia_sql);
    while ($row = mysqli_fetch_array($resultado_sql)) {
        $resultado[] = $row;
    }
    return $resultado[0]['year'];
}

/*
 * Funcion para convertir encode
 *
 */
function convierte($str){

    /* Detectar la codificación de caracteres con el detect_order en uso */
    //echo mb_detect_encoding($str);

    // Detectamos que tipo de encode nos llega
    $codificacion = mb_detect_encoding($str, "ISO-8859-1");


    $str = iconv($codificacion, "UTF-8", $str);



    //$str = iconv($codificacion, "UTF-8", $str);



    //$str = utf8_encode($str);

    //vv($str);


    return $str;
}
//
//function convierte2($str){
//
//    /* Detectar la codificación de caracteres con el detect_order en uso */
//    echo mb_detect_encoding($str);
//
//    // Detectamos que tipo de encode nos llega
//    $codificacion = mb_detect_encoding($str, "UTF-8,ISO-8859-1");
//    echo $codificacion;
//
//    $str = iconv($codificacion, "UTF-8", $str);
//
//
//    //$str = utf8_encode($str);
//
//    return $str;
//}

/*
 * Funcion para depurar
 * sin detener el codigo
 * */
function vv($dato){
    echo '<pre>';
    var_dump($dato);
    echo '</pre>';

}


/*
 * Funcion para depurar
 * y para detener el codigo
 * */
function dd($dato){
    echo '<pre>';
    var_dump($dato);
    echo '</pre>';

    echo '<pre>';
    print_r($dato);
    echo '</pre>';

    die();

}

// con die() , para para el proceso
function cd(){
    echo '<b>DEBUG.....</b>';
    die();
}

//sin die(), para continuar el proceso
function sd(){
    echo '<b>DEBUG.....</b>';
}

?>




