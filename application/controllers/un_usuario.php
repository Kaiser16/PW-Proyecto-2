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
        $data = array('titulo' => $user->usuario,
        'usuario' => $user,
        'posts' => $this->posts_model->get_post_user($usuario)
        );
        $this->load->view('topbar_view');
        $this->load->view("un_usuario_view",$data);
    }
}

?>