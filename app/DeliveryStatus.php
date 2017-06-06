<?php

namespace App;

/**
 * 
 */
class DeliveryStatus extends Application
{

	/**
	 *
	 * @var string
	 */
	private $sql = "SELECT * FROM deliveries WHERE id = :DELIVERY_ID";

	/**
	 *
	 * @param array
	 */	
	public function action()
	{

		/*$stmt = $this->connection->prepare($this->sql);
		
		$stmt->bindValue("DELIVERY_ID", 4, \PDO::PARAM_INT);

		$stmt->execute();
		
		$rows = $stmt->fetchAll();
		
		if(count($rows) > 0)
		{
			foreach ($rows as $row) {
				echo $row['status'] . "\n";
			}

		} else {
			echo "INVALID" . "\n";
		}*/

		$this->agi->verbose("Recuperamos DELIVERY_ID");
		$deliveryId = (object) $this->agi->get_variable("DELIVERY_ID");

		if($deliveryId->code == 200)
		{
			$this->agi->verbose("Ha ingresado la referencia $deliveryId->data");

			$this->agi->verbose("Preparando consulta");
			$stmt = $this->connection->prepare($this->sql);

			$this->agi->verbose("Agregando DELIVERY_ID");
			$stmt->bindValue("DELIVERY_ID", $deliveryId->data, \PDO::PARAM_INT);

			$this->agi->verbose("Ejecutando consulta");
			$stmt->execute();

			$this->agi->verbose("Comprobando existencia");
			
			$rows = $stmt->fetchAll();
			
			if(count($rows) > 0)
			{
				$this->agi->set_variable("STATUS", "INVALID");

				foreach ($rows as $row) {
					$this->agi->set_variable("STATUS", $row['status']);
				}

			} else {
				$this->agi->set_variable("STATUS","INVALID");
			}
		}

	}
	
}