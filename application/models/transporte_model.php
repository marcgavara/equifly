<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transporte_model extends CI_Model {

	protected $table;
	protected $id;

	/*
		Constructor del modelo, aqui establecemos
		que tabla utilizamos y cual es su llave primaria.
	*/
	function __construct() {
		parent::__construct();
	}

	/*
		Obtiene lista de todos los transportistas
	*/
	public function get_transportistas() {
		return $this->db->get('transportistas')->result();
	}


	
}