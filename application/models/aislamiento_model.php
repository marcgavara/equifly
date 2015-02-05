<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aislamiento_model extends CI_Model {

	protected $table;
	protected $id;

	/*
		Constructor del modelo, aqui establecemos
		que tabla utilizamos y cual es su llave primaria.
	*/
	function __construct() {
		parent::__construct();
		$this->table = 'centros_aislamiento';
		$this->id = 'id';
	}

	/*
		Obtiene lista de todos los caballos. Se ha de hacer paginador
	*/
	public function get_centros_list() {
		return $this->db->where('deleted','0')->
				get_where($this->table)->result();
	}	

	public function get_centro_by_id($id_centro)
	{
		return $this->db->where('centros_aislamiento.id',$id_centro)->get('centros_aislamiento')->row();
	}

	public function anadir_centro($centro)
	{
		$this->db->insert($this->table,$centro);
		return $this->db->insert_id();
	}

	public function actualizar_centro($id_centro, $centro)
	{
		$this->db->where('id',$id_centro)->update('centros_aislamiento',$centro);
	}

	public function chech_nif_centro($nif_centro)
	{
		return $this->db->where('nif',$nif_centro)->
				get($this->table)->row();
	}

	/* Se pone flag a 1 en deleted */
	public function delete_centro($centro)
	{
		$this->db->where('id', $centro->id)
				->set('deleted','1')->update($this->table); 
	}

	public function anadir_extraccion($extraccion)
	{
		$this->db->insert('centros_aislamiento_extracciones',$extraccion);
	}

	public function update_centro_extraccion($id_centro_extraccion, $extracciones){
		$this->db->where('id', $id_centro_extraccion)->
			update('centros_aislamiento_extracciones',$extracciones);

	}


}