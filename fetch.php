
<?php 
include("conexion/conexion.php");
?>

<?php     
    
        if (isset($_GET['action']) && $_GET['action'] == 'retraer') {
            $secondsWait = 1;
           // header("Refresh:$secondsWait");
            //echo date('Y-m-d H:i:s');
            # code...
            
            $ids = $_GET['id'];
            $sql ="";
            $row_json ="";
            $row="";
            $resultado= "";
            $res = "";
            $res = array();
/*
            
            $pdo = new PDO('mysql:host=localhost;dbname=saco_db', 'root', '');
            $statement = $pdo->query("SELECT p.mesPago,p.annioPago FROM pago p WHERE p.id_afiliado=$ids AND p.pagado=1;");
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            
            var_dump($rows);*/
            $resultado= "";
            $sql = "SELECT p.mesPago,p.annioPago FROM pago p WHERE p.id_afiliado=$ids AND p.pagado=1;";
            //$sql = "SELECT * FROM afiliados";
           
            $resultado = $conexion->query($sql);
            
            
            if ($resultado->num_rows > 0) {
               
                # code...
                while($row = $resultado->fetch_assoc()){
                    
                    array_push($res,$row);
                    
                }
                 
            
            }

            
            $row_json ="";
            $row_json = json_encode($res);   
            $res ="";
            
            $row="";
            $resultado= "";
            echo $row_json;
            
            
        }
        
        if (isset($_GET['action']) && $_GET['action'] == 'fechaActivacion') {
            # code...
            
            $id_activacion_a = $_GET['id'];
            
            //$res = array();
            
            $sqlA = "SELECT a.fechaingreso as fecha FROM afiliados a WHERE a.id=$id_activacion_a;";
            //$sql = "SELECT * FROM afiliados";
       //    echo $sqlA;
            $resultadoA = $conexion->query($sqlA);
            
            
            
            if ($resultadoA->num_rows > 0) {
                # code...
                while($rows = $resultadoA->fetch_assoc()){
                    echo $rows["fecha"];
                    //array_push($res,$row);
                    
                }
                 
            
            }
                  
 
        }
        if (isset($_GET['action']) && $_GET['action'] == 'tipo2') {
            # code...
            
            $id_activacion_a = $_GET['id'];
            
            //$res = array();
            
            $sqlA = "SELECT a.monto as monto FROM credito a WHERE a.id=$id_activacion_a;";
            //$sql = "SELECT * FROM afiliados";
       //    echo $sqlA;
            $resultadoA = $conexion->query($sqlA);
            
            
            
            if ($resultadoA->num_rows > 0) {
                # code...
                while($rows = $resultadoA->fetch_assoc()){
                    echo $rows["monto"];
                    //array_push($res,$row);
                    
                }
                 
            
            }
                  
 
        }




                
        if (isset($_GET['action']) && $_GET['action'] == 'creditos') {
            # code...
            
            $id_activacion_a = $_GET['id'];
            $tipo = $_GET['tipo'];

            
            //$res = array();
            
            $sqlA = "SELECT a.id as id FROM credito a WHERE a.id_Afiliado=$id_activacion_a AND a.tipo=$tipo;";
            //$sql = "SELECT * FROM afiliados";
       //    echo $sqlA;
            $resultadoA = $conexion->query($sqlA);
            $array = array();
            
            
            if ($resultadoA->num_rows > 0) {
                # code...
                while($rows = $resultadoA->fetch_assoc()){
                   
                    array_push($array,$rows['id']);
                    
                }
                $row_json = json_encode($array);
                echo $row_json;   
                
                 
            
            }
                  
 
        }

        if (isset($_GET['action']) && $_GET['action'] == 'credito') {
            # code...
            $fecha = "";
            $id_activacion_a = $_GET['id'];
            
            $lastpaymenyt = "SELECT MAX(STR_TO_DATE(CONCAT('15,',p.mespago, ',', p.anniopago),'%d,%M,%Y')) as g FROM pagocredito p LEFT JOIN credito c on c.id=p.id_credito WHERE c.id=$id_activacion_a;";
            
            if ($resultadoB = $conexion->query($lastpaymenyt)) {
                # code...
                if ($resultadoB->num_rows > 0) {
                    while($rows = $resultadoB->fetch_assoc()){
                        $fecha = $rows['g'];
                    }
                    # code...
                }
                
            }
            //$res = array();
           $sqlA = "SELECT count(pc.id) as total,c.plazo,c.pagoMensual,c.fechaCredito FROM pagoCredito pc RIGHT JOIN credito c on c.id = pc.id_credito WHERE c.id=$id_activacion_a;";
            //$sql = "SELECT * FROM afiliados";
       //    echo $sqlA;
            $resultadoA = $conexion->query($sqlA);
            
            $array = array();
            if ($resultadoA->num_rows > 0) {
                # code...
                while($rows = $resultadoA->fetch_assoc()){
                    $mesesapgar = $rows['plazo'] - $rows['total']  ;
                    array_push($array,$mesesapgar);
                    array_push($array,$rows['pagoMensual']);
                    array_push($array,$rows['plazo']);
                    array_push($array,$rows['fechaCredito']);

                    
                    array_push($array,$fecha);
                    
                    $row_json = json_encode($array);
                    echo $row_json;   
                    //array_push($res,$row);
                    
                }
                 
            
            }
                  
 
        }
        
     
        
                                       
?>