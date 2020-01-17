<?php 
        if (isset($_GET['action']) && $_GET['action'] == 'DarBaja') {
            # code...
            $id = $_GET['id'];

            $sql ="UPDATE usuarios SET activacion = 0 WHERE id = $id";
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

            $sql ="UPDATE usuarios SET activacion = 1 WHERE id = $id";
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
                                    <h1>Listado <span class="table-project-n">de</span> Usuarios.</h1>
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
                                                <th data-field="nombre" >NOMBRE</th>
                                                <th data-field="correo" >CORREO</th>
                                                <th data-field="acciones" >ACCIONES</th>
                                                
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
                                                <td><?php echo $row['usuario']?></td>
                                                <td><?php echo $row['nombre'] ?></td>
                                                <td><?php echo $row['correo'] ?></td>
                                                <td>
                                                    <?php 
                                                    if ($row['activacion'] == '1') {
                                                        # code...
                                                    ?>
                                                <a href="/SACO/listadoUsuario.php?id=<?php echo $row['id'];?>&action=DarBaja" class="btn btn-custon-rounded-four btn-danger" title="Dar de Baja">
                                                    <i class="fa fa-ban"></i></a>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <a href="/SACO/listadoUsuario.php?id=<?php echo $row['id'];?>&action=DarAlta" class="btn btn-custon-rounded-four btn-success" title="Dar de Alta">
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
        <!-- Static Table End -->