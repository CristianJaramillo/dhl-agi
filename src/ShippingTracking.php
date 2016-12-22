<?php

namespace DHL;

/**
 * 
 */
class ShippingTracking extends Application
{

	/**
	 *
	 * @var
	 */
	private $table = "DIL_PHONE_REGISTRO_PEDIDO";

	/**
	 *
	 * @var
	 */
	private $reference_number;

	/**
	 *
	 */	
	public function __construct()
	{
		parent::__construct();

		$this->reference_number = $this->agi->get_variable("PIN");

	}

	/**
	 *
	 */	
	public function action()
	{
		$this->agi->verbose("Reference Number {$this->reference_number}\n");
	}
	
}