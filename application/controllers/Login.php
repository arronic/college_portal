<?php
class Login extends CI_Controller{
    // view functions start
    public function index(){
        $this->load->view('auth/login');
    }
    // view function ends

    // logic function starts
    public function login_check(){
        $this->load->model('loginmodel');
        $data = array(
            'username' => $this->input->post('username'),
            'password'=> $this->input->post('password')
            );
        $user_id = $this->loginmodel->validate_user($data['username'],$data['password']);
        if ($user_id) {
            $this->session->set_userdata('user_id',$user_id);
            echo "TRUE";
        }else {
            echo "FALSE";
        }
    }
    public function logout(){
        $this->session->unset_userdata('user_id');
        return redirect('login');
    }
    // logic function ends
}