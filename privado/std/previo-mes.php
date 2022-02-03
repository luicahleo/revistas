<?php
      $mes_actual = (int)$a_fecha[1];  
      $ann_actual = (int)$a_fecha[0];  
?>
<div class="panel panel-default" style="width: 320px; float: left; text-align: left">
  <div class="panel-heading">
      <span class="glyphicon glyphicon-calendar"></span> 
      <?php echo 'Est&aacute;disticas, '.$meses_arr[$mes_actual] .'-'.$ann_actual; ?>
  
  </div>
  <div class="panel-body">
      <?php

      $total_mes = calcular_total_mes($fecha); 
      
      echo 'Total: <span class="badge">'.$total_mes['total'].'</span><br>'
              . 'Usuarios/dia: <span class="badge">'.ceil($total_mes['total']/$total_mes['dias']).'</span><br>'
              . 'Usuarios S&aacute;bados: <span class="badge">'.($total_mes['sabados']).'</span> (*'.$total_mes['n_sab'].' s&aacute;b.)<br>'
              . 'Num Manana: <span class="badge">'.$total_mes['n_manana'].'</span><br>'
              . 'Num Tardes: <span class="badge">'.$total_mes['n_tarde'].'</span>';
      ?>
       <a style="float: right;" href="./std/mes/<?php echo $mes_actual.'/'.$ann_actual; ?>" class="btn btn-small btn-morado " role="button">
            <span class="glyphicon glyphicon-info-sign"></span>
            ver
        </a> 
  </div>
</div>
