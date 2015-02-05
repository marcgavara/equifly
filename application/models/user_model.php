<?php
class User_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
    
	public function read_user($username, $password)
	{
		return $this->db->where("username", $username)->
				   where("password", md5($password))->
				   get('users')->row();
	}

	public function get_usuario_id($id_usario) 
	{
		return $this->db->where('id',$id_usario)->
			   get('users')->row();

	}


}