<?php

namespace DHL;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use DHL\Asterisk\AGI;

/**
 *
 * @author Cristian Jaramillo (cristian_gerar@hotmail.com)
 */
abstract class Application
{
	
	/**
	 *
	 * @var \Doctrine\DBAL\Connection
	 */
	protected $connection;
	
	/**
	 *
	 *
	 * @var DHL\Asterisk\AGI
	 */
	protected $agi;

	/**
	 *
	 *
	 */
	public function __construct()
	{

		$this->agi = new AGI();

		$this->agi->verbose("Recuperando configuración");
		$connectionParams = require __DIR__ . "/../config/database.php";

		$this->agi->verbose("Creando conexión a " + $connectionParams['dbname']);
		$this->connection = DriverManager::getConnection($connectionParams, new Configuration());
	}

	/**
	 *
	 *
	 */
	public abstract function action();

	/**
	 *
	 * 
	 */
	public function close()
	{
		$this->verbose("Cerrando la conexión");
		$this->connection->close();
	}

}