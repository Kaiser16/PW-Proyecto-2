<?php

class Usuarios_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function verify_user($user)
	{
		$ssql = "select * from usuarios where usuario='".$user."'";
		$consulta = $this->db->query($ssql);
		if($consulta->num_rows() == 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function verify_connect()
	{
		if(!$this->session->userdata('usuario'))
		{
			redirect(base_url()."usuarios");
		}
	}

	public function add_usuario()
	{
		$this->db->insert('usuarios',array(
			'nombre'=>$this->input->post('nombre',TRUE),
			'correo'=>$this->input->post('correo',TRUE),
			'usuario'=>$this->input->post('usuario',TRUE),
			'pass'=>$this->input->post('pass',TRUE),
			'admin'=>'false',
			'imagen'=>$this->input->post('imagen',TRUE)
		));
	}

	public function get_usuario($usuario)
	{	
		$ssql = "select * from usuarios where usuario='".$usuario."'";
		$consulta = $this->db->query($ssql);
		return $consulta->result();
	}

	public function verify_sesion()
	{
		$consulta = $this->db->get_where('usuarios',array('usuario'=>$this->input->post('user',TRUE),'pass'=>$this->input->post('pass',TRUE)));
		if($consulta->num_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}