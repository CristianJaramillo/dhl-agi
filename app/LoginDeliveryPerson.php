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
	private $sql = "SELECT * FROM delivery_persons WHERE id = :deliveryPersonId LIMIT 1";

	/**
	 *
	 * @param array
	 */	
	public function action()
	{
		$this->agi->verbose("Recuperamos :deliveryPersonId");
		$deliveryPersonId = (object) $this->agi->get_variable("deliveryPersonId");

		if($deliveryPersonId->code == 200)
		{
			$this->agi->verbose("Ha ingresado la referencia $deliveryPersonId->data");

			$this->agi->verbose("Preparando consulta");
			$stmt = $this->connection->prepare($this->sql);

			$this->agi->verbose("Agregando deliveryPersonId");
			$stmt->bindValue("noReferencia", $deliveryPersonId->data, PDO::PARAM_INT);

			$this->agi->verbose("Ejecutando consulta");
			$stmt->execute();

			$this->agi->verbose("Comprobando existencia");
			
			$rows = $stmt->fetchAll();
			
			if(count($rows) > 0)
			{
				$this->agi->set_variable("LOGIN","true");
			} else {
				$this->agi->set_variable("LOGIN","false");
			}
		}

	}
	
}