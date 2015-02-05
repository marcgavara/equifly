<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imagenes_model extends CI_Model {

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
		Obtiene lista de todas las imagenes del centro 
	*/
	public function get_imagenes_centro_aislamiento($id_centro_aislamiento) {
		return $this->db->where('id_centro_aislamiento',$id_centro_aislamiento)->
				get('imagenes_centros_aislamiento')->result();
	}

	public function add_imagenes_centro_aislamiento($centro)
	{
		$this->db->insert('imagenes_centros_aislamiento',$centro);
	}
	
}