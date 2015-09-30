<?php
function getLiquidaciones($fecha) {
	include_once "../querys/getHoras.php";
	include_once "../querys/getValorHora.php";
	include_once "../querys/getExtras.php";
	include_once "../querys/getTM.php";
	include_once dirname ( __FILE__ ) . '/../conexionLocal.php';
	
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
			echo $horas ['TMNombre'];
			echo $sumaLiquidacion;
			echo "<br>";
		}
	}
}
getLiquidaciones ( "2015-09" );
?>