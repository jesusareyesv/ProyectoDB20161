<?php
	
	require_once 'conexion.php';

	$query = generarConsultaFuncion();

	$statement = exec_query($query);

	  $json = array();

	  while($data = oci_fetch_array($statement, OCI_ASSOC + OCI_FETCHSTATEMENT_BY_ROW)) {
	    if(!$data)
	      throw_error(oci_error($statement)['message']);

	    $json[] = $data;
	  }

	  oci_free_statement($statement);

	  header('Content-Type: application/json; charset=UTF-8');
	  echo json_encode($json);











	function generarConsultaFuncion(){
		$consulta = 0;
		if(isset($_POST["ruta"]){
			switch ($_POST["ruta"]) {
				case 'PORCENTAJE_TRATAMIENTOS':
					if(isset($_POST["mes"]) && isset($_POST["ano"])){
						$consulta = 'SELECT I.NOMBRE AS IMPLEMENTO, 
									SUM(TI.CANTIDAD) AS CANTIDAD 
									FROM TRATAMIENTO_IMPLEMENTO TI 
									JOIN CITA_TRATAMIENTO CT ON (TI.TRATAMIENTO_ID=CT.TRATAMIENTO_ID AND TI.CITA_ID=CT.CITA_ID) 
									JOIN IMPLEMENTO I ON (TI.IMPLEMENTO_ID=I.ID) 
									WHERE TO_CHAR(FECHA,\'MM\')=\''.$_POST["mes"].'\' AND TO_CHAR(FECHA,'YYYY')=\''.$_POST["ano"].'\'
							GROUP BY I.NOMBRE';
					}
					break;
				
				case 'GANANCIA_POR_MES':
					if(isset($_POST["mes"]) && isset($_POST["ano"])){
						$consulta = oci_parse(get_conexion(), 'begin :r := GANANCIA(:mes,:anho); end;');
						oci_bind_by_name($consulta, ':mes', $_POST["mes"]);
						oci_bind_by_name($consulta, ':anho', $_POST["ano"]);
						oci_bind_by_name($consulta, ':r', $_SESSION["resp"],40);
					}
					break;

				case 'GRAFICA_X':
					if(isset($_POST["ano"])){
						$consulta = oci_parse(get_conexion(), 'begin :r := GRAFICOANIO(:anho); end;');
						oci_bind_by_name($consulta, ':anho', $_POST["ano"]);
						oci_bind_by_name($consulta, ':r', $_SESSION["resp"],40);
					}
					break;

				case 4:
					'ganancias año'
					break;
			}



		}
		return $consulta;
	}

?>