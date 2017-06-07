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

		$this->agi->verbose("GET DELIVERY PERSON ID");
		$deliveryPersonId = (object) $this->agi->get_variable("DELIVERY_PERSON_ID");

		if($deliveryPersonId->code == 200)
		{
			$this->agi->verbose("ENTER => " . $deliveryPersonId->data);

			$this->agi->verbose("PREPARE QUERY...");
			$stmt = $this->connection->prepare($this->sql);

			$this->agi->verbose("ADD DELIVERY PERSON ID");
			$stmt->bindValue("DELIVERY_PERSON_ID", $deliveryPersonId->data, \PDO::PARAM_INT);

			$this->agi->verbose("EXECUTE QUERY...");
			$stmt->execute();

			$this->agi->verbose("RESULT INTO ARRAY");
			$rows = $stmt->fetchAll();
			
			$exists = "FALSE";

			if(count($rows) > 0)
			{
				$exists = "TRUE";
				$this->agi->set_variable("PASSWORD", $rows[0]['password']);
			}

			$this->agi->set_variable("EXISTS", $exists);

		}

	}
	
}