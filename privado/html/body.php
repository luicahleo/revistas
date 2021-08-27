<a name="arriba"></a>
<div>
<div id="header">
    <table id="Tabla_01" height="105" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <img src="./publico/imagenes/cabecera/banner_new2_01.jpg" width="3" height="105" alt="">
        </td>
        <td>
            <img src="./publico/imagenes/cabecera/banner_new2_02.jpg" width="100" height="105" alt="">
        </td>
        <td width="100%" align="right"  style="min-width: 613px; background-repeat: no-repeat; background-position: top right; font-size: medium; font-weight: bold; color: white;">
            <table width="100%" height="105" border="0">
                <tr>
                    <td style=" vertical-align: top; width: 547px">
                        <!-- <a style="text-decoration: none" href="./"><img src="./publico/imagenes/cabecera/banner_new2_03.jpg"alt=""></a> -->
                        <a style="text-decoration: none" href="https://bib.us.es/ingenieros/"><img src="./publico/imagenes/cabecera/banner_new2_03.jpg"alt=""></a>
                     </td>
                     <td  background="./publico/imagenes/cabecera/banner_new2_04.jpg" style="background-repeat: no-repeat; background-color: #c6d4e8;"><br><br><br>
                         &nbsp;
                        </td>
                    </tr>
             </table>
        </td>
    </tr>
    <tr style="border-top: 1px solid #ffffff;">
        <td colspan="3" id="menu_sup" style="font-size: small; text-align: right; background-color: #9c1f2f; vertical-align: bottom">
                                    <?php if($_SERVER['REMOTE_ADDR'] != IP_FAMA ){ ?> 

                                <a href="<?php echo DIRBASE; ?>" class="enlace " style=" color: #ffffff"><?php echo gettext('Inicio')?>&nbsp;&nbsp;|</a>
                                <a href="<?php echo DIRBASE.ACERCA.'/'; ?>" style=" color: #ffffff" class="enlace ">&nbsp;&nbsp;<?php echo gettext('Acerca de')?>&nbsp;&nbsp;|</a>
                                
                                <a href="<?php echo DIRBASE.CONTACTO.'/'; ?>" style=" color: #ffffff" class="enlace ">&nbsp;&nbsp;<?php echo gettext('Contactar')?>&nbsp;&nbsp;</a>
                         <!--       <a href="<?php echo DIRBASE.AYUDA.'/'; ?>" style=" color: #ffffff" class="enlace  ">&nbsp;&nbsp;<?php echo gettext('Ayuda')?>&nbsp;&nbsp;|</a> -->
                                <!-- <form id="idioma" class=""  method="post" action="">
                                <div class="inline" style="color: white">
                                <input type="submit" class="tipo_letra " style=" color: #ffffff"name="idioma" value="<?php echo gettext('Castellanossss')?>" />&nbsp;&nbsp;
                                </div>	
                                </form> -->

                        <?php }else{ ?>
                                
                                <a href="<?php echo DIRBASE; ?>" class="enlace " style=" color: #ffffff"><?php echo gettext('Inicio')?>&nbsp;&nbsp;|</a>
                                <a style=" color: #ffffff" href="<?php echo DIRBASE.ACERCA.'/'; ?>" class="enlace  ">&nbsp;&nbsp;<?php echo gettext('Acerca de')?>&nbsp;&nbsp;|</a>
                                <a style=" color: #ffffff" href="<?php echo DIRBASE.CONTACTO.'/'; ?>" class="enlace ">&nbsp;&nbsp;<?php echo gettext('Contactar')?>&nbsp;&nbsp;|</a>
                            <!--    <a style=" color: #ffffff" href="<?php echo DIRBASE.AYUDA.'/'; ?>" class="enlace  ">&nbsp;&nbsp;<?php echo gettext('Ayuda')?>&nbsp;&nbsp;|</a> -->
                                <form id="idioma" class=""  method="post" action="">
                                <div class="inline" style="color: white">
                                <input type="submit" class="tipo_letra " style=" color: #ffffff"name="idioma" value="<?php echo gettext('Castellano')?>" />&nbsp;&nbsp;
                                </form>

                        <?php } ?>
        </td>

    </tr>
    </table>
</div>
<br><br>
<div class="colmask rightmenu">
<?php           
                if(isset($_POST['guardar']) && isset($_SESSION['marcados'])){
			include ("./privado/html/exportar/generar_biblio.php");
		}
		else if ( $pagina == FORMULARIOS ){
			include ("./privado/html/buscador/centro.php");
                }else if ( $pagina == 55 ){
			include ("./privado/html/buscador/coleccion.php");
		}else if ( $pagina == RESULTADOS ){
			include ("./privado/html/resultados/resultados.php");
			//include("./privado/html/barra-lateral.php");
		}else if ( $pagina == LIBRE ){
			include ("./privado/html/navegador/navegar.php");
			//include("./privado/html/barra-lateral.php");
		}else if ( $pagina == PRIVADO ){
			include ("./privado/html/navegador/navegar.php");
			//include("./privado/html/barra-lateral.php");
		}else if( $pagina == PAG_RECIENTES){
			include("./privado/html/recientes/recientes.php");
			include("./privado/html/barra-lateral.php");
		//}else if( $pagina == PAG_AYUDA){
		//		include ("./privado/html/ayuda/ayuda.php");
                }else if( $pagina == PAG_ACERCA){
				include ("./privado/html/ayuda/acerca.php");
		}else if( $pagina == PAG_CONTACTO){
				include ("./privado/html/contacto/contacto.php");
		}else if($pagina == PAG_RECURSOS){
				include ("./privado/html/recursos/otros.php");			
		}else{
			include ("./privado/html/errores/errorurl.php");
		}
	?>

</div>
</div>

