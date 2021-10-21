<?php

	abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase{

		// Valores por defecto
		public function crear ($nombre = "Pascual", $apellido = "Simonet", $dni = 12345678, $salario = 1000, $sector = "indefinido")
		{
			$c = new \App\Empleado ($nombre, $apellido, $dni, $salario, $sector);
			return $c;
		}
		//Tests 1/7: Nombre Y Apellido
		public function testSePuedeCrearYObtenerNombreYApellido(){
			$e = $this->crear();
			$this->assertEquals("Emanuel Montoto", $e->getNombreApellido());
		}
		//Tests 1/7: DNI
		public function testSePuedeCrearYObtenerDNI(){
			$e = $this->crear();
			$this->assertEquals(30, $e->getDNI());
		}
		//Tests 1/7: Salario
		public function testSePuedeCrearyObtenerElSalario(){
			$e = $this->crear();
			$this->assertEquals(5000,$e->getSalario());
		}
		// Tests 1/7: getSector Y setSector
		public function testSePuedeModificarElSectorDelEmpleado(){
			$e=$this->crear();
			$lugar = "cualquiera";
			$this->assertEquals("No especificado",$e->getSector());
			//seteo el sector que le asigno
			$e->setSector($lugar);
			//pruebo si se asigno correctamente
			$this->assertEquals("cualquiera",$e->getSector());
		}
		// Test 1/7: __toString
		public function testSePuedeConvertirElObjetoEnUnaCadena(){
			$e=$this->crear();
			$this->assertEquals("Emanuel Montoto 30 5000",$e);
		}
        // Test 2/7: Nombre vacio
		public function testExcepcionSiSeCreaEmpleadoConNombreVacio(){
			$this->expectException(\Exception::class);
			$e= $this-> crear($nombre="");
		}
		//Test 3/7: Apellido vacio
		public function testExcepcionSiSeCreaEmpleadoConApellidoVacio(){
			$this->expectException(\Exception::class);
			$e= $this-> crear($nombre="Franco", $Apellido="");
		}
		//Test 4/7: DNI Vacio
		public function testExcepcionSiSeCreaEmpleadoConDniVacio(){
			$this->expectException(\Exception::class);
			$e= $this-> crear(null, null,$dni="");
		}
        //Test 5/7: Salario Vacio
		public function testExcepcionSiSeCreaEmpleadoConSalarioVacio(){
			$this->expectException(\Exception::class);
			$e= $this-> crear(null, null, null,$Salario="");
		}
		//Test 6/7: DNI Con letras o caracteres no numericos
		public function testExcepcionSiSeCreaEmpleadoConDniQueContengaLetras(){
			$this->expectException(\Exception::class);
			$e= $this-> crear(null, null, "4kh69");
		}
		//Test 7/7: No se especifica el sector
		public function testSectorNoEspecificadoSiSeDanInstanciaSinEspecificar(){
			$e= $this-> crear("Franco", "Mitre", 3, 6000);
			$this->assertEquals("No especificado", $e->getSector());
		}
	}
?>