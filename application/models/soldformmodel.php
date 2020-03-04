<?php
class Soldformmodel extends CI_Model{
    public function store($data){
        $form = $this->db->insert('form_sold',$data);
        return $form;
    }
}