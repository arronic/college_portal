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
        $courses = $this->genModel->fetch_by_all('course');
        $this->load->view('admin/filledform',compact('courses'));
    }
    public function admission_list(){
        $this->load->view('admin/admission');
    }
    public function enrolled_list(){
        $this->load->view('admin/enrolled');
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
    public function notice(){
        $this->load->view('admin/notice_list');
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
        if($code = $this->input->post('code')){
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
        }else{
            return redirect('pageNotFound');
        }
        
    }
    public function store_student(){
        $data = $this->input->post();
        if ($data && $data!=null) {
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
        }else {
            $this->error_show('errors/html/error_404',"Something went wrong","Please fill all the fields again, and submit.");
        }

    }
    public function getDetails($key){
        $key = base64_decode($key);
        $sd = $this->genModel->fetch_by_col('form_submitted', ['code'=>$key]);
        $fee_structure = $this->genModel->fetch_by_col('fee_structure',['c_id'=>$sd[0]->course]);
        $c_id = $fee_structure[0]->c_id; 
        $sum = $this->AdminModel->total_fee($c_id);
        $sd[0]->total = $sum[0]->tot;
        echo json_encode($sd[0]);
    }

    public function get_course_total($course){
        $sum = $this->AdminModel->total_fee($course);
        echo $sum[0]->tot;
    }
    public function notAdmitted(){
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
        $select = 'id, name, course, code, adm_date, status';
        $all_student = $this->genModel->fetch_by_col_select($select, 'form_submitted', ['status'=>1]);
        $response['data'] = [];
        if(isset($all_student[0]->status) && $all_student[0]->status == 1){
            foreach ($all_student as $key => $value){
                $response['data'][$key] = array(
                    $key+1,
                    $value->name,
                    $value->course,
                    $value->code,
                    $value->adm_date,
                    '<button type="button" data-toggle="modal" data-student-id="'.$value->id.'" data-target="#edit-modal" class="btn btn-primary">Edit</button>',
                );
            }
        }
        echo json_encode($response);
    }
    public function enrolled(){
        $select = 'id, name, father, mother, dob, gender, cast, apl_bpl,g_village, g_po, g_district, g_pin, phone, bpl_no, major, regular, status';
        $all_student = $this->genModel->fetch_by_col_select($select, 'form_submitted', ['status'=>1]);
        $response['data'] = [];
        if(isset($all_student[0]->status) && $all_student[0]->status == 1){
            foreach ($all_student as $key => $value){
                if ($value->major == NULL) {
                    $course = "Regular";
                }else {
                    $course = "Major";
                }
                $address = "Vill-".$value->g_village.", P.O.-".$value->g_po.", Dist-".$value->g_district."(Assam), PIN-".$value->g_pin;
                if ($value->major != null) {
                    $paper = $value->major."(M), ".$value->regular;
                }else {
                    $paper = $value->regular;
                }
                $gender_cast = $value->gender." ".$value->cast;
                $response['data'][$key] = array(
                    $key+1,
                    $value->name,
                    $value->father,
                    $value->mother,
                    $value->dob,
                    $gender_cast,
                    "Arts",
                    $course,
                    $value->apl_bpl,
                    $value->bpl_no,
                    $address,
                    $value->phone,
                    $paper,
                    ""
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
                $btn = '<button class="btn btn-success mr-3" onclick="print_pdf('.$uniq.')"><i class="fas fa-print"></i> Print</button><button class="btn btn-danger" onclick="delete_id('.$uniq.')"><i class="fas fa-trash"></i> Delete</button>';
                $response['data'][$key]=array(
                    $key+1,
                    $value->student_name,
                    $value->student_course,
                    $value->unique_code,
                    date('d-m-Y', strtotime($value->date)),
                    ($value->status) ? 'Filled' : 'Not Filled',
                    $btn

                );
            }  
        }
        echo json_encode($response);
    }

    public function del_sold_form(){
        if($key = $this->input->post('key')){
            $this->arronic->perform_fed($this->genModel->delete_by_where('form_sold', ['unique_code'=>$key]), 'Form Has been Succesfully Deleted', 'Error. Please check again');
        }else {
            $this->error_show('errors/html/error_404',"Something went wrong","Cannot perform delete operation");
        }
    }
    public function store_enrollment(){
        $data = $this->input->post();
        if ($data && $data != null) {
            $last_entry = $this->genModel->fetch_last_entry('form_sold');
            $data['date'] =  date('Y-m-d', strtotime($data['date']));
            if ($last_entry) {
                $data['sl_no'] = $last_entry->sl_no+1;
            }else{
                $data['sl_no'] = 1;
            }
            $this->arronic->perform_fed($this->genModel->insert_data('form_sold' , $data), 'Form Has been Succesfully Created', 'Error. Please check again');    
        }else {
            $this->error_show('errors/html/error_404',"Something went wrong","Could not store the enrollment details. Try again!");
        }
        
    }
    public function print_pdf($code = null){
        if($code){
            $code  = (base64_decode($code));
            if($student_details = $this->genModel->fetch_by_col('form_sold',['unique_code'=>$code])){
                $sd = $student_details[0];
                $this->load->library('pdf');
                $view = $this->Htmltopdfmodel->gethtml($sd);
                $this->pdf->loadHtml($view);
                $this->pdf->render();    
                $this->pdf->stream("Enrollment.pdf",array("Attachment"=>0));
            }else {
                return redirect("Admin");
            }
        }else {
            $this->error_show('errors/html/error_404',"Something went wrong","Could not genrate pdf. Try again!");
        }
    }
    public function receiptPDF($code = null){
        if($code){
            $code = base64_decode($code);
            if($student_details = $this->genModel->fetch_by_col('form_submitted',['code'=>$code])){
                $total = 0;
                $sd = $student_details[0];
                $fee_details = $this->genModel->fetch_by_col('fee_structure',['c_id'=>$sd->course]);
                $fd = $fee_details[0];
                unset($fd->id, $fd->c_id);
                foreach ($fd as $value) {
                    $total += $value;
                }
                $total_in_words = $this->number2words($sd->paid_amt);
                $this->load->library('pdf');
                $view = $this->Htmltopdfmodel->getreceiptPDF($sd,$fd,$total,$total_in_words);
                $this->pdf->loadHtml($view);
                $this->pdf->render();    
                $this->pdf->stream("Receipt.pdf",array("Attachment"=>0));
            }else {
                return redirect('Admin/paid_list');
            }
        }
        else{
            return redirect('NotFound');
        }
    }
    public function student_admit(){
        if($student_id = $this->input->post('student_id')){
            $post = array(
                'status' => 1
            );
            $where = [ 'id' =>  $student_id];
            $this->genModel->update_by_where('form_submitted',$post,$where);
            echo "TRUE";
        }else {
            $this->error_show('errors/html/error_404',"Something went wrong","Could not admit the student. Try again!");
        }
    }
    public function update_student(){
        $data = $this->input->post();
        if ($data && $data != null) {
            $id = $data['id'];
            $student_details = $this->genModel->fetch_by_col_select('image_path, sign_path', 'form_submitted', ['id'=>$id]);
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
            if ($data['major'] == null) {
                array_push($data['regular'],'English');
            }
            array_push($data['regular'],'AECC');
            $result = '';
            foreach ($data['regular'] as $key => $value) {
                $result .= "$value,";
            }
            rtrim($result, ",");
            $data['regular'] = $result;
            $data['status'] = 1;
            $data['adm_date'] = date('Y-m-d');
            $data['adm_year'] = date('Y');
            $data['paid'] = 'paid';
            $this->arronic->perform_fed($this->genModel->update_by_id('form_submitted',$data,$id), 'Form Has been Succesfully Updated', 'Error. Please check again');
        }else {
            $this->error_show('errors/html/error_404',"Something went wrong","Could not update student details. Try again!");
        }
    }
    public function fee_paid($id = null){
        if ($id) {
            $post = array(
                'paid' => "paid"
            );
            $where = [ 'id' =>  $id];
            if($this->genModel->update_by_where('form_submitted',$post,$where)){
                echo "TRUE";
            }else{
                echo "FALSE";
            }
        }else {
            $this->error_show('errors/html/error_404',"Something went wrong","Could not update fee payment details. Try again!");
        }
        
    }
    public function fetch_paid_list($year){
        $sel = 'id, name, code, course, adm_date, paid_amt';
        $pay_data = $this->genModel->fetch_by_col_select($sel,'form_submitted', ['adm_year'=>$year]);
        $result['data'] = [];
        if($pay_data){
            foreach ($pay_data as $key => $value) {
                $uniq = "'".$value->code."'";
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
    public function get_notice_list(){
        $result = $this->genModel->fetch_by_all('notice');
        $response['data'] = [];
        if($result){
            foreach ($result as $key => $value) {
                $id = "'".$value->id."'";
                $btn = '<button class="btn btn-primary mr-3" onclick="edit_notice('.$id.')"><i class="fas fa-pen"></i> Edit</button><button class="btn btn-danger" onclick="delete_notice('.$id.')"><i class="fas fa-trash"></i> Delete</button>';
                $response['data'][$key]=array(
                    $key+1,
                    $value->notice,
                    $value->date_time,
                    ($value->status) ? '<button class="btn btn-success mr-3" onclick="change_status('.$id.')">Active</button>' : '<button class="btn btn-warning mr-3" onclick="change_status('.$id.')">Inactive</button>',
                    $btn

                );
            }  
        }
        echo json_encode($response);
    }
    public function add_notice(){
        $data = $this->input->post();
        if ($data && $data != null) {
            $this->arronic->perform_fed($this->genModel->insert_data('notice',$data), 'Notice has been added successfully', 'Error. Please check again');
        }else {
            $this->error_show('errors/html/error_404',"Something went wrong","Could not add the notice. Try again!");
        }
    }
    public function get_notice_detail($id){
        $result = $this->genModel->fetch_by_id('notice',$id);
        echo json_encode($result);
    }
    public function update_notice(){
        $data = $this->input->post();
        if ($data && $data != null) {
            $id = $data['id'];
            unset($data['id']);
            $this->arronic->perform_fed($this->genModel->update_by_id('notice', $data, $id),'Notice has been updated successfully', 'Error. Please check again');    
        }else {
            $this->error_show('errors/html/error_404',"Something went wrong","Could not update the notice. Try again!");
        }
    }
    public function delete_notice(){
        if($id = $this->input->post('id')){
            $this->arronic->perform_fed($this->genModel->delete_by_id('notice', $id), 'Notice Has been Succesfully Deleted', 'Error. Please check again');
        }
    }
    public function change_status(){
        $id = $this->input->post('id');
        $select = 'status';
        $notice = $this->genModel->fetch_by_id('notice',$id);
        if($notice->status == 1){
            $data = array(
                'status' => 0
            );
        }else{
            $data = array(
                'status' => 1
            );
        }
        $this->arronic->perform_fed($this->genModel->update_by_id('notice', $data, $id),'Notice status has been updated successfully', 'Error. Please check again');
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
    function student_form($code = null){
        if($code){
            $code = base64_decode($code);
            if($student_details = $this->genModel->fetch_by_col('form_submitted',['code'=>$code])){
                $sd = $student_details[0];
                $this->load->library('pdf');
                $view = $this->Htmltopdfmodel->getformpdf($sd);
                $this->pdf->loadHtml($view);
                $this->pdf->render();    
                $this->pdf->stream("Form.pdf",array("Attachment"=>0));
            }
            else{
                redirect('Admin/generate_form');
            }
        }
        else
            redirect('PageNotFound');
    }
    // helper function
    public function number2words($number){
        if ($number != 0) {
            $no = round($number);
            $point = round($number - $no, 2) * 100;
            $hundred = null;
            $digits_1 = strlen($no);
            $i = 0;
            $str = array();
            $words = array('0' => '', '1' => 'one', '2' => 'two',
            '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
            '7' => 'seven', '8' => 'eight', '9' => 'nine',
            '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
            '13' => 'thirteen', '14' => 'fourteen',
            '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
            '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
            '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
            '60' => 'sixty', '70' => 'seventy',
            '80' => 'eighty', '90' => 'ninety');
            $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
            while ($i < $digits_1) {
                $divider = ($i == 2) ? 10 : 100;
                $number = floor($no % $divider);
                $no = floor($no / $divider);
                $i += ($divider == 10) ? 1 : 2;
                if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number] .
                    " " . $digits[$counter] . $plural . " " . $hundred
                    :
                    $words[floor($number / 10) * 10]
                    . " " . $words[$number % 10] . " "
                    . $digits[$counter] . $plural . " " . $hundred;
                } else $str[] = null;
            }
            $str = array_reverse($str);
            $result = implode('', $str);
            $points = ($point) ?
            "." . $words[$point / 10] . " " . 
                    $words[$point = $point % 10] ." Paise": '';

            return ucwords($result . "Rupees  " . $points);
        }else{
            return "Not Required!";
        }
    }
    public function error_show($page,$heading,$message){
        $this->load->view($page,compact('heading','message'));
    }
    public function __construct(){
        parent::__construct();
        $this->load->model('AdminModel');
        $this->load->model('Soldformmodel');
        $this->load->model('Htmltopdfmodel');
        $this->load->model('GeneralModel','genModel');
        $this->load->library('arronic_lib1',null,'arronic');
        date_default_timezone_set('Asia/Calcutta');
        if (!$this->session->userdata('user_id')) {
            return redirect('Login');
        }
    }
}
