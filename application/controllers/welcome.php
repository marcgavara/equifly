<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends Private_Controller {

	public function index() {
		/*
			Si no esta logueado lo redirigmos al formulario de login.
		*/
		if(!@$this->user)
			redirect(site_url('welcome/login'));
		else
			redirect(site_url('/home'));

	}

	public function login() {

		$data = array();

		// Añadimos las reglas necesarias.
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		// Generamos el mensaje de error personalizado para la accion 'required'
		$this->form_validation->set_message('required', 'El campo %s es requerido.');

		// Si no esta vacio $_POST
		if(!empty($_POST)) {
			// Si las reglas se cumplen, entramos a la condicion.
			if ($this->form_validation->run() == TRUE) {

				// Si existe el usuario creamos la sesion y redirigimos al index.
				if($u = $this->users->get_user($_POST['username'], $_POST['password'])) {
					$this->session->set_userdata('logged_user', $u);
					redirect(site_url('/home'));
				} else {
					// De lo contrario se activa el error_login.
					$data['message'] = 'Este usuario no existe en la BBDD';
				}
			} else
				$data['message'] = validation_errors();
		}

		$this->load->view('login', $data);
	}

	/*
	* Función para hacer desconexión
	*/
	public function logout() {
		$this->session->unset_userdata('logged_user');
		redirect('welcome/index');
	}
}
