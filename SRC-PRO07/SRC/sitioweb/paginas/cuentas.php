<?php
$estado = "0";
$datos=array();
$datosDel=array();
$totalRegistro=0;
$numRegistro=30;
//######### HACE USO DEL SERVICIO WEB QUE ESTA PUBLICADO DE MANERA LOCAL ########		 
    $cliente = new SoapClient(null, array('uri' => 'http://localhost/', 'location'=>'https://projecthnw.000webhostapp.com/SRC/serviciosweb/servicioweb.php'));
    //OBITNE LA PÁGINA ACTUAL O A LA QUE SE LE HIZO CLIC
    if(isset($_GET['pagina'])){
	  $numPagina=$_GET['pagina'];		
	}
	else{ //la primera vez que mostrará los datos
		  $inicioPag=0;
		  $numPagina=1;
	}	 	 
	//DETERMINA CUÁNTOS REGISTROS SE TRAERAN POR PÁGINA
	if($numPagina>1){		  
		$inicioPag=($numPagina-1)*$numRegistro;	  		
	}
	else{ //CUANDO ES LA PRIMERA VEZ
		$inicioPag=0;
	}	  
	if(isset($_POST["btnFiltro"])){
	    extract($_POST);
	    //###SE EJECUTA UN MÉTODO DEL SERVICIO WEB, PASANDO SUS PARAMETROS
	    $datos=$cliente->contarCuentaFiltro(); 
	    $totalRegistro=$datos[0];
	    echo $totalRegistro;
        //DETEMRINA EL TOTAL DE PAÁGINAS
    	$totalPaginas=ceil($totalRegistro/$numRegistro);	  	  					    
    		
    	//###SE EJECUTA UN MÉTODO DEL SERVICIO WEB, PASANDO SUS PARAMETROS
    	//OBTIENE EL TOTAL DE REGISTROS A MOSTRAR EN LA PÁGINA
    	$datosPag=$cliente->consultarCuentaFiltro($inicioPag,$numRegistro,$txtGrupo,$txtCuenta,$txtNombre,$txtCalle,$txtNumExt,$txtNumInt,$txtColonia,$txtMunicipio,$txtEstado,$txtCP,$txtCelular,$txtEstadoCel,$txtContactTrab,$txtEstadoTrab,$txtContacPar,$txtEstadoPart,$txtCorreo,$txtMora,$txtSaldo,$txtFechaCorte,$txtFechaAsig,$txtGestor,$txtStatus,$txtFechaAlta,$txtPrecastigo);			
        $estado=1;
	}else{
	    //###SE EJECUTA UN MÉTODO DEL SERVICIO WEB, PASANDO SUS PARAMETROS
	    $datos=$cliente->contarCuenta(); 
	    $totalRegistro=$datos[0];		
        //DETEMRINA EL TOTAL DE PAÁGINAS
    	$totalPaginas=ceil($totalRegistro/$numRegistro);	  	  					    
    		
    	//###SE EJECUTA UN MÉTODO DEL SERVICIO WEB, PASANDO SUS PARAMETROS
    	//OBTIENE EL TOTAL DE REGISTROS A MOSTRAR EN LA PÁGINA
    	$datosPag=$cliente->consultarCuenta($inicioPag,$numRegistro);			
        $estado=1;
	}


?>

