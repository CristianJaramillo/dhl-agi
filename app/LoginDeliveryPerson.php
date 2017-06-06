<?php

namespace App;

/**
 * 
 */
class LoginDeliveryPerson extends Application
{

	/**
	 *
	 * @var string
	 */
	private $sql = "SELECT * FROM delivery_persons WHERE id = :DELIVERY_PERSON_ID LIMIT 1";

	/**
	 *
	 * @param array
	 */	
	public function action()
	{

		$this->agi->verbose("Recuperamos DELIVERY_PERSON_ID");
		$deliveryPersonId = (object) $this->agi->get_variable("DELIVERY_PERSON_ID");

		if($deliveryPersonId->code == 200)
		{
			$this->agi->verbose("Ha ingresado la referencia $deliveryPersonId->data");

			$this->agi->verbose("Preparando consulta");
			$stmt = $this->connection->prepare($this->sql);

			$this->agi->verbose("Agregando DELIVERY_PERSON_ID");
			$stmt->bindValue("DELIVERY_PERSON_ID", $deliveryPersonId->data, \PDO::PARAM_INT);

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