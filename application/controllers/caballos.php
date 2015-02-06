<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
* Controlador de logística de los Caballos.
* Aquí están las funcíones para añadir, editar, eliminar, etc.
*/

class Caballos extends Private_Controller {

	function __construct(){
  		parent::__construct();
  		$this->load->helper('url');
  		$this->load->model('caballos_model');
  		$this->load->model('razas_model');
  		$this->load->model('aislamiento_model');
  		$this->load->model('paises_model');
  		$this->load->library("form_validation");
  		$this->load->library('user_agent');
  		$this->load->model('ganaderias_model');

 	}

 	/*
 	* Función que muestra todos los registros existentesm y con filtrado para optimizar la búsqueda.
 	* ToDo: Paginador y modifcación query para admitir parámetros de búsqueda paginada
 	*/
	public function index()
	{
		if(!@$this->user) redirect ('welcome/login');

		$data['message'] = $this->session->flashdata('message');
		$data['error'] = $this->session->flashdata('error');
		$data['paises'] = $this->paises_model->list_countries();
		$data['centros_asilamiento'] = $this->aislamiento_model->get_centros_list();

		if ($_POST && !$this->input->post("borrar")) {
			$data['id_caballo'] = $this->input->post('filtro_id_caballo') ? $this->input->post('filtro_id_caballo') : 0;
			$data['nombre_caballo'] = $this->input->post('filtro_nombre_caballo') ? $this->input->post('filtro_nombre_caballo') : 0;
			$data['chip'] = $this->input->post('filtro_chip') ? $this->input->post('filtro_chip') : 0;
			$data['veln'] = $this->input->post('filtro_veln') ? $this->input->post('filtro_veln') : 0;
			$data['id_pais_destino'] = $this->input->post('filtro_pais_destino') ? $this->input->post('filtro_pais_destino') : 0;
			$data['fecha_entrada'] = $this->input->post('filtro_fecha_entrada') ? substr($this->input->post('filtro_fecha_entrada'),6,4)."-".substr($this->input->post('filtro_fecha_entrada'),0,2)."-".substr($this->input->post('filtro_fecha_entrada'),3,2) : 0;
			$data['fecha_salida'] = $this->input->post('filtro_fecha_salida') ? substr($this->input->post('filtro_fecha_salida'),6,4)."-".substr($this->input->post('filtro_fecha_salida'),0,2)."-".substr($this->input->post('filtro_fecha_salida'),3,2) : 0;
			$data['id_centro_aislamiento'] = $this->input->post('filtro_centro_aislamiento') ? $this->input->post('filtro_centro_aislamiento') : NULL;
			$data['caballos'] = $this->caballos_model->find_caballo($data['id_caballo'], $data['nombre_caballo'], $data['chip'], $data['veln'], $data['id_pais_destino'], $data['fecha_entrada'], $data['fecha_salida'], $data['id_centro_aislamiento']);
		} else
			$data['caballos'] = $this->caballos_model->get_caballos_list();

		$data['users'] = $this->users->users();
		$data['menu'] = 'caballos';
		$data['submenu'] = 'listado';
		$this->load_admin_view('caballos/caballos',$data);
	}


