<?php

return [

	/**
	 |
     | 
     |
     */
    'driver' => 'pdo_oci',

	/**
	 |
	 | Username to use when connecting to the database.
	 |
	 */
	'user' => 'cm_001',
	
	/**
	 |
	 | Password to use when connecting to the database.
	 |
	 */
	'password' => 'hAfaPHa7unAc',
	
	/**
	 |
	 | Hostname of the database to connect to.
	 |
	 */
	'host' => '138.128.190.226',

	/**
	 |
	 | Port of the database to connect to.
	 |
	 */
	'port' => 1521,

	/**
	 |
	 | Name of the database/schema to connect to.
	 |
	 */
	'dbname' => 'orclt',

	/**
	 |
	 | Optional name by which clients can connect to the database instance. 
	 | Will be used as Oracle’s SID connection parameter if given and 
	 | defaults to Doctrine’s dbname connection parameter value.
	 |
	 */
	// 'servicename' => '',

	/**
	 |
	 | Whether to use Oracle’s SERVICE_NAME connection parameter in favour
	 | of SID when connecting. The value for this will be read from 
	 | Doctrine’s servicename if given, dbname otherwise.
	 |
	 */
	// 'service' => false,

	/**
	 |
	 | Whether to enable database resident connection pooling.
	 |
	 */
	// 'pooled' => false,

	/**
	 |
	 | The charset used when connecting to the database.
	 |
	 */
	// 'charset' => '',

	/**
	 |
	 | Optional parameter, complete whether to add the INSTANCE_NAME 
	 | parameter in the connection. It is generally used to connect 
	 | to an Oracle RAC server to select the name of a particular instance.
	 |
	 */
	// 'instancename' => '',

	/**
	 |
	 | Complete Easy Connect connection descriptor, see 
	 | https://docs.oracle.com/database/121/NETAG/naming.htm. When 
	 | using this option, you will still need to provide the user 
	 | and password parameters, but the other parameters will no longer 
	 | be used. Note that when using this parameter, the getHost and 
	 | getPort methods from Doctrine\DBAL\Connection will no longer 
	 | function as expected.
	 |
	 */
	// 'connectstring' => ''
	
];