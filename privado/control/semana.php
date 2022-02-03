<?php

//Proceso de guardar datos modificados.
if(isset($_POST['btn_guardar'])){
    
    //Pasamos cada uno de los valores de la semana
    $datos_semana = array($_POST['Mon'],$_POST['Tue'],$_POST['Wed'],$_POST['Thu'],$_POST['Fri'],$_POST['Sat'],$_POST['Sun']);
   
    foreach ($datos_semana as $ds){
        if(isset($ds[5])){//si el campo estaba seleccionado apra modificarcarse (si no bloqueado)
            if(isset($ds[6])) //Si ya existia el registro
                $resultado = db_actualizar_registro($ds[0],$ds[1],$ds[2],$ds[3],$ds[4], $uvus);
            else
                $resultado = db_insertar_registro($ds[0],$ds[1],$ds[2],$ds[3],$ds[4], $uvus);
        }
    }
}
?>

<script> 
    //al pulsar el bot�n de editar se habilitan los imputs
    function habilitarMon(value, num) { 
        var inpt;
        switch(num) {
        case 0:
            inpt = "Mon[]"
            break;
        case 1:
            inpt = "Tue[]"
            break;
        case 2:
            inpt = "Wed[]"
            break;
        case 3:
            inpt = "Thu[]"
            break;
        case 4:
            inpt = "Fri[]"
            break;
        case 5:
            inpt = "Sat[]"
            break;
        case 6:
            inpt = "Sun[]"
            break;
            
         default:
            break;
        } 
        
       objFoo = document.getElementsByName(inpt);;
       for(var i in objFoo){
            objFoo[i].disabled = !value;
        }
   } 
</script>


