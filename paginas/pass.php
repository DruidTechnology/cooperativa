<?php

if (isset($_GET['action']) && $_GET['action'] == 'DarBaja') {
		# code...
		$id = $_GET['id'];

		$sql ="UPDATE afiliados SET estadoAfiliado = 0 WHERE id = $id";
		if ($conexion->query($sql) === TRUE) {
			# code...
			echo"<div class='row'>";
			echo"<div class='col-lg-12'>";
			echo"<div class='alert alert-success alert-st-one alert-st-bg '> Dado de Baja Correctamente.";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
	}else{
		$id = $_GET['id'];

		$sql ="UPDATE afiliados SET estadoAfiliado = 1 WHERE id = $id";
		if ($conexion->query($sql) === TRUE) {
			# code...
			echo"<div class='row'>";
			echo"<div class='col-lg-12'>";
			echo"<div class='alert alert-success alert-st-one alert-st-bg '>Dado de Alta Correctamente. ";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
	}
	
?>


<div class="data-table-area mg-b-15">
            <div class="container-fluid">
            
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Listado <span class="table-project-n">de</span> Afiliados</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                <form id="formulario" method="POST" action="">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true"   data-resizable="true">
                                        <thead>
                                            <tr>
                                                
                                                <th data-field="id">ID</th>
                                                <th data-field="usuario" >USUARIO</th>
                                                <th data-field="nombre" >NoMBRE</th>
                                                <th data-field="correo" >CORREO</th>
                                                <th data-field="ultima">ULTIMA SESION</th>
                                                <th data-field="tipo" >ID TIPPO</th>
                                                
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM usuarios";
                                            $resultado = $conexion->query($sql);

                                            if ($resultado->num_rows > 0) {
                                                # code...
                                                while($row = $resultado->fetch_assoc()){
                                                    //var_dump($row);
                                                    
                                                    ?>
                                                
                                                    <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo ''.$row['usuario'].' '.$row['apellidosAfiliado'].''?></td>
                                                <td><?php echo $row['nombre'] ?></td>
                                                <td><?php echo $row['correo']; ?></td>
                                                <td><?php echo $row['last_session']; ?></td>
                                                <td><?php echo $row['password']; ?></td>
                                                
                                                <td>
                                                    <?php 
                                                    if (TRUE) {
                                                        # code...
                                                    ?>
                                                    <button type="button" onclick="putid(this.id)" data-target="#exampleModal2" data-toggle="modal" id="<?php echo $row['id'];?>" class="btn btn-custon-rounded-four btn-success" title="contra">
                                                    <i class="fa fa-level-up"></i></button>
                                                    <button type="button" onclick="putid(this.id)" data-target="#usuario" data-toggle="modal" id="<?php echo $row['id'];?>" class="btn btn-custon-rounded-four btn-success" title="contra">
                                                    USUARIO</button>
                                                    
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <a href="/SACO/listaAfiliados.php?id=<?php echo $row['id'];?>&action=DarAlta" class="btn btn-custon-rounded-four btn-success" title="Dar de Alta">
                                                    <i class="fa fa-level-up"></i></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td> 
                                            </tr>
                                            
                                                    <?php
                                                }
                                            }
                                            
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                        
            </div>
        </div>



<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog" role="document">

                                            
    <div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form id="loginform" class="form-horizontal" role="form" action="guarda_pass.php" method="POST" autocomplete="off">
					
					<input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; ?>" />
					
					<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />
					
					<div class="form-group">
						<label for="password" class="col-md-3 control-label">Nuevo Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
						</div>
					</div>
					
					<div style="margin-top:10px" class="form-group">
						<div class="col-sm-12 controls">
							<button id="btn-login" type="submit" class="btn btn-success">Modificar</a>
						</div>
					</div>   
				</form>
       
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog" role="document">

                                            
    <div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form id="loginform" class="form-horizontal" role="form" action="guarda_user.php" method="POST" autocomplete="off">
					
					<input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; ?>" />
					
					<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />
					
					<div class="form-group">
						<label for="password" class="col-md-3 control-label">USUARIO</label>
						<div class="col-md-9">
							<input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
						</div>
					</div>
					
					
					<div style="margin-top:10px" class="form-group">
						<div class="col-sm-12 controls">
							<button id="btn-login" type="submit" class="btn btn-success">Modificar</a>
						</div>
					</div>   
				</form>
       
      </div>
    </div>
  </div>
</div>



<script>
function putid(id){
    document.getElementById("user_id").value=id;

}
</script>










