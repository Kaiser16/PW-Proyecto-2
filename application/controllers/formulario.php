<?php 
//error_reporting(E_ALL ^ E_DEPRECATED);
class Formulario extends CI_Controller
{
	public function __constructor()
	{
		parent::__constructor();
	}

	public function index()
	{
		$this->usuarios_model->verify_connect();
		$this->load->view('formulario_view');
	}

	public function validar()
	{
		$this->usuarios_model->verify_connect();
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('titulo','Titulo del post','required|max_length[100]');
			$this->form_validation->set_rules('opinion','Opinion del usuario','required|max_length[200]');

			$this->form_validation->set_message('required','El campo %s es obligatorio');
			$this->form_validation->set_message('max_length','El campo %s tiene como maximo %s caracteres.');

			if($this->form_validation->run() == FALSE)
			{
				$this->index();
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
					$this->load->view('formulario_view',$datos);
					echo $this->upload->display_errors();
				}
				else {
					$_POST['imagen'] = $this->upload->data('file_name');
					$_POST['usuario'] = $this->session->userdata('usuario');
					$this->posts_model->add_post();
					redirect(base_url()."un_post/post_preview/".$this->input->post('imagen')."/".$this->input->post('opinion')."/".$this->input->post('titulo')."/".$this->input->post('usuario'));
				}
			}
		}
	}
}
?>