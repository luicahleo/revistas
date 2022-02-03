<?php
      $fecha = $ann_actual.'-01-01'; 
?>
<table width="100%">
    <tr>   
        <td class="text-center" style="padding-right: 15px; vertical-align: top"> 
        <a href="./std/ann/<?php echo ($ann_actual-1) ?>" class="btn btn-default " role="button">
            <span class="glyphicon glyphicon-arrow-left"></span>
            A&ntilde;o anterior
        </a> 
        &nbsp;&nbsp;&nbsp;
        <a href="./std/mes/1/<?php echo $ann_actual; ?>" class="btn btn-morado " role="button">
            <span class="glyphicon glyphicon-dashboard"></span>
            Estadisticas por meses
        </a> 
        &nbsp;&nbsp;&nbsp;
        <a href="./std/ann/<?php echo ($ann_actual+1) ?>" class="btn btn-default " role="button">
            A&ntilde;o siguiente
            <span class="glyphicon glyphicon-arrow-right"></span>
        </a> 
     <br>   <br>
        </td>
    </tr>
</table>
<form class="form-inline text-center" role="form" action="./std/ann/" method="post">
  <div class="form-group">
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
  <button type="submit" class="btn btn-default" name="btn_year"> <span class="glyphicon glyphicon-eye-open"></span> Consultar</button>
</form>
<br><br>
<div class="panel panel-default" >
  <div class="panel-heading">
      <span class="glyphicon glyphicon-calendar"></span> A&ntilde;o
      <?php echo $ann_actual; ?></div>
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
    ['Mes', 'Ma\xf1ana', 'Tarde', 'Total mes','Total Sabados']
    
    <?php
    
    for($i =1; $i <= 12; $i++){
        $fecha = $ann_actual.'-'.$i.'-01';
        $reg_ant = db_listar_registro_anterior ($fecha);
        $registros = db_listar_registros_mes($fecha);

        $total_mes['dias']=0;
        $total_mes['manana']=0;
        $total_mes['tarde']=0;
        $total_mes['total']=0;
        $total_mes['sabados']=0;

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
                 if(($total_dia > 0) && (obtener_dia($reg['fecha']) == 'Sat')){
                    $total_mes['n_sab']++;
                    $total_mes['sabados']+=$total_dia;
                }
                

                $total_mes['manana']+= $total_manna;
                $total_mes['tarde'] += $total_tarde;
                $total_mes['total'] += $total_dia;

                $reg_ant=$reg;
                
                
                
            } 
        }
        
        echo ",['".$meses_arr[$i]."', ". $total_mes['manana'].", ". $total_mes['tarde'].", ". $total_mes['total'].",". $total_mes['sabados']."]";
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
      ['Mes', '2014']
      <?php
        $total_ann['dias'] =0;
        $total_ann['n_manana'] =0;
        $total_ann['n_tarde'] =0;
        $total_ann['n_sab'] =0;
        
        $total_ann['total'] =0;
        $total_ann['manana'] =0;
        $total_ann['tarde'] =0;
        $total_ann['sabados'] =0;
        $total_ann['sabados_t']=0;
        $total_ann['sabados_m']=0;
        
        for($i =1; $i <= 12; $i++){
        $fecha = $ann_actual.'-'.$i.'-01';
        $reg_ant = db_listar_registro_anterior ($fecha);
        $registros = db_listar_registros_mes($fecha);

        $total_mes['dias']=0;
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
                
                
                
            } 
        }
               
        $total_ann['dias'] += $total_mes['dias'];
        $total_ann['n_manana'] += $total_mes['n_manana'];
        $total_ann['n_tarde'] += $total_mes['n_tarde'];
        $total_ann['n_sab'] += $total_mes['n_sab'];
        
        $total_ann['total'] += $total_mes['total'];
        $total_ann['manana'] += $total_mes['manana'];
        $total_ann['tarde'] += $total_mes['tarde'];
        $total_ann['sabados'] += $total_mes['sabados'];
        $total_ann['sabados_t']+= $total_mes['sabados_t'];
        $total_ann['sabados_m']+= $total_mes['sabados_m'];
        
        
        echo ",['".$meses_arr[$i]."', ". $total_ann['total'] ."]";
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
      ['Dia', 'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
          <?php
        //comparacion meses en lineas
        $matriz;
        for($i =1; $i <= 12; $i++){
            
        $fecha = $ann_actual.'-'.$i.'-01';
        $reg_ant = db_listar_registro_anterior ($fecha);
        $registros = db_listar_registros_mes($fecha);

        $total_mes['dias']=0;
        $total_mes['total']=0;
        $j=1;
        
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
                
              
                while ($j < (int)date('j', strtotime($reg['fecha']))){
                    $matriz[$j][$i] = $total_mes['total'];
                    $j++;
                }
                $total_dia   = ($total_tarde + $total_manna);  
               //echo '* '.$total_manna.' -> '.$total_tarde . ' -> '.$total_dia.'<br>';
                if($total_dia > 0)
                $total_mes['dias']++;
                
                $total_mes['total'] += $total_dia;

                $reg_ant=$reg;
                $matriz[$j][$i] = $total_mes['total'];
                $j++;
                
            } 
        } 
        while ($j <= 31){
            $matriz[$j][$i] = $total_mes['total'];
            $j++;
         }
    }
        for($j=1;$j<=31;$j++){
            echo ",['".$j."'";
            for($i=1;$i<=12;$i++){
                if($matriz[$j][$i] != '')
                    echo ",".$matriz[$j][$i];
                else
                     echo ",0";
            }
            echo "]";
        }
    ?>
        ]);

    var options = {
      title: 'Usuarios totales por meses',
    };

    var chart2 = new google.visualization.LineChart(document.getElementById('chart_div3'));
    chart2.draw(data, { vAxis: {title: "Usuarios Totales", minValue:"0"}, backgroundColor:"#ffffff"});
  }
  
