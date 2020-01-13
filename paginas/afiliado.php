
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-payment-inner-st">
        <ul id="myTabedu1" class="tab-review-design">
            <li class="active"><a href="#description">Registro de Afiliados</a></li>
            
        </ul>
        
        <form action="/SACO/" enctype="multipart/form-data" method="POST">
        <?php
    
        //Declaracion de todas las variables
        $nombre_a="";
        $apellido_a="";
        $dui_a="";
        $nit_a="";
        $fecha_a="";
        $fotoDUI_a="";
        $fotoNit_a="";
        $estadoCivil_a="";
        $cargo_a="";
        $sueldo_a="";
        $direccion_a="";
        $nacionalidad_a="";
        $profesion_a="";
        $contacto_a="";
        $dateNow_a = "";
        $nombre_b="";
        $parentesco_b="";
        $porcentaje_b="";
        $contacto_b="";
        
        
        
        $mesPago_p = "";
        $annioPago_p = "";
        $pagado_p = "";


        if(isset($_POST['nombre_a'])){
           // echo "<script type=\"text/javascript\">alert(\"Fotos guardadas\");</script>"; 
            //Asignacion de valores de POST
            $nombre_a=$_POST['nombre_a'];
            $apellido_a=$_POST['apellido_a'];
            $dui_a=$_POST['dui_a'];
            $nit_a=$_POST['nit_a'];
            $fecha_a=$_POST['fecha_a'];
            $fotoDui_a=$_FILES['fotoDui_a'];
            $fotoNit_a=$_FILES['fotoNit_a'];
            $estadoCivil_a=$_POST['estadoCivil_a'];
            $cargo_a=$_POST['cargo_a'];
            $sueldo_a=$_POST['sueldo_a'];
            $direccion_a=$_POST['direccion_a'];
            $nacionalidad_a=$_POST['nacionalidad_a'];
            $profesion_a=$_POST['profesion_a'];
            $contacto_a=$_POST['contacto_a'];
            $dateNow_a = date("m/d/Y");
            $nombre_b=$_POST['nombre_b'];
            $parentesco_b=$_POST['parentesco_b'];
            $porcentaje_b=$_POST['porcentaje_b'];
            $contacto_b=$_POST['contacto_b'];
                                    
            $mesPago_p = date("F");
            $annioPago_p = date("Y");
            $pagado_p = 1;
            //limite de archivo
            $limite_kb = 200;

            //Arreglo para validacion
            $campo= array();
            
            $numeroBeneficiarios = sizeof($nombre_b);
            
            if ( !((sizeof($nombre_b) == sizeof($contacto_b)) && (sizeof($contacto_b) ==sizeof($porcentaje_b)) && (sizeof($porcentaje_b) == sizeof($parentesco_b)))) {

                # code...
                array_push($campo, "El Beneficiario No Puede Estar Vacio.");
            }
            
            if ($nombre_a == "") {
                # code...
                array_push($campo, "El Campo Nombre No Puede Estar Vacio.");
            }
            if ($fecha_a == "") {
                # code...
                array_push($campo, "Seleccione una fecha.");
            }
            if ($apellido_a == "") {
                # code...
                array_push($campo, "El Campo Apellido No Puede Estar Vacio.");
            }

            if ($dui_a == "") {
                # code...
                array_push($campo, "El Campo DUI No Puede Estar Vacio.");
            }

            if ($nit_a == "") {
                # code...
                array_push($campo, "El Campo NIT No Puede Estar Vacio.");
            }
           
            if ($_FILES['fotoDui_a']['error']>0 || $_FILES['fotoDui_a']['size']<=$limite_kb * 1024) {
                # code...
                array_push($campo, "El Campo Archivo DUI No Puede Cargar o el archivo sobrepasa el limite de carga.");
            }

            if ($_FILES['fotoNit_a']['error'] >0 || $_FILES['fotoDui_a']['size']<=$limite_kb * 1024) {
                # code...
                array_push($campo, "El Campo Archivo NIT No Puede Cargar o el archivo sobrepasa el limite de carga.");
            }

            if ($estadoCivil_a == "") {
                # code...
                array_push($campo, "Selecione un Estado Civil.");
            }

            if ($cargo_a == "") {
                # code...
                array_push($campo, "Selecione un Cargo.");
            }

            if ($sueldo_a == "") {
                # code...
                array_push($campo, "Ingrese un Sueldo.");
            }
            if ($direccion_a == "") {
                # code...
                array_push($campo, "El Campo Direccion No Puede Estar Vacio.");
            }
            if ($nacionalidad_a == "") {
                # code...
                array_push($campo, "El Campo Nacionalidad No Puede Estar Vacio.");
            }
            if ($profesion_a == "") {
                # code...
                array_push($campo, "El Campo Profesion No Puede Estar Vacio.");
            }
            if ($contacto_a == "") {
                # code...
                array_push($campo, "El Campo Contacto No Puede Estar Vacio.");
            }
                
                foreach( $nombre_b as $key) {
                    
                    if ($key == "") {
                        # code...
                        array_push($campo, "El Campo Nombre Beneficiario No Puede Estar Vacio.");
                    }
                    
                }
                if ($nombre_b == "") {
                    # code...
                    array_push($campo, "El Campo Nombre Beneficiario No Puede Estar Vacio.");
                }
                foreach( $parentesco_b as $key) {
                    
                    if ($key=="") {
                        # code...
                        array_push($campo, "El Campo Parentesco Beneficiario No Puede Estar Vacio.");
                    }
                    
                }
                if ($parentesco_b == "") {
                    # code...
                    array_push($campo, "El Campo Parentesco Beneficiario No Puede Estar Vacio.");
                }
                $contador_porcentaje = 0;
                foreach( $porcentaje_b as $key) {
                    
                    if ($key == "") {
                        # code...
                        array_push($campo, "El Campo Procentaje Beneficiario No Puede Estar Vacio.");
                    }else{
                        $contador_porcentaje += $key;
                    }
                    
                }
                if ($contador_porcentaje>1000) {
                    # code...
                    array_push($campo, "El Campo Procentaje Beneficiario No Puede Estar Vacio.");

                }
                
                
                if ($porcentaje_b== "") {
                    # code...
                    array_push($campo, "El Campo Procentaje Beneficiario No Puede Estar Vacio.");
                }
                foreach( $contacto_b as $key) {
                    
                    if ($key=="") {
                        # code...
                        array_push($campo, "El Campo Contacto Beneficiario No Puede Estar Vacio.");
                    }
                    
                    
                }
                if ($contacto_b == "") {
                    # code...
                    array_push($campo, "El Campo Contacto Beneficiario No Puede Estar Vacio.");
                }


            if ($dateNow_a == "") {
                # code...
                array_push($campo, "El Campo Fecha de Registro No Puede Estar Vacio.");
            }

            if ($mesPago_p == "") {
                # code...
                array_push($campo, "El Campo Mes de Pago No Puede Estar Vacio.");
            }

            if ($annioPago_p == "") {
                # code...
                array_push($campo, "El Campo Año de Pago No Puede Estar Vacio.");
            }

            

            //Mostrar Errores
            if (count($campo)>0) {
                # code...
                echo"<div class='row'>";
                echo"<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>";
                echo"<div class='alert alert-danger alert-mg-b alert-st-four alert-st-bg3' role='alert'>";
                for ($i=0; $i <count($campo) ; $i++) { 
                    # code...
                    echo "<i class='fa fa-times edu-danger-error admin-check-pro admin-check-pro-clr3' aria-hidden='true'></i>";
                    echo $campo[$i];
                    echo "<br>";
                }
            }else{
                //$fecha_a = explode('-',$nit_a);
                //echo "<script type=\"text/javascript\">alert(\"".$fecha_a['1']."\");</script>"; 
                $sql="INSERT INTO afiliados(nombreAfiliado,apellidosAfiliado,duiAfiliado,NitAfiliado,fechaNacimientoAfiliado,
                estadoCivilAfiliado,cargoAfiliado,sueldoAfiliado,direccionAfiliado,nacionalidadAfiliado,profesionAfiliado,
                contactoAfiliado,estadoAfiliado,fechaIngreso)
                VALUES('$nombre_a','$apellido_a','$dui_a','$nit_a','$fecha_a','$estadoCivil_a','$cargo_a','$sueldo_a','$direccion_a','$nacionalidad_a',
                '$profesion_a','$contacto_a','1','$dateNow_a');";
                
                

                if ($conexion->query($sql) === TRUE) {
                    # code...
                    //$conexion->close();
                    
                    $id_insert = $conexion->insert_id;

                        # code...
                        $ruta ='files/'.$id_insert.'/';
                        $archivo1 = $ruta.$_FILES['fotoDui_a']['name'];
                        $archivo2 = $ruta.$_FILES['fotoNit_a']['name'];

                        if(!file_exists($ruta)){
                            mkdir($ruta);
                        }

                        if (!file_exists($archivo1) && !file_exists($archivo2)) {
                            # code...
                            $resultado1 = @move_uploaded_file($_FILES['fotoDui_a']['tmp_name'],$archivo1);
                            $resultado2 = @move_uploaded_file($_FILES['fotoNit_a']['tmp_name'],$archivo2);

                            if ($resultado1 && $resultado2) {
                                # code...
                                
                                $sqlB =" INSERT INTO beneficiario(nombreBeneficiario,parentesco,porcentaje,contactoBeneficiario,id_Afiliado)
                                VALUES('$nombre_b[0]','$parentesco_b[0]','$porcentaje_b[0]','$contacto_b[0]','$id_insert')";

                                for($i = 1;$i <$numeroBeneficiarios;$i++){
                                    $sqlB = $sqlB . "," . "('$nombre_b[$i]','$parentesco_b[$i]','$porcentaje_b[$i]','$contacto_b[$i]','$id_insert')" ;    

                                }
                                $sqlB = $sqlB . ";";
                                /*
                                $sqlCA = "INSERT INTO cuotaAfiliado(fechaIngreso,montoCuota,mesPago,annioPago,pagado,id_Afiliado) VALUES('$dateNow_ca','$montoCouta_ca','$mesPago_ca','$annioPago_ca','$pagado_ca','$id_insert')";
                                $dateparse = date_parse($mesPago_ca);
                                #crea facturas de 12 meses
                              
                                for ($i=($dateparse['month'] +1); $i <= 12 ; $i++) { 
                                    # code...
                                    $temp_month  = date("F", mktime(0, 0, 0, $i, 10));
                                    $sqlCA = $sqlCA . "," . "('$dateNow_ca','$montoCouta_ca','$temp_month','$annioPago_ca','$pagado_ca','$id_insert')" ;    
                                }
                                $sqlCA = $sqlCA . ";";    
                                  */
                                #crea el primer pago
                                $sqlP = "INSERT INTO pago(mesPago,annioPago,pagado,id_Afiliado,id_cuota) VALUES('$mesPago_p','$annioPago_p','$pagado_p','$id_insert',1);";  
                                  
                                if ($conexion->query($sqlB) === TRUE && $conexion->query($sqlP) === TRUE) {
                                    # code...
                                    $nombre_a="";
                                    $apellido_a="";
                                    $dui_a="";
                                    $nit_a="";
                                    $fecha_a="";
                                    $fotoDUI_a="";
                                    $fotoNit_a="";
                                    $estadoCivil_a="";
                                    $cargo_a="";
                                    $sueldo_a="";
                                    $direccion_a="";
                                    $nacionalidad_a="";
                                    $profesion_a="";
                                    $contacto_a="";
                                    $nombre_b="";
                                    $parentesco_b="";
                                    $porcentaje_b="";
                                    $contacto_b="";
                                echo"<div class='row'>";
                                echo"<div class='col-lg-12'>";
                                echo"<div class='alert alert-success alert-st-one alert-st-bg '> Datos guardados Correctamente. ";
                                
                            }else{
                                die("Error no guarda".$conexion->error);
                            }
                            }else{
                                echo"<div class='row'>";
                                echo"<div class='col-lg-12'>";
                                echo"<div class='alert alert-danger alert-mg-b alert-st-four alert-st-bg3' role='alert'>El archivo no se guardo. ";
                            }
                        }else{
                            echo"<div class='row'>";
                            echo"<div class='col-lg-12'>";
                            echo"<div class='alert alert-success alert-st-one alert-st-bg '> El Archivo ya Existe en la Ruta. ";
                        }
                        

                }else{
                    die("Error al insertar Datos".$conexion->error);
                }
                $conexion->close();
            }
            echo "</div>";
            echo "</div>";
            echo "</div>";
            
        }
        ?>
        
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
                                                <input type="text" name="nombre_a" id="nombre_a" class="form-control" placeholder="Escribe Nombre" value="<?php echo $nombre_a ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Apellidos Afiliado</label>
                                                <input type="text" name="apellido_a" id="apellido_a" class="form-control" placeholder="Escriba apellido" value="<?php echo $apellido_a ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Numero de DUI</label>
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="text" name="dui_a" id="dui_a" class="form-control" data-mask="9999999-9"
                                                        placeholder="" value="<?php echo $dui_a ?>">
                                                    <span class="help-block">9999999-9</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Numero de NIT</label>
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="text" name="nit_a" id="nit_a" class="form-control" data-mask="999-999999-999-9"
                                                        placeholder="" value="<?php echo $nit_a ?>">
                                                    <span class="help-block">999-999999-999-9</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Fecha de Nacimiento</label>
                                                
                                                <input type="date" min="1954-12-31" max="2001-01-01" name="fecha_a" id="fecha_a" class="form-control"
                                                    placeholder="Fecha de Nacimiento" value="<?php echo $fecha_a ?>">
                                            </div>

                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                            <label class="login2 pull-right pull-right-pro">Subir Archivo de
                                                                DUI.</label>
                                                        </div>
                                                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                                            <div
                                                                class="file-upload-inner file-upload-inner-right ts-forms">
                                                                <div class="input append-small-btn">
                                                                    <div class="file-button">
                                                                        Buscar
                                                                        <input type="file" accept="application/pdf" name="fotoDui_a" id="fotoDui_a"
                                                                            onchange="document.getElementById('append-small-btn').value = this.value;">
                                                                    </div>
                                                                    <input type="text" id="append-small-btn"
                                                                        placeholder="no archivo seleccinado" value="<?php echo $_FILES['fotoDUI_a']['tmp_name'] ?>" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Subir
                                                                    Archivo de NIT.</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                                                <div
                                                                    class="file-upload-inner file-upload-inner-right ts-forms">
                                                                    <div class="input append-small-btn">
                                                                        <div class="file-button">
                                                                            Buscar
                                                                            <input type="file" accept="application/pdf" name="fotoNit_a" id="fotoNit_a"
                                                                                onchange="document.getElementById('append-big-btn').value = this.value;">
                                                                        </div>
                                                                        <input type="text" id="append-big-btn"
                                                                            placeholder="no archivo seleccinado" value="<?php echo $fotoNit_a['name'] ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Estado Civil</label>
                                                        <select class="form-control" name="estadoCivil_a" id="estadoCivil_a">
                                                            <option value="none" selected="" disabled="">Seleccione una
                                                                opcion</option>
                                                            <option value="Soltero/a" <?php if($estadoCivil_a == "Soltero/a") echo"selected" ?> >Soltero/a.</option>
                                                            <option value="Casado/a"<?php if($estadoCivil_a == "Casado/a") echo"selected" ?> >Casado/a.</option>
                                                            <option value="Acompañado/a"<?php if($estadoCivil_a == "Acompañado/a") echo"selected" ?> >Acompañado/a.</option>
                                                            <option value="Divorciado/a"<?php if($estadoCivil_a == "Divorciado/a") echo"selected" ?> >Divorciado/a</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Cargo</label>
                                                        <select class="form-control" name="cargo_a" id="cargo_a">
                                                            <option value="none" selected="" disabled="">Seleccione
                                                                Cargo.</option>
                                                            <option value="Gerente general" <?php if($cargo_a == "Gerente general") echo"selected" ?> >Gerente general</option>
                                                            <option value="Contador/a"<?php if($cargo_a == "Contador/a") echo"selected" ?> >Contador/a</option>
                                                            <option value="Administrador/a"<?php if($cargo_a == "Administrador/a") echo"selected" ?> >Administrador/a</option>
                                                            <option value="CAMZ"<?php if($cargo_a == "CAMZ") echo"selected" ?> >CAMZ</option>
                                                            <option value="Auxiliar"<?php if($cargo_a == "Auxiliar") echo"selected" ?> >Auxiliar</option>
                                                            <option value="Secretario/a"<?php if($cargo_a == "Secretario/a") echo"selected" ?> >Secretario/a</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="form-group">                   
                                                                    <label>Sueldo</label>
                                                                <div class="input-mark-inner mg-b-22">
                                                                    <input type="text" class="form-control" name="sueldo_a" id="sueldo_a"
                                                                         placeholder="" value="<?php echo $sueldo_a ?>">
                                                                    <span class="help-block">$ 9,999.99</span>
                                                                </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="payment-adress" id="myTabedu1">
                                                        <a href="#reviews"
                                                            class="btn btn-primary waves-effect waves-light">
                                                            SIGUIENTE</a>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <div class="product-tab-list tab-pane fade" id="reviews">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="review-content-section">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="devit-card-custom">
                                        <div class="form-group">
                                            <label>Direccion Afiliado</label>
                                            <input type="textarea" class="form-control" name="direccion_a" id="direccion_a"
                                                placeholder="Escriba Direccion" value="<?php echo $direccion_a ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nacionalidad</label>
                                            <input name="nacionalidad_a" id="nacionalidad_a" type="text" class="form-control"
                                                placeholder="Escriba nacionalidad" value="<?php echo $nacionalidad_a ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Profesion u oficio</label>
                                            <div class="input-mark-inner mg-b-22">
                                            <input name="profesion_a" id="profesion_a" type="text" class="form-control"
                                                placeholder="Escriba Su Profesion u Oficio" value="<?php echo $profesion_a ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Numero de Contacto Afiliado</label>
                                            <div class="input-mark-inner mg-b-22">
                                                <input name="contacto_a" id="contacto_a" type="text" class="form-control" data-mask="9999-9999"
                                                    placeholder="9999-9999" value="<?php echo $contacto_a ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="review-content-section">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="devit-card-custom">
                                        <div id="benetgroup" class="benetgroup">
                                            <!-- 
                                            <div id="benet1" class="beneficiario">
                                                <div class="form-group">
                                                    <label>Nombre Beneficiario</label>
                                                    <input name="nombre_b[]"  type="text" class="form-control" name="nombreBeneficiario_a"
                                                        placeholder="Escriba Nombre" value="<?php echo $nombre_b ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Parentesco</label>
                                                    <input name="parentesco_b[]"  type="text" class="form-control"
                                                        placeholder="Escriba el Parentesco" value="<?php echo $parentesco_b ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Porcentaje</label>
                                                    <div class="input-mark-inner mg-b-22">
                                                        <input name="porcentaje_b[]"  type="text" class="form-control" data-mask="999 %"
                                                            placeholder="" value="<?php echo $porcentaje_b ?>">
                                                        <span class="help-block">99 %</span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Numero de Contacto</label>
                                                    <div class="input-mark-inner mg-b-22">
                                                        <input name="contacto_b[]" type="text" class="form-control" data-mask="9999-9999"
                                                            placeholder="" value="<?php echo $contacto_b ?>">
                                                        <span class="help-block">9999-9999</span>
                                                    </div>
                                                </div>
                                            </div>
                                            -->
                                            
                                        </div>
                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div >
                                                    <button class="btn btn-custon-rounded-four btn-warning" id="addB" type="button" onclick="createDivs()">AGREGAR BENEFICIARIO</button> 

                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        

                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="payment-adress" id="myTabedu1">
                                                        <a href="#description"
                                                            class="btn btn-primary waves-effect waves-light">
                                                           ATRAS</a>

                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="payment-adress" id="myTabedu2">
                                                    <button type="submit"
                                            class="btn btn-primary waves-effect waves-light">GUARDAR</button>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        
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

