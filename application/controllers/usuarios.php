<?php 
error_reporting(E_ALL ^ E_DEPRECATED);

class Usuarios extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		session_destroy();
		$this->load->view('usuarios_view');
	}

	public function registro()
	{
		$this->load->view('registro_view');
	}

	public function verify_registro()
	{
		if($this->input->post('submit_reg'))
		{
			$this->form_validation->set_rules('nombre','Nombre','required');
			$this->form_validation->set_rules('correo','Correo','required|valid_email|trim');
			$this->form_validation->set_rules('usuario','Usuario','required|trim|callback_verify_user');
			$this->form_validation->set_rules('pass','Contraseña','required|trim');
			$this->form_validation->set_rules('pass2','Confirmacion de contraseña','required|trim|matches[pass]');
			
			$this->form_validation->set_message('required','El campo %s es obligatorio.');
			$this->form_validation->set_message('verify_user','El %s ya existe.');
			$this->form_validation->set_message('matches','El campo %s no es igual que el campo %s.');

			if($this->form_validation->run() == FALSE)
			{
				$this->registro();
			}
			else
			{
				$mi_archivo = 'img';
				$config['upload_path'] = "images/";
				$config['allowed_types'] = "jpg|png";
				$config['max_size'] = "50000";
				$config['max_width'] = "2000";
				$config['max_height'] = "2000";
				
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload($mi_archivo)) {
					$datos=array('error'=>'Error en el fichero');
					$this->load->view('registro_view',$datos);
					echo $this->upload->display_errors();
				}
				else{
					$_POST['imagen'] = $this->upload->data('file_name');
					$this->usuarios_model->add_usuario();
					$datos=array('mensaje'=>'El usuario se ha registrado correctamente');
					$this->load->view('registro_view',$datos);
				}
			}
		}
	}

	function verify_user($usuario)
	{
		$variable = $this->usuarios_model->verify_user($usuario);
		if($variable == true)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function verify_sesion()
	{
		if($this->input->post('submit'))
		{
			$variable = $this->usuarios_model->verify_sesion();

			if($variable==true)
			{
       			$user = array_shift($this->usuarios_model->get_usuario($this->input->post('user')));
				$variables = array(
					'usuario' => $this->input->post('user'),
					'admin' => $user->admin
				);
				$this->session->set_userdata($variables);
				redirect(base_url().'index.php/posts');
			}
			else
			{
				$mensaje = array('mensjae' => 'El usuario/contraseña no son correctos');

				$this->load->view('usuarios_view',$mensaje);
			}
		}
		else
		{
			redirect(base_url().'index.php/usuarios');
		}
	}
}

?>