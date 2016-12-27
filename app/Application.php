<?php

namespace App;

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
	 *
	 */
	public function __construct()
	{
		echo "EXEC Verbose(1,\"Cargando configuraciones.\")\n";
		$connectionParams = require __DIR__ . "/../config/database.php";
		echo "EXEC Verbose(1,\"Creando conexion.\")\n";
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
		echo "EXEC Verbose(1,\"Cerrando conexion.\")\n";
		$this->connection->close();
	}

}