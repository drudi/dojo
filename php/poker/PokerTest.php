<?php
class Poker
{
	protected function validaCartas($cartas)
	{
		$totalCartas = count($cartas);

		if ($totalCartas !== 5) {
			return false;
		}
		return true;
	}
	public function cartaAlta($cartas)
	{
		if (!$this->validaCartas($cartas)) {
			return false;
		}
		return $this->maiorCarta($cartas);
	}

	public function maiorMao($mao1, $mao2)
	{
		$this->maiorCarta(array($mao1, $mao2));
	}

	public function maiorCarta($cartas)
	{
		$prioridades = array(
			'A',
			'K',
			'Q',
			'J',
		);

		foreach ($prioridades as $carta) {
			if (in_array($carta, $cartas)) {
				return $carta;
			}	
		}

		return max($cartas);
	}

	public function getMaoVencedora($mao1, $mao2)
	{
		$maiorMao1 = $this->cartaAlta($mao1);
		$maiorMao2 = $this->cartaAlta($mao2);
		
		var_dump($this->cartaAlta(
				array(
					$maiorMao1,
					$maiorMao2
				)
			)
		);

		return 'jogador1';
	}

}
class PokerTest extends PHPUnit_Framework_TestCase
{
	public function testCartaMaisAlta()
	{
		$poker = new Poker();
			
		$esperado = $poker->cartaAlta(
			array(2, 3, 3, 2, 3)
		);

		$this->assertEquals(3, $esperado);

		$esperado = $poker->cartaAlta(
			array(4, 5, 3, 5, 5)
		);

		$this->assertEquals(5, $esperado);

		$esperado = $poker->cartaAlta(
			array('A', 6, 4, 'Q', 'K')
		);

		$this->assertEquals('A', $esperado);

		$esperado = $poker->cartaAlta(
			array('Q', 5, 2, 3, 4)
		);

		$this->assertEquals('Q', $esperado);

		$esperado = $poker->cartaAlta(
			array('K', 5, 2, 3, 4)
		);

		$this->assertEquals('K', $esperado);

		$esperado = $poker->cartaAlta(
			array('K', 'Q', 2, 3, 4)
		);

		$this->assertEquals('K', $esperado);

		$esperado = $poker->cartaAlta(
			array('J', 10, 2, 3, 4)
		);

		$this->assertEquals('J', $esperado);


		$esperado = $poker->cartaAlta(
			array('J', 'A', 3, 5, 'K')
		);

		$this->assertEquals('A', $esperado);
	}

	public function testVerificarMaoValida()
	{
		$poker = new Poker();
			
		$this->assertFalse(
			$poker->cartaAlta(
				array(2, 3)
			)
		);

		$this->assertFalse(
			$poker->cartaAlta(
				array(2, 3, 4, 5, 6, 7)
			)
		);

		$this->assertFalse(
			$poker->cartaAlta(
				array(2, 3, 4, '5', 6, 7)
			)
		);

	}

	public function testMaoMaisAlta(){
		$poker = new Poker();
		$esperado = 'jogador1';
		$maoVencedora = $poker->getMaoVencedora(
			array('A', 2, 3, 4, 5),
			array('K', 3, 4, 5, 6)
		);

		$this->assertEquals(
			$esperado,
			$maoVencedora,
			'esperado :' . $esperado . ', obtido: ' . $maoVencedora
		);

		$maoVencedora = $poker->getMaoVencedora(
			array('K', 3, 4, 5, 6),
			array('A', 2, 3, 4, 5)
		);

		$this->assertEquals(
			'jogador2',
			$maoVencedora,
			'esperado :' . $esperado . ', obtido: ' . $maoVencedora
		);
	}

}