<script type="text/javascript" >
           
        var array_nombre_b =<?php echo json_encode($nombre_b);?>;
        var array_parentesco_b =<?php echo json_encode($parentesco_b);?>;
        var array_porcentaje_b =<?php echo json_encode($porcentaje_b);?>;
        var array_contacto_b =<?php echo json_encode($contacto_b);?>;
        function createDivs() {
            const div = document.createElement('div');

            div.className = 'row';
            div.innerHTML = `
                    <div class="beneficiario">
                    <div class="form-group">
                        <label>Nombre Beneficiario</label>
                        <input name="nombre_b[]"  type="text" class="form-control" name="nombreBeneficiario_a"
                            placeholder="Escriba Nombre" value="">
                    </div>
                    <div class="form-group">
                        <label>Parentesco</label>
                        <input name="parentesco_b[]"  type="text" class="form-control"
                            placeholder="Escriba el Parentesco" value="">
                    </div>
                    <div class="form-group">
                        <label>Porcentaje</label>
                        <div class="input-mark-inner mg-b-22">
                            <input name="porcentaje_b[]" type="text" oninput="percent(this.value)" class="form-control" data-mask="9?99 %"
                                placeholder="" value="">
                            <span class="help-block">99 %</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Numero de Contacto</label>
                        <div class="input-mark-inner mg-b-22">
                            <input name="contacto_b[]" type="text" class="form-control" data-mask="9999-9999"
                                placeholder="" value="">
                            <span class="help-block">9999-9999</span>
                        </div>
                        <button type="button" class="delethis btn btn-custon-rounded-four btn-danger">Eliminar</button>
                    </div>
                    </div>
        `;
            
        
            
            
            document.getElementById("benetgroup").appendChild(div);  
            deleteBenef()
        }
        function percent(a) {
           console.log(a);
           
            
        }
        function createB() {
             
            var size = <?php echo count($nombre_b)?>  
            console.log(size);
            if (size == 0) {
                createDivs();
            }else{
                for (let index = 0; index < size; index++) {
                createDivs();
                }
            }

        }
        function fillvalue(){
            var matches = document.querySelectorAll(".beneficiario");
            
            for (i = 0; i < matches.length; ++i) {
               
               if (array_nombre_b[i] == null) {
                matches[i].querySelectorAll("input[name='nombre_b[]']")[0].value = "";   
                }else{
                    matches[i].querySelectorAll("input[name='nombre_b[]']")[0].value = array_nombre_b[i];
                }

                if (array_parentesco_b[i] == null) {
                    matches[i].querySelectorAll("input[name='parentesco_b[]']")[0].value = "";   
                }else{
                    matches[i].querySelectorAll("input[name='parentesco_b[]']")[0].value = array_parentesco_b[i];
                }
                
                if (array_porcentaje_b[i] == null) {
                    matches[i].querySelectorAll("input[name='porcentaje_b[]']")[0].value = "";   
                }else{
                    matches[i].querySelectorAll("input[name='porcentaje_b[]']")[0].value = array_porcentaje_b[i];
                }
                if (array_contacto_b[i] == null) {
                    matches[i].querySelectorAll("input[name='contacto_b[]']")[0].value = "";   
                }else{
                    matches[i].querySelectorAll("input[name='contacto_b[]']")[0].value = array_contacto_b[i];
                }
               
                
            }
            
            
        }
        function deleteBenef(){
            var matches = document.querySelectorAll(".delethis");
            
            for (i = 0; i < matches.length; ++i) {
                matches[i].onclick = function() {
               
                var btns = document.querySelectorAll(".delethis");
                
                if(btns.length <= 1){

                }else{                        
                    this.parentElement.parentElement.remove();    
          
                }   
       
               
                };
                }
        }
        function setup(){
            createB();
            deleteBenef();
            fillvalue();
        }
        window.onload = setup;

        
        
        


</script>
