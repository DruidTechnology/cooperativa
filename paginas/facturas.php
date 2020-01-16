<?php 
     if (isset($_GET['action']) && $_GET['action'] == 'factura') {
         $id_a = $_GET['id'];
         
         $sqlA = "SELECT * FROM afiliados a WHERE a.id=$id_a;";
         $sqlF = "SELECT f.* FROM pago p LEFT JOIN factura f on p.factura = f.id WHERE p.id_afiliado=$id_a group by f.id ";
    

         $a_lastname = "";
         $fullname ="";
         $a_name = "";
         $f_fechapago = "";
         $f_pago = "";
         if ($result1 = $conexion->query($sqlA)) {
            while($row = $result1->fetch_assoc()){
                            
                $a_name = $row['nombreAfiliado'];
                $a_lastname = $row['apellidosAfiliado'];
                $fullname = $a_name . " " . $a_lastname;
                
            }

            if ($result2 = $conexion->query($sqlF)) {
                while($row2 = $result2->fetch_assoc()){
                    $id_fact = $row2['id'];         
                    $f_fechapago = $row2['fecha_factura'];
                    
                    $a_lastname = $row2['apellidosAfiliado'];
                    $sqlP = "SELECT p.* FROM pago p 
                    WHERE p.factura=$id_fact;";
                  

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
echo "                        <td>$f_fechapago</td>";

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
                    if ($result3 = $conexion->query($sqlP)) {
                        # code...
                        while($row3 = $result3->fetch_assoc()){
                            echo $row3['id'];
                            $id_p = $row3['id'];
                            $p_mes = $row3['mesPago'];
                            $p_annio = $row3['annioPago'];
                            $mora_p = $row3['mora'];
                            if ($mora == 1) {
                                $mora_p = 0.35;
                            }else{
                                $mora_p=0;
                            }
                            $date_p = '15 ' . $p_mes . ' ' . $p_annio ;
                        
                            $date_p = date("d-m-Y",strtotime($date_p));
                            
                           // echo $date_p . "<br>";
                            echo "                <tr>";
                            echo "                    <td>5</td>";
                            echo "                    <td>$date_p</td>";
                            echo "                    <td>$mora_p</td>";
                            echo "                    <td>$id_p</td>";
                            echo "                </tr>";
                            
                            
                        }
                    }else{
                        die("Error no guarda :".$conexion->error);
                    }
                        
                   
$pago = $row2['total'];
$monto = $row2['pago'];
$cambio = $monto-$pago;  
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

                    
                }
                
            }else{
                echo $sqlF;
                die("Error no guarda :".$conexion->error);
            }
         }else{
             echo $sqlA;
            die("Error no guarda :".$conexion->error);
         }
  

     }




?>


