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

		$this->agi->verbose("GET DELIVERY ID");
		$deliveryId = (object) $this->agi->get_variable("DELIVERY_ID");

		if($deliveryId->code == 200)
		{
			$this->agi->verbose("DELIVERY ID => " . $deliveryId->data);

			$this->agi->verbose("PREPARE QUERY...");
			$stmt = $this->connection->prepare($this->sql);

			$this->agi->verbose("ADD DELIVERY ID");
			$stmt->bindValue("DELIVERY_ID", $deliveryId->data, \PDO::PARAM_INT);

			$this->agi->verbose("EXECUTE QUERY...");
			$stmt->execute();

			$this->agi->verbose("RESULT INTO ARRAY");
			$rows = $stmt->fetchAll();
			
			$status = "INVALID";

			if(count($rows) > 0)
			{
				$status = $rows[0]['status'];
			}

			$this->agi->set_variable("STATUS", $status);

			$this->agi->verbose("STATUS => " . $status);
		}

	}
	
}