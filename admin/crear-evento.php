<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';

?>





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear evento
        <small>completa el formulario para crear un nuevo evento</small>
      </h1>
      
    </section>
      <div class="row">
        <div class="col-md-8">
        <!-- Main content -->
        <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Crear Evento</h3>

            
          </div>
          <div class="box-body">
          <form role="form" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-evento.php">
                <div class="box-body">
                  <div class="form-group">
                    <label for="evento">Titulo evento:</label>
                    <input name="titulo_evento" type="text" class="form-control" id="titulo_evento">
                  </div>
                  <div class="form-group">
                      <label for="nombre">Categoria:</label>
                      <select name="categoria_evento" class="form-control seleccionar">
                        <option value="0">- Seleccione -</option>
                        <?php 
                          try {
                            $sql = "SELECT * FROM categoria_evento";
                            $resultado = $conn->query($sql);
                            while ($cat_evento = $resultado->fetch_assoc()) { 
                        ?>
                            <option value="<?php echo $cat_evento['id_categoria']; ?>">
                              <?php echo $cat_evento['cat_evento']; ?>
                            </option>
                        <?php }
                          } catch (Exception $e) {
                            echo "Error" . $e->getMessage();
                          }
                        ?>
                      </select>
                  </div>
                  <div class="form-group">
                    <label>Fecha evento:</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                      <input type="text" class="form-control pull-right" id="fecha" name="fecha_evento">
                    </div>
                  </div>
                  <!-- time Picker -->
                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Hora evento:</label>

                      <div class="input-group">
                        <input type="text" class="form-control timepicker" name="hora_evento">

                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="nombre">Invitado o ponente:</label>
                      <select name="invitado" class="form-control seleccionar">
                        <option value="0">- Seleccione -</option>
                        <?php 
                          try {
                            $sql = "SELECT invitado_id, nombre_invitado, apellido_invitado FROM invitados";
                            $resultado = $conn->query($sql);
                            while ($invitados = $resultado->fetch_assoc()) { 
                        ?>
                            <option value="<?php echo $invitados['invitado_id']; ?>">
                              <?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?>
                            </option>
                        <?php }
                          } catch (Exception $e) {
                            echo "Error" . $e->getMessage();
                          }
                        ?>
                      </select>
                  </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <input type="hidden" name="registro" value="nuevo">
                  <button type="submit" class="btn btn-primary">Añadir</button>
                </div>
              </form>
          </div>
          <!-- /.box-body -->
          
        </div>
        <!-- /.box -->

        </section>
        <!-- /.content -->
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

<?php

include_once 'templates/footer.php';

?>
