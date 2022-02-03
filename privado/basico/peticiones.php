<?php

$pagina = 'PAG_ERROR'; // Pag principal de trabajo. Por defecto: error
//$tarea=INSERTAR_TRABAJO; // tarea solicitada (menu izqda)
$include_menu = './privado/error.php'; // fichero a incluir en menu_izqda
$include_contenido = './privado/error.php';
$titulo_contenido = 'ERROR.&nbsp;';
$indice_url = 2; // Indice para recorrer la direccion url solicitada
$insercion_solicitada = 0;
$ubicacion = array();
$is_ajax = FALSE;
$direccion_url = get_url();

/*
 * ** USUARIO ADMINISTRADOR *************************************************************************
 */

if($user_is_sadmin){
// Primer elemento: opcion del menu superior
    switch ($direccion_url[$indice_url]) {
        case '':
        case 'semana':
            $pagina = PAG_SEMANA;
            $include_contenido = './privado/control/semana.php';
            $titulo_contenido = 'Semana&nbsp;';
            break;
        
        case 'std':
            $pagina = PAG_ESTADISTICAS;
            $titulo_contenido = 'Estadisticas&nbsp;';
            break;
        
        case 'users':
            $pagina = PAG_USERS;
             $include_contenido = './privado/control/user.php';
            $titulo_contenido = 'Usuarios&nbsp;';
            break;
        
        
        default:
            $pagina = 'PAG_ERROR';
            $include_contenido = './privado/error.php';
            $ubicacion[] = "Error";
            break;
    }

    $indice_url++;

// Semana
    if ($pagina == PAG_SEMANA) {
        $ubicacion[] = "Semana";

        switch ($direccion_url[$indice_url]) {
            case 'ver':
                $indice_url++;
                $fecha=$direccion_url[$indice_url];
                $include_contenido = './privado/control/semana.php';
                break;
            default:
                break;
        }
    }
    
// Mes
    if ($pagina == PAG_ESTADISTICAS) {
        $ubicacion[] = "Estadisticas";
        
        
        switch ($direccion_url[$indice_url]) {
            case 'mes':              
                $indice_url++;
                $mes_actual=$direccion_url[$indice_url];
                
                $indice_url++;
                $ann_actual=$direccion_url[$indice_url];
                
                if(isset($_POST['btn_mes'])){
                    $ann_actual = $_POST['year'];
                    $mes_actual = $_POST['mes'];
                }
                
                $include_contenido = './privado/std/mes.php';
                
                break;
           
            case 'fechas':              
                if(isset($_POST['btn_fechas'])){
                    
                    //echo $_POST['fecha_ini'].'<br>'.$_POST['fecha_fin'];
                    $fecha_ini= fecha_eeuu(str_replace('/', '-', $_POST['fecha_ini']));
                    $fecha_fin = fecha_eeuu(str_replace('/', '-', $_POST['fecha_fin']));
                   // echo '<BR>'.$fecha_ini.'<br>'.$fecha_fin;
                }
                
                $include_contenido = './privado/std/fechas.php';
                break;
                
            case 'ann':              
                $indice_url++;
                $ann_actual=$direccion_url[$indice_url];
                if(isset($_POST['btn_year'])){
                    $ann_actual = $_POST['year'];
                }
                $include_contenido = './privado/std/ann.php';
                
                break;
            
            default:
                break;
        }
    }
}
else{
        switch ($direccion_url[$indice_url]) {
        case '':  
        case 'std':
            $pagina = PAG_ESTADISTICAS;
            $titulo_contenido = 'Estadisticas&nbsp;';
            break;
        
        default:
            $pagina = PAG_ERROR;
            $include_contenido = './privado/error.php';
            $ubicacion[] = "Error";
            break;
    }

    $indice_url++;

    if ($pagina == PAG_ESTADISTICAS) {
        $ubicacion[] = "Estadisticas";
        
        
        switch ($direccion_url[$indice_url]) {
            case'':
                $include_contenido = './privado/std/mes.php';
                break;
            case 'mes':              
                $indice_url++;
                $mes_actual=$direccion_url[$indice_url];
                
                $indice_url++;
                $ann_actual=$direccion_url[$indice_url];
                
                
                if(isset($_POST['btn_mes'])){
                    $ann_actual = $_POST['year'];
                    $mes_actual = $_POST['mes'];
                }

                $include_contenido = './privado/std/mes.php';
                
                break;
           
            case 'fechas':              
                if(isset($_POST['btn_fechas'])){
                    
                    //echo $_POST['fecha_ini'].'<br>'.$_POST['fecha_fin'];
                    $fecha_ini= fecha_eeuu(str_replace('/', '-', $_POST['fecha_ini']));
                    $fecha_fin = fecha_eeuu(str_replace('/', '-', $_POST['fecha_fin']));
                   // echo '<BR>'.$fecha_ini.'<br>'.$fecha_fin;
                }
                
                $include_contenido = './privado/std/fechas.php';
                break;
                
            case 'ann':              
                $indice_url++;
                $ann_actual=$direccion_url[$indice_url];
                if(isset($_POST['btn_year'])){
                    $ann_actual = $_POST['year'];
                }
                $include_contenido = './privado/std/ann.php';
                
                break;
            
            default:
                break;
        }
    }
}

?>