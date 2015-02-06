<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Controlador de la página principal
* Aquí se verán el calendario con sus eventes al hacer click con ajax
* y recordatorios importantes p.e.: Faltan datos por introducir, importación de caballo pendiente,
* generación de archivos, emails, etc.
*/

class Home extends Private_Controller {

	function __construct(){
  		parent::__construct();
  		$this->load->helper('url');
  		$this->load->model('caballos_model');
 	}


 	/*
 	* De momento, query con recordatorios caballos con falta de datos.
 	*/
	public function index($menu = 'home')
	{
		if(!@$this->user) redirect ('welcome/login');

		$data['recordatorios'] = $this->caballos_model->check_caballos();

		$data['menu'] = 'home';
		$data['submenu'] = 'principal';
		$this->load_admin_view('home', $data);
	}
}