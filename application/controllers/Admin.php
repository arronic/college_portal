<?php
class Admin extends CI_Controller{
    // view function starts
    public function index(){
        $courses = $this->db->get('course');
        $courses = $courses->result();
        $this->load->view('admin/home',['courses'=>$courses]);
    }
    public function check(){
        $this->load->view('admin/check');
    }
    public function generate_form(){
        $this->load->view('admin/generate');
    }
    public function sold_form(){
        $this->load->view('admin/soldform');    
    }
    public function filled_form(){
        $this->load->view('admin/filledform');
    }
    public function admission_list(){
        $this->load->view('admin/admission');
    }
    public function fill_form(){
        $this->load->view('admin/fillform');
    }
    public function paid_list(){
        $course = $this->genModel->fetch_by_all('course');
        $this->load->view('admin/paid_list', compact('course'));
    }
    public function fee_structure(){
        $this->load->view('admin/fee_structure');
    }
    // view function ends

    // logic function starts
   public function getformdetails(){
        if($code = $this->input->post('key')){
            $student =  $this->genModel->fetch_by_col('form_submitted', ['code'=>$code]);
            if($student[0]->name != null){
                echo "TRUE";
            }
            else{
                echo "FALSE";
            }
        }
        else
            redirect('pageNotFound');
    }
    public function formdetails(){
        $code = $this->input->post('code');
        $sd = $this->db->where('code',$code)->get('form_submitted');
        if($sd->num_rows()>0){
            echo "FALSE";
        }
        else{
            $sd = $this->db->where('unique_code',$code)->get('form_sold');
            if($sd->num_rows()>0){
                echo json_encode($sd->row());
            }
            else{
                echo "NONE";
            }
        }
    }
    public function store_student(){
        $data = $this->input->post();
        $path = './upload/';
        $type = 'jpg|png|jpeg';
        if($_FILES['file']['name'][0]){
            $_FILES['userfile']['name'] = $_FILES['file']['name'][0];
            $_FILES['userfile']['type'] = $_FILES['file']['type'][0];
            $_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][0];
            $_FILES['userfile']['error'] = $_FILES['file']['error'][0];
            $_FILES['userfile']['size'] = $_FILES['file']['size'][0];
            $pic_name = $this->arronic->uniqName($_FILES['userfile']['name']);
            $this->_file_upload($path,$pic_name,$type);
            $this->_image_resize('./upload/'.$pic_name,143,143);
            $data['image_path'] = $pic_name;
        };
        if($_FILES['file']['name'][1]){
            $_FILES['userfile']['name'] = $_FILES['file']['name'][1];
            $_FILES['userfile']['type'] = $_FILES['file']['type'][1];
            $_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][1];
            $_FILES['userfile']['error'] = $_FILES['file']['error'][1];
            $_FILES['userfile']['size'] = $_FILES['file']['size'][1];
            $sign_name = $this->arronic->uniqName($_FILES['userfile']['name']);
            $this->_file_upload($path,$sign_name,$type);
            $this->_image_resize('./upload/'.$sign_name,80,200);
            $data['sign_path'] = $sign_name;
        };
        if($this->genModel->insert_data('form_submitted',$data)){
            echo "TRUE";
        }
        else{
            echo "FALSE";
        }
    }
    public function getDetails($key){
        $sd = $this->genModel->fetch_by_col('form_submitted', ['code'=>$key]);
        $total_fee = $this->model->total_fee($sd[0]->course);
        $sd[0]->tot_fee = $total_fee[0]->tot;
        // echo "<pre>"; print_r($sd[0]); exit;
        echo json_encode($sd[0]);
    }

    public function notAdmitted(){
        // $all_student = $this->db->where('status',0)->get('form_submitted');
        $select = 'id, name, code, course, apl_bpl, paid, status';

        $all_student = $this->genModel->fetch_by_col_select($select, 'form_submitted', ['status'=>0]);
        // print_r($all_student[0]); exit;
        $response['data'] = array();

        if(!empty($all_student[0])){
            foreach ($all_student as $key => $value) {
                
                $uniq_key = "'".$value->code."'";
                $admit = '<button type="button" class="btn btn-primary" onclick="admit('.$uniq_key.')" data-student-apl="'.$value->apl_bpl.'" data-target="#payment-modal" style="margin-right: 4px;">Admit</button>';
                $response['data'][$key]=array(
                    $key+1,
                    $value->name,
                    $value->code,
                    $value->course,
                    strtoupper($value->apl_bpl),
                    ucfirst($value->paid),
                    $admit.'<button type="button" data-toggle="modal" data-student-id="'.$value->id.'" data-target="#delete-modal" class="btn btn-danger">Remove/Reject</button>'
                );
            }
        }
        echo json_encode($response);      
    }
    public function admitted(){
        $select = 'id, name, code, status';
        $all_student = $this->genModel->fetch_by_col_select($select, 'form_submitted', ['status'=>1]);
        $response['data'] = [];
        if(isset($all_student[0]->status) && $all_student[0]->status == 1){
            foreach ($all_student as $key => $value){
                $response['data'][$key] = array(
                    $key+1,
                    $value->name,
                    $value->code,
                    '<button type="button" data-toggle="modal" data-student-id="'.$value->id.'" data-target="#edit-modal" class="btn btn-primary">edit</button>',
                );
            }
        }
        echo json_encode($response);
    }
    public function getSoldForms(){
        $all_student = $this->genModel->fetch_by_all('form_sold');
        $response['data'] = [];
        if($all_student){
            foreach ($all_student as $key => $value) {
                $uniq = "'".$value->unique_code."'";
                $btn = '<button class="btn btn-success mr-2" onclick="print_pdf('.$uniq.')"><i class="fas fa-print"></i> Print</button><button class="btn btn-danger" onclick="delete_id('.$uniq.')"><i class="fas fa-trash"></i> Delete</button>';
                $response['data'][$key]=array(
                    $key+1,
                    date('d-m-Y', strtotime($value->date)),
                    $value->student_name,
                    $value->student_course,
                    $value->unique_code,
                    $btn

                );
            }  
        }
        echo json_encode($response);
    }

    public function del_sold_form(){
        if($key = $this->input->post('key')){
            $this->arronic->perform_fed($this->genModel->delete_by_where('form_sold', ['unique_code'=>$key]), 'Form Has been Succesfully Deleted', 'Error. Please check again');
        }
    }
    public function store_enrollment(){
        $data = $this->input->post();
        $data['date'] =  date('Y-m-d', strtotime($data['date']));

        $this->arronic->perform_fed($this->genModel->insert_data('form_sold' , $data), 'Form Has been Succesfully Created', 'Error. Please check again');

    }
    public function print_pdf($code){
        $this->load->library('pdf');
        $view = $this->htmltopdfmodel->gethtml($code);
        $this->pdf->loadHtml($view);
        $this->pdf->render();    
        $this->pdf->stream("Enrollment.pdf",array("Attachment"=>0));
    }
    public function receiptPDF($id){
        $this->load->library('pdf');
        $view = $this->htmltopdfmodel->getreceiptPDF($id);
        $this->pdf->loadHtml($view);
        $this->pdf->render();    
        $this->pdf->stream("Receipt.pdf",array("Attachment"=>0));
    }
    public function student_admit(){
        $student_id = $this->input->post('student_id');
        $post = array(
            'status' => 1
        );
        $where = [ 'id' =>  $student_id];
        $this->genModel->update_by_where('form_submitted',$post,$where);
        echo "TRUE";
    }
    public function update_student(){
        $data = $this->input->post();
        $id = $data['id'];
        $student_details = $this->genModel->fetch_by_col_select('image_path, sign_path', 'form_submitted', ['id'=>$id]);
        // echo "<pre>"; print_r($student_details[0]); exit;
        $path = './upload/';
        $type = 'jpg|png|jpeg';
        unset($data['id']);
        if($_FILES['file']['name'][0]){
            $image = 'upload/'.$student_details[0]->image_path;
            if($image){unlink($image);}
            $_FILES['userfile']['name'] = $_FILES['file']['name'][0];
            $_FILES['userfile']['type'] = $_FILES['file']['type'][0];
            $_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][0];
            $_FILES['userfile']['error'] = $_FILES['file']['error'][0];
            $_FILES['userfile']['size'] = $_FILES['file']['size'][0];
            $pic_name = $this->arronic->uniqName($_FILES['userfile']['name']);
            $this->_file_upload($path,$pic_name,$type);
            $this->_image_resize('./upload/'.$pic_name,143,143);
            $data['image_path'] = $pic_name;
        };
        if($_FILES['file']['name'][1]){
            $sign = 'upload/'.$student_details[0]->sign_path;
            if($sign){unlink($sign);}
            $_FILES['userfile']['name'] = $_FILES['file']['name'][1];
            $_FILES['userfile']['type'] = $_FILES['file']['type'][1];
            $_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][1];
            $_FILES['userfile']['error'] = $_FILES['file']['error'][1];
            $_FILES['userfile']['size'] = $_FILES['file']['size'][1];
            $sign_name = $this->arronic->uniqName($_FILES['userfile']['name']);
            $this->_file_upload($path,$sign_name,$type);
            $this->_image_resize('./upload/'.$sign_name,80,200);
            $data['sign_path'] = $sign_name;
        };
        $data['status'] = 1;
        $data['adm_date'] = date('Y-m-d');
        $data['adm_year'] = date('Y');
        $data['paid'] = 'paid';
        // echo "<pre>"; print_r($data); exit;
        $this->arronic->perform_fed($this->genModel->update_by_id('form_submitted',$data,$id), 'Form Has been Succesfully Updated', 'Error. Please check again');
        // if($this->genModel->update_by_id('form_submitted',$data,$id)){
        //     echo "TRUE";
        // }
        // else{
        //     echo "FALSE";
        // }


    }
    public function fee_paid($id){
        $post = array(
            'paid' => "paid"
        );
        $where = [ 'id' =>  $id];


        if($this->genModel->update_by_where('form_submitted',$post,$where)){
            echo "TRUE";
        }else{
            echo "FALSE";
        }
    }
    public function fetch_fee_structure(){
        $data = $this->genModel->fetch_by_all('fee_structure');
        $tot = 0;
        $tot_fees = [];
        foreach ($data as $key => $value){
            $array_data = array_values(get_object_vars($value));
            foreach ($array_data as $k => $v) {
                if($k >1){
                    $tot += $v;
                    // $tot =+ $v;
                }           
            }
            $tot_fees[$key] = $tot; 
            $tot = 0;
        }

        $result['data'] = [];
        foreach ($data as $key => $value) {
            $result['data'][$key] = array(
                $key+1,
                $value->c_id,
                $tot_fees[$key],
            );
        }

        echo json_encode($result);
    }

    public function fetch_paid_list($year){
        $sel = 'id, name, code, course, adm_date, paid_amt';
        $pay_data = $this->genModel->fetch_by_col_select($sel,'form_submitted', ['adm_year'=>$year]);
        // echo "<pre>"; print_r($pay_data); exit;
        $result['data'] = [];
        if($pay_data){
            foreach ($pay_data as $key => $value) {
                $uniq = "'".$value->id."'";
                $btn = '<button class="btn btn-success" onclick="print_pdf('.$uniq.')"><i class="fas fa-print"></i> Print</button>';
                $result['data'][$key]=array(
                    $key+1,
                    $value->name,
                    $value->code,
                    $value->course,
                    date('d-m-Y', strtotime($value->adm_date)),
                    $value->paid_amt,
                    $btn

                );
            }  
            // $result['data']=$json;
        }
        echo json_encode($result);

    }
    public function print_payment_recipt($key){

    }

    // logic function ends
// helper function starts
    public function _file_upload($path, $f_name ,$types=null, $max_size=null){

        $config['upload_path'] = $path;
        $config['allowed_types'] = ($types!=null ? $types : '*');
        $config['max_size'] = ($max_size!=null ? $max_size : '100000'); // max_size in 100 kb
        $config['file_name'] = $f_name;
        $this->upload->initialize($config);
        
        if($this->upload->do_upload()){
            return TRUE;
        }
        else{
            echo $this->upload->display_errors();
        }
    }
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
    // helper function ends
    public function __construct(){
        parent::__construct();
        $this->load->model('AdminModel','model');
        $this->load->model('htmltopdfmodel');
        $this->load->model('GeneralModel','genModel');
        $this->load->library('arronic_lib1',null,'arronic');
        date_default_timezone_set('Asia/Calcutta');
        if (!$this->session->userdata('user_id')) {
            return redirect('login');
        }
    }
}