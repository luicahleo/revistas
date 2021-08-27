<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$coleccion = coleccion_proyectos();


?>
<div class="panel panel-default" style="margin-bottom: 0px; border-radius: 0px;">
  <div class="panel-heading">
    <h5 class="panel-title" style="font-size: small; font-weight: bold">
        <span class="glyphicon glyphicon-list-alt"></span>
        Trabajos y Proyectos por titulaci&oacute;n:</h5>
  </div>
  <div class="panel-body" style="padding: 10px">
    <div class="panel-group2" id="accordion" role="tablist" aria-multiselectable="true" style=" border-radius: 0px; margin-bottom: 0px">
        <div class="panel panel-default2" style=" border-radius: 0px; margin: 0px;">
        <div class="panel-heading" style="padding-top: 3px; padding-bottom: 3px; border-radius: 0px " role="tab" id="headingOne">
            <a style="color:#333" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
             <span class="glyphicon glyphicon-plus"></span> <b>Proyectos Fin de Carrera (<?php echo $coleccion['pfc'][0]['num'];?>)</b>
            </a>

        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body" style="padding-top: 3px; padding-bottom: 3px; padding-left: 3px; margin-bottom: 0px ">
             <ul style="">
                <?php foreach ($coleccion['pfc_tit'] as $tit)
                    echo '<li><a style=" text-decoration:none; color:#333" href="'.DIRBASE.BUSCAR.'/ /en/todo/and//en/todo/limitado_a/'.$tit['sig'].'/entre/1970/y/'.date('Y').'///1">'.mb_ucwords(mb_strtolower(utf8_encode($tit['titulacion']),'UTF-8'), 'UTF-8'). ' </a> ('.$tit['num'].')</li>';
                ?>
              </ul>
          </div>
        </div>
      </div>
      <div class="panel panel-default2" style=" border-radius: 0px; margin: 0px;">
        <div class="panel-heading" style="padding-top: 3px; padding-bottom: 3px; border-radius: 0px"  role="tab" id="headingTwo">
            <a style="color:#333"  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <span class="glyphicon glyphicon-plus"></span> <b>Trabajos Fin de Grado (<?php echo $coleccion['tfg'][0]['num'];?>)</b>
            </a>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
          <div class="panel-body" style="padding-top: 3px; padding-bottom: 3px; padding-left: 0px;">
            <ul>
            <?php foreach ($coleccion['tfg_tit'] as $tit)
                echo  '<li><a style=" text-decoration:none; color:#333"" href="'.DIRBASE.BUSCAR.'/ /en/todo/and//en/todo/limitado_a/tg'.$tit['id'].'/entre/1970/y/'.date('Y').'///1">'.utf8_encode($tit['nombre']). ' </a>('.$tit['num'].')</li>';
                ?>

            </ul>
          </div>
        </div>
      </div>
      <div class="panel panel-default2" style=" border-radius: 0px; margin: 0px;">
        <div class="panel-heading" style="padding-top: 3px; padding-bottom: 3px; border-radius: 0px" role="tab" id="headingThree">

           <a  style="color:#333" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <span class="glyphicon glyphicon-plus"></span>  <b>Trabajos Fin de M&aacute;ster (<?php echo $coleccion['tfm'][0]['num'];?>)</b>
            </a>

        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
          <div class="panel-body" style="padding-top: 3px; padding-bottom: 3px; padding-left: 3px;">
            <ul>
            <?php foreach ($coleccion['tfm_esp'] as $tit)
                echo  '<li><a style=" text-decoration:none; color:#333"" href="'.DIRBASE.BUSCAR.'/ /en/todo/and//en/todo/limitado_a/mtodos'.$tit['id'].'/entre/1970/y/'.date('Y').'///1">'.utf8_encode($tit['nombre']). ' </a>('.$tit['num'].')</li>';
                ?>

            </ul>
          </div>
        </div>
      </div>
      <br>
      <div style="text-align: center">
      	<span>
          <!-- 2020 cambiado el enlace de licencia a la version en español y que ademas se abra en una pestaña nueva -->
      	<a rel="license" href="https://creativecommons.org/licenses/by-nc-nd/4.0/deed.es" target="_blank"><img alt="Licencia Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a> <strong>Todos los trabajos académicos depositados en e-REdING están bajo </strong><a rel="license" href="https://creativecommons.org/licenses/by-nc-nd/4.0/deed.es" target="_blank">Licencia Creative Commons Atribución-NoComercial-SinDerivar 4.0 Internacional</a>.</span>
      </div>
    </div>

  </div>
</div>

