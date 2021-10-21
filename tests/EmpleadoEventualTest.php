<?php
	require_once 'EmpleadoTest.php';
	
    class EmpleadoEventualTest extends EmpleadoTest{
        //Funcion Crear
		public function crear(  $nombre='Emanuel', $apellido ='Montoto', $dni=30, $salario = 5000,
								$montos = [100,150,200,250]){

							   $ee = new \App\EmpleadoEventual($nombre,$apellido, $dni, $salario, $montos);
							   return $ee;
		}
        //Tests 1/3: Calcular comision
		public function testLaComisionPorVentasFuncionaCorrectamente(){
			$ee= $this->crear(); //(100+150+200+250)/4)*0,05 = 8,75
			$this-> assertEquals(8.75,$ee->calcularComision()); 
		}
        //Tests 2/3: Calcular ingreso total
		public function testElCalculoDelIngresoTotalEsCorrecto(){
			$ee=$this->crear();
			$this->assertEquals(5008.75,$ee->calcularIngresoTotal());
		}
        //Tests 3/3: Monto de venta negativo o cero, excepcion
		public function testNoSePuedeCrearConMontoDeVentaNegativoOCero(){
			$this->expectException(\Exception::class); //avisamos que va a tirar una excepcion
			$ventas = [0,-100, 150, 200];
			$ee = $this->crear(null,null,null,$ventas);
		}
		
	}
?>