	/*
	* Función Ver.
	* Obtenemos todos los datos del caballo que se ha intoducido, además permite su modificación
	*
	*/
	public function ver($id_caballo)
	{
		if(!@$this->user) redirect ('welcome/login');

		$data['caballo'] = $this->caballos_model->get_caballo_id($id_caballo);
		$data['razas'] =$this->razas_model->get_razas();

		$data['paises'] = $this->paises_model->list_countries();
		$data['ganaderias'] = $this->ganaderias_model->get_ganaderias();
		$data['centros_asilamiento'] = $this->aislamiento_model->get_centros_list();
		$data['capas'] = $this->razas_model->get_capas();
		$data['message'] = $this->session->flashdata('message');
		$data['error'] = $this->session->flashdata('error');

		if ($_POST && $this->check_ficha_caballo() !== FALSE) {
			$caballo = new stdClass();
			$fields = array('id_raza','propietario','sexo','id_capa','pasaporte','microchip','id_pais_destino','id_ganaderia_origen','observaciones','id_centro_aislamiento','num_cotizacion');

			foreach ($fields as $field)
				$caballo->{$field} = $this->input->post($field);

			$caballo->nombre = $this->input->post("nombre_caballo");
			$caballo->fecha_nacimiento = strtotime($this->input->post("fecha_nacimiento"));
			$caballo->fecha_recogida = strtotime($this->input->post("fecha_recogida"));
			$caballo->fecha_entrada_centro = strtotime($this->input->post("fecha_entrada_centro"));
			$caballo->fecha_salida_centro = strtotime($this->input->post("fecha_salida_centro"));

			$this->caballos_model->save_caballo($id_caballo, $caballo);

			//Ahora insertamos las extracciones del centro de aislamiento
			$extracciones = new stdClass();
			$extracciones->id_centro_aislamiento = $caballo->id_centro_aislamiento;
			$extracciones->id_caballo = $id_caballo;
			$extracciones->ase = $this->input->post("ase");
			$extracciones->extraccion_1 = $this->input->post("fecha_extraccion_centro_1") && $this->input->post("hora_extraccion_centro_1") ? strtotime($this->input->post("fecha_extraccion_centro_1")." ".$this->input->post("hora_extraccion_centro_1")) : 0;
			$extracciones->resultado_1 = $this->input->post("resultados_extraccion_centro_1");
			$extracciones->extraccion_2 = $this->input->post("fecha_extraccion_centro_2") && $this->input->post("hora_extraccion_centro_2") ? strtotime($this->input->post("fecha_extraccion_centro_2")." ".$this->input->post("hora_extraccion_centro_2")) : 0;
			$extracciones->resultado_2 = $this->input->post("resultados_extraccion_centro_2");
			$extracciones->extraccion_3 = $this->input->post("fecha_extraccion_centro_3") && $this->input->post("hora_extraccion_centro_3") ? strtotime($this->input->post("fecha_extraccion_centro_3")." ".$this->input->post("hora_extraccion_centro_3")) : 0;
			$extracciones->resultado_3 = $this->input->post("resultados_extraccion_centro_3");
			$extracciones->observaciones = $this->input->post("observaciones_extraccion_centro");

			$this->aislamiento_model->update_centro_extraccion($this->input->post("id_extraccion_centro"), $extracciones);

			$extraccion_ganaderia = new stdClass();
			$extraccion_ganaderia->id_ganaderia_origen = $caballo->id_ganaderia_origen;
			$extraccion_ganaderia->id_caballo = $id_caballo;
			$extraccion_ganaderia->extraccion_1 = $this->input->post("fecha_extraccion_ganaderia_1") && $this->input->post("hora_extraccion_ganaderia_1") ? strtotime($this->input->post("fecha_extraccion_ganaderia_1")." ".$this->input->post("hora_extraccion_ganaderia_1")) : 0;
			$extraccion_ganaderia->resultado_1 = $this->input->post("resultados_extraccion_ganaderia_1");
			$extraccion_ganaderia->extraccion_2 = $this->input->post("fecha_extraccion_ganaderia_2") && $this->input->post("hora_extraccion_ganaderia_2") ? strtotime($this->input->post("fecha_extraccion_ganaderia_2")." ".$this->input->post("hora_extraccion_ganaderia_2")) : 0;
			$extraccion_ganaderia->resultado_2 = $this->input->post("resultados_extraccion_ganaderia_2");
			$extraccion_ganaderia->extraccion_3 = $this->input->post("fecha_extraccion_ganaderia_3") && $this->input->post("hora_extraccion_ganaderia_3") ?  strtotime($this->input->post("fecha_extraccion_ganaderia_3")." ".$this->input->post("hora_extraccion_ganaderia_3")) : 0;
			$extraccion_ganaderia->resultado_3 = $this->input->post("resultados_extraccion_ganaderia_3");
			$extraccion_ganaderia->observaciones = $this->input->post("observaciones_extraccion_ganaderia");

			$this->ganaderias_model->update_ganaderia_extraccion($this->input->post("id_extraccion_ganaderia"), $extraccion_ganaderia);

			$this->session->set_flashdata('message', 'El caballo se ha actualizado correctamente');
			redirect("/caballos");
		} else
			$data['error'] = validation_errors();


		$data['menu'] = 'caballos';
		$data['submenu'] = $data['caballo']->nombre;
		$this->load_admin_view('caballos/ver',$data);

	}

	public function guardar_caballo($id_caballo = NULL)
	{
		redirect(site_url('/caballos/ver/'.$id_caballo));
	}

