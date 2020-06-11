<?php 

error_reporting(E_ALL ^ E_DEPRECATED);

class Un_post extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	public function index() {}

	function arti($id,$img,$op,$titulo,$idusuario)
	{
		$this->usuarios_model->verify_connect();
		$data = array('titulo' => 'Post',
		'id_usuario' => $idusuario,
		'id' => $id,
		'titulo' => $titulo,
		'imagen' => $img,
		'opinion' => $op,
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
		redirect(base_url()."un_post/arti/".$id_post."/".$post->imagen."/".$post->opinion."/".$post->titulo."/".$post->id_usuario);
	}
}
?>