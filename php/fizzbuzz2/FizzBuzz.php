<?php

class FizzBuzz 
{
	public function getLista()
	{
		$lista = array();
		for ($i = 1; $i <= 100; $i++) {
			$lista[] = $this->substituirDivisiveisPor3e5($i);
		}
		return $lista;
	}

	private function substituirDivisiveisPor3e5($numero)
	{
		if ($numero % 3 == 0) {
			return 'Fizz';
		}
		if ($numero % 5 == 0) {
			return 'Buzz';
		}
		return $numero;
	}
}