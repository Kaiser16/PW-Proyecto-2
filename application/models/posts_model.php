<?php 

class Posts_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_posts()
	{
		$consulta = $this->db->get('entradas');
		return $consulta->result();
	}

	public function get_posts_limit($limit,$begin)
	{
		$this->db->limit($limit,$begin);
		$this->db->order_by('id', 'ASC');
		$consulta = $this->db->get('entradas');
		return $consulta->result();
	}

	public function get_post($id)
	{
		$consulta = $this->db->get_where('entradas',array('id'=> $id));
		return $consulta->result();
	}

	public function get_post_comments($idpost)
	{
		$consulta = $this->db->get_where('comentarios',array('id_post'=> $idpost));
		return $consulta->result();
	}

	public function get_post_user($idusuario)
	{
		$consulta = $this->db->get_where('entradas',array('id_usuario'=> $idusuario));
		return $consulta->result();
	}

	public function add_post()
	{
		$this->db->query('Insert into entradas values(null,"'.$this->input->post('imagen').'","'.$this->input->post('opinion').'","'.$this->input->post('usuario').'","'.$this->input->post('titulo').'")');
	}

	public function add_comment()
	{
		$this->db->query('Insert into comentarios values(null,"'.$this->input->post('id_post').'","'.$this->input->post('usuario').'","'.$this->input->post('comentario').'")');
	}

	public function get_posts_like($titulo)
	{
		$consulta = $this->db->query("select * from entradas where titulo like '%".$titulo."%'");
		return $consulta->result();
	}
}
?>