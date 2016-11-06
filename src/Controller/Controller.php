<?php
namespace Bruno\Controller;

/*
 * ABSTRACT: não é permitido instanciar essa classe
 *
 */
abstract class Controller implements ControllerInterface
{
	/*
	 * FINAL: não é permitido sobrescrever esse método
	 *
	 */
	 
	final public function bruno(string $name)
	{
		return $name;
	}
}