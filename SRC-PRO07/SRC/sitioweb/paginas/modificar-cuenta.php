<?php
$cve = $_GET["cve"];
$datos = array();
//######### HACE USO DEL SERVICIO WEB QUE ESTA PUBLICADO DE MANERA LOCAL ########		 
$cliente = new SoapClient(null, array('uri' => 'http://localhost/', 'location'=>'https://projecthnw.000webhostapp.com/SRC/serviciosweb/servicioweb.php'));

$datos_cuenta = $cliente->filtrarCuenta($cve);
$grupo = $datos_cuenta[0]['GRUPO'];
$cuenta = $datos_cuenta[0]['CUENTA'];
$nombre = $datos_cuenta[0]['NOMBRE'];
$calle = $datos_cuenta[0]['CALLE'];
$numExt = $datos_cuenta[0]['NÚMERO EXTERIOR'];
$numInt = $datos_cuenta[0]['NÚMERO INTERIOR'];
$colonia = $datos_cuenta[0]['COLONIA'];
$municipio = $datos_cuenta[0]['MUNICIPIO'];
$estado = $datos_cuenta[0]['ESTADO'];
$cp = $datos_cuenta[0]['C.P'];
$celular = $datos_cuenta[0]['CELULAR'];
$estadoCel = $datos_cuenta[0]['ESTADO CELULAR'];
$contacTrabajo = $datos_cuenta[0]['CONTACTO TRABAJO'];
$estadoTrabajo = $datos_cuenta[0]['ESTADO TRABAJO'];
$telPart = $datos_cuenta[0]['TELÉFONO PARTICULAR'];
$estadoPar = $datos_cuenta[0]['ESTADO PARTICULAR'];
$correo = $datos_cuenta[0]['CORREO'];
$mora = $datos_cuenta[0]['MORA'];
$saldo = $datos_cuenta[0]['SALDO'];
$fechaCorte = $datos_cuenta[0]['FECHA CORTE'];
$fechaAsig = $datos_cuenta[0]['FECHA ASIGNACIÓN'];
$gestor = $datos_cuenta[0]['GESTOR'];
$status = $datos_cuenta[0]['STATUS'];
$fechaAlt = $datos_cuenta[0]['FECHA ALTA'];
$precastigo = $datos_cuenta[0]['PRECASTIGO'];
$status_opciones = Array('Ilocalizable', 'Contactado', 'Renuente', 'Convenio de pagos');
$usu= $_SESSION['cveUsuario'];
//verificar al botón que se le hizo clic  
if(isset($_POST["btnGuadar"])){
    if($_SESSION['rolUsuario'] == 'Administrador'){
        $estadoCel = htmlspecialchars($_POST["txtEstadoCel"]);
        $estadoPar = htmlspecialchars($_POST["txtEstadoPart"]);
        $estadoTrabajo = htmlspecialchars($_POST["txtEstadoTrab"]); // Activo, inactivo (0,1)
        $fechaAlt= htmlspecialchars($_POST["txtFechaAlt"]);
        $status= htmlspecialchars($_POST["txtStatus"]); // Iloocalizable, Contactado, Renuente, Convenio de pagos
        $grupo= htmlspecialchars($_POST["txtGrupo"]); // Zona metropolitana / Interior de la republica
        $gestor= htmlspecialchars($_POST["txtGestor"]);
        $precastigo = htmlspecialchars($_POST["txtPrecastigo"]);
    } else if ($_SESSION['rolUsuario'] == 'Gestor'){
        $estadoCel = htmlspecialchars($_POST["txtEstadoCel"]);
        $estadoPar = htmlspecialchars($_POST["txtEstadoPart"]);
        $estadoTrabajo = htmlspecialchars($_POST["txtEstadoTrab"]);
        $fechaAlt= htmlspecialchars($_POST["txtFechaAlt"]);
        $status= htmlspecialchars($_POST["txtStatus"]);
    }
    //SE EJECUTA UN MÉTODO DEL SERVICIO WEB, PASANDO SUS PARAMETROS
    $datos = $cliente->modificarCuenta($estadoCel, $estadoPar, $estadoTrabajo, $fechaAlt, $status, $cve, $grupo, $gestor, $precastigo);
    if($datos[0]["ID"]!= "0") {
        echo '<script language="javascript">alert("Cuenta modificada correctamente.")</script>';
        //  $prov = "";$pres = "";$nom = "";$cant = "";$cad = "";$usu = "";$precio_v = "";$precio_a = "";$foto="";
    } else {
        $datos[0] = 0;
        echo '<script language="javascript">alert("Cuenta no modificada, verificar datos.")</script>';
    }
} 

