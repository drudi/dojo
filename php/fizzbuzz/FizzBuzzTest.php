<?php

class FizzBuzzTest extends PHPUnit_Framework_TestCase
{	
	public $fizzBuzz;

	public function setUp()
	{
		$this->fizzBuzz = new FizzBuzz();
	}

	public function testPercorrerLista()
	{
		$lista = $this->fizzBuzz->getLista();
		$this->assertCount(100, $lista);
	}

	public function testTrocandoUmPorFizzRetornaUm()
	{
		$this->assertEquals(1, $this->fizzBuzz->trocarPorFizz(1));
	}

	public function testTrocandoTresPorFizzRetornaFizz()
	{
		$this->assertEquals('Fizz', $this->fizzBuzz->trocarPorFizz(3));
	}

	public function testTrocandoQuatroPorFizzRetornaQuatro()
	{	
		$this->assertEquals(4, $this->fizzBuzz->trocarPorFizz(4));
	}

	/**
	 * @expectedException Exception 
	 */
	public function testTrocandoNullPorFizzRetornaException()
	{	
		$this->fizzBuzz->trocarPorFizz(null);
	}

	/**
	 * @expectedException Exception 
	 */
	public function testTrocandoBooleanPorFizzRetornaException()
	{
		$this->fizzBuzz->trocarPorFizz(true);
	} 

	public function testTrocandoUmPorBuzzRetornaUm()
	{
		$this->assertEquals(1, $this->fizzBuzz->trocarPorBuzz(1));
	}
	
	public function testTrocandoCincoPorBuzzRetornaBuzz()
	{
		$this->assertEquals('Buzz', $this->fizzBuzz->trocarPorBuzz(5));
	}	

	/**
	* @expectedException Exception
	*/
	public function testTrocandoNullPorBuzzRetornaExcecao()
	{
		$this->fizzBuzz->trocarPorBuzz(null);
	}
	/**
	* @expectedException Exception
	*/
	public function testTrocandoStringPorBuzzRetornaExcecao()
	{
		$this->fizzBuzz->trocarPorBuzz('a');
	}

	public function testTrocandoUmPorFizzBuzzRetornaUm()
	{
		$this->assertEquals(1, $this->fizzBuzz->trocarPorFizzBuzz(1));
	}

	public function testTrocandoQuinzePorFizzBuzzRetornaFizzBuzz()
	{
		$this->assertEquals('FizzBuzz', $this->fizzBuzz->trocarPorFizzBuzz(15));
	}

	public function testTrocandoTresPorFizzBuzzRetornaTres()
	{
		$this->assertEquals(3, $this->fizzBuzz->trocarPorFizzBuzz(3));
	}

	public function testTrocandoCincoPorFizzBuzzRetornaCinco()
	{
		$this->assertEquals(5, $this->fizzBuzz->trocarPorFizzBuzz(5));
	}

	/**
	* @expectedException Exception
	*/
	public function testTrocandoStringPorFizzBuzzRetornaExcecao()
	{
		$this->fizzBuzz->trocarPorFizzBuzz('a');
	}

	public function testTrocandoTrintaPorFizzBuzzRetornaFizzBuzz()
	{
		$this->assertEquals('FizzBuzz', $this->fizzBuzz->trocarPorFizzBuzz(30));
	}

	public function testListaConvertidaPassandoTresRetornaFizz()
	{
		$listaConvertida = $this->fizzBuzz->listaConvertida();
		$this->assertEquals('Fizz', $listaConvertida[3]);
	}

	public function testListaConvertidaPassandoUmRetornaUm()
	{
		$listaConvertida = $this->fizzBuzz->listaConvertida();
		$this->assertEquals(1, $listaConvertida[1]);
	}

	public function testListaConvertidaPassandoCincoRetornaBuzz()
	{
		$listaConvertida = $this->fizzBuzz->listaConvertida();
		$this->assertEquals('Buzz', $listaConvertida[5]);
	}

	public function testListaConvertidaPassando15RetornaFizzBuzz()
	{
		$listaConvertida = $this->fizzBuzz->listaConvertida();
		$this->assertEquals('FizzBuzz', $listaConvertida[15]);
	}
}

class FizzBuzz
{
	public function getLista()
	{
		$lista = array();
		for ($item = 0; $item < 100; $item++)
		{
			$lista[] = $item;
		}

		return $lista;
	}

	public function trocarPorFizz($numero)
	{
		$this->validar($numero);
		return ($numero%3 == 0 ? 'Fizz' : $numero);
	}

	public function validar($numero)
	{
		if (!is_numeric($numero)) {
			throw new Exception("Número Invalido");
		}
	}

	public function trocarPorBuzz($numero)
	{
		$this->validar($numero);
		return ($numero % 5 == 0 ? 'Buzz' : $numero);
	}

	public function trocarPorFizzBuzz($numero)
	{
		$this->validar($numero);
		return ($numero % 15 == 0 ? 'FizzBuzz' : $numero);
	}

	public function listaConvertida()
	{
		$lista = array();

		foreach ($this->getLista() as $chave => $valor) {

			if (!is_numeric($this->trocarPorFizzBuzz($valor))) {
				$lista[$chave] = $this->trocarPorFizzBuzz($valor);
			} elseif (!is_numeric($this->trocarPorBuzz($valor))) {
				$lista[$chave] = $this->trocarPorBuzz($valor);
			} elseif (!is_numeric($this->trocarPorFizz($valor))) {
				$lista[$chave] = $this->trocarPorFizz($valor);
			} else {
				$lista[$chave] = $valor;
			}
		}

		return $lista;
	}
}