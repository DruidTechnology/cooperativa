        <!-- Static Table Start -->
        <?php 
        if (isset($_GET['action']) && $_GET['action'] == 'Pagar') {
            
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
        }
        
        
        if (isset($_POST['idAfiliado']) ) {
            $monto = $_POST['monto'];
            $succes = 0;

            $meses = "";
            $pago=  $_POST['totalPago'];
            $pagos = array();
            $meses=$_POST['selectedMeses'];
            $cuota = 5;
            
            $numero_meses = sizeof($meses);
            # code...
            

            $id_a = $_POST['idAfiliado'];
            $checkear_meses = 1;
            $todays_date = date("Y-m-d");
            $lastPayment  = "";
            if ($meses == "") {
                $checkear_meses = 0;
            }
            
            for ($i=0; $i < $numero_meses ; $i++) {
                $mes_acutal = strtotime($meses[$i]);
               
                if (date("Y-m-d", strtotime("+1 month +15 days",$mes_acutal)) < $todays_date ) {
                    # code...
                   
                    array_push($pagos,$cuota + $cuota*0.07);
                     
                }else{
                   
                    array_push($pagos,$cuota);
                    
                }
              
                if ($meses[$i+1] != "") {
                    # code...                        
                    $mes_acutal = strtotime($meses[$i]);
                    $mes_siguiente = strtotime($meses[$i+1]);
                    
                    if (date("Y-m-d", strtotime("+1 month",$mes_acutal))  == date('Y-m-d',$mes_siguiente)) {
                        
                        # code...
                        $checkear_meses =1;
                    }
                    else{
                        $checkear_meses =0;
                        $i = $numero_meses;
                    }
         
                }
            }
            if (Is_Numeric($monto)) {
            
            }else{
                $checkear_meses = 0;
            }
            $sum_pagos = array_sum($pagos);
            $monto2 =  strval( $monto);
            $sum_pagos2 =  strval( $sum_pagos);
           $pago2 =  strval( $pago);
            
            if ( $sum_pagos2 != $pago2 ) {
                $checkear_meses = 0;
                
            }
            if ($monto2 >= $sum_pagos2) {
               
            }else{

                $checkear_meses = 0;
            }
  
            
            $cambio = $monto-$pago;
            if ($checkear_meses == 1) {
                $pagado_p = 1;
                $sqlP ="INSERT INTO pago(mesPago,annioPago,pagado,id_Afiliado,id_cuota) VALUES";
               
              //  echo $numero_querys_p;
                for($i = 0;$i <$numero_meses;$i++){
                    
                    $date = strtotime($meses[$i]);
                    $mes_p = date("F",$date); 
                    $annio_p = date("Y",$date);
                    
                    if($i+1 <$numero_meses){
                        $sqlP = $sqlP . "('$mes_p','$annio_p','$pagado_p','$id_a','$pagado_p')" . ",";
                    }else{
                        $sqlP = $sqlP . "('$mes_p','$annio_p','$pagado_p','$id_a','$pagado_p')";
                    }
                    
                     
    
                }
              
         
                $sqlP = $sqlP . ";";
               
                if ($conexion->query($sqlP) === TRUE) {
                    $a_name ="";
                    $a_lastname ="";
                    $a_res = "";
                    $getclient = "SELECT * FROM afiliados a WHERE a.id=$id_a";
                    $a_res = $conexion->query($getclient);
                    if ($a_res->num_rows > 0) {
               
                        # code...
                        while($row = $a_res->fetch_assoc()){
                            
                            $a_name = $row['nombreAfiliado'];
                            $a_lastname = $row['apellidosAfiliado'];
                            
                        }
                         
                    
                    }
                    $fullname = $a_name . $a_lastname;
                    $bill_date = date("d-m-Y H:i:s");
        
                    # code...
                    echo"<div class='row'>";
                    echo"<div class='col-lg-12'>";
                    echo"<div class='alert alert-success alert-st-one alert-st-bg '> Pago Correcto.";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div id='totalfact'>";
                    echo"<div class='row'>";
                    echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
                    echo "                        <div id ='factContainer'>";
                    echo "                <div id='factura'>  "   ;               
                    echo "                <h3>SACO</h3>";
                    echo "                <table class='table'>";
                    echo "                    <tr>";
                    echo "                        <th>Cliente: </th>";
                   
                    echo "                        <td>$fullname</td>";
                    
                    echo "                    </tr>";
                    echo "                    <tr>";
                    echo "                        <th>ID:</th>";
                    echo "                        <td>$id_a</td>";
                    
                    echo "                    </tr>";
                    echo "                    <tr>";
                    echo "                        <th>Fecha de Pago:</th>";
                    echo "                        <td>$bill_date</td>";
                    
                    echo "                    </tr>";

                    
                    echo "                </table>";
                    echo "                <table class='table'>";
                    echo "                <thead>";
                    echo "                    <tr>";
                    echo "                    <th scope='col'>Cuota</th>";
                    echo "                    <th scope='col'>Fecha</th>";
                    echo "                    <th scope='col'>mora</th>";
                    echo "                    <th scope='col'>Total</th>";
                    echo "                    </tr>";
                    echo "        </thead>";
                    echo "        <tbody>";
                   
                      
                    for ($i=0; $i < $numero_meses; $i++) { 
                        $mora = "0";
                        
                        if ($pagos[$i] > "5") {
                            $mora = "0.35"; 
                            # code...
                        }else{
                          
                        }
                        $pagop = $pagos[$i];
                        $pagop = number_format($pagop, 2, '.', '');

                        
                        $datep =   date("d-m-Y",strtotime($meses[$i]));
                                echo "                <tr>";
                            echo "                    <td>5</td>";
                            echo "                    <td>$datep</td>";
                            echo "                    <td>$mora</td>";
                            echo "                    <td>$pagop</td>";
                            echo "                </tr>";
                        # code...
                    }
                    $pago = number_format($pago, 2, '.', '');
                    $monto = number_format($monto, 2, '.', '');
                    $cambio = number_format($cambio, 2, '.', '');
                    echo "                <tr>";
                    echo" <th colspan='3'scope='row'>Total a Pagar</th>";
                    echo "<td >$pago</td>";
                    
                    echo "                </tr>";
                    echo "                <tr>";
                    echo" <th colspan='3'scope='row'>Pago</th>";
                    echo "<td >$monto</td>";
                    
                    echo "                </tr>";
                    echo "                <tr>";
                    echo" <th colspan='3'scope='row'>Cambio</th>";
                    echo "<td >$cambio</td>";
                    
                    echo "                </tr>";
                    echo "                </tbody>";
                    echo "                </table>";
                    echo "            </div>";
                    echo "           </div>";
                    echo "<button type='button' class='btn btn-info' onclick='PrintElem(this)'>Imprimir</button>";
                    echo "<button type='button' class='btn btn-warning' onclick='delFact(this)'>Cerrar</button>";
                    echo "           </div>";
                    echo "           </div>";
                    echo "           </div>";
                    
                    $succes = 1;
                    

                }else{
                //     echo $sqlP;
                    die("Error no guarda".$conexion->error);
                }
    
                # code...
            
                 
                
            }else{
                echo"<div class='row'>";
                echo"<div class='col-lg-12'>";
                echo"<div class='alert alert-warning alert-st-one alert-st-bg '> Pago Incorrecto.";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
  
            }
           
            }
          

        ?>

