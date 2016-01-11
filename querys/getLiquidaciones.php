<?php
function getLiquidaciones($fecha) {
	include_once "getHoras.php";
	include_once "getValorHora.php";
	include_once "getExtras.php";
	include_once "getTM.php";
	include_once dirname ( __FILE__ ) . '/../conexionLocal.php';
	$result = array(); //inicializa array result
	$getTM = getTM ();
	foreach ( $getTM as $info ) {
		$rut = $info ['Rut'];
		$sumaLiquidacion = 0;
		$contador = 0;
		$horasRealizadas = getHoras ( $rut, $fecha );
		if ($horasRealizadas) {
			foreach ( $horasRealizadas as $horas ) {
				
				if ($horas ['Semana'] == 7) {
					$semana = 0;
				} else {
					$semana = 1;
				}
				$valoresHora = getValorHora ( $rut );
				if($valoresHora){
				foreach ( $valoresHora as $valor ) {
					// aqui hay que hacer la confirmacion y multiplicacion
					if ($valor ['Empresa'] == $horas ['NombreEmpresa'] && $semana == $valor ['Semana']) {
						$sumaLiquidacion += $valor ['Valor'] * $horas ['Horas'];
					}
				}
				}
			
				if ($contador == 0) {
					$contador ++;
					$extrasTM = getExtras ( $rut, $fecha );
					if ($extrasTM) {
						foreach ( $extrasTM as $extra ) {
							// aqui se suman los extras del tm
							$sumaLiquidacion += $extra ['Monto'];
						}
					}
				}
			}
			//echo $horas ['TMNombre'];
			//echo $sumaLiquidacion;
			//echo "<br>";
			if($sumaLiquidacion != 0 ){
			$nombre = $horas['TMNombre']." ".$horas['TMApellido'];
			$rut = $info['Rut'];
			$result[$rut][]= $nombre;
			$result[$rut][]= $sumaLiquidacion;
			}
		}
	}
	return $result;
}
//echo json_encode(getLiquidaciones ( "2015-10" ));
//{"Admin":{"Liquidacion":15000}}
//getLiquidaciones ( "2015-10" );
?>