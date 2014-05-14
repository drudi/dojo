<?php

require("FizzBuzz.php");

class FizzBuzzTest extends PHPUnit_Framework_TestCase
{
	private $lista;

	public function setUp()
	{		
		$fizzBuzz = new FizzBuzz();
		$this->lista = $fizzBuzz->getLista();
	}

	public function testLista()
	{
		$this->assertTrue(is_array($this->lista));
		$this->assertCount(100, $this->lista);
	}

	public function testListaDivisaoPor3EDemaisNumeros()
	{
		for($i = 1; $i <= 100; $i++){
			if (($i % 3 == 0) && !($i % 5 == 0)) {
				$this->assertSame('Fizz', $this->lista[$i -1]);
			}
		}
	}

	public function testListaDivisaoPor5()
	{
		for($i = 1; $i <= 100; $i++){
			if (!($i % 3 == 0) && ($i % 5 == 0)) {
				$this->assertSame('Buzz', $this->lista[$i -1]);
			}
		}
	}

	public function testListaDivisaoPor5E3()
	{
		for($i = 1; $i <= 100; $i++){
			if (($i % 3 == 0) && ($i % 5 == 0)) {
				$this->assertSame('FizzBuzz', $this->lista[$i -1]);
			}
		}
	}
}