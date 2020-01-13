
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
                                       
?>