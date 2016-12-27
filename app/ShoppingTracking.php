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
		$this->agi->verbose("Recuperamos NO_REFERENCIA");
		$noReferencia = $this->agi->get_variable("NO_REFERENCIA");

		$this->agi->verbose("Ha ingresado la referencia $this->noReferencia");

		$this->agi->verbose("Preparando consulta");
		$stmt = $this->connection->prepare($this->sql);

		$this->agi->verbose("Agregando NO_REFERENCIA");
		$stmt->bindValue("noReferencia", $noReferencia);

		$this->agi->verbose("Ejecutando consulta");
		$stmt->execute();

		$this->agi->verbose("Comprobando existencia");
		
		$rows = $stmt->fetchAll();

		if(count($rows) > 0)
		{
		
			$this->agi->set_variable("SUCCESS","true");

			foreach ($rows as $row) {
				$this->agi->set_variable("NOMBRE_ESTADO_REFERENCIA", $row['NOMBRE_ESTADO_REFERENCIA']);
			}
		}


	}
	
}