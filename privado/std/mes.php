<?php

     $fecha = $ann_actual.'-'.$mes_actual.'-01'; 

?>

<!-- FORMULARIO BUSQUEDA -->

<table width="100%">
    <tr>
        <td class="text-center" style="padding-right: 15px; vertical-align: top"> 
        <a href="./std/mes/<?php echo ($mes_actual > 1 )? ($mes_actual - 1).'/'.$ann_actual : '12/'.($ann_actual-1) ?>" class="btn btn-default " role="button">
            <span class="glyphicon glyphicon-arrow-left"></span>
            Mes anterior
        </a> 
        &nbsp;&nbsp;&nbsp;
        <a href="./std/ann/<?php echo $a_fecha[0]; ?>" class="btn btn-morado " role="button">
            <span class="glyphicon glyphicon-dashboard"></span>
            Estadisticas del A&ntilde;o
        </a> 
        &nbsp;&nbsp;&nbsp;
        <a href="./std/mes/<?php echo ($mes_actual < 12 )? ($mes_actual+1).'/'.$ann_actual : '1/'.($ann_actual+1) ?>" class="btn btn-default " role="button">
            Mes siguiente
            <span class="glyphicon glyphicon-arrow-right"></span>
        </a> 
   <br>   <br>
        </td>
    </tr>
</table>

<form class="form-inline text-center" role="form" action="./std/mes/" method="post">
  <div class="form-group">
    <select  name="mes" class="form-control">
        <?php for($i=1; $i<=12; $i++){ 
            
        if($i == $mes_actual)
            $selected = 'selected';
        else
            $selected = '';
        
        echo '<option value="'.$i.'" '.$selected.'>'.$meses_arr[$i].'</option>';
        }
        ?>
    </select>
  </div>
  <div class="form-group">
    <select name="year" class="form-control">
        <?php 
        $years = db_listar_year();
        foreach($years as $y){ 
        if($y[0] == $ann_actual)
            $selected = 'selected';
        else
            $selected = '';
            echo '<option value="'.$y[0].'" '.$selected.'>'.$y[0].'</option>';
        }
        ?>
      </select>
  </div>
  <button type="submit" class="btn btn-default" name="btn_mes"> <span class="glyphicon glyphicon-eye-open"></span> Consultar</button>
</form>
<br><br>

<div class="panel panel-default" >
  <div class="panel-heading">
      <span class="glyphicon glyphicon-calendar"></span> 
      <?php echo $meses_arr[$mes_actual] .' '.$ann_actual; ?></div>
  <div class="panel-body">
      <?php

      ?>
     
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
  // Some raw data (not necessarily accurate)
  var data = google.visualization.arrayToDataTable([
    ['Fecha', 'Ma\xf1ana', 'Tarde', 'Total dia']
    
    <?php
        $reg_ant = db_listar_registro_anterior ($fecha);
        $registros = db_listar_registros_mes($fecha);

        $total_mes['n_dias']=0;
        $total_mes['manana']=0;
        $total_mes['tarde']=0;
        $total_mes['total']=0;
        $total_mes['n_manana']=0;
        $total_mes['n_tarde']=0;

            foreach ($registros as $reg){
            if($reg){

                if($reg_ant['t_i_valor'] && $reg['t_d_valor'])
                    $total_manna = ceil(($reg['m_i_valor'] + $reg['m_d_valor'] - $reg_ant['t_i_valor'] - $reg_ant['t_d_valor'])/2);
                else
                    $total_manna = ceil(($reg['m_i_valor'] + $reg['m_d_valor'] - $reg_ant['m_i_valor'] - $reg_ant['m_d_valor'])/2);
                
                $total_tarde = ceil(($reg['t_i_valor'] + $reg['t_d_valor'] - $reg['m_d_valor'] - $reg['m_i_valor'])/2);

                if(($total_manna < COTA_INF_RESET) 
                    && ($reg['m_i_valor'] < COTA_SUP_RESET) 
                    && ($reg['m_d_valor'] < COTA_SUP_RESET)){
                    $total_manna = ceil(($reg['m_i_valor'] + $reg['m_d_valor'])/2);
                }

                if(($total_tarde < COTA_INF_RESET) 
                    && ($reg['t_i_valor'] < COTA_SUP_RESET) 
                    && ($reg['t_d_valor'] < COTA_SUP_RESET)){
                    $total_tarde = ceil(($reg['t_i_valor'] + $reg['t_d_valor'])/2);
                }


                $total_dia   = ($total_tarde + $total_manna);  
               //echo '* '.$total_manna.' -> '.$total_tarde . ' -> '.$total_dia.'<br>';

                $total_mes['manana']+= $total_manna;
                $total_mes['tarde'] += $total_tarde;
                $total_mes['total'] += $total_dia;

                $reg_ant=$reg;
                
                if($total_dia > 0)
                echo ",['".fecha_eurp($reg['fecha'])."', ". $total_manna.", ". $total_tarde.", ". $total_dia."]";
                
            } 
        }
    ?>
  ]);

  var options = {
    title : '',
    vAxis: {title: "Usuarios"},
    hAxis: {title: ""},
    seriesType: "bars"
    //series: {3: {type: "line"}}
  };

  var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}
    </script>

