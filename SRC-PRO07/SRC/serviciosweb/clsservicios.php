<?php
// Definición de la clase
class clsservicios{
     //PROGRAMACIÓN DE MÉTODOS CON ACCESO A DATOS (MYSQL).
    public function acceso($usuario, $contrasena) {
        //DEFINICIÓN DEL ARREGLO RECEPTOR DE DATOS.
        $datos = array();
        //CADENA DE CONEXIÓN TIENE ÉSTE FORMATO: hosting, usuario, contraseña, base de datos.
        if($conn = mysqli_connect("localhost", "id16674937_admindeudoresdb", "_H~>?zfJySRo{u46", "id16674937_deudoresdb")){
            // CONEXION ABIERTA, PROCEDER A EJECUTAR COMANDOS SQL
            // CREACIÓN DE LA CONSULTA SQL
            $sqlText = "CALL spValidarAcceso('$usuario', '$contrasena')";
            // EJECUCION DE LA CONSULTA SQL
            $renglon = mysqli_query($conn, $sqlText);
          // VALIDA LA RECEPCION DE DATOS DE LA EJECUCION DEL PROCEDIMIENTO ALMACENADO
            while($resultado = mysqli_fetch_assoc($renglon)){
                // SE ANALIZARAN LOS DATOS PARA FORMATEAR EL ARREGLO DE SALIDA
                $datos[0]["ID"]=$resultado["CLAVE"];
                if( (int)$datos[0]!=0 ){
                    $datos[1]["NOMBRE"]=$resultado["USUARIO"];
                    $datos[2]["ROL"]=$resultado["ROL"];
                }
            }
            // CIERRE DE CONEXION
            mysqli_close($conn);
        }
        // RETORNAR DATOS A LA CAPA DE PRESENTACION
        return $datos;
    }
    
