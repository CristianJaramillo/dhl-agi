<?php 

namespace DHL\Entities;

/**
 * @Entity @Table(name="DIL_PHONE_REGISTRO_PEDIDO")
 */
class DilPhoneRegistroPedido
{

	/**
	 * @Id @Colum(name="REG_ID", type="string")
	 * @var string
	 */
	protected $regId;

	/**
	 * @Colum(name="REG_NUMBER_PHONE", type="integer")
	 * @var int
	 */
	protected $regNumberPhone;

	/**
	 * @Colum(name="NO_REFERENCIA", type="string")
	 * @var string
	 */
	protected $noReferencia;

	/**
	 * @Colum(name="ESTADO_REFERENCIA", type="integer")
	 * @var int
	 */
	protected $estadoReferencia;

	/**
	 * @Colum(name="NOMBRE_ESTADO_REFERENCIA", type="string")
	 * @var string
	 */
	protected $nombreEstadoReferencia;

	/**
	 * @Colum(name="FECHA_GENERACION", type="datetime")
	 */
	protected $fechaGeneracion;

	/**
	 * @Colum(name="FECHA_CONSULTA", type="string")
	 */
	protected $fechaConsulta;

	/**
	 * @Colum(name="ESTADO", type="integer")
	 */
	protected $estado;

	/**
	 * @Colum(name="CUENTA", type="integer")
	 */
	protected $cuenta;

	/**
	 * @Colum(name="NOMBRE_CUENTA", type="string")
	 */
	protected $nombreCuenta;

}