<?php 

error_reporting(E_ALL ^ E_DEPRECATED);

class Un_post extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	public function index() {}

	function pst($id)
	{
		$this->usuarios_model->verify_connect();
		$res = $this->posts_model->get_post($id);
		$post = array_shift($res);
		$data = array('titulo' => 'Post',
		'id_usuario' => $post->id_usuario,
		'id' => $post->id,
		'titulo' => $post->titulo,
		'imagen' => $post->imagen,
		'opinion' => $post->opinion,
		'comentarios' => $this->posts_model->get_post_comments($id)
		);
		$this->load->view('topbar_view');
		$this->load->view('Un_post_view',$data);
	}

	function post_preview($img,$op,$titulo,$idusuario)
	{
		$this->usuarios_model->verify_connect();
		$data = array('titulo' => 'Post',
		'id_usuario' => $idusuario,
		'titulo' => $titulo,
		'imagen' => $img,
		'opinion' => $op,
		);
		$this->load->view('topbar_view');
		$this->load->view('Un_post_view',$data);
	}

	public function comentar()
	{
		$this->usuarios_model->verify_connect();
		$comentario = $this->input->post('comentario');
		$id_post = $this->input->post('id_post');
		$_POST['usuario'] = $this->session->userdata('usuario');
		$id_usuario = $_POST['usuario'];
		$this->posts_model->add_comment();
		$res = $this->posts_model->get_post($id_post);
		$post = array_shift($res);
		redirect(base_url()."un_post/pst/".$id_post);
	}

	public function borrar_comentario($id,$id_post)
	{
		$this->usuarios_model->verify_connect();
		$this->comentarios_model->delete_comment($id);
		redirect(base_url()."un_post/pst/".$id_post);
	}

	public function borrar_post($id)
	{
		$comentarios = $this->posts_model->get_post_comments($id);
		foreach($comentarios as $comentario)
		{
			$this->comentarios_model->delete_comment($comentario->id);
		}
		$this->posts_model->delete_post($id);
		redirect(base_url()."posts");
	}
}
?>