	/*
	* Fnción quue permite la inserción de nuevos registros de caballos en la base de datos.
	*
	*/
	public function nuevo_caballo()
	{
		if(!@$this->user) redirect ('welcome/login');

		$data['razas'] = $this->razas_model->get_razas();
		$data['capas'] = $this->razas_model->get_capas();
		$data['centros_asilamiento'] = $this->aislamiento_model->get_centros_list();
		$data['paises'] = $this->paises_model->list_countries();
		$data['ganaderias'] = $this->ganaderias_model->get_ganaderias();

		if ($_POST && $this->check_ficha_caballo() !== FALSE) {

			$caballo = new stdClass();
			$fields = array('id_raza','propietario','sexo','id_capa','pasaporte','microchip','id_pais_destino','id_ganaderia_origen','observaciones','id_centro_aislamiento','num_cotizacion');

			foreach ($fields as $field) {
				$caballo->{$field} = $this->input->post($field);
			}

			$caballo->nombre = $this->input->post("nombre_caballo");
			$caballo->fecha_nacimiento = strtotime($this->input->post("fecha_nacimiento"));
			$caballo->fecha_recogida = strtotime($this->input->post("fecha_recogida"));
			$caballo->fecha_entrada_centro = strtotime($this->input->post("fecha_entrada_centro"));
			$caballo->fecha_salida_centro = strtotime($this->input->post("fecha_salida_centro"));

			$id_caballo = $this->caballos_model->insert_caballo($caballo);

			//Ahora insertamos las extracciones del centro de aislamiento
			$extracciones = new stdClass();
			$extracciones->id_centro_aislamiento = $caballo->id_centro_aislamiento;
			$extracciones->id_caballo = $id_caballo;
			$extracciones->ase = $this->input->post("ase");
			$extracciones->extraccion_1 = $this->input->post("fecha_extraccion_centro_1") && $this->input->post("hora_extraccion_centro_1") ? strtotime($this->input->post("fecha_extraccion_centro_1")." ".$this->input->post("hora_extraccion_centro_1")) : 0;
			$extracciones->resultado_1 = $this->input->post("resultados_extraccion_centro_1");
			$extracciones->extraccion_2 = $this->input->post("fecha_extraccion_centro_2") && $this->input->post("hora_extraccion_centro_2") ? strtotime($this->input->post("fecha_extraccion_centro_2")." ".$this->input->post("hora_extraccion_centro_2")) : 0;
			$extracciones->resultado_2 = $this->input->post("resultados_extraccion_centro_2");
			$extracciones->extraccion_3 = $this->input->post("fecha_extraccion_centro_3") && $this->input->post("hora_extraccion_centro_3") ? strtotime($this->input->post("fecha_extraccion_centro_3")." ".$this->input->post("hora_extraccion_centro_3")) : 0;
			$extracciones->resultado_3 = $this->input->post("resultados_extraccion_centro_2");
			$extracciones->observaciones = $this->input->post("observaciones_extraccion_centro");

			$this->aislamiento_model->anadir_extraccion($extracciones);

			$extraccion_ganaderia = new stdClass();
			$extraccion_ganaderia->id_ganaderia_origen = $caballo->id_ganaderia_origen;
			$extraccion_ganaderia->id_caballo = $id_caballo;
			$extraccion_ganaderia->extraccion_1 = $this->input->post("fecha_extraccion_ganaderia_1") && $this->input->post("hora_extraccion_ganaderia_1") ? strtotime($this->input->post("fecha_extraccion_ganaderia_1")." ".$this->input->post("hora_extraccion_ganaderia_1")) : 0;
			$extraccion_ganaderia->resultado_1 = $this->input->post("resultados_extraccion_ganaderia_1");
			$extraccion_ganaderia->extraccion_2 = $this->input->post("fecha_extraccion_ganaderia_2") && $this->input->post("hora_extraccion_ganaderia_2") ? strtotime($this->input->post("fecha_extraccion_ganaderia_2")." ".$this->input->post("hora_extraccion_ganaderia_2")) : 0;
			$extraccion_ganaderia->resultado_2 = $this->input->post("resultados_extraccion_ganaderia_2");
			$extraccion_ganaderia->extraccion_3 = $this->input->post("fecha_extraccion_ganaderia_3") && $this->input->post("hora_extraccion_ganaderia_3") ?  strtotime($this->input->post("fecha_extraccion_ganaderia_3")." ".$this->input->post("hora_extraccion_ganaderia_3")) : 0;
			$extraccion_ganaderia->resultado_3 = $this->input->post("resultados_extraccion_ganaderia_3");
			$extraccion_ganaderia->observaciones = $this->input->post("observaciones_extraccion_ganaderia");

			$this->ganaderias_model->anadir_extraccion($extraccion_ganaderia);

			$this->session->set_flashdata('message', 'El caballo se ha guardado correctamente');
			redirect(site_url('/caballos/'));
		}

		$data['message'] = $this->session->flashdata('message');
		$data['error'] = validation_errors();
		$data['menu'] = 'caballos';
		$data['submenu'] = 'nuevo_caballo';
		$this->load_admin_view('/caballos/nuevo_caballo',$data);
	}

