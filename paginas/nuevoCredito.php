<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline10-list mg-tb-30 responsive-mg-t-0 table-mg-t-pro-n dk-res-t-pro-0 nk-ds-n-pro-t-0">
                            <div class="sparkline10-hd">
                                <div class="main-sparkline10-hd">
                                    <h1>Busqueda de Afiliado</h1>
                                </div>
                            </div>
                            <form action="/SACO/nuevoCredito.php" method="POST">
                            
                                                <?php
                                                
                                                $month = date('m');
                                                $day = date('d');
                                                $year = date('Y');

                                                $today = $year . '-' . $month . '-' . $day;

                                                $nombre_a = "";
                                                $monto="";
                                                $interes="";
                                                $plazo="";
                                                $fecha="";
                                                $id_Afiliado="";
                                                $tipo="";

                                                if(isset($_POST['id_Afiliado'])){
                                                    $nombre_a=$_POST['nombre_a'];
                                                    $monto=$_POST['monto'];
                                                    $interes=$_POST['interes'];
                                                    $plazo=$_POST['meses'];
                                                    $fecha=$_POST['fechaActual'];
                                                    $tipo=$_POST['tipo'];
                                                    $id_Afiliado=$_POST['id_Afiliado'];
                                                   
                                                    //Arreglo para validacion
                                                    echo $fecha;
                                                    echo $today;
                                                    $campo1= array();
                                                    if ($fecha!=$today) {
                                                        array_push($campo1, "Combruebe su fecha.");
                                                    }
                                                    if ($id_Afiliado == "") {
                                                        # code...
                                                        array_push($campo1, "Selecciona un afiliado.");
                                                    }
                                                    if ($monto == "") {
                                                        # code...
                                                        array_push($campo1, "El campo Monto no puede estar vacio.");
                                                    }
                                                    if ($interes == "") {
                                                        # code...
                                                        array_push($campo1, "El campo Interes no puede estar vacio.");
                                                    }
                                                    if ($plazo == "") {
                                                        # code...
                                                        array_push($campo1, "El campo Plazo de Meses no puede estar vacio.");
                                                    }
                                                    //Mostrar Errores
                                                    if (count($campo1)>0) {
                                                        # code...
                                                        echo"<div class='row'>";
                                                        echo"<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
                                                        echo"<div class='alert alert-danger alert-mg-b alert-st-four alert-st-bg3' role='alert'>";
                                                        for ($i=0; $i <count($campo1) ; $i++) { 
                                                            # code...
                                                            echo "<i class='fa fa-times edu-danger-error admin-check-pro admin-check-pro-clr3' aria-hidden='true'></i>";
                                                            echo $campo1[$i];
                                                            echo "<br>";
                                                        }
                                                    }else{
                                                        $calculo = $monto *($interes/100);
                                                        $sumaInteres = $calculo + $monto;
                                                        $pago = $sumaInteres/$plazo;
                                                        $sqlG="INSERT INTO credito (fechaCredito,monto,tasaInteres,plazo,pagoMensual,id_Afiliado,tipo)
                                                        VALUES('$fecha','$monto','$interes','$plazo','$pago','$id_Afiliado','$tipo')";
                                                         if ($conexion->query($sqlG) === TRUE) {
                                                            echo"<div class='row'>";
                                                            echo"<div class='col-lg-12'>";
                                                            echo"<div class='alert alert-success alert-st-one alert-st-bg '> Datos guardados Correctamente. ";
                                                         }else{
                                                            die("Error al insertar Datos".$conexion->error);
                                                         }

                                                    }
                                                    echo "</div>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                    
                                                }
                                                   
                                                

                                                ?>
                            <div class="sparkline10-graph">
                                <div class="input-knob-dial-wrap">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="chosen-select-single mg-b-20">
                                                <label>Seleccione al Afiliado</label>
                                                <select id="Afiliado" name="Afiliado" class="chosen-select" tabindex="-1" onchange="asignar(this)">
                                                <option value="">Seleccionar</option>
                                                    <?php 
                                                   $sql = "SELECT * FROM afiliados";
                                                    $resultado = $conexion->query($sql);

                                            if ($resultado->num_rows > 0) {
                                                # code...
                                                while($row = $resultado->fetch_assoc()){
                                                    //var_dump($row);
                                                    ?>
                                                        
                                                        <option  value="<?php echo $row['id'].','.$row['nombreAfiliado'].','.$row['apellidosAfiliado'].','.$row['duiAfiliado'].','.$row['nitAfiliado'].','.$row['sueldoAfiliado']?>" ><?php echo $row['nombreAfiliado'].' '. $row['apellidosAfiliado']?></option>
                                                        <?php 
                                                }
                                            }
                                                        ?>
													</select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Nuevo Credito</a></li>
                            </ul>
                            
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                
                                                                <div class="form-group">
                                                                   
                                                                <label>Nombres Afiliado</label>
                                                                    <input value="<?php echo $nombre_a ?>" id="nombre_a" name="nombre_a" type="text" class="form-control" placeholder="Escribe Nombre" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Apellidos Afiliado</label>
                                                                    <input value="<?php echo $apellido_a ?>" id="apellido_a" name="apellido_a" type="text" class="form-control" placeholder="Escriba apellido" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Numero de DUI</label>
                                                                <div class="input-mark-inner mg-b-22">
                                                                <input id="dui_a" name="dui_a" type="text" class="form-control" data-mask="9999999-9" placeholder="" disabled>
                                                                <span class="help-block">9999999-9</span>
                                                            </div>
                                                                </div>
                                                               
                                                                <div class="form-group">
                                                                <label>Numero de NIT</label>
                                                                <div class="input-mark-inner mg-b-22">
                                                                <input id="nit_a" name="nit_a" type="text" class="form-control" data-mask="999-999999-999-9" placeholder="" disabled>
                                                                <span class="help-block">999-999999-999-9</span>
                                                            </div>
                                                                </div>

                                                                <div class="form-group">
                                                                <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                            <div class="input-mask-title">
                                                <label>Sueldo</label>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                            <div class="input-mark-inner mg-b-22">
                                                <input id="sueldo_a" name="sueldo_a" type="text" class="form-control"  placeholder="" disabled onkeyup="calcular();">
                                                <span class="help-block">$ 9,999.99</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <input type="hidden" id="id_Afiliado" name="id_Afiliado">


                                                                <div class="form-group">
                                                                <label>Fecha de Credito</label>
                                                                
                                                                <input type="date" value="<?php echo $today; ?>" class="form-control" id="fechaActual" name="fechaActual" readonly  >

                                                                
                                                                </div>
                                                                <div class="form-group">
                                                        <label>Tipo de Prestamo</label>
                                                        <select class="form-control" name="tipo" id="tipo">
                                                            <option value="none" selected="" disabled="">Seleccione una
                                                                opcion</option>
                                                                <?php 
                                                                $sqltipos = "SELECT * FROM tipoCredito;";
                                                                
                                                                $resultadotipos=$conexion->query($sqltipos);
                                                                while ($row2 = $resultadotipos->fetch_assoc()) {
                                                                    ?>
                                                                    <option value="<?php echo $row2['id']; ?>"  ><?php 
                                                                    
                                                                    echo strtoupper ( $row2['tipo'] )
                                                                    ; ?></option>
                                                             
                                                            
                                                                
                                                                <?php
                                                                   } 
                                                              
                                                            ?>
                                                            
                                            
                                                        </select>
                                                    </div>

                                                                <div class="form-group">
                                                                <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                            <div class="input-mask-title">
                                                <label>Monto Solicitado $</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                            <div class="input-mark-inner mg-b-22">
                                                <input type="number" id="monto" name="monto" min="10" max="10000" class="form-control" placeholder="" onkeyup="calcular();">
                                                <span class="help-block">$ 9,999.99</span>
                                            </div>
                                        </div>
                                    </div>
                                                                </div>
                                                            
                                                                <div class="form-group">
                                                                <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                            <div class="input-mask-title">
                                                <label>Tasa de Interes (%)</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                            <div class="input-mark-inner mg-b-22">
                                                <input type="number" id="interes" name="interes" min="1" max="9" class="form-control"  placeholder="" onkeyup="calcular();">
                                                <span class="help-block"> 9 %</span>
                                            </div>
                                        </div>
                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                            <div class="input-mask-title">
                                                <label>Plazo (Meses) </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                            <div class="input-mark-inner mg-b-22">
                                                <input type="number" id="meses" name="meses" min="6" class="form-control" placeholder="" onkeyup="calcular();">
                                                <span class="help-block"> 99 Meses</span>
                                            </div>
                                        </div>
                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                            <div class="input-mask-title">
                                                <label>Total a Pagar Mensual ($)</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                            <div class="input-mark-inner mg-b-22">
                                                
                                                <span id="total" class="help-block" style="color: black; font-size: 1.5em"></span>
                                            </div>
                                        </div>
                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Asignar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    
                                </form>
                                </div>
                                
                                
                            </div>
                </div>
                <script>
                    window.onload = function(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
  document.getElementById('fechaActual').value=ano+"-"+mes+"-"+dia;
}
                </script>
                <script>
                    function asignar(e){
                        $valor = e.value;
                        $div = $valor.split(',');
                        document.getElementById('id_Afiliado').value=$div['0'];
                        document.getElementById('nombre_a').value=$div['1'];
                        document.getElementById('apellido_a').value=$div['2'];
                        document.getElementById('dui_a').value=$div['3'];
                        document.getElementById('nit_a').value=$div['4'];
                        document.getElementById('sueldo_a').value=$div['5'];
                    }
                </script>
                <script>
                function calcular() {
                    var total = 0;
                    var interes = parseFloat(document.getElementById('interes').value);
                    var meses = parseFloat(document.getElementById('meses').value);
                    var monto = parseFloat(document.getElementById('monto').value);
                    
                    
                    

                        if (isNaN(monto) && isNaN(interes) && isNaN(meses)) {
                            total += 0;
                        } else {

                            var cal = monto *(interes/100);
                            var suma = cal + monto;
                        
                            var total = suma/meses;
                            if (isNaN(total)) {
                                document.getElementById('total').innerHTML = "";
                               
                            }else{
                                total = parseFloat(total).toFixed(2);    
                                document.getElementById('total').innerHTML = total;
                            }
                                
                        
                        }

//alert(total);


}
                </script>
                