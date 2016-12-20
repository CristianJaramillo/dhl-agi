<?php

namespace DHL;

use DHL\Asterisk\{AGI, AGI_AsteriskManager};

/**
 * 
 */
class Application
{
	
	/**
	 *
	 *
	 * @var DHL\Asterisk\AGI
	 */
	private $agi;


	/**
	 *
	 *
	 */
	public function __construct()
	{
		$this->agi = new AGI();
	}

	/**
	 * 
	 * 
	 */
	public function delivery()
	{
		$this->agi->verbose(print_r($fastagi, true));
	}

}

