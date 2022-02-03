<?php

session_start();

// Mostrar errores (versión en desarrollo)
error_reporting(E_ALL ^ E_NOTICE);

/******** Codigo para autenticacion Single Sing-On vía CAS *************/
require_once('/home/www/bibing/https/CAS-1.3.8/CAS.php');
// Enable debugging
phpCAS::setDebug();
phpCAS::setVerbose(true);
// Initialize phpCAS
phpCAS::client(CAS_VERSION_2_0, 'sso.us.es', 443, '/CAS/index.php');
// For production use set the CA certificate that is the issuer of the cert
// on the CAS server and uncomment the line below
//phpCAS::setCasServerCACert('/etc/ssl/certs/ca_addtrust.crt');
// For quick testing you can disable SSL validation of the CAS server.
// THIS SETTING IS NOT RECOMMENDED FOR PRODUCTION.
// VALIDATING THE CAS SERVER IS CRUCIAL TO THE SECURITY OF THE CAS PROTOCOL!
phpCAS::setNoCasServerValidation();
// at this step, the user has been authenticated by the CAS server
// and the user's login name can be read with phpCAS::getUser().
// logout if desired
//if (isset($_REQUEST['logout'])) {

if(isset($_GET['logout']) && $_GET['logout'] == "salir"){
    phpCAS::logout();
}
try {
    // force CAS authentication
    phpCAS::forceAuthentication();
    if (phpCAS::isAuthenticated()) {
        $atributos = phpCAS::getAttributes();
        $atributos['cn'] = str_replace("'", " ", $atributos['cn']);
    } else {
        if (phpCAS::enforceAuthentication()) {
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
/********** Fin de autenticación  ***********/

// Includes principales
require_once('./privado/basico/definiciones.php');
require_once('./privado/basico/funciones.php');
$conexion=  db_connect();
//require_once('mail_us_es.php'); // Uso: mail_us_es($from,$to,$subject,$message);
$user_is_sadmin = db_user_is_admin($atributos['uid']);

if($user_is_sadmin) {
    //echo "admin";
    $uvus = $atributos['uid'];
}
else{
    //echo "invitado";
    //$uvus = $atributos['uid'];
    //echo $uvus;
    $uvus = 'invitado';
    $ann_actual = date('Y');
    $mes_actual = date('m');
}

// Enrutamiento mediante peticiones.php
require_once('./privado/basico/peticiones.php');

if(!$fecha)
    $fecha = date('Y-m-d');

$a_fecha =  explode("-", $fecha); 

$hoy = date('Y-m-d');
$semana = calcular_semana($fecha);
$semana_guia = calcular_semana_guia($fecha);
$cambio_dia ='';

//calculamos si hay cambio de d�a para marcarlo
for($i=0;$i < 7; $i++){
    if(($semana[$i] != $semana_guia[$i]) && $cambio_dia==''){
        $cambio_dia = $semana_guia[$i]; 
    }   
}

?>
<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
    <head>
        <title>Control de ocupaci&oacute;n</title>
        <?php require_once('./privado/head.php'); ?>
    </head>
    <body style="background-color: #d9d9d9" >
        <?php 
        //Segun el rol del usuario se carga un body distinto
        //if($user_is_admin) 
//         print_r($atributos);
            require_once('./privado/body.php');
        ?>
    </body>
</html>
<?php db_close($conexion); ?>
