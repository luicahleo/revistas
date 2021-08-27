<?php
include ("./privado/comun/definiciones.php");
require_once('./privado/comun/funciones.php');
session_start();
error_reporting(0);
	// Internacionalización i18n
	if($_POST["idioma"]){
		switch ($_POST["idioma"]) {	
		   case 'Castellano':
		   case 'Spanish':
		    	$_SESSION['idioma']="es_ES";
	
	   	break;
		   case 'Inglés':
		   case 'English':
 		   $_SESSION['idioma'] = "en_GB";
	   	break;
		}	
	}
	if(isset($_SESSION['idioma'])) $locale=$_SESSION['idioma'];
	else $locale="es_ES";
	putenv("LC_ALL=$locale");  
	setlocale(LC_ALL, $locale);
	bindtextdomain("messages", "./locale");
	textdomain("messages");
	
	// FIN INTERNACIONALIZACIÓN
	if($_POST["marcados"])
	{
		if((isset($_POST['guardar']) || isset ($_POST['RIS']))&& isset($_SESSION['marcados']))
		{
			
			$_SESSION['marcados']=$_POST["marcados"];

		}
		else if (isset($_POST['guardar']) || isset ($_POST['RIS'])) {
			$_SESSION['marcados']=$_POST["marcados"];
		}
	}

	// Para exportar HAY QUE PONER ESTO EN EL SITIO CORRECTO PARA QUE NO SE EXPORTE TAMBIÉN EL CÓDIGO DE LA PÁGINA
	//if($_POST['exportar_rtf']){
	//	include("./privado/html/exportar/exportar_rtf.php");
	//}
        
        //Exportar a RIS
	if(isset($_POST['RIS'])&& isset($_SESSION['marcados'])){
            require_once('./privado/html/exportar/exportar_ris_marcados.php');
        }


include ("./privado/comun/peticiones.php");
//	if($_POST['autocompletar_materias']){
//		include ("./privado/html/buscador_materias/autocompleter.php");
//	}else{
{	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<head>
            <title><?php echo gettext('e-REdING. Biblioteca de la Escuela Superior de Ingenieros de Sevilla.')?></title>

                <?php
		if($_SERVER['REMOTE_ADDR'] == IP_FAMA ) include ("./privado/html/head.php"); 
		else include ("./privado/html/head.php");
		?>
<script type="text/javascript">
function seleccionar_todo(){
   for (i=0;i<document.formulario_marcados.elements.length;i++)
      if(document.formulario_marcados.elements[i].type == "checkbox")
         document.formulario_marcados.elements[i].checked=1
}
function deseleccionar_todo(){
   for (i=0;i<document.formulario_marcados.elements.length;i++)
      if(document.formulario_marcados.elements[i].type == "checkbox")
         document.formulario_marcados.elements[i].checked=0
} 
</script>
	</head>
    <body style="min-width: 960px; background-color: #e2e2e2; height: 100%">	
		<?php include ("./privado/html/body.php");?>
        
	</body>
 
 <?php if($pagina== FORMULARIOS || $pagina == PAG_AYUDA || $pagina == PAG_ACERCA){?>   
 <div id="footer"> <div class="wrap"><?php include ("./privado/html/pie.php");?></div> </div>
        <?php }?>
<!-- Inicio Google Analytics -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-7789620-1");
pageTracker._trackPageview();
} 
catch(err) {}</script>
<!-- Fin Google Analytics -->

</html>

<?php } ?>
