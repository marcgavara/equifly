<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ganaderia extends Private_Controller {

	function __construct(){
  		parent::__construct();
  		$this->load->helper('url');
  		$this->load->model('user_model');
  		$this->load->model('ganaderias_model');
 	}

	public function index()
	{
		if(!@$this->user) redirect ('welcome/login');

		$data["ganaderias"] = $this->ganaderias_model->get_ganaderias();
		$data['message'] = $this->session->flashdata('message');
		$data['menu'] = 'ganaderia';
		$data['submenu'] = 'ganaderos';		
		$this->load->view('menu',$data);
		$this->load->view('ganaderia/ganaderia',$data);

	}

	public function check_form()
	{		
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
		$this->form_validation->set_rules('direccion', 'Dirección', 'required|trim');
		$this->form_validation->set_rules('poblacion', 'Población', 'required|trim');
		$this->form_validation->set_rules('cp', 'Códio postal', 'required|trim');
		$this->form_validation->set_rules('telefono', 'Telefono', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('responsable', 'Responsable', 'required');
		$this->form_validation->set_rules('telefono_responsable', 'Teléfono del responsable|trim', 'required|trim');
		$this->form_validation->set_rules('email_responsable', 'Email del responsable', 'required|trim|valid_email');
		$this->form_validation->set_rules('dni_responsable', 'dni del responsable', 'required|trim');
		$this->form_validation->set_rules('observaciones', 'Observaciones', 'trim');

		//otros_responsables_nombre
		//otros_responsables_telefono

		return $this->form_validation->run();
	}

	public function nueva_ganaderia()
	{
		if(!@$this->user) redirect ('welcome/login');

		$data['message'] = $this->session->flashdata('message');
		$data['error'] = $this->session->flashdata('error');

		if ($_POST && $this->check_form()) {
			$ganaderia = new stdClass();
			$fields = array('nombre','direccion','poblacion','cp','telefono','email','responsable','telefono_responsable','email_responsable','dni_responsable','observaciones');

			foreach ($fields as $field)
				$ganaderia->{$field} = $this->input->post($field);
			
			$this->ganaderias_model->anadir_ganaderia($ganaderia);
			$this->session->set_flashdata('message', 'La ganadería se ha guardado correctamente');
			redirect(site_url('/ganaderia/'));

		} else
			$data['error'] = validation_errors();


		$data['menu'] = 'ganaderia';
		$data['submenu'] = 'ganaderos';		
		$this->load->view('menu',$data);
		$this->load->view('ganaderia/nueva_ganaderia',$data);

	}

	public function ver($id_ganaderia)
	{

		if(!@$this->user) redirect ('welcome/login');

		$data["ganaderia"] = $this->ganaderias_model->get_ganaderia_by_id($id_ganaderia);
		$data['message'] = $this->session->flashdata('message');
		$data['error'] = $this->session->flashdata('error');

		if ($_POST) {
			$ganaderia = new stdClass();
			$fields = array('nombre','direccion','poblacion','cp','telefono','email','responsable','telefono_responsable','email_responsable','dni_responsable','observaciones');

			foreach ($fields as $field)
				$ganaderia->{$field} = $this->input->post($field);
			
			$this->ganaderias_model->actualizar_ganaderia($id_ganaderia, $ganaderia);
			$this->session->set_flashdata('message', 'La ganadería se ha guardado correctamente');
			redirect(site_url('/ganaderia/'));

		} else
			$data['error'] = validation_errors();

		$data['menu'] = 'ganaderia';
		$data['submenu'] = 'ganaderos';		
		$this->load->view('menu',$data);
		$this->load->view('ganaderia/ver',$data);

	}

}