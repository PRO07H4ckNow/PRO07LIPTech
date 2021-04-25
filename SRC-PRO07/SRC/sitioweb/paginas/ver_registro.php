<?php
$estado = "0";
$datos=array();
$datosDel=array();
$totalRegistro=0;
$numRegistro=15;
$cve = $_GET['cve'];
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
	$datos=$cliente->contarCarac($cve);	
	
	$totalRegistro=$datos[0];		
	//DETEMRINA EL TOTAL DE PAÁGINAS
	$totalPaginas=ceil($totalRegistro/$numRegistro);	  	  					    
		
	//###SE EJECUTA UN MÉTODO DEL SERVICIO WEB, PASANDO SUS PARAMETROS
	//OBTIENE EL TOTAL DE REGISTROS A MOSTRAR EN LA PÁGINA
	$datosPag=$cliente->consultarCarac($cve,$inicioPag,$numRegistro);			
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
                <h2><b for="" class="col-form-label">Seguimientos Caracteristicas:</b></h2>
              </div>
              <form id="frmConexion" name="frmConexion" method="POST">
                <div class="container">
                    <div class="table-responsive table-report">
                      <table align="center" class="table table-dark table-striped">
                        <thead>
                          <tr>
                              <!--<td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>-->
                              <td><b>FECHA</b></td>
                              <td><b>REGISTRO SEGUIMIENTO</b></td> 
                              <td><b>PROMESAS</b></td>
                          </tr>
                        </thead>
                        <tbody>
                    <?php
                      if($estado!="0")
                      {	          
                    	for($rr=0;$rr<count($datosPag);$rr++){	
                    		echo "<tr>";
                    // 		echo "<td bg-primary><a href='?op=ver_registro&cve=".$datosPag[$rr]["CLAVE"]."' class='btn btn-sys btn-options' title='Editar' ><i class='fa fa-pencil-square-o'></i></a>
                    //             <br/>";
                            echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["FECHA"]."</td>";
                    		echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["REGISTRO SEGUIMIENTO"]."</td>";
                    		echo "<td><font class='Etiquetas2'>".$datosPag[$rr]["PROMESAS"]."</td>";
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
                      <a href='?op=registrar_seguimiento&cve=<?=$cve?>' class="btn btn-sys">Nuevo registro de seguimiento&nbsp;</a>
                      <a href='?op=progreso' class="btn btn-sys">Generar Reporte&nbsp;</a>
                  </div>
                <hr>
        </div>
        
    </div>
</main>