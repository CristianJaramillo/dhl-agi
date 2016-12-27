<?php

namespace App;

/**
 * 
 */
class ShoppingTracking extends Application
{

	/**
	 *
	 * @var string
	 */
	private $sql = "SELECT * FROM DIL_PHONE_REGISTRO_PEDIDO WHERE NO_REFERENCIA = :noReferencia";

	/**
	 *
	 * @param array
	 */	
	public function action()
	{
		echo "EXEC Verbose(1,\"Recuperamos NO_REFERENCIA.\")\n";
		// $this->agi->verbose("Recuperamos NO_REFERENCIA.\n");
		// $noReferencia = $this->agi->get_variable($this->noReferencia);
		$noReferencia = "1234";

		// $this->agi->verbose("Ejecutamos la consulta.\n");
		// $results = $this->connection->fetchAll($this->query, 
		// 		[$noReferencia]
		// 	);

		echo "EXEC Verbose(1,\"Preparando consulta.\")\n";
		$stmt = $this->connection->prepare($this->sql);
		echo "EXEC Verbose(1,\"Agregando NO_REFERENCIA.\")\n";
		$stmt->bindValue("noReferencia", $noReferencia);
		echo "EXEC Verbose(1,\"Ejecutando consulta.\")\n";
		$stmt->execute();

		// $this->agi->verbose("Comprobando existencia.\n");

		// echo "SUCCESS";

		// $this->agi->set_variable("SUCCESS","true");
		// print_r($results);

		print_r($stmt->fetchAll());

	}
	
}