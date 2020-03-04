<?php
class Loginmodel extends CI_Model{
    public function validate_user($username, $password){
        $user = $this->db->where(['username'=>$username,'password'=>$password])->get('users');
        if($user->num_rows()){
                return $user->row()->id;
        }else{
            return FALSE;
        }

    }
}