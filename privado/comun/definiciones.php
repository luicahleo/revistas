<?php
// Definiciones:
//define('DIRBASE','http://150.214.230.91/proyectos/');
//define('DIRBASE2','http://150.214.230.91');
define('DIRBASE','https://biblus.us.es/bibing/proyectos/');
define('DIRBASE2','https://biblus.us.es');
define('DIRBASEPYF','https://biblus.us.es.us.debiblio.com/bibing/proyectos/');
//define('DIRBASEPYF','https://biblus.us.es.us.debiblio.com/fama2/ing/proyectos/');
define('DIRECTORIO_ABSOLUTO','/home/www/bibing/https/proyectos/');
//define('DIRECTORIO_ABSOLUTO','/home/www/bibing/https/proyectos/');
define('PROY_PATH', '/home/www/bibing/https/PROYECTOS/');
//define('PROY_PATH', '/home/www/fama2/https/ing/proyectos/');
define ('IP_FAMA', '150.214.230.47');

// define('SERVIDOR_BBDD','localhost');
// define('NOMBRE_BBDD','proyectos');
// define('USUARIO_BBDD', 'root');
// define('CLAVE_BBDD', 'qpwoEI');

define('SERVIDOR_BBDD','localhost');
define('NOMBRE_BBDD','bibing_proyectos');
define('USUARIO_BBDD', 'bibing');
define('CLAVE_BBDD', 'polixBur18c');

define('FORMULARIOS',1);
define('RESULTADOS',2);
define('LIBRE',3);
define('PRIVADO',4);
define('MILISTA',6);
define('PAG_AYUDA', 7);
define('PAG_ACERCA', 11);
define('PAG_CONTACTO',8);
define('PAG_RECIENTES', 9);
define('PAG_RECURSOS',10);

define('ABRIR_PROYECTO','abreproy');
define('ABRIR_PROYECTO_PRIVADO','use');
define('BUSCAR','buscar');
define('SEARCH','buscador');
define('LISTA', 'lista');
define('CONTACTO', 'contactar');
define('AYUDA', 'ayuda');
define('ACERCA', 'acerca');
define('RECIENTES','proyectos_recientes');
define('OTROS_RECURSOS','otros_recursos');

define('PESTANA1','formulario_basico');
define('PESTANA2','materia');
define('PESTANA3','historial');

define('RESULT_PAG',20);
define('NUM_ULT_PROY',10);

define('CORREO_CONTACTO', 'magomez@us.es');



$titulaciones=array
(
"aero" =>array
   (
   "nombre"=>"Ingeniería Aeronáutica",
   "nombrecorto"=>"IAE",
   "nombrecorto2"=>"iae",
   ),
"auto" =>array
   (
   "nombre"=>"Ingeniería Automática",
   "nombrecorto"=>"IAU",
   "nombrecorto2"=>"iau",
   ),
"elec" =>array
   (
   "nombre"=>"Ingeniería Electrónica",
   "nombrecorto"=>"IE",
   "nombrecorto2"=>"ie",
   ),
"indu" =>array
   (
   "nombre"=>"Ingeniería Industrial",
   "nombrecorto"=>"II",
   "nombrecorto2"=>"ii",
   ),
"orga" =>array
   (
   "nombre"=>"Ingeniería de Organización",
   "nombrecorto"=>"IO",
   "nombrecorto2"=>"io",
   ),
"quim" =>array
   (
   "nombre"=>"Ingeniería Química",
   "nombrecorto"=>"IQ",
   "nombrecorto2"=>"iq",
   ),
"tele" =>array
   (
   "nombre"=>"Ingeniería Telecomunicaciones",
   "nombrecorto"=>"IT",
   "nombrecorto2"=>"it",
   ),
"erasmus" =>array
    (
    "nombre"=>"Erasmus",
    "nombrecorto"=>"ERASMUS",
    "nombrecorto2"=>"erasmus",
    )
);


$masters=array
(
"maut" =>array
   (
   "nombre"=>"M�ster en Autom�tica, Rob�tica y Telem�tica",
   "nombrecorto"=>"MAURT",
   "nombrecorto2"=>"maurt",
   ),
"mmec" =>array
   (
   "nombre"=>"M�ster en Dise�o Avanzado en Ingenier�a Mec�nica",
   "nombrecorto"=>"MDAIM",
   "nombrecorto2"=>"mdaim",
   ),
"mcom" =>array
   (
   "nombre"=>"M�ster en Electr�nica, Tratamiento de Se�al y Comunicaci�n",
   "nombrecorto"=>"METSC",
   "nombrecorto2"=>"metsc",
   ),
"morg" =>array
   (
   "nombre"=>"M�ster en Organizaci�n Industrial y Gesti�n de Empresas",
   "nombrecorto"=>"MOIGE",
   "nombrecorto2"=>"moige",
   ),
"msis" =>array
   (
   "nombre"=>"M�ster en Sistemas de Energ�a El�ctrica",
   "nombrecorto"=>"MSEE",
   "nombrecorto2"=>"msee",
   ),
"mamb" =>array
   (
   "nombre"=>"M�ster en Tec. Qu�mica y Ambiental",
   "nombrecorto"=>"MTQA",
   "nombrecorto2"=>"mtqa",
   )
);
?>
