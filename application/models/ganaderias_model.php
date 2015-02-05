<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ganaderias_model extends CI_Model {

	protected $table;
	protected $id;

	/*
		Constructor del modelo, aqui establecemos
		que tabla utilizamos y cual es su llave primaria.
	*/
	function __construct() {
		parent::__construct();
		$this->table = 'ganaderias';
		$this->id = 'id';
	}

	/*
		Obtiene lista de todos los caballos. Se ha de hacer paginador
	*/
	public function get_ganaderias() {
		return $this->db->where('deleted','0')->
				get_where($this->table)->result();
	}	

	public function anadir_ganaderia($ganaderia)
	{
		$this->db->insert($this->table,$ganaderia);
		return $this->db->insert_id();
	}


	public function get_ganaderia_by_id($id_ganaderia)
	{
		return $this->db->where('id',$id_ganaderia)->get('ganaderias')->row();
	}

	public function actualizar_ganaderia($id_ganaderia, $ganaderia)
	{
		$this->db->where('id', $id_ganaderia)->
				update('ganaderias',$ganaderia);
	}
	/*
	public function chech_nif_centro($nif_centro)
	{
		return $this->db->where('nif',$nif_centro)->
				get($this->table)->row();
	}

	/* Se pone flag a 1 en deleted */
	/*public function delete_centro($centro)
	{
		$this->db->where('id', $centro->id)
				->set('deleted','1')->update($this->table); 
	}*/

	public function anadir_extraccion($extraccion)
	{
		$this->db->insert('ganaderias_extracciones',$extraccion);
		return $this->db->insert_id();
	}

	public function update_ganaderia_extraccion($id_ganaderia_extraccion, $extracciones){
		$this->db->where('id', $id_ganaderia_extraccion)->
			update('ganaderias_extracciones',$extracciones);

	}


}