?>

<main>
    <div class="row">
        <div class="col col-md-10 col-xs-10">
              <div class="col-auto text-center">
                <h2><b for="" class="col-sm-2 col-form-label">Modificación de la cuenta <?=$cuenta?></b></h2>
              </div>
              <form method="POST" name="registrar" enctype="multipart/form-data">
                <div class="mb-3 row">
                      <label for="txtGrupo" class="col-sm-3 col-form-label text-center">Selecciona el grupo:</label>
                      <div class="col-sm-9">
                          <select class="form-select" id="txtGrupo" name="txtGrupo"
                            <?php
                            if($_SESSION["rolUsuario"] != 'Administrador')
                                echo "disabled";
                            echo ">";
                            if($grupo == 'Zona Metropolitana'){
                                echo '<option selected value="Zona metropolitana">Zona metropolitana</option>';
                                echo '<option  value="Interior de la republica">Interior de la republica</option>';
                            }else{
                                echo '<option value="Zona metropolitana">Zona metropolitana</option>';
                                echo '<option selected value="Interior de la republica">Interior de la republica</option>';
                            }
                                
                            ?>
                          </select>
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtCuenta" class="col-sm-3 col-form-label text-center">No. Cuenta:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="txtCuenta" name="txtCuenta" value="<?=$cuenta?>" required readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtNombre" class="col-sm-3 col-form-label text-center">Nombre:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" value="<?=$nombre?>" required readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtCalle" class="col-sm-3 col-form-label text-center">Calle:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="txtCalle" name="txtCalle" value="<?=$calle?>" required readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtNumExt" class="col-sm-3 col-form-label text-center">No. Exterior:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="txtNumExt" name="txtNumExt" value="<?=$numExt?>" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtNumInt" class="col-sm-3 col-form-label text-center">No. Interior:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="txtNumInt" name="txtNumInt" value="<?=$numInt?>" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtColonia" class="col-sm-3 col-form-label text-center">Colonia:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="txtColonia" name="txtColonia" value="<?=$colonia?>" required readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtMunicipio" class="col-sm-3 col-form-label text-center">Municipio:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="txtMunicipio" name="txtMunicipio" value="<?=$municipio?>" required readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtEstado" class="col-sm-3 col-form-label text-center">Estado:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="txtEstado" name="txtEstado" value="<?=$estado?>" required readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtCP" class="col-sm-3 col-form-label text-center">C.P:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="txtCP" name="txtCP" value="<?=$cp?>" required readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtCelular" class="col-sm-3 col-form-label text-center">Celular:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="txtCelular" name="txtCelular" value="<?=$celular?>" required readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                      <label for="txtEstadoCel" class="col-sm-3 col-form-label text-center">Selecciona el estado del celular:</label>
                      <div class="col-sm-9">
                          <select class="form-select" id="txtEstadoCel" name="txtEstadoCel">
                            <?php
                            if($estadoCel == 1){
                                echo '<option selected value="1">Activo</option>';
                                echo '<option  value="0">Inactivo</option>';
                            }else{
                                echo '<option value="1">Activo</option>';
                                echo '<option  value="0" selected>Inactivo</option>';
                            }
                                
                            ?>
                          </select>
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtContactTrab" class="col-sm-3 col-form-label text-center">Contacto de trabajo:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="txtContactTrab" name="txtContactTrab" value="<?=$contacTrabajo?>" required readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                      <label for="txtEstadoTrab" class="col-sm-3 col-form-label text-center">Selecciona el estado del contacto del trabajo:</label>
                      <div class="col-sm-9">
                          <select class="form-select" id="txtEstadoTrab" name="txtEstadoTrab">
                            <?php
                            if($estadoTrabajo == 1){
                                echo '<option selected value="1">Activo</option>';
                                echo '<option  value="0">Inactivo</option>';
                            }else{
                                echo '<option value="1">Activo</option>';
                                echo '<option  value="0" selected>Inactivo</option>';
                            }
                                
                            ?>
                          </select>
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtContacPar" class="col-sm-3 col-form-label text-center">Contacto particular:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="txtContacPar" name="txtContacPar" value="<?=$telPart?>" required readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                      <label for="txtEstadoPart" class="col-sm-3 col-form-label text-center">Selecciona el estado del contacto particular:</label>
                      <div class="col-sm-9">
                          <select class="form-select" id="txtEstadoPart" name="txtEstadoPart">
                            <?php
                            if($estadoPar == 1){
                                echo '<option selected value="1">Activo</option>';
                                echo '<option  value="0">Inactivo</option>';
                            }else{
                                echo '<option value="1">Activo</option>';
                                echo '<option  value="0" selected>Inactivo</option>';
                            }
                                
                            ?>
                          </select>
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtCorreo" class="col-sm-3 col-form-label text-center">Correo:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" value="<?=$correo?>" required readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtMora" class="col-sm-3 col-form-label text-center">Mora:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="txtMora" name="txtMora" value="<?=$mora?>" required readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtSaldo" class="col-sm-3 col-form-label text-center">Saldo:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="txtSaldo" name="txtSaldo" value="<?=$saldo?>" required readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtFechaCorte" class="col-sm-3 col-form-label text-center">Fecha de corte:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="txtFechaCorte" name="txtFechaCorte" value="<?=$fechaCorte?>" required readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtFechaAsig" class="col-sm-3 col-form-label text-center">Fecha de asignación:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="txtFechaAsig" name="txtFechaAsig" value="<?=$fechaAsig?>" required readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtGestor" class="col-sm-3 col-form-label text-center">Gestor:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="txtGestor" name="txtGestor" value="<?=$gestor?>" required 
                        <?php
                            if($_SESSION["rolUsuario"] != 'Administrador')
                                echo "readonly";
                            echo ">";
                        ?>
                    </div>
                </div>
                <div class="mb-3 row">
                      <label for="txtStatus" class="col-sm-3 col-form-label text-center">Selecciona el status:</label>
                      <div class="col-sm-9">
                          <select class="form-select" id="txtStatus" name="txtStatus">
                            <?php
                            foreach ($status_opciones as &$item) {
                                if($item == $status){
                                    echo '<option  value="'.$status.'" selected>'.$status.'</option>';
                                }else{
                                    echo '<option  value="'.$item.'">'.$item.'</option>';
                                }
                            }  
                            ?>
                          </select>
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtFechaAlt" class="col-sm-3 col-form-label text-center">Fecha de alta:</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="txtFechaAlt" name="txtFechaAlt" value="<?=$fechaAlt?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txtPrecastigo" class="col-sm-3 col-form-label text-center">Precastigo:</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" max="1" min="0" id="txtPrecastigo" name="txtPrecastigo" value="<?=$precastigo?>" required 
                        <?php
                            if($_SESSION["rolUsuario"] != 'Administrador')
                                echo "readonly";
                            echo ">";
                        ?>
                    </div>
                </div>
                <hr>
                  <div class="text-center">
                    <button type="submit" name="btnGuadar" id="btnGuadar" class="btn btn-sys">Modificar</button>
                    <button type="reset" class="btn btn-sys">Cancelar</button>
                  </div>
                <hr>
                </form>
        </div>
        
    </div>
</main>