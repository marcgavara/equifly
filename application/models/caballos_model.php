<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caballos_model extends CI_Model {

	protected $table;
	protected $id;

	/*
		Constructor del modelo, aqui establecemos
		que tabla utilizamos y cual es su llave primaria.
	*/
	function __construct() {
		parent::__construct();
		$this->table = 'caballos';
		$this->id = 'id';
	}

	public function insert_caballo($caballo) 
	{
		$this->db->insert('caballos',$caballo);
		return $this->db->insert_id();
	}

	/*
		Obtiene lista de todos los caballos. Se ha de hacer paginador
	*/
	public function get_caballos_list() {
		return $this->db->select('caballos.id as id_caballo, caballos.nombre AS nombre_caballo, microchip,veln, id_pais_destino, fecha_entrada_centro, fecha_salida_centro, id_centro_aislamiento, centros_aislamiento.nombre as nombre_centro_aislamiento')->
				join('raza','raza.id = caballos.id_raza', 'left')->
				join('centros_aislamiento', 'centros_aislamiento.id = caballos.id_centro_aislamiento','left')->
				get_where($this->table)->result();
	}

	/*
		Obtenemos todos los datos del caballo
	*/
	public function get_caballo_id($id_caballo)
	{
		return $this->db->select('caballos.id as id_caballo,caballos.*, capa.id as id_capa,capa.capa, raza.id as id_raza,raza.raza, ganaderias.id as id_ganaderia, ganaderias.nombre as nombre_ganaderia')->
				select('cae.ase, cae.extraccion_1 as cae_extraccion_1, cae.extraccion_2 as cae_extraccion_2, cae.extraccion_3 as cae_extraccion_3, cae.resultado_1 as cae_resultado_1, cae.resultado_2 as cae_resultado_2, cae.resultado_3 as cae_resultado_3, cae.observaciones as cae_observaciones, cae.id as id_extraccion_centro')->
				select('ge.extraccion_1 as ge_extraccion_1, ge.extraccion_2 as ge_extraccion_2, ge.extraccion_3 as ge_extraccion_3, ge.resultado_1 as ge_resultado_1, ge.resultado_2 as ge_resultado_2, ge.resultado_3 as ge_resultado_3, ge.observaciones as ge_observaciones, ge.id as id_extraccion_ganaderia')->
				select('centros_aislamiento.nombre as nombre_centro_aislamiento')->
				join('raza','raza.id = caballos.id_raza', 'left')->
				join('capa','capa.id = caballos.id_capa', 'left')->
				join('ganaderias','ganaderias.id = caballos.id_ganaderia_origen','LEFT')->
				join('centros_aislamiento','centros_aislamiento.id = caballos.id_centro_aislamiento','LEFT')->
				join('centros_aislamiento_extracciones cae', 'cae.id_caballo = caballos.id', 'LEFT')->
				join('ganaderias_extracciones ge', 'ge.id_caballo = caballos.id', 'LEFT')->
				where('caballos.id',$id_caballo)->
				get_where($this->table)->row();
	}

	public function find_caballo($id_caballo = NULL, $nombre_caballo = NULL, $chip = NULL, $veln = NULL, $id_pais_destino = NULL, $fecha_entrada = NULL, $fecha_salida = NULL, $id_centro_aislamiento = NULL)
	{

		if ($id_caballo)
			$this->db->where('caballos.id', $id_caballo);

		if ($nombre_caballo)
			$this->db->like('caballos.nombre', $nombre_caballo);

		if ($chip)
			$this->db->where('caballos.microchip', $chip);

		if ($veln)
			$this->db->where('caballos.microchip', $veln);

		if ($id_pais_destino)
			$this->db->where('caballos.id_pais_destino', $id_pais_destino);

		if ($fecha_entrada)
			$this->db->where('caballos.fecha_entrada_centro', strtotime($fecha_entrada));

		if ($fecha_salida)
			$this->db->where('caballos.fecha_salida_centro', strtotime($fecha_salida));

		if ($id_centro_aislamiento)
			$this->db->where('centros_aislamiento.id', $id_centro_aislamiento);


		return $this->db->select('caballos.id as id_caballo, caballos.nombre AS nombre_caballo, microchip,veln, id_pais_destino, fecha_entrada_centro, fecha_salida_centro, centros_aislamiento.nombre as nombre_centro_aislamiento')->
				join('centros_aislamiento', 'centros_aislamiento.id = caballos.id_centro_aislamiento', 'left')->	
				get($this->table)->result();
	}

	public function save_caballo($id_caballo, $caballo){
		$this->db->where('id', $id_caballo)->
			update($this->table,$caballo);

	}

	public function check_caballos()
	{

		return $this->db->query("SELECT * from caballos where id_centro_aislamiento ='' or id_ganaderia_origen = ''")->result();


	}
	
}