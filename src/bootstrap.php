<?php 

require_once __DIR__."/../vendor/autoload.php";

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

$config = new Configuration();

// database configuration parameters
$connectionParams = require __DIR__ . "/../config/database.php";

$conn = DriverManager::getConnection($connectionParams, $config);

// echo (new \DateTime('now'))->format('Y-M-D');

$conn->delete('DIL_PHONE_REGISTRO_PEDIDO', array('REG_ID' => 1));

$conn->insert('DIL_PHONE_REGISTRO_PEDIDO', [
	'REG_ID' => '1',
	'REG_NUMBER_PHONE' => 1,
	'NO_REFERENCIA' => '1234',
	'ESTADO_REFERENCIA' => 1,
	'NOMBRE_ESTADO_REFERENCIA' => 'Recibido',
	// 'FECHA_GENERACION' => "",
	'FECHA_CONSULTA' => '',
	'ESTADO' => 1,
	'CUENTA' => 1000,
	'NOMBRE_CUENTA' => 'Basica',
]);
