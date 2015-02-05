<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administracion extends Private_Controller {

	function __construct(){
  		parent::__construct();
  		$this->load->helper('url');
  		$this->load->model('user_model');
  		$this->load->model('razas_model');
 	}

	public function perfil($id_user)
	{
		if(!@$this->user) redirect ('welcome/login');

		$data['message'] = $this->session->flashdata('message');
		$data['usuario'] = $this->user_model->get_usuario_id($id_user);
		$data['menu'] = 'administracion';
		$data['submenu'] = 'perfil';		
		$this->load->view('menu',$data);
		$this->load->view('administracion/perfil',$data);

	}

	public function paises()
	{
		if(!@$this->user) redirect ('welcome/login');

		$data['message'] = $this->session->flashdata('message');
		$data['error'] = $this->session->flashdata('error');
		$data['menu'] = 'administracion';
		$data['submenu'] = 'paises';		
		$this->load->view('menu',$data);
		$this->load->view('administracion/paises',$data);

	}	

	public function razas_capas()
	{
		if(!@$this->user) redirect ('welcome/login');

		$data['razas'] = $this->razas_model->list_all_razas();
		$data['capas'] = $this->razas_model->list_all_capas();
		$data['message'] = $this->session->flashdata('message');
		$data['menu'] = 'administracion';
		$data['submenu'] = 'razas_capas';		

		if ($_POST) {

			if ($this->input->post("raza")) {
				$raza = new stdClass();
				$raza->raza = $this->input->post("raza");
				$this->razas_model->add_raza($raza);
				$this->session->set_flashdata('message', 'Raza añadida correctamente');

			} else if ($this->input->post("capa")) {
				$capa = new stdClass();
				$capa->capa = $this->input->post("capa");
				$this->razas_model->add_capa($capa);
				$this->session->set_flashdata('message', 'Capa añadida correctamente');
			}

			redirect("/administracion/razas_capas");
		}

		$this->load->view('menu',$data);
		$this->load->view('administracion/razas_capas',$data);

	}

	public function desactivar_capa($id_capa)
	{
		$capa = new stdClass();
		$capa->id = $id_capa;
		$capa->deleted = 1;
		$this->razas_model->update_capa($capa);
		$this->session->set_flashdata('message', 'Capa desactivada');
		redirect("/administracion/razas_capas");

	}

	public function activar_capa($id_capa)
	{
		$capa = new stdClass();
		$capa->id = $id_capa;
		$capa->deleted = 0;
		$this->razas_model->update_capa($capa);
		$this->session->set_flashdata('message', 'Capa activada');
		redirect("/administracion/razas_capas");

	}

	public function desactivar_raza($id_raza) 
	{
		$raza = new stdClass();
		$raza->id = $id_raza;
		$raza->deleted = 1;
		$this->razas_model->update_raza($raza);
		$this->session->set_flashdata('message', 'Raza desactivada');
		redirect("/administracion/razas_capas");
	}

	public function activar_raza($id_raza) 
	{
		$raza = new stdClass();
		$raza->id = $id_raza;
		$raza->deleted = 0;
		$this->razas_model->update_raza($raza);
		$this->session->set_flashdata('message', 'Raza activada');
		redirect("/administracion/razas_capas");
	}
}