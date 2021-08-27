<div id="barralateral">
			<div id="barralateral-arriba">
				<a title="<?php echo gettext('Inicio de la p&aacute;gina') ?>" href="<?php 
						$url = parse_url($_SERVER['REQUEST_URI']); 
						echo($url['path'].'#arriba');?>">
				</a>
			</div>
			<div id="barralateral-abajo">
				<a title="<?php echo gettext('Fin de la p&aacute;gina') ?>" href="<?php 
						$url = parse_url($_SERVER['REQUEST_URI']); 
						echo($url['path'].'#abajo');?>">
				</a>
			</div>
			<div id="barralateral-buscar">
				<a title="<?php echo gettext('Nueva b&uacute;squeda') ?>" href="<?php echo DIRBASE;?>"></a>
			</div>
			<div id="barralateral-lista">
				<a title="<?php echo gettext('Men&uacute; exportaci&oacute;n') ?>" href="<?php echo DIRBASE.LISTA.'/';?>"></a>
			</div>
			<div id="barralateral-historial">
				<a title="<?php echo gettext('Historial') ?>" href="<?php echo DIRBASE.PESTANA3.'/';?>"></a>
			</div>
</div>