	public function modificarCuenta($op1, $op2, $op3, $fechaAlta, $opcionAlta, $deudor, $grupo, $gestor, $precastigo){
	$datos=array();  
    if($conn = mysqli_connect("localhost", "id16674937_admindeudoresdb", "_H~>?zfJySRo{u46", "id16674937_deudoresdb")){
		$renglon = mysqli_query($conn,"CALL spModAdmin('$op1', '$op2', '$op3', '$fechaAlta', '$opcionAlta', '$deudor', '$grupo', '$gestor', '$precastigo');");
       	while($resultado = mysqli_fetch_assoc($renglon)){
                $datos[0]["ID"]=$resultado["ID"];		
			}		
        mysqli_close($conn); 
      } 
	   return $datos;
	}
	public function contarCuenta(){
		$res=array();		
        if($conn = mysqli_connect("localhost", "id16674937_admindeudoresdb", "_H~>?zfJySRo{u46", "id16674937_deudoresdb")){
		   $consulta = mysqli_query($conn,"call spConsCuenta(0,0,0);");	      			 
		   $res[0]=mysqli_num_rows($consulta);		  	  
		}
		mysqli_free_result($consulta);
		mysqli_close($conn); 			
		return $res;
	}
	public function consultarCuenta($inicioPag,$numReg){
		$datos=array();		
		$reg=0;
        if($conn = mysqli_connect("localhost", "id16674937_admindeudoresdb", "_H~>?zfJySRo{u46", "id16674937_deudoresdb")){
		   $consulta = mysqli_query($conn,"call spConsCuenta(1,$inicioPag,$numReg);");	      			 
		  	while($resultado = mysqli_fetch_assoc($consulta)){
		  	    $datos[$reg]["ID"]=$resultado["ID"];
                $datos[$reg]["GRUPO"]=$resultado["GRUPO"];				
			    $datos[$reg]["CUENTA"] =$resultado["CUENTA"];					
			    $datos[$reg]["NOMBRE"] =$resultado["NOMBRE"];
			    $datos[$reg]["CALLE"] =$resultado["CALLE"];	
			    $datos[$reg]["NÚMERO EXTERIOR"] =$resultado["NÚMERO EXTERIOR"];	
			    $datos[$reg]["NÚMERO INTERIOR"] =$resultado["NÚMERO INTERIOR"];
			    $datos[$reg]["COLONIA"] =$resultado["COLONIA"];
			    $datos[$reg]["MUNICIPIO"] =$resultado["MUNICIPIO"];
			    $datos[$reg]["ESTADO"] =$resultado["ESTADO"];
			    $datos[$reg]["C.P"] =$resultado["C.P"];
			    $datos[$reg]["CELULAR"] =$resultado["CELULAR"];
			    $datos[$reg]["ESTADO CELULAR"] =$resultado["ESTADO CELULAR"];
			    $datos[$reg]["CONTACTO TRABAJO"] =$resultado["CONTACTO TRABAJO"];
			    $datos[$reg]["ESTADO TRABAJO"] =$resultado["ESTADO TRABAJO"];
			    $datos[$reg]["TELÉFONO PARTICULAR"] =$resultado["TELÉFONO PARTICULAR"];
			    $datos[$reg]["ESTADO PARTICULAR"] =$resultado["ESTADO PARTICULAR"];
			    $datos[$reg]["CORREO"] =$resultado["CORREO"];
			    $datos[$reg]["MORA"] =$resultado["MORA"];
			    $datos[$reg]["SALDO"] =$resultado["SALDO"];
			    $datos[$reg]["FECHA CORTE"] =$resultado["FECHA CORTE"];
			    $datos[$reg]["FECHA ASIGNACIÓN"] =$resultado["FECHA ASIGNACIÓN"];
			    $datos[$reg]["GESTOR"] =$resultado["GESTOR"];
			    $datos[$reg]["STATUS"] =$resultado["STATUS"];
			    $datos[$reg]["FECHA ALTA"] =$resultado["FECHA ALTA"];
			    $datos[$reg]["PRECASTIGO"] =$resultado["PRECASTIGO"];
			   	$reg++;
			}		
				mysqli_close($conn); 
		}
		return $datos;
	}
// ----------------------------------------------------Filtro---------------------------------------------------
	public function contarCuentaFiltro(){
		$res=array();		
        if($conn = mysqli_connect("localhost", "id16674937_admindeudoresdb", "_H~>?zfJySRo{u46", "id16674937_deudoresdb")){
		   $consulta = mysqli_query($conn,"call spBuscaProductoFiltro(0,0,0,'','','','','','','','','','','','','','','','','','','','','','','','','')");	      			 
		   $res[0]=mysqli_num_rows($consulta);		  	  
		}
		mysqli_free_result($consulta);
		mysqli_close($conn); 			
		return $res;
	}
	public function consultarCuentaFiltro($inicioPag,$numReg,$grupo="",$cuena="",$nombre="",$calle="",$numEx="",$num="",$colonia="",$municipio="",$estado="",$cp="",$celular="",$celularEs="",$telTrabajo="",$trabajoEs="",$telParicular="",$paricularEs="",$correo="",$mora="",$saldo="",$fechaCore="",$fechaAsig="",$gestor="",$status="",$fechaAl="",$precastigo=""){
		$datos=array();		
		$reg=0;
        if($conn = mysqli_connect("localhost", "id16674937_admindeudoresdb", "_H~>?zfJySRo{u46", "id16674937_deudoresdb")){
		   $consulta = mysqli_query($conn,"call spConsCuenta(1,$inicioPag,$numReg,$grupo,$cuena,$nombre,$calle,$numEx,$num,$colonia,$municipio,$estado,$cp,$celular,$celularEs,$telTrabajo,$trabajoEs,$telParicular,$paricularEs,$correo,$mora,$saldo,$fechaCore,$fechaAsig,$gestor,$status,$fechaAla,$precastigo)");	      			 
		  	while($resultado = mysqli_fetch_assoc($consulta)){
		  	    $datos[$reg]["ID"]=$resultado["ID"];
                $datos[$reg]["GRUPO"]=$resultado["GRUPO"];				
			    $datos[$reg]["CUENTA"] =$resultado["CUENTA"];					
			    $datos[$reg]["NOMBRE"] =$resultado["NOMBRE"];
			    $datos[$reg]["CALLE"] =$resultado["CALLE"];	
			    $datos[$reg]["NÚMERO EXTERIOR"] =$resultado["NÚMERO EXTERIOR"];	
			    $datos[$reg]["NÚMERO INTERIOR"] =$resultado["NÚMERO INTERIOR"];
			    $datos[$reg]["COLONIA"] =$resultado["COLONIA"];
			    $datos[$reg]["MUNICIPIO"] =$resultado["MUNICIPIO"];
			    $datos[$reg]["ESTADO"] =$resultado["ESTADO"];
			    $datos[$reg]["C.P"] =$resultado["C.P"];
			    $datos[$reg]["CELULAR"] =$resultado["CELULAR"];
			    $datos[$reg]["ESTADO CELULAR"] =$resultado["ESTADO CELULAR"];
			    $datos[$reg]["CONTACTO TRABAJO"] =$resultado["CONTACTO TRABAJO"];
			    $datos[$reg]["ESTADO TRABAJO"] =$resultado["ESTADO TRABAJO"];
			    $datos[$reg]["TELÉFONO PARTICULAR"] =$resultado["TELÉFONO PARTICULAR"];
			    $datos[$reg]["ESTADO PARTICULAR"] =$resultado["ESTADO PARTICULAR"];
			    $datos[$reg]["CORREO"] =$resultado["CORREO"];
			    $datos[$reg]["MORA"] =$resultado["MORA"];
			    $datos[$reg]["SALDO"] =$resultado["SALDO"];
			    $datos[$reg]["FECHA CORTE"] =$resultado["FECHA CORTE"];
			    $datos[$reg]["FECHA ASIGNACIÓN"] =$resultado["FECHA ASIGNACIÓN"];
			    $datos[$reg]["GESTOR"] =$resultado["GESTOR"];
			    $datos[$reg]["STATUS"] =$resultado["STATUS"];
			    $datos[$reg]["FECHA ALTA"] =$resultado["FECHA ALTA"];
			    $datos[$reg]["PRECASTIGO"] =$resultado["PRECASTIGO"];
			   	$reg++;
			}		
				mysqli_close($conn); 
		}
		return $datos;
	}
// 	--------------------------------------------------Seguimientos-----------------------------------------------
public function contarSeguimiento(){
		$res=array();		
        if($conn = mysqli_connect("localhost", "id16674937_admindeudoresdb", "_H~>?zfJySRo{u46", "id16674937_deudoresdb")){
		   $consulta = mysqli_query($conn,"call spConsSeguimiento(0,0,0);");	      			 
		   $res[0]=mysqli_num_rows($consulta);		  	  
		}
		mysqli_free_result($consulta);
		mysqli_close($conn); 			
		return $res;
	}
	public function consultarSeguimiento($inicioPag,$numReg){
		$datos=array();		
		$reg=0;
        if($conn = mysqli_connect("localhost", "id16674937_admindeudoresdb", "_H~>?zfJySRo{u46", "id16674937_deudoresdb")){
		   $consulta = mysqli_query($conn,"call spConsSeguimiento(1,$inicioPag,$numReg);");	      			 
		  	while($resultado = mysqli_fetch_assoc($consulta)){
		  	    $datos[$reg]["CLAVE"]=$resultado["CLAVE"];
			    $datos[$reg]["PROPIETARIO"] =$resultado["PROPIETARIO"];
			    $datos[$reg]["CUENTA"] =$resultado["CUENTA"];					
			    $datos[$reg]["ENCARGADO"] =$resultado["ENCARGADO"];	
			    $datos[$reg]["SALDADO"] =$resultado["SALDADO"];
			   	$reg++;
			}		
				mysqli_close($conn); 
		}
		return $datos;
	}
// 	-------------------------------------------------------------------------------------------------------------
// 	-----------------------------------SeguimientosCaracteristicas-----------------------------------------------
public function contarCarac($cve){
		$res=array();		
        if($conn = mysqli_connect("localhost", "id16674937_admindeudoresdb", "_H~>?zfJySRo{u46", "id16674937_deudoresdb")){
		   $consulta = mysqli_query($conn,"call spConsCarac($cve,0,0,0);");	      			 
		   $res[0]=mysqli_num_rows($consulta);		  	  
		}
		mysqli_free_result($consulta);
		mysqli_close($conn); 			
		return $res;
	}
	public function consultarCarac($cve,$inicioPag,$numReg){
		$datos=array();		
		$reg=0;
        if($conn = mysqli_connect("localhost", "id16674937_admindeudoresdb", "_H~>?zfJySRo{u46", "id16674937_deudoresdb")){
		   $consulta = mysqli_query($conn,"call spConsCarac($cve,1,$inicioPag,$numReg);");	      			 
		  	while($resultado = mysqli_fetch_assoc($consulta)){
		  	    $datos[$reg]["FECHA"]=$resultado["FECHA"];
			    $datos[$reg]["REGISTRO SEGUIMIENTO"] =$resultado["REGISTRO SEGUIMIENTO"];
			    $datos[$reg]["PROMESAS"] =$resultado["PROMESAS"];					
			   	$reg++;
			}		
				mysqli_close($conn); 
		}
		return $datos;
	}
	public function registrarCarac($cve, $act, $prom){
	  $datos=array();  
      if($conn = mysqli_connect("localhost", "id16674937_admindeudoresdb", "_H~>?zfJySRo{u46", "id16674937_deudoresdb")){
		$renglon = mysqli_query($conn,"CALL spInsCarac('$cve','$act','$prom');");	  			
       	while($resultado = mysqli_fetch_assoc($renglon)){
                $datos[0]["ID"]=$resultado["ID"];		
			}		
        mysqli_close($conn); 
      } 
	   return $datos;
	}
// 	-------------------------------------------------------------------------------------------------------------
	
