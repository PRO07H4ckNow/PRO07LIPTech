<?php
$act = "";
$prom = "";
$datos = array();
$cve = $_GET['cve'];
//######### HACE USO DEL SERVICIO WEB QUE ESTA PUBLICADO DE MANERA LOCAL ########		 
$cliente = new SoapClient(null, array('uri' => 'http://localhost/', 'location'=>'https://projecthnw.000webhostapp.com/SRC/serviciosweb/servicioweb.php'));

//verificar al botón que se le hizo clic  
if(isset($_POST["btnGuadar"])){
    if(!empty($_POST["txtAct"]) && !empty($_POST["txtProm"])){
        $act = htmlspecialchars($_POST["txtAct"]);
        $prom =htmlspecialchars($_POST["txtProm"]);
        
        //SE EJECUTA UN MÉTODO DEL SERVICIO WEB, PASANDO SUS PARAMETROS
    	$datos=$cliente->registrarCarac($cve, $act, $prom);
    	   //$datos[0]["ID"]=1;
    	    if($datos[0]["ID"]!= "0") {
                echo '<script language="javascript">alert("Seguimiento registrado correctamente.")</script>';
                 $act = "";$prom = "";
                 echo "<script language='javascript'>document.location.href = 'inicio.php''?op=registrar_seguimiento>';</script>";
            } else {
                $datos[0] = 0;
                echo '<script language="javascript">alert("Seguimiento no registrado, verificar datos.")</script>';
            }
    }else{
        echo '<script language="javascript">alert("Favor de llenar todos los campos")</script>';
    }
} 

?>

<main>
    <div class="row">
        <div class="col col-md-10 col-xs-10" align="middle">
              <div class="col-auto text-center">
                <h2><b for="" class="col-sm-2 col-form-label">Nuevo seguimiento:</b></h2>
              </div>
              <form method="POST" name="registrar" enctype="multipart/form-data">
                <div class="mb-3 row">
                    <label for="txtAct" class="col-sm-3 col-form-label text-center">Registro de actividad:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="txtAct" name="txtAct" required>
                     </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtProm" class="col-sm-3 col-form-label text-center">Promesas:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="txtProm" name="txtProm" required>
                    </div>
                </div>
                <hr>
                  <div class="text-center">
                    <button type="submit" name="btnGuadar" id="btnGuadar" class="btn btn-sys">Registrar</button>
                    <button type="reset" class="btn btn-sys">Cancelar</button>
                  </div>
                <hr>
                </form>
        </div>
        
    </div>
</main>