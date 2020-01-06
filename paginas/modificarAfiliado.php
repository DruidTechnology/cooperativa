<?php 
$idAfiliado = $_GET['id'];

$sqlM = "SELECT * FROM afiliados WHERE id= $idAfiliado";
$resultado = $conexion->query($sqlM);
if ($resultado->num_rows > 0) {
    # code...
    while($REG = $resultado->fetch_assoc()){
        //var_dump($REG);
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-payment-inner-st">
        <ul id="myTabedu1" class="tab-review-design">
            <li class="active"><a href="#description">Registro de Afiliados</a></li>
            
        </ul>
        <form name="formulario" id="formulario" action='' enctype="multipart/form-data" method="POST">
        <?php
    

        //Declaracion de todas las variables


        if(isset($_POST['nombre_a'])){
           // echo "<script type=\"text/javascript\">alert(\"Fotos guardadas\");</script>"; 
            //Asignacion de valores de POST
            $nombre_a=$_POST['nombre_a'];
            $apellido_a=$_POST['apellido_a'];
            $dui_a=$_POST['dui_a'];
            $nit_a=$_POST['nit_a'];
            //$fecha_a=$_POST['fecha_a'];
            $fotoDui_a=$_FILES['fotoDui_a'];
            $fotoNit_a=$_FILES['fotoNit_a'];
            $estadoCivil_a=$_POST['estadoCivil_a'];
            $cargo_a=$_POST['cargo_a'];
            $sueldo_a=$_POST['sueldo_a'];
            $direccion_a=$_POST['direccion_a'];
            $nacionalidad_a=$_POST['nacionalidad_a'];
            $profesion_a=$_POST['profesion_a'];
            $contacto_a=$_POST['contacto_a'];

            //limite de archivo
            $limite_kb = 200;

            //Arreglo para validacion
            $campo= array();

            if ($nombre_a == "") {
                # code...
                array_push($campo, "El Campo Nombre No Puede Estar Vacio.");
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
           
            if ($_FILES['fotoDui_a']['size']<=$limite_kb * 1024) {
                # code...
                array_push($campo, "El Campo Archivo DUI No Puede Cargar porque sobrepasa el limite de carga.");
            }

            if ($_FILES['fotoDui_a']['size']<=$limite_kb * 1024) {
                # code...
                array_push($campo, "El Campo Archivo NIT No Puede Cargar porque sobrepasa el limite de carga.");
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
                $fecha_a = explode('-',$nit_a);
                echo "<script type=\"text/javascript\">alert(\"".$fecha_a['1']."\");</script>"; 
                $sql="UPDATE afiliados(nombreAfiliado,apellidosAfiliado,duiAfiliado,NitAfiliado,fechaNacimientoAfiliado,
                estadoCivilAfiliado,cargoAfiliado,sueldoAfiliado,direccionAfiliado,nacionalidadAfiliado,profesionAfiliado,
                contactoAfiliado,estadoAfiliado)
                VALUES('$nombre_a','$apellido_a','$dui_a','$nit_a','$fecha_a','$estadoCivil_a','$cargo_a','$sueldo_a','$direccion_a','$nacionalidad_a',
                '$profesion_a','$contacto_a',1);";

                if ($conexion->query($sql) === TRUE) {
                    # code...
                    $id_insert = $conexion->insert_id;
                    
                        # code...
                        $ruta ='files/'.$id_insert.'/';
                        $archivo = $ruta.$_FILES['fotoDui_a']['name'];

                        if(!file_exists($ruta)){
                            mkdir($ruta);
                        }

                        if (!file_exists($archivo)) {
                            # code...
                            $resultado = @move_uploaded_file($_FILES['fotoDui_a']['tmp_name'],$archivo);

                            if ($resultado) {
                                # code...
                                echo"<div class='row'>";
                                echo"<div class='col-lg-12'>";
                                echo"<div class='alert alert-success alert-st-one alert-st-bg '> Datos guardados Correctamente. ";
                            }else{
                                echo"<div class='row'>";
                                echo"<div class='col-lg-12'>";
                                echo"<div class='alert alert-success alert-st-one alert-st-bg '> El archivo no se guardo. ";
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
                                                <input type="text" name="nombre_a" id="nombre_a" class="form-control" placeholder="Escribe Nombre" value="<?php echo $REG['nombreAfiliado'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Apellidos Afiliado</label>
                                                <input type="text" name="apellido_a" id="apellido_a" class="form-control" placeholder="Escriba apellido" value="<?php echo $REG['apellidosAfiliado'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Numero de DUI</label>
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="text" name="dui_a" id="dui_a" class="form-control" data-mask="9999999-9"
                                                        placeholder="" value="<?php echo $REG['duiAfiliado'] ?>" disabled>
                                                    <span class="help-block">9999999-9</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Numero de NIT</label>
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="text" name="nit_a" id="nit_a" class="form-control" data-mask="999-999999-999-9"
                                                        placeholder="" value="<?php echo $REG['nitAfiliado'] ?>" disabled>
                                                    <span class="help-block">999-999999-999-9</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Fecha de Nacimiento</label>
                                                
                                                <input type="date" min="1954-12-31" max="2001-01-01" name="fecha_a" id="fecha_a" class="form-control"
                                                    placeholder="Fecha de Nacimiento" value="<?php echo $REG['fechaNacimientoAfiliado'] ?>" disabled>
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
                                                            <option value="Soltero/a" <?php if($REG['estadoCivilAfiliado'] == "Soltero/a") echo"selected" ?> >Soltero/a.</option>
                                                            <option value="Casado/a"<?php if($REG['estadoCivilAfiliado']== "Casado/a") echo"selected" ?> >Casado/a.</option>
                                                            <option value="Acompañado/a"<?php if($REG['estadoCivilAfiliado'] == "Acompañado/a") echo"selected" ?> >Acompañado/a.</option>
                                                            <option value="Divorciado/a"<?php if($REG['estadoCivilAfiliado'] == "Divorciado/a") echo"selected" ?> >Divorciado/a</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Cargo</label>
                                                        <select class="form-control" name="cargo_a" id="cargo_a">
                                                            <option value="none" selected="" disabled="">Seleccione
                                                                Cargo.</option>
                                                            <option value="Gerente general" <?php if($REG['cargoAfiliado'] == "Gerente general") echo"selected" ?> >Gerente general</option>
                                                            <option value="Contador/a"<?php if($REG['cargoAfiliado'] == "Contador/a") echo"selected" ?> >Contador/a</option>
                                                            <option value="Administrador/a"<?php if($REG['cargoAfiliado'] == "Administrador/a") echo"selected" ?> >Administrador/a</option>
                                                            <option value="CAMZ"<?php if($REG['cargoAfiliado'] == "CAMZ") echo"selected" ?> >CAMZ</option>
                                                            <option value="Auxiliar"<?php if($REG['cargoAfiliado'] == "Auxiliar") echo"selected" ?> >Auxiliar</option>
                                                            <option value="Secretario/a"<?php if($REG['cargoAfiliado'] == "Secretario/a") echo"selected" ?> >Secretario/a</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="form-group">                   
                                                                    <label>Sueldo</label>
                                                                <div class="input-mark-inner mg-b-22">
                                                                    <input type="text" class="form-control" name="sueldo_a" id="sueldo_a"
                                                                         placeholder="" value="<?php echo $REG['sueldoAfiliado'] ?>">
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
                                                placeholder="Escriba Direccion" value="<?php echo $REG['direccionAfiliado'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nacionalidad</label>
                                            <input name="nacionalidad_a" id="nacionalidad_a" type="text" class="form-control"
                                                placeholder="Escriba nacionalidad" value="<?php echo $REG['nacionalidadAfiliado'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Profesion u oficio</label>
                                            <div class="input-mark-inner mg-b-22">
                                            <input name="profesion_a" id="profesion_a" type="text" class="form-control"
                                                placeholder="Escriba Su Profesion u Oficio" value="<?php echo $REG['profesionAfiliado'] ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Numero de Contacto Afiliado</label>
                                            <div class="input-mark-inner mg-b-22">
                                                <input name="contacto_a" id="contacto_a" type="text" class="form-control" data-mask="9999-9999"
                                                    placeholder="9999-9999" value="<?php echo $REG['contactoAfiliado'] ?>" >
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
                                        <div class="form-group">
                                            <label>Nombre Beneficiario</label>
                                            <input type="text" class="form-control" name="nombreBeneficiario_a"
                                                placeholder="Escriba Nombre">
                                        </div>
                                        <div class="form-group">
                                            <label>Parentesco</label>
                                            <input name="parentesco_a" type="number" class="form-control"
                                                placeholder="Escriba el Parentesco">
                                        </div>
                                        <div class="form-group">
                                            <label>Porcentaje</label>
                                            <div class="input-mark-inner mg-b-22">
                                                <input name="porcentaje_a" type="text" class="form-control" data-mask="999 %"
                                                    placeholder="">
                                                <span class="help-block">99 %</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Numero de Contacto</label>
                                            <div class="input-mark-inner mg-b-22">
                                                <input name="contactoBeneficiario_a" type="text" class="form-control" data-mask="9999-9999"
                                                    placeholder="">
                                                <span class="help-block">9999-9999</span>
                                            </div>
                                        </div>
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
                                                    <a value="" id ='<?php echo $REG['id'] ?>' onClick="Modificar(this)"
                                            class="btn btn-primary waves-effect waves-light">Modificar</a>
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
<?php
                                                }
                                            }
                                            
                                            ?>
                                            <script>
                                                function Modificar(e){
                                                    //alert(e.id);
                                                    document.location.href="/SACO/modificarAfiliado.php?id="+e.id;
                                                    
                                                }
                                            
                                            </script>