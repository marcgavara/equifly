<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Razas_model extends CI_Model {

	protected $table;
	protected $id;

	/*
		Constructor del modelo, aqui establecemos
		que tabla utilizamos y cual es su llave primaria.
	*/
	function __construct() {
		parent::__construct();
		$this->table = 'raza';
		$this->id = 'id';
	}

	/*
		Obtiene lista de todas las razas 
	*/
	public function get_razas() {
		return $this->db->where('deleted', 0 )->get_where($this->table)->result();
	}

	public function list_all_razas(){
		return $this->db->get_where($this->table)->result();
	}

	public function add_raza($raza)
	{
		$this->db->insert('raza', $raza);
	}

	public function update_raza($raza)
	{
		$this->db->where('id', $raza->id)->update("raza", $raza);
	}



	public function get_capas() {
		return $this->db->where('deleted', 0)->get('capa')->result();
	}

	public function list_all_capas()
	{
		return $this->db->get('capa')->result();
	}

	public function update_capa($capa)
	{
		$this->db->where('id', $capa->id)->update("capa", $capa);
	}

	public function add_capa($capa)
	{
		$this->db->insert('capa', $capa);
	}

	public function delete_capa($id_capa)
	{
		$this->db->where('id', $id_capa);
		$this->db->delete('capa'); 
	}

	
}