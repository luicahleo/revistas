<div class="panel-group" id="accordion" >
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    <span class="glyphicon glyphicon-home"></span> Bibliotecas
             </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse <?php if($pagina== PAG_BIBLIOTECAS || $pagina==PAG_BIBLIOTECAS_INSERTAR || $pagina==PAG_BIBLIOTECAS_LISTADO) echo 'in'; ?>">
            <div class="panel-body">
                <a href="bibliotecas/add" class="morado">
                    <span class="glyphicon glyphicon-plus-sign"></span>  
                    A&ntilde;adir</a>
                <br>
                <a href="bibliotecas/listado" class="morado">
                    <span class="glyphicon glyphicon-list-alt"></span>
                    Listado Completo</a>
                <br>
                <a href="bibliotecas/estadisticas" class="morado">
                    <span class="glyphicon glyphicon-dashboard"></span>  
                    Estadisticas</a>
            </div>
        </div>
    </div>
</div>