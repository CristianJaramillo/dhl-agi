<?php

namespace App;

use Asterisk\AGI;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

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
	 * @var \Asterisk\AGI
	 */
	protected $agi;

	/**
	 *
	 *
	 */
	public function __construct()
	{

		$this->agi = new AGI();
		
		$this->agi->verbose("Cargando configuraciones");
		$connectionParams = require __DIR__ . "/../config/database.php";
		
		$this->agi->verbose("Creando conexion");
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
		$this->agi->verbose("Cerrando conexion");
		$this->connection->close();
	}

}