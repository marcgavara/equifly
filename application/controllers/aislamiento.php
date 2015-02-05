<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aislamiento extends Private_Controller {

	function __construct(){
  		parent::__construct();
  		$this->load->helper('url');
  		$this->load->model('aislamiento_model');
  		$this->load->model('imagenes_model');
 	}

	public function centros()
	{
		if(!@$this->user) redirect ('welcome/login');

		$data['centros'] = $this->aislamiento_model->get_centros_list();
		$data['message'] = $this->session->flashdata('message');
		$data['error'] = $this->session->flashdata('error');
		$data['menu'] = 'aislamiento';
		$data['submenu'] = 'centros';
		$this->load_admin_view('aislamiento/centros',$data);
	}

	public function nuevo_centro()
	{
		if(!@$this->user) redirect ('welcome/login');

		$data['message'] = $this->session->flashdata('message');
		$data['error'] = $this->session->flashdata('error');

		if ($_POST && $this->check_form()) {
			$centro = new stdClass();
			$fields = array('nombre', 'direccion', 'poblacion', 'cp', 'nif', 'email_centro',
				'telefono_centro', 'responsable', 'telefono_responsable', 'email_responsable',
				'codigo_rega', 'marca_oficial', 'num_boxes', 'infermeria', 'observaciones');
			foreach ($fields as $field) {
				$centro->{$field} = $this->input->post($field);
			}
			$id_centro = $this->aislamiento_model->anadir_centro($centro);
			$result = $this->upload_imagen($id_centro);
			$this->session->set_flashdata('message', 'Se ha añadido un nuevo centro');
			redirect(site_url('/aislamiento/centros'));
		} else
			$data['error'] = validation_errors();

		$data['menu'] = 'aislamiento';
		$data['submenu'] = 'nuevo_centro';
		$this->load_admin_view('/aislamiento/nuevo_centro',$data);
	}

	public function check_form()
	{
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
		$this->form_validation->set_rules('direccion', 'Dirección', 'required|trim');
		$this->form_validation->set_rules('poblacion', 'Población', 'required|trim');
		$this->form_validation->set_rules('cp', 'Códio postal', 'required|trim');
		$this->form_validation->set_rules('nif', 'NIF', 'required|trim');
		$this->form_validation->set_rules('email_centro', 'Email del centro', 'required|trim|valid_email');
		$this->form_validation->set_rules('telefono_centro', 'Teléfono del centro', 'required|trim');
		$this->form_validation->set_rules('responsable', 'Responsable', 'required');
		$this->form_validation->set_rules('telefono_responsable', 'Teléfono del responsable|trim', 'required|trim');
		$this->form_validation->set_rules('email_responsable', 'Email del responsable', 'required|trim|valid_email');
		$this->form_validation->set_rules('codigo_rega', 'Código REGA', 'required|trim');
		$this->form_validation->set_rules('marca_oficial', 'Marca oficial', 'required|trim');
		$this->form_validation->set_rules('num_boxes', 'Número de boxes', 'required|trim');
		$this->form_validation->set_rules('infermeria', 'Inferería', 'required|trim');

		return $this->form_validation->run();
	}

	public function upload_imagen($id_centro)
	{
		$config['upload_path'] = site_url('public/imagenes/centros');
	    $config['allowed_types'] = 'gif|jpg|png|bmp';
        $config['max_size'] = '999329';
    	$config['max_width'] = '10240';
    	$config['max_height'] = '7680';
		$this->load->library('upload', $config);

		$this->upload->initialize( $config );
        // Change $_FILES to new vars and loop them
        foreach($_FILES['userfile'] as $key=>$val)
        {
            $i = 1;
            foreach($val as $v)
            {
                $field_name = "file_".$i;
                $_FILES[$field_name][$key] = $v;
                $i++;
            }
        }
        unset($_FILES['userfile']);

        // Put each errors and upload data to an array
        $error = array();
        $success = array();

        // main action to upload each file
        foreach($_FILES as $field_name => $file)
        {
            if (!$this->upload->do_upload($field_name)) {
                $error['upload'][] = $this->upload->display_errors();
            } else {
                $upload_data = $this->upload->data();
               	$success[] = $upload_data;
               	//AÑADIMOS LA IMAGEN EN BBDD
				$centro = new stdClass();
				$centro->url = str_replace("/Applications/XAMPP/xamppfiles/htdocs/ExportHorses", ".", $upload_data['full_path']);
				$centro->id_centro_aislamiento = $id_centro;
				$this->imagenes_model->add_imagenes_centro_aislamiento($centro);
            }
        }
	}

	public function ver_centro($id_centro)
	{
		if(!@$this->user) redirect ('welcome/login');

		$this->load->model('imagenes_model');
		$data['imagenes'] = $this->imagenes_model->get_imagenes_centro_aislamiento($id_centro);
		$data['centro'] = $this->aislamiento_model->get_centro_by_id($id_centro);
		$data['message'] = $this->session->flashdata('message');
		$data['error'] = $this->session->flashdata('error');

		if ($_POST && $this->check_form()) {
			$centro = new stdClass();
			$fields = array('nombre', 'direccion', 'poblacion', 'cp', 'nif', 'email_centro',
				'telefono_centro', 'responsable', 'telefono_responsable', 'email_responsable',
				'codigo_rega', 'marca_oficial', 'num_boxes', 'infermeria', 'observaciones');
			foreach ($fields as $field) {
				$centro->{$field} = $this->input->post($field);
			}
			$this->aislamiento_model->actualizar_centro($id_centro, $centro);
			$this->session->set_flashdata('message', 'Se ha actualizado el centro');
			redirect(site_url('/aislamiento/centros'));
		} else
			$data['error'] = validation_errors();


		$data['menu'] = 'aislamiento';
		$data['submenu'] = '';
		$this->load_admin_view('/aislamiento/ver',$data);
	}

	public function eliminar_centro($id_centro)
	{
		if(!@$this->user) redirect ('welcome/login');

		$centro = new stdClass();
		$centro->id = $id_centro;
		$this->aislamiento_model->delete_centro($centro);
		$data['message'] = $this->session->flashdata('message');
		$this->session->set_flashdata('message', 'Se ha eliminado el centro correctamente');
		redirect(site_url('aislamiento/centros'));
	}

	public function comprueba_nif()
	{
		header('Content-Type: application/json');
		$nif = $this->input->post("nif");

		$form_data = new stdClass();
		$form_data->success = TRUE;
		if ($otro_centro = $this->aislamiento_model->chech_nif_centro($nif)) {
			$form_data->success = FALSE;
			$form_data->nombre_otro_centro = $otro_centro->nombre;
		}
		echo json_encode($form_data);
	}


}