	/*
	* Check de todos los campos del formulario con sus correspondientes normativas
	*/
	public function check_ficha_caballo()
	{
		$this->form_validation->set_rules('nombre_caballo', 'Nombre', 'trim|required');
		$this->form_validation->set_rules('id_raza', 'Raza', 'required|trim');
		$this->form_validation->set_rules('propietario', 'Propietario', 'required|trim');
		$this->form_validation->set_rules('sexo', 'Sexo', 'required|trim');
		$this->form_validation->set_rules('id_capa', 'Capa', 'required|trim');
		$this->form_validation->set_rules('pasaporte', 'Pasaporte', 'required|trim');
		$this->form_validation->set_rules('microchip', 'Microchip', 'required|trim');
		$this->form_validation->set_rules('fecha_nacimiento', 'Fecha nacimiento caballo', 'required|trim');
		$this->form_validation->set_rules('id_pais_destino', 'País destino', 'required|trim');
		$this->form_validation->set_rules('fecha_recogida', 'Fecha de recogida', 'required|trim');
		$this->form_validation->set_rules('id_ganaderia_origen', 'Ganadería de orígen', 'trim');
		$this->form_validation->set_rules('observaciones', 'Observaciones', 'trim');
		$this->form_validation->set_rules('num_cotizacion', 'Número de cotización', 'required|trim');
		$this->form_validation->set_rules('fecha_entrada_centro', 'Fecha de entrada al centro', 'required|trim');
		$this->form_validation->set_rules('id_centro_aislamiento', 'Centro de aislamiento', 'trim');
		$this->form_validation->set_rules('fecha_salida_centro', 'Fecha de salida del centro', 'required|trim');

		$this->form_validation->set_rules('ase', 'ASE', 'required');
		$this->form_validation->set_rules('fecha_extraccion_centro_1', 'ASE: Fecha 1ª extracción', 'trim');
		$this->form_validation->set_rules('hora_extraccion_centro_1', 'ASE: Hora 1ª extracción', 'trim');
		$this->form_validation->set_rules('resultados_extraccion_centro_1', 'ASE: Resultados 1ª extracción', 'trim');
		$this->form_validation->set_rules('fecha_extraccion_centro_2', 'ASE: Fecha 2ª extracción', 'trim');
		$this->form_validation->set_rules('hora_extraccion_centro_2', 'ASE: Hora 2ª extracción', 'trim');
		$this->form_validation->set_rules('resultados_extraccion_centro_2', 'ASE: Resultados 2ª extracción', 'trim');
		$this->form_validation->set_rules('fecha_extraccion_centro_3', 'ASE: Fecha 3ª extracción', 'trim');
		$this->form_validation->set_rules('hora_extraccion_centro_3', 'ASE: Hora 3ª extracción', 'trim');
		$this->form_validation->set_rules('resultados_extraccion_centro_3', 'ASE: Resultados 3ª extracción', 'trim');

		$this->form_validation->set_rules('fecha_extraccion_ganaderia_1', 'Raza', 'trim');
		$this->form_validation->set_rules('hora_extraccion_ganaderia_1', 'Raza', 'trim');
		$this->form_validation->set_rules('resultados_extraccion_ganaderia_1', 'Raza', 'trim');
		$this->form_validation->set_rules('fecha_extraccion_ganaderia_2', 'Raza', 'trim');
		$this->form_validation->set_rules('hora_extraccion_ganaderia_2', 'Raza', 'trim');
		$this->form_validation->set_rules('resultados_extraccion_ganaderia_3', 'Raza', 'trim');
		$this->form_validation->set_rules('fecha_extraccion_ganaderia_3', 'Raza', 'trim');
		$this->form_validation->set_rules('hora_extraccion_ganaderia_3', 'Raza', 'trim');
		$this->form_validation->set_rules('resultados_extraccion_ganaderia_3', 'Raza', 'trim');

		return $this->form_validation->run();
	}

}