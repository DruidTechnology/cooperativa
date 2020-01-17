
<?php

@include("static/all/up.php");
?>
<div class="row">
<div class="col-lg-12">
<div class="payment-adress">
<a href="php/Backup.php" class="btn btn-primary waves-effect waves-light">Realizar copia de seguridad</a>
                                                </div>
                                            </div>
                                        </div>


<form action="php/Restore.php" method="POST">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="sparkline10-list mg-tb-30 responsive-mg-t-0 table-mg-t-pro-n dk-res-t-pro-0 nk-ds-n-pro-t-0">
            <div class="sparkline10-hd">
                <div class="main-sparkline10-hd">
                    <h1>Busqueda de Restauracion</h1>
                </div>
            </div>
            <div class="sparkline10-graph">
                <div class="input-knob-dial-wrap">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="chosen-select-single mg-b-20">
                                <label>Seleccione un punto de restauracion</label>
                                <select name="restorePoint" data-placeholder="Backup" class="chosen-select" tabindex="-1">
								<?php
				include_once 'php/Connet.php';
				$ruta='./backup/';
				if(is_dir($ruta)){
				    if($aux=opendir($ruta)){
				        while(($archivo = readdir($aux)) !== false){
				            if($archivo!="."&&$archivo!=".."){
				                $nombrearchivo=str_replace(".sql", "", $archivo);
				                $nombrearchivo=str_replace("-", ":", $nombrearchivo);
				                $ruta_completa=$ruta.$archivo;
				                if(is_dir($ruta_completa)){
				                }else{
				                    echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
				                }
				            }
				        }
				        closedir($aux);
				    }
				}else{
				    echo $ruta." No es ruta válida";
				}
			?>
                                </select>
								<button class="btn btn-primary waves-effect waves-light" type="submit" >Restaurar</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
	</form>
	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php

@include("static/all/down.php");
?>