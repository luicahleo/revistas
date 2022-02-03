<?php

define('DIRBASE','https://biblus.us.es/bibing/contadores/');

//Definiciones usuadas para conexiones a bbdd:
define('SERVIDOR_BBDD','localhost');
define('NOMBRE_BBDD','bibing_control_entradas');
define('USUARIO_BBDD', 'bibing');
define('CLAVE_BBDD', 'polixBur18c');

define('MANANA',0);
define('TARDE',1);
define('IZQ',0);
define('DER',1);

define('PAG_SEMANA', 10);
define('PAG_MES', 11);
define('PAG_ESTADISTICAS', 12);
define('PAG_USERS', 14);

//limites para detectar un reset
define('COTA_INF_RESET', -1);
define('COTA_SUP_RESET', 5000);


$meses_arr = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio',
               'Agosto','Septiembre','Octubre','Noviembre','Diciembre');
?>
