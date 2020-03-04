<?php
class Student extends CI_Controller{
    public function index(){
    }
// ajax function starts
    public function getform(){
        $code = $this->input->post('key');
        $student = $this->db->where('unique_code',$code)->get('form_sold');
        if($student->num_rows()>0){
            echo "TRUE";
        }
        else{
            echo "FALSE";
        }
    }
    public function getdetails($key){
        $sd = $this->genModel->fetch_by_col('form_submitted', ['code'=>$key]);
        echo json_encode($sd[0]);
    }
// ajax function ends

// view function
    public function thankyou($code){
        $this->load->view('student/thankyou',['code'=>$code]);
    }
    public function fillform($key){
        $sold_form = $this->db->where('unique_code',$key)->get('form_sold');
        $sold_form = $sold_form->row();
        $this->load->view('student/form',['form_details'=>$sold_form]);
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
        $_FILES['userfile']['name'] = $_FILES['file']['name'][0];
        $_FILES['userfile']['type'] = $_FILES['file']['type'][0];
        $_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][0];
        $_FILES['userfile']['error'] = $_FILES['file']['error'][0];
        $_FILES['userfile']['size'] = $_FILES['file']['size'][0];
        $pic_name = $this->arronic->uniqName($_FILES['userfile']['name']);
        $this->_file_upload($path,$pic_name,$type);
        $this->_image_resize('./upload/'.$pic_name,143,143);

        $_FILES['userfile']['name'] = $_FILES['file']['name'][1];
        $_FILES['userfile']['type'] = $_FILES['file']['type'][1];
        $_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][1];
        $_FILES['userfile']['error'] = $_FILES['file']['error'][1];
        $_FILES['userfile']['size'] = $_FILES['file']['size'][1];
        $sign_name = $this->arronic->uniqName($_FILES['userfile']['name']);
        $this->_file_upload($path,$sign_name,$type);
        $this->_image_resize('./upload/'.$sign_name,80,200);
        
        $data = array(
            'name' => $this->input->post('student_name'),
            'code'=> $this->input->post('student_code'),
            'course'=> $this->input->post('student_course'),
            'father'=> $this->input->post('father'),
            'mother'=> $this->input->post('mother'),
            'g_name'=> $this->input->post('g_name'),
            'g_occupation'=> $this->input->post('g_occupation'),
            'g_relation'=> $this->input->post('g_relation'),
            'g_village'=> $this->input->post('g_vill'),
            'g_po'=> $this->input->post('g_PO'),
            'g_district'=> $this->input->post('g_district'),
            'g_pin'=> $this->input->post('g_pin'),
            'g_phone'=> $this->input->post('g_phone'),
            'nationality' => $this->input->post('nationality'),
            'religion'=> $this->input->post('religion'),
            'cast'=> $this->input->post('cast'),
            'dob'=> $this->input->post('dob'),
            'gender'=> $this->input->post('gender'),
            'last_institute'=> $this->input->post('l_institute'),
            'last_exam'=> $this->input->post('l_exam'),
            'last_exam_roll'=> $this->input->post('e_roll'),
            'last_exam_no'=> $this->input->post('e_no'),
            'last_exam_year'=> $this->input->post('e_year'),
            'last_exam_center'=> $this->input->post('e_center'),
            'sub1'=> $this->input->post('sub1'),
            'sub2'=> $this->input->post('sub2'),
            'sub3'=> $this->input->post('sub3'),
            'sub4'=> $this->input->post('sub4'),
            'sub5'=> $this->input->post('sub5'),
            'sub6'=> $this->input->post('sub6'),
            'sub1_max'=> $this->input->post('sub1_max'),
            'sub2_max'=> $this->input->post('sub2_max'),
            'sub3_max'=> $this->input->post('sub3_max'),
            'sub4_max'=> $this->input->post('sub4_max'),
            'sub5_max'=> $this->input->post('sub5_max'),
            'sub6_max'=> $this->input->post('sub6_max'),
            'sub1_obt'=> $this->input->post('sub1_obt'),
            'sub2_obt'=> $this->input->post('sub2_obt'),
            'sub3_obt'=> $this->input->post('sub3_obt'),
            'sub4_obt'=> $this->input->post('sub4_obt'),
            'sub5_obt'=> $this->input->post('sub5_obt'),
            'sub6_obt'=> $this->input->post('sub6_obt'),
            'other_sub'=> $this->input->post('o_sub'),
            'last_exam_div'=> $this->input->post('division'),
            'last_exam_total'=> $this->input->post('total'),
            'last_exam_obtained'=> $this->input->post('obtained'),
            'gu_reg'=> $this->input->post('gu_reg_no'),
            'gu_year'=> $this->input->post('gu_year'),
            'apl_bpl'=> $this->input->post('apl'),
            'study_break'=> $this->input->post('gap'),
            'break_reason'=> $this->input->post('gap_reason'),
            'image_path'=> $pic_name,
            'sign_path'=> $sign_name,
            'date'=>date('Y-m-d')
        );
        $this->genModel->insert_data('form_submitted',$data);
        redirect(base_url().'student/thankyou/'.$this->input->post('student_code'));
    }

    // pdf generate
    function myform($code){
        $this->load->library('pdf');
        $view = $this->htmltopdfmodel->getformpdf($code);
        // echo $view; exit;
        $this->pdf->loadHtml($view);
        $this->pdf->render();    
        $this->pdf->stream("Form.pdf",array("Attachment"=>0));
    }
    // image resize
    public function _image_resize($source, $height, $width, $copy=null, $destination=null){
			
        $configi['image_library']  = 'gd2';
        $configi['source_image']   = $source;
        // $configi['max_size']       = '0';
        $configi['create_thumb']   = FALSE;
        $configi['maintain_ratio'] = FALSE;
        $configi['overwrite'] 	   = TRUE;
        $configi['file_permissions'] = 0644;
        // $configi['max_width']          = 3000;
        // $configi['max_height']         = 3000;
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