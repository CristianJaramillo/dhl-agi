<?php

namespace DHL;

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
			print_r($message_error['message']);
			exit;
		} else {
			print_r("Connected to Oracle!");
		}

	}

	/**
	 * 
	 * 
	 */
	public function delivery()
	{
		print_r("test");
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