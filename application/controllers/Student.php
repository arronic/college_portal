<?php
class Student extends CI_Controller{
    public function index(){
        $this->load->view('auth/student');
        // $heading = "Requested Page is not Found!";
        // $message = "The page you are requesting is not built for now!";
        // $this->load->view('errors/html/error_404',compact('heading','message'));
    }
// ajax function starts
    public function getform(){
        $code = $this->input->post('key');
        $student = $this->genModel->fetch_by_where('form_sold',['unique_code'=>$code]);
        if($student){
            $student = $this->genModel->fetch_by_where('form_submitted',['code'=>$code]);
            if($student){
                echo "NONE";
            }
            else{
                echo "TRUE";
            }
        }
        else{
            echo "FALSE";
        }
    }
    public function getdetails($key){
        $sd = $this->genModel->fetch_by_col('form_submitted', ['id'=>$key]);
        echo json_encode($sd[0]);
    }
// ajax function ends

// view function
    public function thankyou($code){
        $this->load->view('student/thankyou',['code'=>$code]);
    }
    public function fillform($key){
        $key = base64_decode($key);
        $sold_form = $this->db->where('unique_code',$key)->get('form_sold');
        if($sold_form->row()){
            $sold_form = $sold_form->row();
            $this->load->view('student/form',['form_details'=>$sold_form]);
        }else{
            return redirect('/student');
        }
    }

    // logic functions
    public function _file_upload($path, $f_name ,$types=null, $max_size=null){

        $config['upload_path'] = $path;
        $config['allowed_types'] = ($types!=null ? $types : '*');
        $config['max_size'] = ($max_size!=null ? $max_size : '100000'); // max_size in 100 kb
        $config['file_name'] = $f_name;
        // print_r($config); exit;
        $this->upload->initialize($config);
        
        if($this->upload->do_upload()){
            return TRUE;
        }
        else{
            echo $this->upload->display_errors();
        }
    }

    public function submit_form(){
        $path = './upload/';
        $type = 'jpg|png|jpeg';
        for ($i=0; $i <= 1; $i++) { 
            $_FILES['userfile']['name'] = $_FILES['file']['name'][$i];
            $_FILES['userfile']['type'] = $_FILES['file']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
            $_FILES['userfile']['error'] = $_FILES['file']['error'][$i];
            $_FILES['userfile']['size'] = $_FILES['file']['size'][$i];
            if($i == 0){
                $pic_name = $this->arronic->uniqName($_FILES['userfile']['name']);
                $this->_file_upload($path,$pic_name,$type);
                $this->_image_resize('./upload/'.$pic_name,143,143);
            }else{
                $sign_name = $this->arronic->uniqName($_FILES['userfile']['name']);
                $this->_file_upload($path,$sign_name,$type);
                $this->_image_resize('./upload/'.$sign_name,50,180);
            }
        }
        $data = $this->input->post();
        $data['image_path'] = $pic_name;
        $data['sign_path']= $sign_name;
        $data['date'] = date('Y-m-d');
         
        if($this->genModel->insert_data('form_submitted',$data)){
            $this->genModel->update_by_where('form_sold', ['status'=>1], ['unique_code'=>$data['code']]);
            redirect(base_url().'student/thankyou/'.$data['code']);
        }
            
        else
            redirect(base_url());
    }

    // pdf generate
    function myform($code = null){
        if($code){
            $code = base64_decode($code);
            if($student_details = $this->genModel->fetch_by_col('form_submitted',['code'=>$code])){
                $sd = $student_details[0];
                $this->load->library('pdf');
                $view = $this->htmltopdfmodel->getformpdf($sd);
                $this->pdf->loadHtml($view);
                $this->pdf->render();    
                $this->pdf->stream("Form.pdf",array("Attachment"=>0));
            }
            else{
                redirect('Student');
            }
        }
        else
            redirect('PageNotFound');
    }
    // image resize
    public function _image_resize($source, $height, $width, $copy=null, $destination=null){
			
        $configi['image_library']  = 'gd2';
        $configi['source_image']   = $source;
        $configi['create_thumb']   = FALSE;
        $configi['maintain_ratio'] = FALSE;
        $configi['overwrite'] 	   = TRUE;
        $configi['file_permissions'] = 0644;
        $configi['width']          = $width;
        $configi['height']         = $height;
        if($copy)
            $configi['new_image']  = $destination;
        $this->image_lib->initialize($configi);
        
        
        if(!$this->image_lib->resize()){
            return $this->image_lib->display_errors();
        }
        else{
            $this->image_lib->clear();
            return TRUE;
        }
    }

    public function __construct(){
        parent::__construct();
        $this->load->model('GeneralModel','genModel');
        $this->load->model('htmltopdfmodel');
        $this->load->library('arronic_lib1',null,'arronic');
        date_default_timezone_set('Asia/Calcutta');
    }
}