<script type="text/javascript">
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Fecha', 'Usuarios']
      <?php
        $reg_ant = db_listar_registro_anterior ($fecha);

        $total_mes['n_dias']=0;
        $total_mes['manana']=0;
        $total_mes['tarde']=0;
        $total_mes['total']=0;
        $total_mes['n_manana']=0;
        $total_mes['n_tarde']=0;
        
        $total_mes['n_sab']=0;
        $total_mes['sabados']=0;
        $total_mes['sabados_t']=0;
        $total_mes['sabados_m']=0;

            foreach ($registros as $reg){
            if($reg){

                if($reg_ant['t_i_valor'] && $reg['t_d_valor'])
                    $total_manna = ceil(($reg['m_i_valor'] + $reg['m_d_valor'] - $reg_ant['t_i_valor'] - $reg_ant['t_d_valor'])/2);
                else
                    $total_manna = ceil(($reg['m_i_valor'] + $reg['m_d_valor'] - $reg_ant['m_i_valor'] - $reg_ant['m_d_valor'])/2);
                
                $total_tarde = ceil(($reg['t_i_valor'] + $reg['t_d_valor'] - $reg['m_d_valor'] - $reg['m_i_valor'])/2);

                if(($total_manna < COTA_INF_RESET) 
                    && ($reg['m_i_valor'] < COTA_SUP_RESET) 
                    && ($reg['m_d_valor'] < COTA_SUP_RESET)){
                    $total_manna = ceil(($reg['m_i_valor'] + $reg['m_d_valor'])/2);
                }

                if(($total_tarde < COTA_INF_RESET) 
                    && ($reg['t_i_valor'] < COTA_SUP_RESET) 
                    && ($reg['t_d_valor'] < COTA_SUP_RESET)){
                    $total_tarde = ceil(($reg['t_i_valor'] + $reg['t_d_valor'])/2);
                }


                $total_dia   = ($total_tarde + $total_manna);  
               //echo '* '.$total_manna.' -> '.$total_tarde . ' -> '.$total_dia.'<br>';
                if($total_dia > 0)
                $total_mes['dias']++;

                if($total_manna > 0)
                $total_mes['n_manana']++;

                if($total_tarde > 0)
                $total_mes['n_tarde']++;
                
                if(($total_dia > 0) && (obtener_dia($reg['fecha']) == 'Sat')){
                    $total_mes['n_sab']++;
                    $total_mes['sabados_m']+=$total_manna;
                    $total_mes['sabados_t']+=$total_tarde;
                    $total_mes['sabados']+=$total_dia;
                }
                
                $total_mes['manana']+= $total_manna;
                $total_mes['tarde'] += $total_tarde;
                $total_mes['total'] += $total_dia;

                $reg_ant=$reg;
                
                if($total_dia > 0)
                echo ",['".fecha_eurp($reg['fecha'])."', ". $total_mes['total']."]";
                
            } 
        }
    ?>
        ]);

    var options = {
      title: ''
    };

    var chart2 = new google.visualization.LineChart(document.getElementById('chart_div2'));
    chart2.draw(data, { vAxis: {title: "Usuarios Totales", minValue:"0"}, backgroundColor:"#ffffff"});
  }
  
</script>

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Periodo', 'Usuarios'],
          ['Ma\xf1ana',     <?php  echo $total_mes['manana'];?>],
          ['Tarde',      <?php  echo $total_mes['tarde'];?>]
        ]);

        var options = {
          title: '% Usuarios ',
          colors: ['#891536','orange']

        };

        var chart3 = new google.visualization.PieChart(document.getElementById('piechart'));

        chart3.draw(data, options);
      }
    </script>

<?php if($registros) {?>
<table width="100%">
    <tr>
        <td style="width: 70%">
            <div id="chart_div" style="width: 100%; height: 250px;"></div>
        </td>
        <td>
            <div id="piechart" style="width: 100%; height: 250px;">
            </td>
    </tr>
     <tr>
        <td>
            <div id="chart_div2" style="width: 100%; height: 300px;"></div>
        </td>
        <td class="bs-callout bs-callout-info" style="vertical-align: top">
            <h4>Datos totales: </h4>
            <ul class="list-group">
                <li class="list-group-item"><b>Total usuarios: <span class="badge"><?php echo $total_mes['total']; ?></span> (<?php echo $total_mes['dias']; ?> d&iacute;as)</b>
                <br>
                Usuarios/d&iacute;a: <span class=""><?php echo floor($total_mes['total']/$total_mes['dias']); ?></span>
                <br>
                    Ma&ntilde;ana: <span class=""><?php echo $total_mes['manana']; ?></span>
                   <br>
                    Tarde: <span class=""><?php echo $total_mes['tarde']; ?></span>
               </li>
                <li class="list-group-item"><b>Total s&aacute;bados: <span class="badge"><?php echo $total_mes['sabados']; ?></span> (<?php echo $total_mes['n_sab']; ?> s&aacute;b.)</b>
                    <br>
                    Usuarios/s&aacute;bado: <span class=""><?php echo floor($total_mes['sabados']/$total_mes['n_sab']); ?></span>
                <br>
                     Ma&ntilde;ana: <span class=""><?php echo $total_mes['sabados_m']; ?></span>
                   <br>
                    Tarde: <span class=""><?php echo $total_mes['sabados_t']; ?></span>
               </li>
                <li class="list-group-item">Usuarios/d&iacute;a: <span class="badge"><?php echo ceil($total_mes['total']/$total_mes['dias']); ?></span></li>
                <li class="list-group-item">N Ma&ntilde;anas: <span class="badge"><?php echo $total_mes['n_manana']; ?></span></li>
                <li class="list-group-item">N Tardes: <span class="badge"><?php echo $total_mes['n_tarde']; ?></span></li>
            </ul>
        </td>
    </tr>
</table>
<?php }else{ echo '<h4 class="text-center">Sin datos de este mes.</h4>';}?>
  </div>
</div>
