<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Private_Controller extends CI_Controller {

	public $user;
	/*
		La clase Private_Controller hereda de CI_Controller
		ahora aqui establecemos el usuario logueado.
	*/
	function __construct() {
		parent::__construct();
		// Se carga el modelo de usuarios.
		$this->load->model('users');

		// Se carga el helper url y form.
		$this->load->helper('url');
		$this->load->helper('form');

		// Se carga la libreria form_validation.
		$this->load->library('form_validation');

		// Se le asigna a la informacion a la variable $user.
		$this->user = @$this->session->userdata('logged_user');

	}

	protected function load_admin_view($view, $data = array(), $html_return = FALSE)
    {
    	if (!isset($data['message']))
            $data['message'] = $this->session->flashdata('message');
        if (!isset($data['error']))
            $data['error'] = $this->session->flashdata('error');

        //$data['alert_user'] = $this->users->check_data_main_user();
        //$data['web_user_profile'] = $this->users->get_user_by_id($this->user->id);
        //$data['profile'] = $this->users->get_permissions_by_id_user($this->user->id);


        $this->load->view( 'header', $data );
        return $this->load->view( $view, $data, $html_return );
    }

    protected function has_permissions($permissions)
    {
        if (!$this->users->has_permission($permissions)) {
            if (is_array($permissions)) {
                $this->session->set_flashdata('error', 'Permission denied '.implode(',',$permissions));
            } else {
                $this->session->set_flashdata('error', 'Permission denied for '.str_replace("_"," ",$permissions));
            }
            redirect('/home');
        }

        return TRUE;
   }

}