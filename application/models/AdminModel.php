<?php
class AdminModel extends CI_Model{
    public function total_fee($course){
        $qry = $this->db->query("SELECT  SUM(adm+tution+estd+elect+cont+univ+icard+dev+lib+exam+megazine+stud+game+fest+curri+cult+lite+welf+ict) as tot FROM `fee_structure` WHERE c_id= '$course'");
        return $qry->result();
    }
}