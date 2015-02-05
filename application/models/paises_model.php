<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paises_model extends CI_Model {

	protected $table;
	protected $id;

	/*
		Constructor del modelo, aqui establecemos
		que tabla utilizamos y cual es su llave primaria.
	*/
	function __construct() {
		parent::__construct();
		$this->table = 'paises';
		$this->id = 'id';
	}

	public function list_countries() 
	{
		return $this->db->get_where($this->table)->result();
	}
}