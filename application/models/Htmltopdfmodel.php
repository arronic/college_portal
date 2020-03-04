<?php
class Htmltopdfmodel extends CI_Model{
    public function gethtml($code){
        $student_details = $this->db->where('unique_code',$code)->get('form_sold');
        $student_details = $student_details->row();
        $output = '<html>
                    <head>
                    <style>
                        h1{
                            text-align:center;
                        }
                        h2{
                            text-align:left;
                        }
                        table{
                            font-family: arial, sans-serif;
                            border-collapse: collapse;
                            width: 100%;
                        }
                        td, th {
                            border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;
                        }
                    </style>
                    </head>
                    <body>
                    <div>
                        <h1>Enrollment Details</h1>
                    </div>
                    <hr>
                    <div style="margin-top:50px;">
                    <h2>Student Name:'.$student_details->student_name.'</h2>
                    <hr>
                        <div>
                            <table>
                            <tr>
                                <th>Unique Code</th>
                                <th>Opted Course</th>
                                <th>Date</th>
                            </tr>
                            <tr>
                                <td>'.$student_details->unique_code.'</td>
                                <td>'.$student_details->student_course.'</td>
                                <td>'.$student_details->date.'</td>
                            </tr>
                            </table>
                        <div>
                        <div style="margin-top:50px;">
                        <hr>
                            <p><span style="font-weight:bold;">Date</span><span style="float:right; font-weight:bold;">Signature</span></p>
                            <p><span>...............................</span> <span style="margin-left:550px;">.............................................</span></p>
                        </div>
                    </div>
                    </body>
                </html>'; 
        return $output;
    }
    public function getformpdf($code){
        $student_details = $this->db->where('code',$code)->get('form_submitted');
        $sd = $student_details->row();
        if($sd->apl_bpl =="apl"){
            $bpl = "No";
            $bpl_enlosed = "";
        }else{
            $bpl ="Yes";
            $bpl_enlosed = "<p>(ix) A copy of BPL card</p>";
        }
        $bg_url = base_url().'assets/images/bg.jpg';
        $bg = file_get_contents($bg_url);
        $bg = base64_encode($bg);
        $photo_url = base_url().'upload/'.$sd->image_path;
        $photo = file_get_contents($photo_url);
        $photo = base64_encode( $photo );
        $signature_url = base_url().'upload/'.$sd->sign_path;
        $sign = file_get_contents($signature_url);
        $sign = base64_encode( $sign );

        $output = '<html>
        <head>
        <style>
        h1,h2,h3,h5{
            text-align:center;
        }
        h4{
            text-align:left;
        }
        table{
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        .container{
            margin:50px;
        }
        .bold{
            font-weight:bold;
        }
        .underline{
            text-decoration:underline;
        }
        .text-center{
            text-align:center;
        }
        .text-right{
            text-align:right;
        }
        .text-left{
            text-align:left;
        }
        .float-right{
            float:right;
        }
        .italic {
            font-style: italic;
        }          
        span.a {
            display: inline;
            padding: 5px;
        }
        .narrow {
            float: right;
            width: 50%;
        }
        .wide {
            float: left;
            width: 50%;
        }      
        </style>
            <title>Admission Form</title>
        </head>
        <body>
            <p>
            <h1>College Name, Address</h1>
            <h5>ESTD:1947</h5>
            <h3>P.O.: Post Office, DIST: District</h3>
            <h3>PIN: 123456</h3>
            </p>
            <h2>Admission Form for '.$sd->course.'</h2>
            <p class="text-center"><span class="a bold">Student Code</span><span class="a">'.$sd->code.'</span></p>
            <div class="container">
            <table>
                <tr>
                <td width="33%" valign="top">ROLL NO.</td>
                <td width="33%" rowspan="3" valign="top">FOR OFFICE USE ONLY</td>
                <td width="33%" rowspan="3"><p class="text-right">
                <img src="data:image/png;base64,'.$photo.'" alt="" srcset="">
                </p></td>
                </tr>
                <tr>
                <td rowspan="2" valign="top">
                    <p class="text-center" ><h4>Total Marks obtained in H.S.</h4></p>
                </td>
                </tr>
            </table>
                <p><span class="bold">1.Name: </span><span class="underline">'.$sd->name.'</span></p>
                <p><span class="bold">2.Fathers Name: </span><span class="underline">'.$sd->father.'</span></p>
                <p><span class="bold">3.Mothers Name: </span><span class="underline">'.$sd->mother.'</span></p>
                <p><span class="bold">4.Guardians Name and Address:</span></p>
                <p>
                    <span class="bold a">Name: </span><span class="a underline">'.$sd->g_name.'</span>
                    <span class="bold a">Occupation: </span><span class="a underline">'.$sd->g_occupation.'</span>
                    <span class="bold a">Relation: </span><span class="a underline">'.$sd->g_relation.'</span>
                </p>
                <p>
                    <span class="bold a">Vill: </span><span class="a underline">'.$sd->g_village.'</span>
                    <span class="bold a">P.O.: </span><span class="a underline">'.$sd->g_po.'</span>
                </p>
                <p>
                    <span class="bold a">District: </span><span class="a underline">'.$sd->g_district.'</span>
                    <span class="bold a">PIN: </span><span class="a underline">'.$sd->g_pin.'</span>
                    <span class="bold a">Mobile No.: </span><span class="a underline">'.$sd->g_phone.'</span>
                </p>
                <p>
                    <span class="bold a">5.A)Date of birth: </span><span class="a underline">'.$sd->dob.'</span>
                    <span class="bold a">B)SEX: </span><span class="a underline">'.$sd->gender.'</span>
                </p>
                <p>
                    <span class="bold a">C)Nationality: </span><span class="a underline">'.$sd->nationality.'</span>
                    <span class="bold a">D)Religion: </span><span class="a underline">'.$sd->religion.'</span>
                    <span class="bold a">E)Cast: </span><span class="a underline">'.$sd->cast.'</span>
                </p>
                <p>
                    <span class="bold a">6.Do you fall under BPL:</span><span class="a underline">'.$bpl.'</span>
                </p>
                <p>
                    <span class="bold a">7.Name of the Institution last attended:</span><span class="a underline">'.$sd->last_institute.'</span>
                </p>
                <p>
                    <span class="bold a">8.Name of the last Examination passed:</span><span class="a underline">'.$sd->last_exam.'</span>
                </p>
                <p>
                    <span class="bold a">Roll: </span><span class="a underline">'.$sd->last_exam_roll.'</span>
                    <span class="bold a">No: </span><span class="a underline">'.$sd->last_exam_no.'</span>
                    <span class="bold a">Year: </span><span class="a underline">'.$sd->last_exam_year.'</span>
                </p>
                <p><span class="bold a">Examination center:</span><span class="a underline">'.$sd->last_exam_center.'</span></p>
                <table style="width:100%;">
                    <tr>
                        <th>Subject</th>
                        <th>'.$sd->sub1.'</th>
                        <th>'.$sd->sub2.'</th>
                        <th>'.$sd->sub3.'</th>
                        <th>'.$sd->sub4.'</th>
                        <th>'.$sd->sub5.'</th>
                        <th>'.$sd->sub6.'</th>
                        <th>Total</th>
                        <th>Division</th>
                    </tr>
                    <tr>
                        <td>Max marks</td>
                        <td>'.$sd->sub1_max.'</td>
                        <td>'.$sd->sub2_max.'</td>
                        <td>'.$sd->sub3_max.'</td>
                        <td>'.$sd->sub4_max.'</td>
                        <td>'.$sd->sub5_max.'</td>
                        <td>'.$sd->sub6_max.'</td>
                        <td>'.$sd->last_exam_total.'</td>
                        <td rowspan="2">'.$sd->last_exam_div.'</td>
                    </tr>
                    <tr>
                        <td>Marks Obtained</td>
                        <td>'.$sd->sub1_obt.'</td>
                        <td>'.$sd->sub2_obt.'</td>
                        <td>'.$sd->sub3_obt.'</td>
                        <td>'.$sd->sub4_obt.'</td>
                        <td>'.$sd->sub5_obt.'</td>
                        <td>'.$sd->sub6_obt.'</td>
                        <td>'.$sd->last_exam_obtained.'</td>
                    </tr>
                </table>
                    <p>
                        <span class="bold a">9.G.U./AHSEC Registration No </span><span class="a underline">'.$sd->gu_reg.'</span>
                        <span class="bold a">Year: </span><span class="a underline">'.$sd->gu_year.'</span>
                    </p>
                    <p><span class="bold a">10.Is there any break of your studies?:</span><span class="a underline">'.$sd->study_break.'</span></p>
                    <p><span class="bold a">Reason:</span><span class="a underline">'.$sd->break_reason.'</span></p>
                    <hr>
                    <p class="bold">11. Name of Subject taken as Honours (Earlier known as Major) in the following subject -</p>
                    <p>(i) English (ii) MIL (Assamese) (iii) History (iv) Political Science (v) Economics (vi) Philosophy
                    (vii) Arabic and (viii) Mathematics</p>
                    <p class="bold">12. Subject available in the college for Regular Course.</p>
                    <p>(i) History (ii) Political Science (iii) Economics (iv) Education (v) Philosophy (vi) Elective Assamese
                    (vii) Elective Hindi (viii) Arabic (ix) Mathematics (x) Linguistics</p>
                <div class="parent" style="overflow:auto;">
                    <h1 class="underline">DECLARATION OF THE APPLICANT</h1>
                    <p class="text-center italic">I do hereby declare that the above information is correct and I agree to abide by all
                    the rules and regulations of the college and also liable to punished for the violation of rules.</p>
                    <div class="wide">
                        <p class="italic text-center">Place..........................................</p>
                        <p class="italic text-center">Date: '.$sd->date.'</p>
                    </div>
                    <div class="narrow">
                        <p class="italic text-center"><img src="data:image/png;base64,'.$sign.'" alt="" srcset=""></p>
                        <p class="italic text-center">Signature of Applicant</p>
                    </div>
                </div>
                <div>
                    <h3 class="underline">DECLARATION OF THE PARENTS/GUARDIAN</h1>
                    <p class="text-center italic">I, Mr./ Mrs.............................................................................do hereby declare that
                    in the event of his/her being admitted to College Name,Address I shall be responsible
                    for his/her conduct and regular payment of the college fees and attendance of classes.</p>
                    <div class="wide">
                        <p class="italic text-center">Place: ............................</p>
                        <p class="italic text-center">Date: .............................</p>
                    </div>
                    <div class="narrow">
                    <p class="italic text-center">...............................</p>
                    <p class="italic text-center">Signature of Parent/Guardian</p>
                    </div>
                </div>
                <div>
                    <h4 class="italic bold underline">Documents enclosed ( True copy) H.S.L.C. Onward</h4>
                    <p>(i) Testimonial</p>
                    <p>(ii) Marks Sheet</p>
                    <p>(iii) Admit Card</p>
                    <p>(iv) Registration Certificate</p>
                    <p>(v) Caste Certificate ( in case of SC/ST/OBC/MOBC)</p>
                    <p>(vi) Passport size Photograph,(three) Copies.</p>
                    <p>(vii) Income Certificate</p>
                    <p>(viii) A Copy of Photo Plantation</p>
                    '.$bpl_enlosed.'
                    <h4 class="bold italic">N.B: Orginal Documents must Produce at the time of Admission.</h4>
                </div>
                <div class="parent">
                    <div class="wide">
                        <h5>ADMITTED</h5>
                        <p></p>
                        <p class="italic text-center">Principal</p>
                        <p class="italic text-center">College Name, Address</p>
                    </div>
                    <div class="narrow">
                        <h5>Documents Verified</h5>
                        <p class="italic text-center">Prof. In- Charge / Office Asstt.</p>
                        <p class="italic text-center">Date.........................................</p>
                    </div>
                </div>
            </div>
        </body>
        </html>
        ';
        return $output;
    }
    public function getreceiptPDF($student_id){
        $student_details = $this->db->where('id',$student_id)->get('form_submitted');
        $sd = $student_details->row();
        $output = '<html>

        <head>
            <title>Receipt</title>
            <style>
                h1,
                h2,
                h3,
                h5 {
                    text-align: center;
                }
        
                h4 {
                    text-align: left;
                }
        
                table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                }
        
                td,
                th {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 4px;
                }
        
                .container {
                    margin: 50px;
                }
        
                .bold {
                    font-weight: bold;
                }
        
                .underline {
                    text-decoration: underline;
                }
        
                .text-center {
                    text-align: center;
                }
        
                .text-right {
                    text-align: right;
                }
        
                .text-left {
                    text-align: left;
                }
        
                .float-right {
                    float: right;
                }
        
                .italic {
                    font-style: italic;
                }
        
                span.a {
                    display: inline;
                    padding: 5px;
                }
        
                .narrow {
                    float: right;
                    width: 50%;
                }
        
                .wide {
                    float: left;
                    width: 50%;
                }
                .font-large{
                    font-size: 18px;
                }
                .split {
                  height: 100%;
                  width: 40%;
                  position: fixed;
                  z-index: 1;
                  top: 0;
                  overflow-x: hidden;
                  // padding-top: 20px;
                }

                .left {
                  left: 0;
                  // background-color: #111;
                }

                .right {
                  right: 0;
                  // background-color: red;
                }
            </style>
        </head>
        
        <body>
        <div class="split left">
            <div class="custom-header text-center">
                <div class="bold font-large">College Name, Address</div>
                <div class="bold text-center">ESTD:1947</div>
                <div class="bold text-center">P.O.: Post Office, DIST: District</div>
                <div class="bold text-center">PIN: 123456</div>
            </div>
            <div class="text-center">Payment Receipt</div>
            <div class="">
                <span><strong>Name:</strong>'.$sd->name.'</span>
                <span class="float-right"><strong>Course:</strong>'.$sd->course.'</span>

                <table style="width:100%; font-size: 10px; margin: 15px 0px 25px 0px;">
                <tr>
                    <th>Sl No.</th>
                    <th>Particulars</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Admission Fee</td>
                    <td>400</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tuition fee</td>
                    <td>1860</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Establishment</td>
                    <td>600</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Electricity</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Contingency</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>University Fee</td>
                    <td>620</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>ID Card Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Development Fee</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Library Fee</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Internal Exam. Fee</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Magazine Fee</td>
                    <td>150</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Student Union Fee</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Games and Sports Fee</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>Festive Fee</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Co-Curricular Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>Cultural/Music Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>Debating/Literature Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>Student Welfare Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>ICT</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Total</td>
                    <td>4610</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Amount Paid</td>
                    <td>4610</td>
                </tr>
            </table>
                </p>
            </div>
            
                <span class="a float-right" style="font-size: 10px">Receiving Officer: ..........................</span>
                <span class="a" style="font-size: 10px">Date:'.date('d-m-Y').'</span>
            </div>
            </div>
            <div class="split right">
            <div class="custom-header text-center">
                <div class="bold font-large">College Name, Address</div>
                <div class="bold text-center">ESTD:1947</div>
                <div class="bold text-center">P.O.: Post Office, DIST: District</div>
                <div class="bold text-center">PIN: 123456</div>
            </div>
            <div class="text-center">Payment Receipt</div>
            <div class="">
                <span><strong>Name:</strong>'.$sd->name.'</span>
                <span class="float-right"><strong>Course:</strong>'.$sd->course.'</span>

                <table style="width:100%; font-size: 10px; margin: 15px 0px 25px 0px;">
                <tr>
                    <th>Sl No.</th>
                    <th>Particulars</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Admission Fee</td>
                    <td>400</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tuition fee</td>
                    <td>1860</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Establishment</td>
                    <td>600</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Electricity</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Contingency</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>University Fee</td>
                    <td>620</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>ID Card Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Development Fee</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Library Fee</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Internal Exam. Fee</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Magazine Fee</td>
                    <td>150</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Student Union Fee</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Games and Sports Fee</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>Festive Fee</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Co-Curricular Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>Cultural/Music Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>Debating/Literature Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>Student Welfare Fee</td>
                    <td>50</td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>ICT</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Total</td>
                    <td>4610</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Amount Paid</td>
                    <td>4610</td>
                </tr>
            </table>
                </p>
            </div>
            
                <span class="a float-right" style="font-size: 10px">Receiving Officer: ..........................</span>
                <span class="a" style="font-size: 10px">Date:'.date('d-m-Y').'</span>
            </div>
            </div>
        </body>
        
        </html>';
        return $output;
    }

}
