<?php

class Comentarios_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function delete_comment($id)
    {
        $this->db->delete('comentarios',array('id'=>$id));
    }
}

?>