<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usr extends CI_Controller {
function __construct(){
    parent::__construct();
    $this->load->database();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->model('User_Model');
    $this->load->library('session');
    $this->load->library('upload');
    $this->load->helper('download');
  }
	public function index()
	{
		$this->load->view('home');
	}

	public function forgotpass()
	{
		$this->load->view('forgotpass');
	}

	public function Admin()
	{
		if($this->input->post()){
		$this->form_validation->set_rules('username', 'username', 'required|min_length[5]');
   		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]');
   		if ($this->form_validation->run() == FALSE) {
      	$this->session->set_flashdata('errors', validation_errors());
      	redirect(base_url() . 'Login');
    	} else {
    		$username = $this->input->post('username');
    		$password = $this->input->post('password');
    		$data = $this->User_Model->checkLogin($username,$password);
    		if ($data == true) {
    			$this->session->set_userdata('email',$data['email']);
     			$this->session->set_userdata('name',$data['name']);
     			$this->session->set_userdata('username',$data['username']);
      			$this->session->set_userdata('type',$data['type']);
    			redirect(base_url('Dashboard_Display'));
    		}else{
    			 $this->session->set_flashdata('errors', 'Incorrect Login Details.');
    			 redirect(base_url() . 'Login');
    		}
    	}
		}else{
		$this->load->view('admin_home');
		}
	}

	public function Dashboard(){
		$this->load->view('includes/header');
		$this->load->view('admin/dashboard');
		$this->load->view('includes/footer');
	}

	public function CreateExam(){
		if($this->input->post()){
		$this->form_validation->set_rules('title', 'title', 'required|min_length[4]');
   		$this->form_validation->set_rules('total', 'total number of exam', 'required');
   		$this->form_validation->set_rules('num_now', 'number to enter now', 'required');
   		$this->form_validation->set_rules('demo0', 'Right answer Score', 'required');
   		$this->form_validation->set_rules('demo3', 'Wrong answer Score', 'required');
   		$this->form_validation->set_rules('start', 'start date ', 'required');
   		$this->form_validation->set_rules('demo1', 'Pass Mark', 'required');
      $this->form_validation->set_rules('end', 'end date', 'required');
   		$this->form_validation->set_rules('demo3_22', 'Duration of exam in minutes', 'required');
   		 if ($this->form_validation->run() == FALSE) {
            // set the validation errors in flashdata (one time session)
      	$this->session->set_flashdata('errors', validation_errors());
      	redirect(base_url() . 'Create_Exam');
    	} else {
    	$now = $this->input->post('num_now');
    	$total = $this->input->post('total');
    	$eid = uniqid();
    	$data = array(
      		'title' =>ucwords(strtolower($this->input->post('title'))),
      		'total' =>$this->input->post('total'),
      		'correct' =>$this->input->post('demo0'),
          'passmark' =>$this->input->post('demo1'),
      		'wrong' =>$this->input->post('demo3'),
      		'start' =>$this->input->post('start'),
      		'end' =>$this->input->post('end'),
      		'time' =>$this->input->post('demo3_22'),
      		'reg_time'=>date("F d, Y h:i:s A"),
      		'eid'=>$eid,
    		);
    	$res = $this->User_Model->insert_customer($data);
    	if ($res == true) {
    		$data2 = array(
                    'Number_now' => $now,
                    'Total_Number' => $total,
                    'Exam_id' => $eid,
                    'Exam_name' => $this->input->post('title'),
                );
    		$this->session->set_userdata($data2);
    		$this->session->set_flashdata('success', 'Exam has been Added to Database');
    		redirect(base_url('You_Are_Adding_Question'));
    	}else{
    		$this->session->set_flashdata('errors', 'Exam has not been Added');
    		redirect(base_url('You_Are_Adding_Question'));
    	}
    	}
		}else{			
		$this->load->view('includes/header');
		$this->load->view('admin/ExamCreate');
		$this->load->view('includes/footer');
		}
	}

  public function Result_Page_Display_controller(){
      $id = $this->uri->segment(3);
      $eid = $this->uri->segment(4);
      $query = "SELECT exam_ready.id,exam_ready.reg_num,exam_ready.name,exam_ready.eid,exam_ready.exam_name,exam_ready.scoreObtainable,exam_ready.totalQuestion,exam_ready.duration,exam_ready.score,exam_ready.theory,exam_ready.correct,exam_ready.wrong,student.phone, student.img FROM exam_ready INNER JOIN student ON exam_ready.reg_num = student.reg_num WHERE exam_ready.eid = '$eid' AND exam_ready.id = '$id'";
           $query = $this->db->query($query);
           $usage['StudentResult'] =  $query->result();
          $usage['BroadSheet'] =  $this->db->get_where('exam',array('eid'=>$eid))->result();
          $this->session->set_userdata('success','You are viewing BroadSheet Result of a Particular Exam');
          $this->load->view('admin/resultPage',$usage); 
  }

	public function Add_Question(){
		if($this->input->post()){
			$eid = $this->input->post('qid');
      // $eid = $_GET['q'];
		$data = array();
		 $count = count($this->input->post('question'));
		 for($i=0; $i<$count; $i++) {
		 	$qid  = uniqid();
		 	$oaid = uniqid();
            $obid = uniqid();
            $ocid = uniqid();
            $odid = uniqid();
             $e = $this->input->post('answer')[$i];
            switch ($e) {
                case 'a':
                $ansid = $oaid;
                break;
                
                case 'b':
                $ansid = $obid;
                break;
                
                case 'c':
                $ansid = $ocid;
                break;
                
                case 'd':
                $ansid = $odid;
                break;
                
                default:
                $ansid = $oaid;
            }
		    $data[] = array(
            'eid'=>$eid,
            'exam_name'=>$this->input->post('exam_name'),
            'subject'=>$this->input->post('subject'),
            'question'=>$this->input->post('question')[$i],
            'qid'=>$qid,
            'optionA'=>$this->input->post('optionA')[$i],
            'optAid'=>$oaid,
            'optionB'=>$this->input->post('optionB')[$i],
            'optBid'=>$obid,
            'optionC'=>$this->input->post('optionC')[$i],
            'optCid'=>$ocid,
            'optionD'=>$this->input->post('optionD')[$i],
            'optDid'=>$odid,
            'correct'=>$this->input->post('answer')[$i],
            'correctId'=>$ansid,
            'sn'=>1+$i,
            );
		 }
		 $res = $this->db->insert_batch('question', $data);
		 if ($res == true) {
		 	$this->session->set_flashdata('success', 'Exam Question has been Added to Database');
		 	$this->DisplayExamDetails($eid);
    		// redirect(base_url('You_Are_Viewing_Question').$eid);
		 }else{
		 	echo "errors";
		 	die;
		 }
		}else{
		// $data['subjects']=$this->db->get_where('subject',array('digit'=>0))->result_array();
		$query = $this->db->get('subject');
		$usage['subjects'] =  $query->result_array();
		$this->session->set_userdata('Total_Number',$this->session->userdata('Total_Number'));
        $this->session->set_userdata('Number_now',$this->session->userdata('Number_now'));
        $this->session->set_userdata('Exam_id',$this->session->userdata('Exam_id'));
		$this->load->view('includes/header');
		$this->load->view('admin/Question',$usage);
		$this->load->view('includes/footer');			
		}
	}

	public function DisplayExamDetails($eid){
		$query =$this->db->get_where('question',array('eid'=>$eid));
		// $query = $this->db->get('subject');
		$usage['questions'] =  $query->result_array();
		$this->load->view('includes/header');
		$this->load->view('admin/ExamDetail',$usage);
		$this->load->view('includes/footer');
	}

	public function Add_Question_To_Old_Exam(){
		$this->form_validation->set_rules('exam', 'exam Title', 'required|min_length[4]');
   		$this->form_validation->set_rules('total', 'total number of exam', 'required');
   		if ($this->form_validation->run() == FALSE) {
            // set the validation errors in flashdata (one time session)
      	$this->session->set_flashdata('errors', validation_errors());
      	redirect(base_url() . 'Dashboard_Display');
    	} else {    		
    		$eid = $this->input->post('exam');
        $Exam_name = $this->input->post('Exam_name');
    		$count = count($this->db->get_where('question',array('eid'=>$eid))->result());
    		$total = $this->input->post('total')+$count;
    		$query = $this->db->get('subject');
		$usage['subjects'] =  $query->result_array();
		$this->session->set_userdata('Total_Number',$total);
		$this->session->set_userdata('Count_Number',$count);
        $this->session->set_userdata('Exam_id',$eid);
        $this->session->set_userdata('Exam_name',$Exam_name);
		$this->load->view('includes/header');
		$this->load->view('admin/Question_toOld_Exam',$usage);
		$this->load->view('includes/footer');
    	}
	}

	public function Add_Question_Old_Exam(){
		if($this->input->post()){
			$eid = $_GET['q'];
			$serial = $_GET['snw'];
		$data = array();
		 $count = count($this->input->post('question'));
		 for($i=0; $i<$count; $i++) {
		 	$qid  = uniqid();
		 	$oaid = uniqid();
            $obid = uniqid();
            $ocid = uniqid();
            $odid = uniqid();
             $e = $this->input->post('answer')[$i];
            switch ($e) {
                case 'a':
                $ansid = $oaid;
                break;
                
                case 'b':
                $ansid = $obid;
                break;
                
                case 'c':
                $ansid = $ocid;
                break;
                
                case 'd':
                $ansid = $odid;
                break;
                
                default:
                $ansid = $oaid;
            }
		    $data[] = array(
            'eid'=>$eid,
            'exam_name'=>$this->input->post('Exam_name'),
            'subject'=>$this->input->post('subject'),
            'question'=>$this->input->post('question')[$i],
            'qid'=>$qid,
            'optionA'=>$this->input->post('optionA')[$i],
            'optAid'=>$oaid,
            'optionB'=>$this->input->post('optionB')[$i],
            'optBid'=>$obid,
            'optionC'=>$this->input->post('optionC')[$i],
            'optCid'=>$ocid,
            'optionD'=>$this->input->post('optionD')[$i],
            'optDid'=>$odid,
            'correct'=>$this->input->post('answer')[$i],
            'correctId'=>$ansid,
            'sn'=>$serial+$i,
            );
		 }
		 $res = $this->db->insert_batch('question', $data);
		 if ($res == true) {
		 	$this->session->set_flashdata('success', 'Exam Question has been Added to Database');
		 	$this->DisplayExamDetails($eid);
    		// redirect(base_url('You_Are_Viewing_Question').$eid);
		 }else{
		 	echo "errors";
		 	die;
		 }
		}
	}

	public function ShowStudent(){
		$query = $this->db->get('student');
		$usage['student'] =  $query->result_array();
		$this->session->set_userdata('success','You are Viewing Students Registered on the database');
		$this->load->view('includes/header');
		$this->load->view('admin/Student',$usage);
		$this->load->view('includes/footer');
	}

	public function ShowStudent_Availabe_for_Exam(){
		if($this->input->post()){
			$this->form_validation->set_rules('exam', 'Please Select Exam Name / Title', 'required');
   		if ($this->form_validation->run() == FALSE) {
            // set the validation errors in flashdata (one time session)
      	$this->session->set_flashdata('errors', validation_errors());
      	$query = $this->db->get('student');
		$usage['student'] =  $query->result_array();
		$this->load->view('includes/header');
		$this->load->view('admin/Student_For_Exam',$usage);
		$this->load->view('includes/footer');
    	}else{
			$eid = $this->input->post('exam');
			$get = $this->db->get_where('exam',array('eid'=>$eid))->row();
        	$duration = $get->time;
          $title = $get->title;
        	$TotalMarks = ($get->total * $get->correct);
        	$TotalQuestion = $get->total;
          $startDate = $get->start;
          $wrong = $get->wrong;
          $endDate = $get->end;
			$data = array();
		 $count = $this->input->post('Total_number');
		 for($i=0; $i<$count; $i++) {           
		    $data[] = array(
            'reg_num'=>$this->input->post('validate')[$i],
            'name'=>$this->input->post('name')[$i],
            'eid'=>$this->input->post('exam'),
            'exam_name'=>$title,
            'duration'=>$duration,
            'totalQuestion'=>$TotalQuestion,
            'scoreObtainable'=>$TotalMarks,
            'startDate'=>$startDate,
            'endDate'=>$endDate,
            'score'=>'0',
            'correct'=>'0',
            'wrong'=>'0',
            'WrongScore'=>$wrong,
            );
		 } 
     $key = 'reg_num';
     $array = $data;
     $result = $this->removeElementWithValue($array,$key,$eid);
     if (empty($result)) {
         $this->session->set_flashdata('success', 'Student has been Added to Database before');
      $this->ShowStudent_Availabe_for_Specific_Exam($eid);
     }else{
      $res = $this->db->insert_batch('exam_ready',$result);
      if ($res == true) {
      $this->session->set_flashdata('success', 'Student has been Added to Database');
      $this->ShowStudent_Availabe_for_Specific_Exam($eid);
     }else{
      $query = $this->db->get('student');
    $usage['student'] =  $query->result_array();
    $this->session->set_userdata('errors','Adding Students Failed');
    $this->load->view('includes/header');
    $this->load->view('admin/Student_For_Exam',$usage);
    $this->load->view('includes/footer');
     }
     }		 
		 }
		}else{
		$query = $this->db->get('student');
		$usage['student'] =  $query->result_array();
		$this->session->set_userdata('success','You are Viewing Students Registered on the database');
		$this->load->view('includes/header');
		$this->load->view('admin/Student_For_Exam',$usage);
		$this->load->view('includes/footer');
		}
	}

  function removeElementWithValue($array, $key,$eid ){
    $q ="SELECT * FROM exam_ready  WHERE eid='$eid'";
                                     $query = $this->db->query($q);
                                     foreach ($query->result_array() as $newkey => $row) {
     foreach($array as $subKey => $subArray){
       
          if($subArray[$key] == $row['reg_num']){
               unset($array[$subKey]);
          }
        }
     }
     return $array;
}

	public function ShowStudent_Availabe_for_Specific_Exam($eid){
		$usage['student'] =  $this->db->get_where('exam_ready',array('eid'=>$eid))->result();
		$this->session->set_userdata('success','You are Viewing Students Registered on the database');
		$this->load->view('includes/header');
		$this->load->view('admin/Student_For_Exam_specific',$usage);
		$this->load->view('includes/footer');
	}

	public function ShowStudent_Availabe_for_Specific_Exam_show(){
		if ($this->input->post()) {
			$eid = $this->input->post('exam');
		$usage['student'] =  $this->db->get_where('exam_ready',array('eid'=>$eid))->result();
		$this->session->set_userdata('success','You are Viewing Students Registered on the database');
		$this->load->view('includes/header');
		$this->load->view('admin/Student_For_Exam_specific',$usage);
		$this->load->view('includes/footer');
		}else{
		
		}

	}

	public function Add_Student(){
		if($this->input->post()){ 
   if(!empty($_FILES['file']['name'])){
    $config['upload_path'] = './Student_Pic/';    
    $config['allowed_types'] = 'jpg|jpeg|png|gif|img'; 
    $this->load->library('upload',$config);
    $this->upload->initialize($config);
    if($this->upload->do_upload('file')){
      $uploadData = $this->upload->data();
      $tmp_name = 'Student_Pic/' . $uploadData['file_name'];
      $this->form_validation->set_rules('Reg', 'Reg Number', 'required|valid_email[student.reg_num]');
      if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('errors', validation_errors());
      $this->load->view('includes/header');
      $this->load->view('admin/RegisterStudent');
      $this->load->view('includes/footer');
    } else { 
      $data = array(
      		'surname' =>ucwords(strtolower($this->input->post('surname'))),
      		'firstname' =>$this->input->post('firstname'),
      		'middlename' =>$this->input->post('middlename'),
      		'reg_num' =>$this->input->post('Reg'),
      		'phone' =>$this->input->post('phone'),
          'gender' =>$this->input->post('gender'),
      		'img' =>$uploadData['file_name'],
    		);
       $res = $this->db->insert('student',$data);
       if ($res == true) {
       	$this->session->set_userdata('success','Student has been added to database');
       	$this->load->view('includes/header');
		$this->load->view('admin/RegisterStudent');
		$this->load->view('includes/footer');
       }else{
       	$this->session->set_userdata('errors','Student unable to be added to database');
       	$this->load->view('includes/header');
		$this->load->view('admin/RegisterStudent');
		$this->load->view('includes/footer');
       }
     }
			}else{
		$this->session->set_userdata('errors','Image has not been Uploaded please Upload again');
		$this->load->view('includes/header');
		$this->load->view('admin/RegisterStudent');
		$this->load->view('includes/footer');
			}
		}else{
	  }
	}else{			
		$this->load->view('includes/header');
		$this->load->view('admin/RegisterStudent');
		$this->load->view('includes/footer');
		}
	}

	public function Student_Upload(){
	if(!empty($_FILES['file']['name'])){
    $config['upload_path'] = './SampleCsv/';
    $config['allowed_types'] = 'text/plain|text/anytext|csv|text/x-comma-separated-values|text/comma-separated-values|application/octet-stream|application/vnd.ms-excel|application/x-csv|text/x-csv|text/csv|application/csv|application/excel|application/vnd.msexcel';
    $this->load->library('upload',$config);
    $this->upload->initialize($config);
    if($this->upload->do_upload('file')){
      $uploadData = $this->upload->data();
      $tmp_name = 'SampleCsv/' . $uploadData['file_name'];
      $this->load->helper("file"); // load the helper $
      $file_del =  $tmp_name;
      $count=0;
      $fp = fopen($tmp_name,'r') or die("can't open file");
      while($csv_line = fgetcsv($fp,1024))
      {
        $count++;
        if($count == 1)
        {
          continue;
            }//keep this if condition if you want to remove the first row
            for($i = 0, $j = count($csv_line); $i < $j; $i++)
            {
              $insert_csv_old = array();
                // $insert_csv['id'] = $csv_line[0];//remove if you want to have primary key,
              $insert_csv['surname'] = $csv_line[0];
              $insert_csv['firstname'] = $csv_line[1];
              $insert_csv['middlename'] = $csv_line[2];
              $insert_csv['reg_num'] = $csv_line[3];
              $insert_csv['gender'] = $csv_line[4];
              $insert_csv['phone'] = $csv_line[5];
              $insert_csv['image'] = $csv_line[6];

            }
            $i++;
            $data = array(
              'surname' => $insert_csv['surname'] ,
              'firstname' => $insert_csv['firstname'],
              'middlename' => $insert_csv['middlename'],
              'reg_num' => $insert_csv['reg_num'],
              'gender' => $insert_csv['gender'],
              'phone' => $insert_csv['phone'],
              'img' => $insert_csv['image']
            );    
        $this->db->from('student');
        $this->db->where('reg_num', $data['reg_num']); 
        $query = $this->db->get();
        if($query->num_rows() != 0){
            $insert = true;  
        }else{
           $insert = $this->db->insert('student',$data);
        }
          }
          fclose($fp);
          if ($insert == true) {
            $this->session->set_userdata('success','Student has been added to database');
            $this->SuccessUpload($file_del);
          }else{
          	$this->session->set_userdata('errors','Upload not successful Please re-try');
          	$this->SuccessUpload($file_del);
          }  
        }else{
        	$this->session->set_userdata('errors','Upload not successful Please re-try');
       		$this->load->view('includes/header');
		    $this->load->view('admin/RegisterStudent');
			$this->load->view('includes/footer');
        }
      }
	}

	public function SuccessUpload($get){
            unlink($get); 
		$this->load->view('includes/header');
		    $this->load->view('admin/RegisterStudent');
			$this->load->view('includes/footer');
	}

  public function LockScreen(){
    if ($this->input->post()) {
        $this->load->view('admin/lockScreeen');
      $this->load->view('includes/footer');
    }else{
        $this->load->view('admin/lockScreeen');
      $this->load->view('includes/footer');      
    }
  }

  public function Update_Exam_to_Enable_Controler(){
      $eid = $this->input->post('eid');
      $total = $this->input->post('total');
      $radioValue = $this->input->post('switch_one');
      if ($radioValue == "disable") {
          $data = array(
          'status' =>'',
              );
          $this->db->where('eid', $eid);
          $res = $this->db->update('exam', $data);
           $this->session->set_flashdata('success', 'Exam as been Disabled, Hence Student cannot have Access to this Exam');
          redirect(base_url('Dashboard_Display'));
      }else{
        $get = $this->db->get_where('question',array('eid'=>$eid))->num_rows();
        if ($get >= $total) {
          # code...
           $data = array(
          'status' =>'Enable',
              );
          $this->db->where('eid', $eid);
          $res = $this->db->update('exam', $data);
           $this->session->set_flashdata('success', 'Exam as been Enabled, Hence Student can have Access to it during the timeframe');
          redirect(base_url('Dashboard_Display'));
        }else{
           $this->session->set_flashdata('errors', 'You cannot enable exam when question is not up to total question expected. Please Add more question');
           redirect(base_url('Dashboard_Display'));
        }
      }
  }

	public function checkexist($table,$where){
		$this->db->select('*');
		$this->db->select($table);
		$this->db->where($where);
		return $this->db->get()->result_array();
	}

  public function Add_admin_now_function(){
    if ($this->input->post()) {
          $fullname = $this->input->post('name');
          $email = $this->input->post('email');
          $username = $this->input->post('username');
          $password = $this->input->post('password');
          $data = array(
            'name' =>$fullname, 
            'email' =>$email, 
            'username' =>$username, 
            'password' =>$password, 
          );
          $insert = $this->db->insert('admin',$data);
          $usage['admin'] =  $this->db->get_where('admin')->result();
          $this->session->set_userdata('success','New Admin has just been created');
          $this->load->view('includes/header');
          $this->load->view('admin/admin_page',$usage);
          $this->load->view('includes/footer');
    }else{
      $usage['admin'] =  $this->db->get_where('admin')->result();
          $this->session->set_userdata('success','You are viewing admin');
          $this->load->view('includes/header');
          $this->load->view('admin/admin_page',$usage);
          $this->load->view('includes/footer'); 
    }
  }


  public function BroadSheet_result_now_function(){
    if ($this->input->post()) {
          $exam = $this->input->post('exam');
          $mode = $this->input->post('mode');
           $query = "SELECT exam_ready.id,exam_ready.reg_num,exam_ready.name,exam_ready.eid,exam_ready.exam_name,exam_ready.scoreObtainable,exam_ready.totalQuestion,exam_ready.duration,exam_ready.score,exam_ready.theory,exam_ready.correct,exam_ready.wrong,student.phone, student.img FROM exam_ready INNER JOIN student ON exam_ready.reg_num = student.reg_num WHERE exam_ready.eid = '$exam'";
           $query = $this->db->query($query);
           $usage['StudentResult'] =  $query->result();
          $usage['BroadSheet'] =  $this->db->get_where('exam',array('eid'=>$exam))->result();
          if ($mode == "BroadSheet") {
          $this->session->set_userdata('success','You are viewing BroadSheet Result of a Particular Exam');
          $this->load->view('includes/header');
          $this->load->view('admin/BroadSheet',$usage);
          $this->load->view('includes/footer');
          }else{
             $this->session->set_userdata('success','You are viewing Individuals Result of a Particular Exam');
          $this->load->view('includes/header');
          $this->load->view('admin/PrintIndividual',$usage);
          $this->load->view('includes/footer');
          }
    }else{
      $usage['admin'] =  $this->db->get_where('admin')->result();
          $this->session->set_userdata('success','You are viewing admin');
          $this->load->view('includes/header');
          $this->load->view('admin/admin_page',$usage);
          $this->load->view('includes/footer'); 
    }
  }

  public function JumpQuestion_Admin_delete($eid,$sn){
            $id = $this->uri->segment(3);
            $sn = $this->uri->segment(4);
          }

	public function logout(){
      // $this->session->session_unset();
   		 $user_data = $this->session->all_userdata();
   		 foreach ($user_data as $key => $value) {
    		  if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
       		 $this->session->unset_userdata($key);
      		}
    	}
    	$this->session->sess_destroy();
   		redirect(base_url('/'));
 	}

  public function GrantTime(){
    $data = array(
          'time_remaining' => (now()-100000),
          'status' =>'Ongoing',
        );
    $this->db->where('eid', $eid);
    $this->db->where('reg_num', $regNum);
    $res = $this->db->update('exam_ready', $data);
  }
}
