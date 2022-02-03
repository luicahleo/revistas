<?php //$atributos = $u->allAttributes(); ?>


<nav class="navbar navbar-default navbar-morado navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"> 
          <span class="glyphicon glyphicon-dashboard"></span> <b>Control de ocupaci&oacute;n</b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php if($user_is_sadmin){?>
        <li><a href="./">
                 <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                Hoja de datos</a></li>
        <?php } ?>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                Estad&iacute;sticas <b class="caret"></b></a>
         <ul class="dropdown-menu">
            <li><a href="./std/mes/<?php echo (int)$a_fecha[1].'/'.$a_fecha[0]; ?>">Mes</a></li>
            <li><a href="./std/ann/<?php echo (int)$a_fecha[0]; ?>">A&ntilde;o</a></li>
            <li class="divider"></li>
            <li><a href="./std/fechas/">Por Fechas</a></li>
          </ul>
        </li>
        <?php if($user_is_sadmin){?>
        <li><a href="./users">
                 <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                Usuarios</a></li>
        <?php } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li>
          <?php if($user_is_sadmin){?>
              <a href="#" title="<?php echo 'Logueado como: '.$atributos['cn'];?>"><span class="label label-default"><?php echo $atributos['cn']; ?></span></a>
          <?php } ?>
          </li>
          <li><a href="?logout=salir">
                   <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                   Cerrar Sesi&oacute;n</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<!-- ** CUERPO **-->

<table width="100%">
    
   <?php 
   //Men� superior en la p�gina de ingreso de datos
   if($pagina == PAG_SEMANA){ ?>  
    <tr>
        <td>
        <div style="padding-left: 30px; width: 250px;" id="calendari_lateral1"></div>
        <br>
        </td>
        
        
        <?php if(cambio_mes($semana)){ 
            //si en esa semana termina el mes, se muestra un previo de sus estad�sticas
                echo'<td class="text-left">';
                require_once ('./privado/std/previo-mes.php');
                echo '</td>';
        }?> 
        <td class="text-right" style="padding-right: 15px; vertical-align: top"> 
            <h3 class=""><strong class=""> <?php mostrar_fecha(fecha_eurp($fecha)); echo ' de '.$meses_arr[(int)$a_fecha[1]]; ?>&nbsp;</strong></h3>
            <br>
        <a href="./semana/ver/<?php echo ($cambio_dia != '' && $semana[0] == '')? $cambio_dia : date('Y-m-d',strtotime($semana_guia[0]) - (60*60*24*7)); ?>" class="btn btn-default " role="button">
            <span class="glyphicon glyphicon-arrow-left"></span>
            Semana anterior
        </a> 
        &nbsp;&nbsp;&nbsp;
        <a href="./semana/ver/<?php echo ($cambio_dia != '' && $semana[0] != '')? $cambio_dia : date('Y-m-d',strtotime($semana_guia[0]) + (60*60*24*7)); ?>" class="btn btn-default " role="button">
            Semana siguiente
            <span class="glyphicon glyphicon-arrow-right"></span>
        </a> 
        <br><br>
        </td>
    </tr>
   <?php }  ?> 
    <tr>
        <td class="col-lg-10 top" colspan="3">
            <?php 
            //echo $pagina;
            require_once($include_contenido); 
            ?>
        </td>
    </tr>
</table>
