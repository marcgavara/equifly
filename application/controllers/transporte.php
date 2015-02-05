<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transporte extends Private_Controller {

	function __construct(){
  		parent::__construct();
  		$this->load->helper('url');
  		$this->load->model('transporte_model');
 	}

	public function transportistas()
	{
		if(!@$this->user) redirect ('welcome/login');

		$data['message'] = $this->session->flashdata('message');
		$data['transportistas'] = $this->transporte_model->get_transportistas();
		$data['menu'] = 'transporte';
		$data['submenu'] = 'transportistas';		
		$this->load->view('menu',$data);
		$this->load->view('transporte/transportistas',$data);

	}

	public function nuevo_transportista()
	{
		if(!@$this->user) redirect ('welcome/login');

		$data['message'] = $this->session->flashdata('message');
		$data['error'] = $this->session->flashdata('error');
		$data['transportistas'] = $this->transporte_model->get_transportistas();
		$data['menu'] = 'transporte';
		$data['submenu'] = '';		
		$this->load->view('menu',$data);
		$this->load->view('transporte/nuevo_transportista',$data);
	}

	public function guardar_transportista()
	{
		// SE HA DE COMPROBAR EL FORMULARIO ANTES DE TODO
		//primero se añade el transportista
		//Segundo se añaden camiones
		//Tercero se añaden los choferes
		print('<pre>');
		$camiones = $this->input->post('camion');
		$matriculas =$this->input->post('matricula');
		$choferes = $this->input->post('choferes');
		$dni_choferes = $this->input->post('dni_choferes');
		
		$id_transportista = "xxx"; //Se obtiene después de hacer el insert!
		/* AÑADIMOS CAMIONES Y MATRICULAS */
		$i = 0;
		foreach ($camiones as $camion) {
			$tmp_camion = new stdClass();
			$tmp_camion->tipo = $camion;
			$tmp_camion->matricula = $matriculas[$i];
			$tmp_camion->id_transportista = $id_transportista;
			++$i;
			//Hacer insert a transportistas_camiones
		}

		/* AÑADIMOS CHOFERES Y DNIS */
		$i = 0;
		foreach ($choferes as $chofer) {
			$tmp_chofer = new stdClass();
			$tmp_chofer->chofer = $chofer;
			$tmp_chofer->dni = $dni_choferes[$i];
			$tmp_chofer->id_transportista = $id_transportista;
			++$i;
			//Hacer insert a transportistas_chofers
		}
		


		die;
	}
}