<main>
    <div class="row">
        <div class="col col-md-12 col-xs-12">
              <div class="col-auto">
                <h2><b for="" class="col-form-label">Cuentas existentes:</b></h2>
              </div>
                <div class="container">
                    <div class="table-responsive table-report">
                      <table align="center" class="table table-dark table-striped">
                        <thead>
                          <tr>
                              <td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                              <td><b>GRUPO</b></td>
                              <td><b>CUENTA</b></td>
                              <td><b>NOMBRE</b></td>  
                              <td><b>CALLE</b></td>
                              <td><b>#EXTERIOR</b></td> 
                              <td><b>#INTERIO</b></td>
                              <td><b>COLONIA</b></td> 
                              <td><b>MUNICIPIO</b></td>
                              <td><b>ESTADO</b></td>
                              <td><b>C.P</b></td>
                              <td><b>CELULAR</b></td>
                              <td><b>ESTADO CELULAR</b></td>
                              <td><b>CONTACTO TRABAJO</b></td>
                              <td><b>ESTADO TRABAJO</b></td>
                              <td><b>TELÉFONO PARTICULAR</b></td>
                              <td><b>ESTADO PARTICULAR</b></td>
                              <td><b>CORREO</b></td>
                              <td><b>MORA</b></td>
                              <td><b>SALDO</b></td>
                              <td><b>FECHA CORTE</b></td>
                              <td><b>FECHA ASIGNACIÓN</b></td>
                              <td><b>GESTOR</b></td>
                              <td><b>STATUS</b></td>
                              <td><b>FECHA ALTA</b></td>
                              <td><b>PRECASTIGO</b></td>
                          </tr>
                          <form action="inicio.php?op=cuentas" method="POST">
                          <tr>
                              <td></td>
                              <td>
                                    <select class="form-select" id="txtGrupo" name="txtGrupo">
                                        <option  value="">NA</option>
                                        <option  value="Interior de la republica">Interior de la republica</option>
                                        <option value="Zona metropolitana">Zona metropolitana</option>
                                    </select>
                              </td>
                              <td>
                                  <input type="text" class="form-control" id="txtCuenta" name="txtCuenta">
                              </td>
                              <td>
                                  <input type="text" class="form-control" id="txtNombre" name="txtNombre">
                              </td>  
                              <td>
                                  <input type="text" class="form-control" id="txtCalle" name="txtCalle">
                              </td>
                              <td>
                                  <input type="number" class="form-control" id="txtNumExt" name="txtNumExt"
                              </td> 
                              <td>
                                  <input type="number" class="form-control" id="txtNumInt" name="txtNumInt">
                              </td>
                              <td>
                                  <input type="text" class="form-control" id="txtColonia" name="txtColonia">
                              </td> 
                              <td>
                                  <input type="text" class="form-control" id="txtMunicipio" name="txtMunicipio">
                              </td>
                              <td>
                                  <input type="text" class="form-control" id="txtEstado" name="txtEstado">
                              </td>
                              <td>
                                  <input type="number" class="form-control" id="txtCP" name="txtCP">
                              </td>
                              <td>
                                  <input type="number" class="form-control" id="txtCelular" name="txtCelular">
                              </td>
                              <td>
                                <select class="form-select" id="txtEstadoCel" name="txtEstadoCel">
                                    <option  value="">NA</option>
                                    <option  value="1">Activo</option>
                                    <option  value="0">Inactivo</option>
                                </select>
                              </td>
                              <td>
                                   <input type="number" class="form-control" id="txtContactTrab" name="txtContactTrab">
                              </td>
                              <td>
                                  <select class="form-select" id="txtEstadoTrab" name="txtEstadoTrab">
                                      <option  value="">NA</option>
                                    <option  value="1">Activo</option>
                                    <option  value="0">Inactivo</option>
                                </select>
                              </td>
                              <td>
                                  <input type="number" class="form-control" id="txtContacPar" name="txtContacPar">
                              </td>
                              <td>
                                  <select class="form-select" id="txtEstadoPart" name="txtEstadoPart">
                                      <option  value="">NA</option>
                                    <option  value="1">Activo</option>
                                    <option  value="0">Inactivo</option>
                                </select>
                              </td>
                              <td>
                                  <input type="email" class="form-control" id="txtCorreo" name="txtCorreo">
                              </td>
                              <td>
                                  <input type="number" class="form-control" id="txtMora" name="txtMora">
                              </td>
                              <td>
                                  <input type="number" class="form-control" id="txtSaldo" name="txtSaldo">
                              </td>
                              <td>
                                  <input type="date" class="form-control" id="txtFechaCorte" name="txtFechaCorte">
                              </td>
                              <td>
                                  <input type="date" class="form-control" id="txtFechaAsig" name="txtFechaAsig">
                              </td>
                              <td>
                                  <input type="number" class="form-control" id="txtGestor" name="txtGestor">
                              </td>
                              <td>
                                <select class="form-select" id="txtStatus" name="txtStatus">
                                    <option  value="">NA</option>
                                    <option  value="Ilocalizable">Ilocalizable</option>
                                    <option  value="Contactado">Contactado</option>
                                    <option  value="Renuente">Renuente</option>
                                    <option  value="Convenio de pagos">Convenio de pagos</option>
                                </select>
                              </td>
                              <td>
                                  <input type="date" class="form-control" id="txtFechaAlta" name="txtFechaAlta">
                              </td>
                              <td>
                                  <select class="form-select" id="txtPrecastigo" name="txtPrecastigo">
                                      <option  value="">NA</option>
                                    <option  value="1">1</option>
                                    <option  value="0">0</option>
                                </select>
                              </td>
                          </tr>
                        </thead>
                        <tbody>
                    <?php
                      if($estado!="0")
                      {	          
                    	for($rr=0;$rr<count($datosPag);$rr++){	
                    		echo "<tr>";
                    		echo "<td bg-primary><a href='?op=modificar-cuenta&cve=".$datosPag[$rr]["ID"]."' class='btn btn-sys btn-options' title='Editar' ><i class='fa fa-pencil-square-o'></i></a>
                                <br/>";
                            echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["GRUPO"]."</td>";
                    		echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["CUENTA"]."</td>";
                    		echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["NOMBRE"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["CALLE"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["NÚMERO EXTERIOR"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["NÚMERO INTERIOR"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["COLONIA"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["MUNICIPIO"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["ESTADO"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["C.P"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["CELULAR"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["ESTADO CELULAR"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["CONTACTO TRABAJO"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["ESTADO TRABAJO"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["TELÉFONO PARTICULAR"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["ESTADO PARTICULAR"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["CORREO"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["MORA"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["SALDO"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["FECHA CORTE"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["FECHA ASIGNACIÓN"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["GESTOR"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["STATUS"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["FECHA ALTA"]."</td>";
                    		echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["PRECASTIGO"]."</td>";
                    		echo "</tr>";
                          }
                    	  echo "</tbody></table></div><center>";
                	  if($totalPaginas>1)
                	  {
                	     echo "<font class='Etiquetas2'>P&aacute;ginas: </font>";
                	  }
                	  else
                	  {
                		  echo "P&aacute;gina:";
                	  }	  
                	  for ($i=1; $i<=$totalPaginas; $i++)
                	  {		
                		if ($numPagina == $i)
                		{
                			echo "<font class='text-primary'><b> $numPagina </b> </font>";
                		}
                		else
                		{		
                			echo " <a href='?op=productos&pagina=$i'>$i</a> ";
                		}
                	  }
                	  echo "</center>";
                	  
                  }
                ?>
                </div>
                <!--</form>-->
                <hr>
                  <div class="text-center">
                      <a href='?op=progreso' class="btn btn-sys">Cargar Excel&nbsp;</a>
                      <input type="submit" name="btnFiltro" value="Filtrar Registros" class="btn btn-sys">
                  </div>
                  </form>
                <hr>
        </div>
        
    </div>
</main>