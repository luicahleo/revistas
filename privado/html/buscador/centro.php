<table align="center">
    <tr>
        <td align="center">
            <table >
                <tr><td>&nbsp;</td><tr>
                <tr>
                    <td style="width:685px; min-width: 685px; vertical-align: top; padding-right:20px;">
                        <table width="100%" height="318px">
                            <tr style="vertical-align: top">
                                <td colspan="2" align="center" style="background-color: white; ">
                                <div style="background-color: #e2e2e2">
                                    <?php include ("./privado/html/buscador/pestanas.php"); ?>
                                </div>
                                <div>
                                    <?php include ("./privado/html/buscador/contenido_pestanas.php"); ?>
                                    <?php if ($activa == 1 || $activa == 2 || $activa==3) {?>
                                    <br>
                                    <table width="100%" style="font-size: smaller; color: #555">
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                            <tr>
                                                <td>

                                                    <ul style="">
                                                       <?php if( $activa == 1) { ?>
                                                    <li><?php echo gettext('Para realizar una b&uacute;squeda elija t&eacute;rminos significativos <b>en singular</b>.')?></li>
                                                    <li><?php echo gettext('Busque por <b>varios t&eacute;rminos</b> mejor que por una frase.')?></li>
                                                    <li><?php echo gettext('Si <b>no obtiene resultados</b>, use un s&oacute;lo t&eacute;rmino o sin&oacute;nimos.')?></li>
                                                    <br>

                                                    <?php }else if( $activa == 2 ) { ?>
                                                    <li><?php echo gettext('<span class="negrita">Materias</span>: T&eacute;rminos controlados que definen el contenido de los documentos de la Biblioteca Universitaria de Sevilla.'); ?></li>
                                                    <li><?php echo gettext('Escriba <span class="negrita">un t&eacute;rmino</span> significativo. Si no obtiene resultados utilice <span class="negrita">sin&oacute;nimos</span>.'); ?></li>
                                                    <li><?php echo gettext('Busque por la <span class="negrita">ra&iacute;z del t&eacute;rmino</span> y obtendr&aacute; tambi&eacute;n los derivados.');
                                                    echo "".gettext('Ej.: si escribe telefon, recuperar&aacute; telefon&iacute;a, telef&oacute;nico, etc. '); ?></li>
                                                    <li><?php echo gettext('Si no obtiene resultados, entre en la pantalla de <span class="negrita">B&uacute;squeda</span>, escriba un t&eacute;rmino significativo y compruebe las materias de los registros obtenidos, &eacute;stas le enlazar&aacute;n con otros trabajos similares.'); ?></li>
                                                    <br><br><br>
                                                    <br><br>
                                                    <br><br>
                                                        <?php } ?>
                                                    </ul>

                                                    <?php if( $activa == 1){ require_once './privado/html/buscador/coleccion.php';}?>
                                                <?php } ?>
                                                </td>
                                            </tr>
                                        </table>

                                </div>


                                </td>
                            </tr>
                            <?php if ($activa ==1 || $activa ==2){?>
                                <tr style="vertical-align: top;">
                                     <!-- Mensaje Ayuda -->
                                    <td class="">


                                        <div class="bs-callout bs-callout-warning">
                                            <span style="font-size:smaller">
                                                <span style="color: #9C1F2F" class="glyphicon glyphicon-exclamation-sign"></span> <b><?php echo gettext('Instrucciones para los autores')?>:</b>
                                                <b><!--<a href="http://www.esi.us.es/secretaria/secretaria_registro_fc" class="enlace color_rojo external">PFC</a>--><a href="http://www.esi.us.es/secretaria/secretaria_registro_fg" class="enlace color_rojo external">TFG</a> - <a href="http://www.esi.us.es/secretaria/secretaria_registro_fm" class="enlace color_rojo external">TFM</a></b>
                                            </span>
                                        </div>
                                        <!--<div class="bs-callout bs-callout-warning">
                                            <span style="font-size:smaller">
                                                <span style="color: #9C1F2F" class="glyphicon glyphicon-exclamation-sign"></span> <a style="text-decoration: none" href="http://bib.us.es/aprendizaje_investigacion/formacion/fin_grado-ides-idweb.html" class="enlace color_rojo external"><b><?php echo gettext('Ayudas para la elaboración de un trabajo académico')?></b></a>
                                            </span>
                                        </div>-->
                                    </td>
                                </tr>
                            <?php } ?>
                            </table>
                    </td>
                    <td style="width: 265px; vertical-align: top; padding: 2px;">
                            <!--Panel de fondos digitales -->
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h5 class="panel-title text-center" style="font-size: small; font-weight: bold">
                                    <a href="https://fama.us.es/discovery/search?query=any,contains,%22Tesis%20y%20disertaciones%20acad%C3%A9micas%22&tab=all_data_not_idus&search_scope=all_data_not_idus&sortby=date_d&vid=34CBUA_US:VU1&mfacet=rtype,include,dissertations,1&offset=0" target="_blank">
                                        <?php echo gettext('Tesis doctorales de la US')?>
                                    </a>
                                </h5>
                                </div>
                                <div class="panel-body" style="margin: 0px; padding: 0px;  font-size:smaller; text-align: center">
                                    <a href="https://fama.us.es/discovery/search?query=any,contains,%22Tesis%20y%20disertaciones%20acad%C3%A9micas%22&tab=all_data_not_idus&search_scope=all_data_not_idus&sortby=date_d&vid=34CBUA_US:VU1&mfacet=rtype,include,dissertations,1&offset=0" class="external" >
                                        <img src="./publico/imagenes/fondos/portada_fama.jpg" width="150" height="50" alt="<?php echo gettext('Imagen Fondos digitales')?>" />
                                    </a>
                              </div>
                            </div>

                             <div class="bs-callout bs-callout-danger">
                                <span style="font-size:smaller; text-align: center">
                                    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #9C1F2F" class="glyphicon glyphicon-exclamation-sign"></span> <a style="text-decoration: none" href="http://guiasbus.us.es/elaboraciondeltrabajoacademico" class="enlace color_rojo external"><b><?php //echo gettext('Trabajo Fin de Grado').': Guía en línea'?></b></a> -->
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #9C1F2F" class="glyphicon glyphicon-exclamation-sign"></span> <a style="text-decoration: none" href="http://guiasbus.us.es/elaboraciondeltrabajoacademico" class="enlace color_rojo external"><b>Guía de elaboración TFG / TFM</b></a>

                                </span>
                            </div>
                            <br>

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
                                       $consulta = "SELECT * FROM `proyectos`,`titulaciones` WHERE proyectos.titulacion = titulaciones.nombre ORDER BY fecha DESC LIMIT 0, 8";
                                       $num_resultados=0;
                                       $conn=mysqli_connect(SERVIDOR_BBDD, USUARIO_BBDD, CLAVE_BBDD)  or die ("Error de conexión a la base de datos");

                                       if (mysqli_select_db($conn, NOMBRE_BBDD) or die ("Error de selección de base de datos")){
                                           //$consulta = utf8_decode($consulta);
                                           $idx= mysqli_query($conn, $consulta);
                                           mysqli_close($conn);

                                           $num_resultados=mysqli_num_rows($idx);

                                            while(($row=mysqli_fetch_array($idx))){
                                               $titulo=utf8_encode($row['titulo']);
                                               $numero=$row['numero'];
                                               $eversion = (($row['eversion'] == 'true') ? true : false);
                                               $permiso = $row['libre'];
                                               $titulacion=utf8_encode($row['titulacion']);
                                               $numero5dig = obten_numero5dig($titulacion,$numero);

                                               if($permiso == "true")
                                               echo '<a href="'.DIRBASE.ABRIR_PROYECTO.'/'.$numero5dig.'/" class="enlace color_rojo external" style="font-size:smaller; font-weight:bold"><span class="glyphicon glyphicon-folder-close"></span> '.truncate($titulo, 28).'</a><br>';
                                               else
                                                   echo '<a href="'.DIRBASEPYF.ABRIR_PROYECTO.'/'.$numero5dig.'/" class="enlace color_rojo external" style="font-size:smaller; font-weight:bold"><span class="glyphicon glyphicon-folder-close"></span> '.truncate($titulo, 28).'</a><br>';
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
                <div class="panel-heading" style="padding:5px 10px;">
                <div class="panel-title" style="font-size:small; font-weight: bold; color:#C70039"><?php echo gettext('Repositorios y acceso abierto')?></div>
                </div>
                <div class="panel-body  text-center" STYLE="vertical-align: bottom">
	                <a href="https://idus.us.es/xmlui/handle/11441/11441" class="external"><img style="width: 110px; height:34px" src="./publico/imagenes/repo/logo_idUS.png" alt="<?php echo gettext('Imagen idUS')?>" /></a>
	                &nbsp;&nbsp;
                    <a href="http://recolecta.fecyt.es//" class="external"><img src="./publico/imagenes/repo/recolecta.png" alt="<?php echo gettext('Imagen RECOLECTA')?>" /></a>&nbsp;&nbsp;
                    &nbsp;&nbsp;
                    <a href="http://digital.csic.es/" class="external"><img src="./publico/imagenes/repo/digital-csic.png" alt="<?php echo gettext('Imagen CSIC')?>" /></a>

                    <a href="http://www.opendoar.org/" class="external"><img src="./publico/imagenes/repo/opendoar_button.png" alt="<?php echo gettext('Imagen OPENDOAR')?>" /></a>
                    &nbsp;&nbsp;
                    <a href="https://zenodo.org/" class="external"><img src="./publico/imagenes/repo/zenodo.jpg" with="80" height="60" alt="<?php echo gettext('Imagen DRIVER')?>" /></a>
                    &nbsp;&nbsp;
                    <a href="http://arxiv.org/" class="external"><img src="./publico/imagenes/repo/arxiv.png"  alt="<?php echo gettext('Imagen arXiv')?>" /></a>
                    &nbsp;&nbsp;
                    <a href="https://biblus.us.es/bibing/vinci/buscar/Repositorios+y+Acceso+abierto/como/categoria/1" class="enlace color_rojo external" style="font-size: smaller"><strong><?php echo gettext('+ Recursos')?></strong></a>
                </div>
            </div>
        </td>
    </tr>
</table>