<div class="panel panel-primary" >
  <div class="panel-heading">
      <span class="glyphicon glyphicon-calendar"></span> 
      <?php echo 'Semana: '. fecha_eurp($semana_guia[0]) .' al '. fecha_eurp(date('Y-m-d',strtotime($semana_guia[0]) + (60*60*24*6)));?>
    </div>
    
  <div class="panel-body">
      <form id="frm_semana" action="./semana/ver/<?php echo $fecha ?>" method="post" >   
      <table class="table-bordered table-hover col-lg-12">
          <thead class="panel-primary">
          <th style="width:220px"></th>
                <th class="text-center" colspan="2">Ma&ntilde;ana</th>
                <th class="text-center" colspan="2">Tarde</th>
                <th class="text-center" colspan="5"></th>
          </thead>
          <thead class="text-center">
                <th></th>
                <th class="text-center">Izquierda</th>
                <th class="text-center">Derecha</th>
                <th class="text-center">Izquierda</th>
                <th class="text-center">Derecha</th>
                <th class="text-center" style="width: 40px">&nbsp;</th>
                <th class="text-center">Total Ma&ntilde;ana</th>
                <th class="text-center">Total Tarde</th>
                <th class="text-center">Total D&iacute;a</th>
                <th class="text-center" style="width: 160px"><span class="glyphicon glyphicon-pushpin"></span> Avisos</th>
          </thead>
          <tbody>
           
          
          <?php
          /*
           * Este bloque muetsra los valore sguardados de la semana que se este mostrando
           */
            $i = 0;
            $total_sem_manna = 0;
            $total_sem_tarde = 0;
            $total_sem = 0;      
            
            foreach ($semana as $dia){
                $registros =  db_listar_registro_concreto($dia); 
                $registros_ant = db_listar_registro_anterior($dia);
                $registros_post = db_listar_registro_posterior($dia);    
                
                $reset = FALSE;
                $dia_semana = obtener_dia($dia);
                $disabled='disabled="disabled "';
                
                //echo $registros['m_i_valor'].' + '. $registros['m_d_valor'] .' - '. $registros_ant['t_i_valor'] .' - '. $registros_ant['t_d_valor'].'<br>'; 
                    if($registros){
                        if($registros_ant['t_i_valor'] && $registros_ant['t_d_valor'])
                            $total_manna = ceil(($registros['m_i_valor'] + $registros['m_d_valor'] - $registros_ant['t_i_valor'] - $registros_ant['t_d_valor'])/2);
                        else
                            $total_manna = ceil(($registros['m_i_valor'] + $registros['m_d_valor'] - $registros_ant['m_i_valor'] - $registros_ant['m_d_valor'])/2);
                        
                        
                        $total_tarde = ceil(($registros['t_i_valor'] + $registros['t_d_valor'] - $registros['m_d_valor'] - $registros['m_i_valor'])/2);

                        if(($total_manna < COTA_INF_RESET) 
                                && ($registros['m_i_valor'] < COTA_SUP_RESET) 
                                && ($registros['m_d_valor'] < COTA_SUP_RESET)){
                            
                            
                            $total_manna = ceil(($registros['m_i_valor'] + $registros['m_d_valor'])/2);
                            $reset = TRUE;
                            $reset_msg = ', la tarde anterior.';
                        }

                        if(($total_tarde < COTA_INF_RESET) 
                                && ($registros['t_i_valor'] < COTA_SUP_RESET) 
                                && ($registros['t_d_valor'] < COTA_SUP_RESET)){
                            $total_tarde = ceil(($registros['t_i_valor'] + $registros['t_d_valor'])/2);
                            if($total_tarde != 0)
                                $reset = TRUE;
                            $reset_msg = ' durante la ma&ntilde;ana.';
                        }


                        $total_dia   = ($total_tarde + $total_manna);   
                        
                    }
                    else{
                        $total_manna = '';
                        $total_tarde = '';
                        $total_dia   = '';  
                    }

                echo '<tr';
                if($dia== $hoy){
                    $disabled='autofocus ';
                    $checked='checked';
                    echo' style="background-color: #c0e2ff; font-weight:bold" ';
                } 
                else{
                    $checked='';
                    if($reset)
                        echo' style="background-color: #F2DEDE; font-weight:bold" ' ;   
                }
                echo '>';
                
                
                if($dia){
                    echo '<td class="text-right">&nbsp;';
                    echo mostrar_fecha(fecha_eurp($dia)).' &nbsp;';
                    
                    //Fecha del dia en input oculto
                    echo '<input style="" type="hidden"  name="'.$dia_semana.'[]" id="'.$dia_semana.'" value="'.$dia.'"/>';
                    echo '</td>';
                    
                    //Control MA�ANA izquierda
                    echo'<td style="width:120px; align:right"><input maxlength="6" '.$disabled.'class="form-control" style="width:120px" type="number" value="'.$registros['m_i_valor'].'" name="'.$dia_semana.'[]"/></td>';
                    //Control MA�ANA derecha
                    echo'<td style="width:120px"><input maxlength="6" '.$disabled.'class="form-control" style="width:120px" type="number" value="'.$registros['m_d_valor'].'"name="'.$dia_semana.'[]"/></td>';
                   
                    //Control TARDE izquierda
                    echo'<td style="width:120px"><input maxlength="6" '.$disabled.'class="form-control" style="width:120px" type="number" value="'.$registros['t_i_valor'].'"name="'.$dia_semana.'[]"/></td>';
                    //Control TARDE derecha
                    echo'<td style="width:120px"><input maxlength="6" '.$disabled.'class="form-control" style="width:120px" type="number" value="'.$registros['t_d_valor'].'"name="'.$dia_semana.'[]"/></td>';
                    
                    //Bot�n d edici�n
                    echo'<td>';
                    //Solo lo muestra si el d�a es anterior a la fecha actual
                    if(strtotime($dia) <= strtotime($hoy)){
                        echo'<div class="btn-group" data-toggle="buttons">'
                            . '<label title="editar" class="btn btn-edit btn-small">'
                            . '<input type="checkbox" name="'.$dia_semana.'[]" onchange="habilitarMon(this.checked,'.$i.') " '.$checked.'><span class="glyphicon glyphicon-edit"></span>'
                            .'</label></div>';
                        if($registros)
                            echo'<input type="hidden" name="'.$dia_semana.'[]"  value="1">';
                    }
                    echo '</td>';
                    
                    
                    //bandera para detectar errores en los valores
                    $aviso=FALSE;
                    
                    //Total ma�ana
                    if($total_manna >=0)
                        echo '<td class="text-right">'.$total_manna.'&nbsp;</td>';
                    else{
                        $aviso = TRUE;
                         echo '<td class="text" style="color:#9c1f2f">'
                        . '<span class="glyphicon glyphicon-exclamation-sign"></span> '.$total_manna.'&nbsp;</td>';
                    }
                        
                    //Total Tarde
                    if($total_tarde >=0)
                        echo '<td class="text-right">'.$total_tarde.'&nbsp;</td>';
                    else{
                        $aviso = TRUE;
                         echo '<td class="text-right" style="color:#9c1f2f">'
                        . '<span class="glyphicon glyphicon-exclamation-sign"> </span> '.$total_tarde.'&nbsp;</td>';
                    }
                        //Total D�a
                    echo '<td class="text-right">'.$total_dia.'&nbsp;</td>';     
                    
                    
                    
                    //// AVISOS calculados dinamicamente segunlos valores del d�a
                    
                    //dia actual
                    if($reset && $dia!= $hoy){
                        echo '<td>'
                            . '<div class="alert alert-danger reinicio-alert text-center" role="alert" style=>'
                            . '<span class="glyphicon glyphicon-exclamation-sign"></span> Reset anterior'
                            . '</div>'
                            . '</td>';
                    }
                    //dia cerrado (no hay valores y la fecha es anterior a la actural)
                    elseif(((!$registros && $registros_ant && $registros_post) || $total_dia == 0) && (strtotime($dia) < strtotime($hoy))&& $dia!= $hoy){
                        echo '<td >'
                            . '<div class="alert alert-warning reinicio-alert text-center" role="alert" style=> &nbsp;'
                            . '<span class="glyphicon glyphicon-map-marker"></span> D&iacute;a cerrado'
                            . '</div>'
                            . '</td>';
                    }
                    //tarde cerrada, no hay datos guardados de la tarde
                    elseif($total_tarde ==0 && $total_dia > 0 && $dia!= $hoy){
                        echo '<td>'
                            . '<div class="alert alert-warning reinicio-alert text-center" role="alert" style=> &nbsp;'
                            . '<span class="glyphicon glyphicon-map-marker"></span> Tarde Cerrada'
                            . '</div>'
                            . '</td>';
                    }
                    //posible error en los valores
                    elseif($aviso){
                        echo '<td>'
                            . '<div class="alert alert-danger reinicio-alert text-center" role="alert" style=> &nbsp;'
                            . '<span class="glyphicon glyphicon-exclamation-sign"></span> Comprobar valores'
                            . '</div>'
                            . '</td>';
                    }
                    else {echo '<td></td>';}
                    
                    // calulamos los  valores totales a mostrar de la semana
                    $total_sem_manna += ((int)$total_manna);
                    $total_sem_tarde +=  ((int)$total_tarde);
                    $total_sem +=  ((int)$total_dia);
                    
                }
                else{
                    echo '<td class="text-right" style="height:35px; color:#bfbfbf">';
                    echo mostrar_fecha(fecha_eurp($semana_guia[$i])).' &nbsp;';
                    echo '</td><td></td><td></td><td></td><td></td><td></td>';
                    echo '</td><td></td><td></td><td></td><td></td>';
                }
                echo'</tr>';
                
                $i++;
            }
            ?>
              <tr style="height:34px; color: #891536; font-weight: bold;">
                  <td colspan="6" class="text-right"><b>Total Semana: &nbsp;</b></td>
                  <td class="text-right"><?php echo $total_sem_manna; ?>&nbsp;</td>
                  <td class="text-right"><?php echo $total_sem_tarde; ?>&nbsp;</td>
                  <td class="text-right"><?php echo $total_sem; ?>&nbsp;</td>
              </tr>
          </tbody>
      </table>
       
      <div>
          &nbsp;
      </div>
      <div class="text-center">
          <button class="btn btn-large btn-primary" type="submit" name="btn_guardar">
              Guardar Cambios
          </button>
      </div>
      </form>
  </div>
</div>
