<?php

namespace DHL;

/**
 * 
 */
final class ShoppingTracking extends Application
{

	/**
	 *
	 * @var string
	 */
	private $query = "SELECT * FROM DIL_PHONE_REGISTRO_PEDIDO WHERE NO_REFERENCIA = ?";

	/**
	 *
	 * @var string
	 */
	private $noReferencia = 'NO_REFERENCIA';

	/**
	 *
	 */	
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 *
	 */	
	public function action()
	{
		$this->agi->verbose("Recuperamos NO_REFERENCIA.\n");
		$noReferencia = $this->agi->get_variable($this->noReferencia);
		
		$this->agi->verbose("Ejecutamos la consulta.\n");
		$results = $this->connection->fetchAll($this->query, [$noReferencia]);
		
		$this->agi->verbose("Comprobando existencia.\n");

		echo "SUCCESS";

		$this->agi->set_variable("SUCCESS","true");

	}
	
}