<?php
	require_once 'EmpleadoTest.php';
	
	class EmpleadoPermanenteTest extends EmpleadoTest{
		
		//Funcion crear
		public function crear($nombre="Emanuel", $apellido="Montoto", $dni=30, $salario=5000, $fechaIngreso=null){
			$fecha = new \DateTime();
			$ep = new \App\EmpleadoPermanente($nombre, $apellido, $dni, $salario, $fechaIngreso);
			return $ep;
		}
		//Tests 1/6: getFechaIngreso()
		public function testSePuedeCrearYObtenerFechaIngreso(){
			$hoy = new DateTime();
			$ep= $this->crear();
			$this->assertEquals($hoy->format('Y-m-d'), $ep->getFechaIngreso()->format('Y-m-d'));
		}
		//Tests 2/6: calcularComision()
		public function testCalcularComisionEnBaseALaAntiguedad(){
			$ingreso = new DateTime();
			$ingreso->modify('-10 years');
			$ep= $this->crear('Emanuel','Montoto','30','5000', $ingreso); 
			$this->assertEquals("10%",$ep->calcularComision());
		}
        //Tests 3/6: calcularIngresoTotal()
		public function testSePuedeCalcularElIngresoTotal(){
			$ingreso = new DateTime();
			$ingreso->modify('-10 years');
			$ep= $this->crear('Emanuel','Montoto','30','5000', $ingreso); 
			$this->assertEquals(4400,$ep->calcularIngresoTotal());
		}
		//Tests 4/6: calcularAntiguedad() 
		public function testSePuedeCalcularAntiguedad(){
			$ingreso = new DateTime();
			$ingreso->modify('-10 years');
			$ep= $this->crear('Emanuel','Montoto','30','5000', $ingreso);
			$this->assertEquals(10,$ep->calcularAntiguedad());
		}
        //Test 5/6: Empleado sin proporcionar la fecha de ingreso
        
        //Tests 6/6: Fecha de ingreso posterior a la de hoy, excepción
		public function testNoSePuedeCrearConFechaPosteriorAlDiaDeHoy(){
			$ingreso = new DateTime();
			$ingreso->modify('+10 years'); //le sumo 10 años a la fecha creada
			$this->expectException(\Exception::class);
			$ep= $this->crear('Emanuel','Montoto','30','5000', $ingreso); //tiro la excepcion al instanciar
		}
		
	}
?>