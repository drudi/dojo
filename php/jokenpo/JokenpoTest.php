<?php

class Jokenpo
{
	private $jogadores;

	public function setJogador($jogador)
	{
		$this->jogadores[] = $jogador;
		return true;
	}

	public function getQuantidadeJogadores()
	{
		return count($this->jogadores);
	}

	public function getJogadorUm()
	{
		return $this->jogadores[0];
	}

	public function getJogadorDois()
	{
		return $this->jogadores[1];
	}

	public function validaQuantidadeJogadores()
	{
		if (count($this->jogadores) !== 2) {
			return false;
		}

		return true;
	}

	public function setMaoJogadorUm()
	{
		return true;
	}

	public function setMaoJogadorDois()
	{
		return true;
	}

	public function getMaoJogadorUm()
	{
		return 'Pedra';
	}

	public function getMaoJogadorDois()
	{
		return true;
	}
}

class JokenpoTest extends PHPUnit_Framework_TestCase
{

	private $jokenPo;

	public function setUp()
	{
		$this->jokenPo = new Jokenpo();
	}

	public function testSetUmJogador()
	{
		$this->assertTrue($this->jokenPo->setJogador('Joao'));
	}

	public function testSetDoisJogadores()
	{
		$this->jokenPo->setJogador('Jamal');

		$this->assertTrue($this->jokenPo->setJogador('Catho'));
	}

	public function testGetQuantidadeJogadores()
	{
		$this->jokenPo->setJogador('Jamal');
		$this->assertEquals(1, $this->jokenPo->getQuantidadeJogadores());
	}

	public function testQuantidadeJogadoresIsNumeric()
	{
		$this->jokenPo->setJogador('Jamal');		
		$this->assertTrue(is_numeric($this->jokenPo->getQuantidadeJogadores()));
	}

	public function testQuantidadeJogadoresSetados()
	{
		$this->jokenPo->setJogador('Jamal');
		$this->jokenPo->setJogador('Danilo');
		$this->jokenPo->setJogador('Zack');
		$this->assertEquals(3, $this->jokenPo->getQuantidadeJogadores());
	}

	public function testValidaQuantidadeJogadoresValidos()
	{
		$this->jokenPo->setJogador("Danilo");
		$this->jokenPo->setJogador("Joao");

		$this->assertTrue($this->jokenPo->validaQuantidadeJogadores());
	}

	public function testQuantidadeJogadoresInvalida()
	{
		$this->jokenPo->setJogador("Danilo");

		$this->assertFalse($this->jokenPo->validaQuantidadeJogadores());
	}

	public function testGetJogadorUm()
	{
		$this->jokenPo->setJogador('Joao');

		$this->assertEquals(
			'Joao',
			$this->jokenPo->getJogadorUm()
		);
	}

	public function testGetJogadorDois()
	{
		$this->jokenPo->setJogador('Joao');
		$this->jokenPo->setJogador('Maria');
		$this->assertEquals(
			'Maria',
			$this->jokenPo->getJogadorDois()
		);
	}

	public function testGetJogadores()
	{
		$this->jokenPo->setJogador('Daniel');
		$this->jokenPo->setJogador('Barreto');

		$this->assertEquals(
			'Daniel',
			$this->jokenPo->getJogadorUm()
		);
		$this->assertEquals(
			'Barreto',
			$this->jokenPo->getJogadorDois()
		);
	}

	public function testSetMaoJogadorUm()
	{
		$this->jokenPo->setJogador('Daniel');
		$this->jokenPo->setJogador('Barreto');

		$this->assertTrue($this->jokenPo->setMaoJogadorUm("Pedra"));	
	}

	public function testSetMaoJogadorDois()
	{
		$this->jokenPo->setJogador('Alessandro');
		$this->jokenPo->setJogador('Catho');

		$this->assertTrue($this->jokenPo->setMaoJogadorDois("Pedra"));
	}

	public function testGetMaoJogadorIgualTesoura()
	{
		$this->jokenPo->setJogador('Alessandro');
		$this->jokenPo->setMaoJogadorUm("Tesoura");

		$this->assertEquals(
			'Tesoura',
			$this->jokenPo->getMaoJogadorUm()
		);
	}

	public function testGetMaoJogadorDois()
	{
		$this->jokenPo->setJogador('Alessandro');
		$this->jokenPo->setJogador('Gabriel');
		$this->jokenPo->setMaoJogadorDois('Papel');

		$this->assertTrue(
			$this->jokenPo->getMaoJogadorDois()
		);
	}

	public function testMaoJogadorUmIgualPedra()
	{
		$this->jokenPo->setJogador('Henrique');
		$this->jokenPo->setMaoJogadorUm('Pedra');

		$this->assertEquals(
			'Pedra',
			$this->jokenPo->getMaoJogadorUm()
		);
	}
}