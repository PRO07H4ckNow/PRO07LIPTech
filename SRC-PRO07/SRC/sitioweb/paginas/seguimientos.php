<?php
$estado = "0";
$datos=array();
$datosDel=array();
$totalRegistro=0;
$numRegistro=15;
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
	    
	//###SE EJECUTA UN MÉTODO DEL SERVICIO WEB, PASANDO SUS PARAMETROS
	$datos=$cliente->contarSeguimiento();	
	
	$totalRegistro=$datos[0];		
	//DETEMRINA EL TOTAL DE PAÁGINAS
	$totalPaginas=ceil($totalRegistro/$numRegistro);	  	  					    
		
	//###SE EJECUTA UN MÉTODO DEL SERVICIO WEB, PASANDO SUS PARAMETROS
	//OBTIENE EL TOTAL DE REGISTROS A MOSTRAR EN LA PÁGINA
	$datosPag=$cliente->consultarSeguimiento($inicioPag,$numRegistro);			
    $estado=1;
   
    //VERIFICA QUE LA VARIABLE ne TENGA VALOR PARA ELIMINAR AL USUARIO
    if (isset($_GET['ne'])){
       
       	$datosDel=$cliente->eliminarProducto($_GET['ne']);	
       	if((int)$datosDel[0]["ID"]!=0)
       	{
       	    echo '<script language="javascript">alert("Producto eliminado correctamente")</script>';
       	    echo "<script language='javascript'>document.location.href = 'inicio.php?op=productos';</script>";
       	}
    }

?>

<main>
    <div class="row">
        <div class="col col-md-12 col-xs-12">
              <div class="col-auto">
                <h2><b for="" class="col-form-label">Seguimientos:</b></h2>
              </div>
              <form id="frmConexion" name="frmConexion" method="POST">
                <div class="container">
                    <div class="table-responsive table-report">
                      <table align="center" class="table table-dark table-striped">
                        <thead>
                          <tr>
                              <td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
                              <td><b>CLAVE</b></td>
                              <td><b>NOMBRE</b></td> 
                              <td><b>CUENTA</b></td>
                              <td><b>ENCARGADO</b></td>
                              <td><b>SALDADO</b></td>
                          </tr>
                        </thead>
                        <tbody>
                    <?php
                      if($estado!="0")
                      {	          
                    	for($rr=0;$rr<count($datosPag);$rr++){	
                    		echo "<tr>";
                    		echo "<td bg-primary><a href='?op=ver_registro&cve=".$datosPag[$rr]["CLAVE"]."' class='btn btn-sys btn-options' title='Abrir' ><i class='fa fa-pencil-square-o'></i></a>
                                <br/>";
                            echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["CLAVE"]."</td>";
                    		echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["PROPIETARIO"]."</td>";
                    		echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["CUENTA"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["ENCARGADO"]."</td>";
                    	    echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["SALDADO"]."</td>";
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
                </form>
                <hr>
                  <div class="text-center">
                      <a href='?op=progreso' class="btn btn-sys">Generar Reporte&nbsp;</a>
                      <a href='?op=progreso' class="btn btn-sys">Nuevo historia de seguimiento&nbsp;</a>
                  </div>
                <hr>
        </div>
    </div>
</main>