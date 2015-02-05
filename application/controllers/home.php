<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Private_Controller {

	function __construct(){
  		parent::__construct();
  		$this->load->helper('url');
  		$this->load->model('caballos_model');
 	}

	public function index($menu = 'home')
	{
		if(!@$this->user) redirect ('welcome/login');

		$data['recordatorios'] = $this->caballos_model->check_caballos();
		
		$data['menu'] = 'home';
		$data['submenu'] = 'principal';		
		$this->load_admin_view('home', $data);
	}
}