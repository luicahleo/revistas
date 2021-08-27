<table align="center">
    <tr>  
        <td align="center">
            <table >
                <tr><td>&nbsp;</td><tr>
                <tr>
                    <td style="width:750px; min-width: 750px; vertical-align: top; padding-right:20px;">
                        <table width="100%" height="420px">
                            <tr style="vertical-align: top">
                                <td colspan="2" align="center" style="background-color: white">
                                <div style="background-color: #e2e2e2">
                                    <?php include ("./privado/html/buscador/pestanas.php"); ?>
                                </div>
                                <div>
                                    <?php include ("./privado/html/buscador/contenido_pestanas.php"); ?>
                                </div>
                                    
                                    
                                </td>
                                <?php if ($activa == 1 || $activa == 2 || $activa==3) {?>
                            </tr>
                                <tr style="vertical-align: bottom; height: 125px">
                                     <!-- Mensaje Ayuda -->
                                    <td id="mensaje_ayuda" class="well well-sm" >
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <ul style="">
                                                    <?php if( $activa == 1 || $activa==3) { ?>
                                                    <li><?php echo gettext('Para realizar una b&uacute;squeda elija t&eacute;rminos significativos <b>en singular</b>.')?></li>
                                                    <li><?php echo gettext('Busque por <b>varios t&eacute;rminos</b> mejor que por una frase.')?></li>
                                                    <li><?php echo gettext('Si <b>no obtiene resultados</b>, use un s&oacute;lo t&eacute;rmino o sin&oacute;nimos.')?></li>
                                                    <li><?php echo gettext('El <b>&iacute;ndice de materias</b> contiene t&eacute;rminos controlados que definen el contenido.')?></li>
                                                    <?php }else if( $activa == 2 ) { ?>
                                                    <li><?php echo gettext('<span class="negrita">Materias</span>: T&eacute;rminos controlados que definen el contenido de los documentos de la Biblioteca Universitaria de Sevilla.'); ?></li>
                                                    <li><?php echo gettext('Escriba <span class="negrita">un t&eacute;rmino</span> significativo. Si no obtiene resultados utilice <span class="negrita">sin&oacute;nimos</span>.'); ?></li>
                                                    <li><?php echo gettext('Busque por la <span class="negrita">ra&iacute;z del t&eacute;rmino</span> y obtendr&aacute; tambi&eacute;n los derivados.');
                                                    echo "<br />".gettext('Ej.: si escribe telefon, recuperar&aacute; telefon&iacute;a, telef&oacute;nico, etc. '); ?></li>
                                                    <li><?php echo gettext('Si no obtiene resultados, entre en la pantalla de <span class="negrita">B&uacute;squeda</span>, escriba un t&eacute;rmino significativo y compruebe las materias de los registros obtenidos, &eacute;stas le enlazar&aacute;n con otros trabajos similares.'); ?></li>
                                                    <?php } ?>
                                                    </ul>
                                                <?php } ?>   
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    
                                    <td id="para_autores" class="well well-sm">
                                        <!-- Well Avisos Marron -->            
                                        <ul style="list-style-type: none; list-style-position: outside; margin: 0px; padding: 0px;">
                                            <li><span class="glyphicon glyphicon-folder-close"></span> <a style="text-decoration: none" href="<?php echo DIRBASE.RECIENTES.'/'; ?>" class="enlace color_rojo external"><b><?php echo gettext('Trabajos recientes')?></b></a></li>
                                            <li><span class="glyphicon glyphicon-briefcase"></span> <a style="text-decoration: none" href="http://bib.us.es/aprendizaje_investigacion/formacion/tfg/index-ides-idweb.html" class="enlace color_rojo external"><b><?php echo gettext('Trabajo Fin de Grado').':<br>&nbsp;&nbsp;&nbsp;&nbsp;Curso en línea'?></b></a><span style="color: blue; font-size: 8px; font-weight: bolder;" > ** <?php echo gettext('Nuevo')?> </span></li>
                                            <!--<li><a href="http://bib.us.es/ingenieros/recursos/Requerimientos_PFC-ides-idweb.html" class="enlace color_rojo external"><b><?php echo gettext('Instrucciones para los autores')?></b></a></li>-->
                                            <li><span class="glyphicon glyphicon-info-sign"></span> <b><?php echo gettext('Instrucciones para los autores')?>:</b> 
                                                <br>&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="http://www.esi.us.es/secretaria/secretaria_registro_fc" class="enlace color_rojo external">PFC</a> - <a href="http://www.esi.us.es/secretaria/secretaria_registro_fm" class="enlace color_rojo external">TFM</a></b></li>
                                            <li><span class="glyphicon glyphicon-question-sign"></span> <a style="text-decoration: none" href="http://bib.us.es/aprendizaje_investigacion/formacion/fin_grado-ides-idweb.html" class="enlace color_rojo external"><b><?php echo gettext('Ayudas para la elaboración de un<br>&nbsp;&nbsp;&nbsp;&nbsp;trabajo académico')?></b></a></li>
                                        <ul>
                                    </td>
                                </tr>
                            </table>
                    </td>
                    <td style="width: 200px; vertical-align: top; padding: 2px;">
                            <!--Panel de fondos digitales -->
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5 class="panel-title text-center" style="font-size: small; font-weight: bold"><?php echo gettext('Fondos digitales de la US')?></h5>
                                </div>
                                <div class="panel-body" style="margin: 0px; padding: 0px;  font-size:smaller">
                                    <a href="https://google.com" class="external" >
                                        <img src="./publico/imagenes/fondos/tesis.png" alt="<?php echo gettext('Imagen Fondos digitales')?>" />
                                    </a>
                              </div>
                            </div>

                            <!-- Trabajos Recientes -->
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5 class="panel-title text-center" style="font-size: small; font-weight: bold"><?php echo gettext('Trabajos recientes')?></h5>
                                </div>
                                <div class="panel-body" style="">
                                    <!-- SCROLLER CONTENT STARTS HERE -->
                                    <?php
                                       require_once('./privado/comun/definiciones.php');
                                       require_once('./privado/resultados/mensajes.php');
                                       require_once('./privado/comun/funciones.php');
                                       require_once('./privado/html/resultados/vermaterias.php');

                                       // NO SE MUESTRAN LOS ÚLTIMOS PROYECTOS AÑADIDOS, SE MUESTRAN LOS PROYECTOS CON FECHA MÁS RECIENTE
                                       $consulta = "SELECT * FROM `proyectos`,`titulaciones` WHERE proyectos.titulacion = titulaciones.nombre ORDER BY fecha DESC LIMIT 0, 13";
                                       $num_resultados=0;
                                       $conn=mysqli_connect(SERVIDOR_BBDD, USUARIO_BBDD, CLAVE_BBDD)  or die ("Error de conexión a la base de datos");

                                       if (mysqli_select_db($conn, NOMBRE_BBDD) or die ("Error de selección de base de datos")){
                                           //$consulta = utf8_decode($consulta);
                                           $idx= mysqli_query($conn, $consulta);
                                           mysqli_close($conn);

                                           $num_resultados=mysqli_num_rows($idx);

                                            while(($row=mysqli_fetch_array($idx))){
                                               $titulo=utf8_encode(ucwords(strtolower($row['titulo'])));
                                               $numero=$row['numero'];
                                               $titulacion=utf8_encode($row['titulacion']);
                                               $numero5dig = obten_numero5dig($titulacion,$numero);
                                               echo '<a href="'.DIRBASEPYF.ABRIR_PROYECTO_PRIVADO.'/'.ABRIR_PROYECTO.'/'.$numero5dig.'/" class="enlace color_rojo external" style="font-size:smaller; font-weight:bold"><span class="glyphicon glyphicon-folder-close"></span> '.truncate($titulo, 23).'</a><br>';          
                                               //echo '<a href="'.DIRBASE.ABRIR_PROYECTO_PRIVADO.'/'.ABRIR_PROYECTO.'/'.$numero5dig.'/" class="enlace color_rojo external" style="font-size:smaller; font-weight:bold"><span class="glyphicon glyphicon-folder-close"></span> '.truncate($titulo, 23).'</a><br>';          
                                            }             
                                        }
                                    ?>
                                    <!-- SCROLLER CONTENT ENDS HERE -->
                              </div>
                            </div>                    
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <!-- Recursos Abiertos -->
        <td>
            <div class="panel panel-warning">
                <div class="panel-heading">
                <h5 class="panel-title"><?php echo gettext('Recursos en acceso abierto')?></h5>
                </div>
                <div class="panel-body  text-center">
                    <a href="http://www.opendoar.org/" class="external"><img src="./publico/imagenes/repo/opendoar_button.png" alt="<?php echo gettext('Imagen OPENDOAR')?>" /></a>        
                    <a href="http://www.driver-repository.eu/" class="external"><img src="./publico/imagenes/repo/driver_button.png" alt="<?php echo gettext('Imagen DRIVER')?>" /></a> 
                    <a href="http://digital.csic.es/" class="external"><img src="./publico/imagenes/repo/digital-csic.png" alt="<?php echo gettext('Imagen CSIC')?>" /></a>
                    <a href="http://www.recolecta.net/" class="external"><img src="./publico/imagenes/repo/recolecta.png" alt="<?php echo gettext('Imagen RECOLECTA')?>" /></a>
                    <a href="http://www.madrimasd.org/informacionIDI/e-ciencia/proyecto/descripcion/default.asp" class="external"><img src="./publico/imagenes/repo/eciencia.png"  alt="<?php echo gettext('Imagen Eciencia')?>" /></a>
                <!--<a href="https://biblus.us.es/bibing/vinci/buscar/Repositorios+%252F+Documentos-e/como/categoria/1" class="enlace color_rojo external" style="font-size: smaller"><?php echo gettext('+ Recursos')?></a>-->
                </div>
            </div>
        </td>
    </tr>
</table>
