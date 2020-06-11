<?php

class Un_usuario extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){}

    public function usu($usuario)
    {
        $this->usuarios_model->verify_connect();
        $res = $this->usuarios_model->get_usuario($usuario);
        $user = array_shift($res);
        $data = array(
            'titulo' => $user->usuario,
            'usuario' => $user,
            'posts' => $this->posts_model->get_post_user($usuario)
        );
        $this->load->view('topbar_view');
        $this->load->view("un_usuario_view",$data);
    }

    public function borrar_usuario($usuario)
	{
        echo $usuario;
        $posts = $this->posts_model->get_post_user($usuario);
        echo count($posts);
		foreach($posts as $post)
		{
            $comentarios = $this->posts_model->get_post_comments($post->id);
            echo count($comentarios);
			foreach($comentarios as $comentario)
			{
				$this->comentarios_model->delete_comment($comentario->id);
            }
            $this->posts_model->delete_post($post->id);
        }
        $this->usuarios_model->delete_usuario($usuario);
		redirect(base_url()."posts");
	}
}

?>