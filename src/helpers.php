<?php

if(!function_exists('build_connection_string'))
{

	/**
	 |
	 | Construye una cadena de conexión con el siguiente formato:
	 | //[host]:[port]/[database]
	 |
	 */
	function build_connection_string($config)
	{

		$connection_string = "//";

		if(is_null($config) || !is_object($config))
		{
			return null;
		}
		
		$connection_string .= is_empty_or_null($config->host) ?
			'localhost' : $config->host;

		$connection_string .= ":";

		$connection_string .= is_empty_or_null($config->port) ?
			'1521' : $config->port;

		$connection_string .= "/";

		$connection_string .= is_empty_or_null($config->database) ?
			'ocrl' : $config->database;

		return $connection_string;
	}
}


if(!function_exists('is_empty_or_null'))
{
	/**
	|
	| Identifica si una cadena es nulla o vacia
	|
	*/
	function is_empty_or_null($property)
	{
		return is_null($property) || empty($property);
	}
}