	public function filtrarCuenta($cve){
		$datos=array();		
		$reg=0;
		
      if($conn = mysqli_connect("localhost", "id16674937_admindeudoresdb", "_H~>?zfJySRo{u46", "id16674937_deudoresdb")){
		   $consulta = mysqli_query($conn,"call spFiltrarCuenta($cve);");	      			 
		  	while($resultado = mysqli_fetch_assoc($consulta)){
                $datos[$reg]["ID"]=$resultado["ID"];
                $datos[$reg]["GRUPO"]=$resultado["GRUPO"];				
			    $datos[$reg]["CUENTA"] =$resultado["CUENTA"];					
			    $datos[$reg]["NOMBRE"] =$resultado["NOMBRE"];
			    $datos[$reg]["CALLE"] =$resultado["CALLE"];	
			    $datos[$reg]["NÚMERO EXTERIOR"] =$resultado["NÚMERO EXTERIOR"];	
			    $datos[$reg]["NÚMERO INTERIOR"] =$resultado["NÚMERO INTERIOR"];
			    $datos[$reg]["COLONIA"] =$resultado["COLONIA"];
			    $datos[$reg]["MUNICIPIO"] =$resultado["MUNICIPIO"];
			    $datos[$reg]["ESTADO"] =$resultado["ESTADO"];
			    $datos[$reg]["C.P"] =$resultado["C.P"];
			    $datos[$reg]["CELULAR"] =$resultado["CELULAR"];
			    $datos[$reg]["ESTADO CELULAR"] =$resultado["ESTADO CELULAR"];
			    $datos[$reg]["CONTACTO TRABAJO"] =$resultado["CONTACTO TRABAJO"];
			    $datos[$reg]["ESTADO TRABAJO"] =$resultado["ESTADO TRABAJO"];
			    $datos[$reg]["TELÉFONO PARTICULAR"] =$resultado["TELÉFONO PARTICULAR"];
			    $datos[$reg]["ESTADO PARTICULAR"] =$resultado["ESTADO PARTICULAR"];
			    $datos[$reg]["CORREO"] =$resultado["CORREO"];
			    $datos[$reg]["MORA"] =$resultado["MORA"];
			    $datos[$reg]["SALDO"] =$resultado["SALDO"];
			    $datos[$reg]["FECHA CORTE"] =$resultado["FECHA CORTE"];
			    $datos[$reg]["FECHA ASIGNACIÓN"] =$resultado["FECHA ASIGNACIÓN"];
			    $datos[$reg]["GESTOR"] =$resultado["GESTOR"];
			    $datos[$reg]["STATUS"] =$resultado["STATUS"];
			    $datos[$reg]["FECHA ALTA"] =$resultado["FECHA ALTA"];
			    $datos[$reg]["PRECASTIGO"] =$resultado["PRECASTIGO"];
			   	$reg++;
			}		
				mysqli_close($conn); 
		}
				
		return $datos;
	}
}

?>