<nav class="nav">

  <div class="btn btn-primar payment-adress" id="myTabedu1">
            <a class="nav-link " href="#aldia">Al Dia</a>
    </div>
    <div class="btn btn-primar payment-adress" id="myTabedu1">
            <a class="nav-link " href="#mora">Mora</a>
    </div>
    <div class="btn btn-primar payment-adress" id="myTabedu1">
            <a class="nav-link " href="#incobrable">incobrable</a>
    </div>

</nav>


<div id="myTabContent" class="tab-content custom-product-edit">
    <div class="product-tab-list tab-pane fade active in" id="aldia">

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
                                                <th data-field="Nombre" >NOMBRE COMPLETO</th>
                                                <th data-field="dui" >DUI</th>
                                                <th data-field="nit" >NIT</th>
                                                <th data-field="cargo">CARGO</th>
                                                <th data-field="profesion" >PROFESION</th>
                                                <th data-field="sueldo" >SUELDO</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql="SELECT a.*  FROM afiliados a LEFT JOIN pago p ON p.id_afiliado = a.id WHERE
                                            DATE_ADD(
                                             IFNULL(
                                                 (SELECT MAX(STR_TO_DATE(CONCAT('15,',p.mespago, ',', p.anniopago),'%d,%M,%Y'))FROM afiliados aa LEFT JOIN pago p ON p.id_afiliado = aa.id WHERE aa.id =a.id)
                                                 , STR_TO_DATE(CONCAT(a.fechaIngreso),'%m/%d/%Y')),INTERVAL +2 MONTH ) + INTERVAL 15 DAY 
                                            
                                             >=  CURRENT_DATE()
                                                                                group by a.id;";
                                            
                                            $resultado = $conexion->query($sql);
                                            

                                            if ($resultado->num_rows > 0) {
                                                # code...
                                                while($row = $resultado->fetch_assoc()){
                                                    //var_dump($row);
                                                    
                                                    ?>
                                                
                                                    <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo ''.$row['nombreAfiliado'].' '.$row['apellidosAfiliado'].''?></td>
                                                <td><?php echo $row['duiAfiliado'] ?></td>
                                                <td><?php echo $row['nitAfiliado']; ?></td>
                                                <td><?php echo $row['cargoAfiliado']; ?></td>
                                                <td><?php echo $row['profesionAfiliado']; ?></td>
                                                <td><?php echo '$ '. $row['sueldoAfiliado']; ?></td>
                                                <td>
                                                    <?php 
                                                    if ($row['estadoAfiliado'] == '1') {
                                                        # code...
                                                    ?>
                                               
                                                    <button type="button" onclick="fill(this.id)" data-target="#exampleModal" data-toggle="modal" id="<?php echo $row['id'];?>" class="btn btn-custon-rounded-four btn-success" title="Pagar">
                                                    PAGAR</button>
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
    </div>

    <div class="product-tab-list tab-pane fade" id="mora">
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
                                                <th data-field="Nombre" >NOMBRE COMPLETO</th>
                                                <th data-field="dui" >DUI</th>
                                                <th data-field="nit" >NIT</th>
                                                <th data-field="cargo">CARGO</th>
                                                <th data-field="profesion" >PROFESION</th>
                                                <th data-field="sueldo" >SUELDO</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql ="SELECT a.* , DATE_ADD(
                                                IFNULL(
                                                    (SELECT MAX(STR_TO_DATE(CONCAT('15,',p.mespago, ',', p.anniopago),'%d,%M,%Y'))FROM afiliados aa LEFT JOIN pago p ON p.id_afiliado = aa.id WHERE aa.id =a.id)
                                                    , STR_TO_DATE(CONCAT(a.fechaIngreso),'%m/%d/%Y')),INTERVAL +2 MONTH ) + INTERVAL 15 DAY  FROM afiliados a LEFT JOIN pago p ON p.id_afiliado = a.id WHERE
                                               DATE_ADD(
                                                IFNULL(
                                                    (SELECT MAX(STR_TO_DATE(CONCAT('15,',p.mespago, ',', p.anniopago),'%d,%M,%Y'))FROM afiliados aa LEFT JOIN pago p ON p.id_afiliado = aa.id WHERE aa.id =a.id)
                                                    , STR_TO_DATE(CONCAT(a.fechaIngreso),'%m/%d/%Y')),INTERVAL +2 MONTH ) + INTERVAL 15 DAY 
                                               
                                                <  CURRENT_DATE() AND 
                                                DATE_ADD(
                                                IFNULL(
                                                    (SELECT MAX(STR_TO_DATE(CONCAT('15,',p.mespago, ',', p.anniopago),'%d,%M,%Y'))FROM afiliados aa LEFT JOIN pago p ON p.id_afiliado = aa.id WHERE aa.id =a.id)
                                                    , STR_TO_DATE(CONCAT(a.fechaIngreso),'%m/%d/%Y')),INTERVAL +1 YEAR ) 
                                                
                                                >= CURRENT_DATE()
                                                                                   group by a.id;";
                                            $resultado = $conexion->query($sql);

                                            if ($resultado->num_rows > 0) {
                                                # code...
                                                while($row = $resultado->fetch_assoc()){
                                                    //var_dump($row);
                                                    
                                                    ?>
                                                
                                                    <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo ''.$row['nombreAfiliado'].' '.$row['apellidosAfiliado'].''?></td>
                                                <td><?php echo $row['duiAfiliado'] ?></td>
                                                <td><?php echo $row['nitAfiliado']; ?></td>
                                                <td><?php echo $row['cargoAfiliado']; ?></td>
                                                <td><?php echo $row['profesionAfiliado']; ?></td>
                                                <td><?php echo '$ '. $row['sueldoAfiliado']; ?></td>
                                                <td>
                                                    <?php 
                                                    if ($row['estadoAfiliado'] == '1') {
                                                        # code...
                                                    ?>
                                               
                                                    <button type="button" onclick="fill(this.id)" data-target="#exampleModal" data-toggle="modal" id="<?php echo $row['id'];?>" class="btn btn-custon-rounded-four btn-success" title="Pagar">
                                                    PAGAR</button>
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
    </div>
        <!-- Static Table End -->
    <div class="product-tab-list tab-pane fade" id="incobrable">
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
                                                <th data-field="Nombre" >NOMBRE COMPLETO</th>
                                                <th data-field="dui" >DUI</th>
                                                <th data-field="nit" >NIT</th>
                                                <th data-field="cargo">CARGO</th>
                                                <th data-field="profesion" >PROFESION</th>
                                                <th data-field="sueldo" >SUELDO</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql ="SELECT a.*  FROM afiliados a LEFT JOIN pago p ON p.id_afiliado = a.id WHERE
                                            DATE_ADD(
                                            IFNULL(
                                                (SELECT MAX(STR_TO_DATE(CONCAT('15,',p.mespago, ',', p.anniopago),'%d,%M,%Y'))FROM afiliados aa LEFT JOIN pago p ON p.id_afiliado = aa.id WHERE aa.id =a.id)
                                                , STR_TO_DATE(CONCAT(a.fechaIngreso),'%m/%d/%Y')),INTERVAL +1 YEAR ) 
                                            
                                            < CURRENT_DATE()
                                                                               group by a.id;";
                                            $resultado = $conexion->query($sql);

                                            if ($resultado->num_rows > 0) {
                                                # code...
                                                while($row = $resultado->fetch_assoc()){
                                                    //var_dump($row);
                                                    
                                                    ?>
                                                
                                                    <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo ''.$row['nombreAfiliado'].' '.$row['apellidosAfiliado'].''?></td>
                                                <td><?php echo $row['duiAfiliado'] ?></td>
                                                <td><?php echo $row['nitAfiliado']; ?></td>
                                                <td><?php echo $row['cargoAfiliado']; ?></td>
                                                <td><?php echo $row['profesionAfiliado']; ?></td>
                                                <td><?php echo '$ '. $row['sueldoAfiliado']; ?></td>
                                                <td>
                                                    <?php 
                                                    if ($row['estadoAfiliado'] == '1') {
                                                        # code...
                                                    ?>
                                               
                                                    <button type="button" onclick="fill(this.id)" data-target="#exampleModal" data-toggle="modal" id="<?php echo $row['id'];?>" class="btn btn-custon-rounded-four btn-success" title="Pagar">
                                                    PAGAR</button>
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
    </div>

</div>    


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog" role="document">

                                            
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PAGO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  id="formPago"action="/SACO/pagocuotas.php" onsubmit="return validateForm()" enctype="multipart/form-data" method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cliente ID:</label>
            <input type="text" name="idAfiliado" class="form-control" value=""id="modalte" readonly>
          </div>
          <div class="form-group">
                
                <select id="select_meses"  onchange="validateSelects()" name="selectedMeses[]" class="form-control" required multiple>
                
                </select>
          </div>
                                            
          
          <div class="modal-footer">
        <h4>TOTAL</h4>
        <h3 id = "totalPago2">0</h3>
        <input type="hidden" name="totalPago" id="totalPago" value="0"> 
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-target="#exampleModal2" data-toggle="modal">Pagar</button>
      </div> 
      </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog" role="document">

                                            
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PAGO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Clisadsadente ID:</label>
            <input type="text" name="monto" class="form-control"  value=""id="monto" onchange="setTwoNumberDecimal(this)"  form="formPago" required>
          </div>
          <div class="form-group">
    
          </div>
                                            
          
          <div class="modal-footer">
        <h4>TOTAL</h4>
        <h3 id = "totalPago3">0</h3>
     
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit"  form="formPago" class="btn btn-primary">Pagar</button>
     
      </div> 
       
      </div>
    </div>
  </div>
</div>



  

<script> 
function setTwoNumberDecimal(monto) {
    console.log(monto.value);
    var reg = "^[0-9]+(\.[0-9]{1,2})?$";
    var regex = new RegExp(reg);
    if (!(regex.test(monto.value))) {
        if (isNaN(monto.value)) {
            monto.value = "";
        }else{
            if (monto.value <= 0) {
                monto.value = monto.value*-1;
                
            }
            monto.value = parseFloat(monto.value).toFixed(2);
        }
        
        
    }
    
}
   var array_pagos_monto = [];
    function calcPagos(fecha) {
        var nowss = new Date();
            if (fecha) {
                var check_mora_date = new Date(fecha);
                    cuota = 5;
                    check_mora_date.setDate(check_mora_date.getDate() + 15);
                    check_mora_date.setMonth(check_mora_date.getMonth() + 1);
                   // console.log(check_mora_date);
                  //  console.log(nowss);
                    if(check_mora_date < nowss){
                        array_pagos_monto.push(cuota + cuota*0.07);
                    }else{
                        array_pagos_monto.push(cuota);
                    }
            }                    
    }
    function validateSelects() {
        var selecteds =[];
        var lst;
        var total = 0;
        selecteds = document.getElementById('select_meses').getElementsByTagName('option');
        for(i=0; i < selecteds.length; i++){
            if(selecteds[i].selected){
                lst = selecteds[i].index;
            }
        }
        for (let i = 0; i <= lst ; i++) {
            selecteds[i].selected = true;
            total += array_pagos_monto[i];
           // console.log(array_pagos_monto);
            
            total =Math.round(total * 100) / 100 
            
        }
        
        h3_pago = document.getElementById("totalPago2");
        h3_pagom = document.getElementById("totalPago3");
        
        
        
        document.getElementById("totalPago").value = total;
        h3_pago.innerHTML = total;
        h3_pagom.innerHTML = total;
    }
    var temp = { annio: 2019,   
        mes:6,   
        day:8
    };


function validateForm(){

  
    return true;
}    
function countmeses(fecthmeses,fecha_act) {
    let array = [];
   
    
    console.log(fecha_act);
    
    fecthmeses.forEach(element => {
        
        let temp2  =  new Date(Date.parse(`${element.mesPago} 15, ${element.annioPago}`));
        
        let push = {
            annio: temp2.getFullYear(),
            mes: temp2.getMonth(),
            day: temp2.getDate()
        }
        array.push(push);      
    });
   
    var fecha_activacion  =  new Date(Date.parse(fecha_act));
    var fecha_iniciopagos = fecha_activacion;
   // fecha_iniciopagos.setMonth(fecha_activacion.getMonth()+1);
    fecha_iniciopagos.setDate(15);
    var now= new Date();
   // console.log(now);
    console.log(fecha_iniciopagos);
    
    
    let mesesp = [];
    var contmes = fecha_iniciopagos.getMonth();
    now.setDate(15);
    now.setHours(0,0,0,0)


    while (fecha_iniciopagos <= now) {
        if (contmes > 11) {
            contmes = 0;
        }
        
         temp.annio =fecha_iniciopagos.getFullYear()  // property_# may be an identifier...
                     temp.mes=fecha_iniciopagos.getMonth()  // or a number...
                        temp.day=15
            
            
             contmes++;
             fecha_iniciopagos.setMonth(fecha_iniciopagos.getMonth()+1);     
            // console.log(contmes);
             
             console.log(fecha_iniciopagos);
        let push = {
            annio: temp.annio,
            mes: temp.mes,
            day: temp.day
        }
      //  console.log(push); 
        mesesp.push(push);     
    }
    for (let i = 0; i < array.length; i++) {
        for (let j = 0; j < mesesp.length; j++) {
         
            if (JSON.stringify(mesesp[j]) === JSON.stringify(array[i]) ) {
                mesesp.splice(j, 1);
            }
            
        }
            
    }
 
    return mesesp;
    
}
function fill(id){
    
    $('#modalte').val(id);
    getMesesP(id);
}
function getMesesP(id) {
    var fecha_activacion_a="";
    var url = `/SACO/fetch.php?id=${id}&action=retraer`;
    var fecha_activacion_url = `/SACO/fetch.php?id=${id}&action=fechaActivacion`;
    fetch(fecha_activacion_url)
        .then(function (response) {
            return response.text();
        }).then(function (bodys) {
            fecha_activacion_a = bodys;
            console.log(fecha_activacion_a);
            
            fetch(url).then(function (response) {
     
                return response.text();
            })
            .then(function (body) {
            
                
                
                
                var pagos = JSON.parse(body);
              
                
                var mesesapagar = countmeses(pagos,fecha_activacion_a);
              
                var sel = document.getElementById('select_meses');
                sel.innerHTML = '';
              //  console.log(mesesapagar);
                
                for (let index = 0; index < mesesapagar.length; index++) {
                   
                    
                    let annio = mesesapagar[index].annio;
                    let mes = mesesapagar[index].mes;
                    let date = new Date(Date.parse(`${mes+1}/15/${annio}`)); 
                    calcPagos(date)
                    let month = date.toLocaleString('default', { month: 'long' });
                    
                    
                    var opt = document.createElement('option');
          
                    opt.appendChild( document.createTextNode(`${month}/${annio}`) );
        
                    opt.value = `${mes+1}/15/${annio}`;
                    sel.appendChild(opt);  
             
                
                
            }
       
        });
       
    });



}
</script> 
    <script type="text/javascript">
    
    function modal() {
       
        $('#myModal').modal('show');
  
    }

    function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
  //  mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById("factura").innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}
function delFact() {
    document.getElementById("totalfact").remove();
    
    
}
  
    window.onload = modal
</script>
    