</script>

<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Periodo', 'Usuarios'],
          ['Ma\xf1ana',     <?php  echo $total_ann['manana'];?>],
          ['Tarde',      <?php  echo $total_ann['tarde'];?>]
        ]);

        var options = {
          title: '% Usuarios ',
          colors: ['#891536','orange']

        };

        var chart3 = new google.visualization.PieChart(document.getElementById('piechart'));

        chart3.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Mes', 'Usuarios']
          <?php
          for($i =1; $i <= 12; $i++){
            $fecha = $ann_actual.'-'.$i.'-01';
            $total_mes = calcular_total_mes($fecha);
            if($total_mes['total']>0)
                echo ",['".$meses_arr[$i]."',",$total_mes['total']."]";
          }
          ?>
        ]);

        var options = {
          title: '% Usuarios por mes ',
          pieHole: 0.3,
        };

        var chart4 = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart4.draw(data, options);
      }
    </script>

<?php if($total_ann['total']> 0) {?>
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
                <li class="list-group-item"><b>Total usuarios: <span class="badge"><?php echo $total_ann['total']; ?></span> (<?php echo $total_ann['dias']; ?> d&iacute;as)</b>
                <br>
                Usuarios/d&iacute;a: <span class=""><?php echo floor($total_ann['total']/$total_ann['dias']); ?></span>
                <br>
                    Ma&ntilde;ana: <span class=""><?php echo $total_ann['manana']; ?></span>
                   <br>
                    Tarde: <span class=""><?php echo $total_ann['tarde']; ?></span>
               </li>
                <li class="list-group-item"><b>Total s&aacute;bados: <span class="badge"><?php echo $total_ann['sabados']; ?></span> (<?php echo $total_ann['n_sab']; ?> s&aacute;b.)</b>
                    <br>
                    Usuarios/s&aacute;bado: <span class=""><?php echo floor($total_ann['sabados']/$total_ann['n_sab']); ?></span>
                <br>
                     Ma&ntilde;ana: <span class=""><?php echo $total_ann['sabados_m']; ?></span>
                   <br>
                    Tarde: <span class=""><?php echo $total_ann['sabados_t']; ?></span>
               </li>
                <li class="list-group-item">N Ma&ntilde;anas: <span class="badge"><?php echo $total_ann['n_manana']; ?></span></li>
                <li class="list-group-item">N Tardes: <span class="badge"><?php echo $total_ann['n_tarde']; ?></span></li>
            </ul>
        </td>
    </tr>
</table>
</div>
</div>
    
<div class="panel panel-default" >
    <div class="panel-heading">
    <span class="glyphicon glyphicon-calendar"></span> Porcentaje y usuarios totales por meses en <?php echo $ann_actual; ?>
</div>
<div class="panel-body">
<table width="100%">
    <tr>
        <td style="width: 50%">
             <div id="piechart2" style="width: 100%; height: 400px"></div>
        </td>
        <td>
            <div id="chart_div3" style="width: 100%; height: 400px">
            </td>
    </tr>
</table>
<?php }else{ echo '<h4 class="text-center">Sin datos de este a&ntilde;o.</h4>';}?>
  </div>
</div>
