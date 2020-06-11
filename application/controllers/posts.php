<?php
error_reporting(E_ALL ^ E_DEPRECATED);

class Posts extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
        $this->load->helper('url');
		$this->load->model('posts_model');
		$this->load->library('session');
	}

	public function index() 
	{
		$datos = array(
			'mensaje' => "Estos son los Post publicados",
			'titulo_web' => 'Posts',
			'posts' => $this->posts_model->get_posts(),
			'nombre' => $this->session->userdata('usuario')
		);
		$limit_per_page = 5;
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
		$total_records = count($this->posts_model->get_posts());
		$config['base_url'] = base_url() . 'posts/index';
		$config['total_rows'] = $total_records;
		$config['per_page'] = $limit_per_page;
		$config["uri_segment"] = 3;

		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;
		
		$config['first_link'] = ' Primera ';
		$config['first_tag_open'] = '<span class="pagination">';
		$config['first_tag_close'] = '</span>';
			
		$config['last_link'] = ' Última ';
		$config['last_tag_open'] = '<span class="pagination">';
		$config['last_tag_close'] = '</span>';
			
		$config['next_link'] = ' Siguiente ';
		$config['next_tag_open'] = '<span class="pagination">';
		$config['next_tag_close'] = '</span>';

		$config['prev_link'] = ' Anterior ';
		$config['prev_tag_open'] = '<span class="pagination">';
		$config['prev_tag_close'] = '</span>';

		$config['cur_tag_open'] = '<span class="pagination">';
		$config['cur_tag_close'] = '</span>';

		$config['num_tag_open'] = '<span class="pagination">';
		$config['num_tag_close'] = '</span>';
		
		$this->pagination->initialize($config);
		
		$datos["links"] = $this->pagination->create_links();

		$datos["posts"] = $this->posts_model->get_posts_limit($limit_per_page, $page*$limit_per_page);
		
		$this->load->view('topbar_view');
		$this->load->view('posts_view', $datos);
	}

	public function busqueda()
	{
		$this->usuarios_model->verify_connect();
		$datos = array(
			'mensaje' => "Busqueda de '".$this->input->post('busqtitulo')."'",
			'titulo_web' => 'Posts',
			'posts' => $this->posts_model->get_posts_like($this->input->post('busqtitulo')),
			'nombre' => $this->session->userdata('usuario')
		);
		$this->load->view('posts_view',$datos);
	}
}
?>