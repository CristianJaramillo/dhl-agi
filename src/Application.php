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
	 * @var Connection Oracle DB
	 */
	private $connection;

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

		$database = (object) include 'database.php';

		/**
		 |
		 | Creamos la conexión
		 |
		*/
		$this->connection = oci_connect(
				$database->username, 
				$database->password, 
				build_connection_string($database)
			);

		/**
		 |
		 | Validamos la connexión
		 |
		 */
		if (!$this->connection) {
		   $message_error = oci_error();
		   $this->agi->verbose($message_error['message']);
		   exit;
		} else {
			$this->agi->verbose("Connected to Oracle!");
		}

	}

	/**
	 * 
	 * 
	 */
	public function delivery()
	{
		$this->agi->verbose(print_r($this->agi, true));
	}

	/**
	 *
	 * 
	 */
	public function close()
	{
		/**
		 |
		 | Close the Oracle connection
		 |
		 */
		oci_close($this->connection);
	}

}