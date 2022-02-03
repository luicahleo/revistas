<?php
//GESTION DE USUARIOS DADOS DE ALTA

$conn=db_connect();

if (isset($_POST['insertar_usuario'])) {
    $uvus = mysqli_real_escape_string($conn, $_POST['uvus']);
    
    if($uvus)
        $insertar = db_insertar_user($uvus);
    
    
    if ($insertar) {
        $frase = "Los datos se insertaron satisfactoriamente";
        $clases = "alert alert-success";
    } else {
        $frase = "Hubo errores al insertar la informaci&oacute;n. Int&eacute;ntelo de nuevo m&aacute;s tarde";
        $clases = "alert alert-error";
    }
    echo '<div class="' . $clases . '"><a href="#" class="close" data-dismiss="alert">&times;</a>' . $frase . '</div>';
    
} else if (isset($_POST['eliminar_user'])) {
    $id= $_POST['eliminar_user'];
    $eliminar = db_eliminar_user($id);
    if ($eliminar) {
        $frase = "El usuario ha sido eliminado satisfactoriamente";
        $clases = "alert alert-success";
    } else {
        $frase = "Hubo errores al tratar de eliminar al usuario. Int&eacute;ntelo de nuevo m&aacute;s tarde, tenga en cuenta que siempre debe haber <b>como m&iacute;nimo un usuario</b>";
        $clases = "alert alert-error";
    }
    echo '<div class="' . $clases . '"><a href="#" class="close" data-dismiss="alert">&times;</a>' . $frase . '</div>';
}
$usuarios = db_listar_user();
?>

<form id="insertar_user" action="users" method="post" class="form-inline">
    <fieldset>
    <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Datos del nuevo usuarior</h3>
    </div>
    <div class="panel-body form-group">
                  UVUS : 
            <input type="text"  id="uvus" name="uvus"  class="form-control" autofocus="autofocus" />
            

                <button type="submit" class="btn btn-morado" name="insertar_usuario" value="1">
                    <span class="glyphicon glyphicon-user"></span> 
                    Insertar
                </button>


        
    </div>
  </div>



    </fieldset>
    <br/>
    <fieldset>
        
    <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Listado de usuarios</h3>
    </div>
    <div class="panel-body form-group">
    <table class="table table-striped">
            <thead>
                <tr>
                    <!--<th>#</th> -->
                    <th>#</th>
                    <th>UVUS</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>       
                <?php
                foreach ($usuarios as $user) {
                    echo "<tr>";
                    echo "<td>";
                    echo $user['id'];
                    echo "</td>";
                    echo "<td class=\"col-md-8\">";
                    echo $user['uvus'];
                    echo "</td>";
                    echo '<td><span class="text-right">';
                    if($user['uvus'] != $atributos['uid'])
                        echo '<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#eliminar_user_' . $user['id'] . '">
                                 <span class="glyphicon glyphicon-trash"></span> 
                                </button>';
                    
                    echo '</span></td>';
                    ?>
                
                <div class="modal fade" id="eliminar_user_<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title" id="myModalLabel">Confirmar eliminar usuario</h4>
                    </div>
                    <div class="modal-body">
                      <?php echo $user['uvus'];?></span> va a perder sus privilegios de usuario.
                        
                        <button type="submit" class="btn btn-large btn-primary btn-inverse" name="eliminar_user" value="<?php echo $user['id']; ?>">
                            Confirmar
                        </button>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                  </div>
                </div>
              </div>

          <?php
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    </div>
    </fieldset>
                
</form>       
