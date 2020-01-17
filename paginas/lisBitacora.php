       
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
            
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Listado <span class="table-project-n">de</span> Acciones.</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                <form id="formulario" method="POST" action="">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true"   data-resizable="true">
                                        <thead>
                                            <tr>
                                                
                                                <th data-field="id">ID</th>
                                                <th data-field="Nombre" >NOMBRE</th>
                                                <th data-field="dui" >Accion</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM bitacora";
                                            $resultado = $conexion->query($sql);

                                            if ($resultado->num_rows > 0) {
                                                # code...
                                                while($row = $resultado->fetch_assoc()){
                                                    //var_dump($row);
                                                    
                                                    ?>
                                                
                                                    <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['usuario']?></td>
                                                <td><?php echo $row['Accion'] ?></td>
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