<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
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

	public function index(){
		$this->load->view('welcome_message');
	}

	public function Login_Student_Now()
	{
		if($this->input->post()){
		$this->form_validation->set_rules('username', 'username', 'required|min_length[3]');
   		$this->form_validation->set_rules('password', 'password', 'required|min_length[4]');
   		if ($this->form_validation->run() == FALSE) {
      	$this->session->set_flashdata('errors', validation_errors());
      	redirect(base_url() . '/');
    	} else {
    		$username = $this->input->post('username');
    		$password = $this->input->post('password');
    		$data = $this->User_Model->checkLogin_student($username,$password);
    		if ($data == true) {
    			$this->session->set_userdata('surname',$data['surname']);
     			$this->session->set_userdata('firstname',$data['firstname']);
     			$this->session->set_userdata('middlename',$data['middlename']);
     			$this->session->set_userdata('reg_num',$data['reg_num']);
      			$this->session->set_userdata('img',$data['img']);
      			$query =$this->db->get_where('exam_ready',array('reg_num'=>$data['reg_num']));
				$usage['Exams_Available'] =  $query->result();
    			$this->load->view('student/Header');
    			$this->load->view('student/Dashboard',$usage);
    			$this->load->view('student/footer');
    		}else{
    			 $this->session->set_flashdata('errors', 'Incorrect Login Details.');
    			 redirect(base_url() . '/');
    		}
    	}
		}else{
		$this->load->view('home');
		}
	}

  public function Start_Exam_Now_Fresh(){
       $eid = $this->input->post('eid');
       $total = $this->input->post('total');
       $duration = $this->input->post('duration');
       $regNum = $this->input->post('regNum');
       $start = $this->input->post('start');
       if ($start == "start") {
         $data = array(
          'time_remaining' => time(),
          'status' =>'Ongoing',
        );
       }else{
         $data = array(
          'status' =>'Ongoing',
        );
       }
       $this->db->where('eid', $eid);
       $this->db->where('reg_num', $regNum);
        $res = $this->db->update('exam_ready', $data);
        if ($res == true) {
          $get = $this->db->get_where('exam_ready',array('reg_num'=>$regNum))->row();
          $time_remaining = $get->time_remaining;
          $this->session->set_userdata('time_remaining',$time_remaining);
          $this->session->set_userdata('duration',$duration);
          $this->session->set_userdata('Total_Number',$total);
          $this->session->set_userdata('sn','1');
          $this->session->set_userdata('eid',$eid);
          $this->session->set_userdata('device','Pc');
            $this->getrandom();
        }else{

        }
  }

  public function Start_Exam_Now_Fresh_mobile(){
       $eid = $this->input->post('eid');
       $total = $this->input->post('total');
       $duration = $this->input->post('duration');
       $regNum = $this->input->post('regNum');
       $start = $this->input->post('start');
       if ($start == "start") {
         $data = array(
          'time_remaining' => time(),
          'status' =>'Ongoing',
        );
       }else{
         $data = array(
          'status' =>'Ongoing',
        );
       }
       $this->db->where('eid', $eid);
       $this->db->where('reg_num', $regNum);
        $res = $this->db->update('exam_ready', $data);
        if ($res == true) {
          $get = $this->db->get_where('exam_ready',array('reg_num'=>$regNum))->row();
          $time_remaining = $get->time_remaining;
          $this->session->set_userdata('time_remaining',$time_remaining);
          $this->session->set_userdata('duration',$duration);
          $this->session->set_userdata('Total_Number',$total);
          $this->session->set_userdata('sn','1');
          $this->session->set_userdata('eid',$eid);
          $this->session->set_userdata('device','Mobile');
            $this->getrandom();
        }else{

        }
  }

    function getrandom()
        {
           $eid = $this->session->userdata('eid');
           $device = $this->session->userdata('device');
           $query = "SELECT * FROM question WHERE eid = '$eid' ORDER BY RAND()";
           $query = $this->db->query($query); 
           $usage['Exams_Questions'] =  $query->result();
           if ($device == 'Mobile') {
             # code...
          $this->load->view('student/Header');
          $this->load->view('student/Show_Exam_mobile',$usage);
          $this->load->view('student/footer');
           }else{
          $this->load->view('student/Header');
          $this->load->view('student/Show_Exam',$usage);
          $this->load->view('student/footer');
        }
      }

      function getrandom_with_constraint()
        {
           $reg_num = $this->session->userdata('reg_num');
           $eid = $this->session->userdata('eid'); 
           $sn = $this->session->userdata('sn');
           $qry=$this->db->get_where('student_history',array('eid'=>$eid,'reg_num' => $reg_num))->result();
           $rows = array();
           $Former_sn = array();
           foreach ($qry as $row) {
             $rows[] = $row->qid_sn;
             $Former_sn[] = $row->sn;
           }
           if(in_array($sn, $Former_sn)){
            // if user has answered the question before
            $question_normal_id = implode(',', $Former_sn);

           $query = "SELECT student_history.qid,student_history.sn,student_history.user_answer_id, student_history.qid_sn, question.question, question.id, question.exam_name, question.subject, question.optionA, question.optAid, question.optionB, question.optBid, question.optionC FROM student_history INNER JOIN question ON student_history.qid_sn = question.id WHERE student_history.eid='$eid' AND student_history.reg_num = '$reg_num'AND student_history.sn = '$sn'";#you will later join this table
           // $query = "SELECT * FROM question WHERE eid = '$eid'";#you will later join this table
           $query = $this->db->query($query);
           var_dump( $query->result());
           die;
           $usage['Exams_Questions'] =  $query->result();
          $this->load->view('student/Header');
          $this->load->view('student/Show_Exam_Taken',$usage);
          $this->load->view('student/footer');
          // ended if user has answered the question before
           }else{            
           $question_normal_id = implode(',', $rows);
           $query = "SELECT * FROM question WHERE eid = '$eid' AND id NOT IN (".$question_normal_id.") ORDER BY RAND() LIMIT 1;";
           $query = $this->db->query($query);
           $usage['Exams_Questions'] =  $query->result();
          $this->load->view('student/Header');
          $this->load->view('student/Show_Exam',$usage);
          $this->load->view('student/footer');
           }
      }

      public function JumpQuestion_Exam($eid,$sn,$total){
            $id = $this->uri->segment(3);
            $sn = $this->uri->segment(4);
            $total = $this->uri->segment(5);
            $reg_num = $this->session->userdata('reg_num');
            $Duration = $this->session->userdata('duration');
            $timeRemaining = $this->session->userdata('time_remaining');
              $this->session->set_userdata('time_remaining',$timeRemaining);
              $this->session->set_userdata('duration',$Duration);
              $this->session->set_userdata('Total_Number',$total);
              $this->session->set_userdata('sn',$sn);
              $this->session->set_userdata('eid',$id);
              $this->session->set_userdata('reg_num',$reg_num);
              $this->load->view('student/Header');
              $this->load->view('student/Show_Exam_result');
              $this->load->view('student/footer');

      }

    public function save_answer_selected_now(){
    $count = $this->input->post('total');
    $serial = 1;
    for($i=0; $i<$count; $i++) {
      $data[] = array(
            'qid'=>$this->input->post('qid')[$i],
            'qid_sn'=>$this->input->post('qid_sn')[$i],
            'sn'=>$this->input->post('current')[$i],
            'subject'=>$this->input->post('subject')[$i],
            'correct_id'=>$this->input->post('correct')[$i],
            'ans'=>$this->input->post('ans')[$i],
            'user_answer_id'=>$this->input->post('ans')[$i],
            'reg_num'=>$this->session->userdata('reg_num'),
            'eid'=>$this->session->userdata('eid'), 
            );
    }
    $key = 'reg_num';
    // $array = $data;
    $eid = $this->session->userdata('eid');$reg_num = $this->session->userdata('reg_num');
     // $result = $this->removeElementWithValue($array,$key,$eid,$reg_num);
      $get_count_return = $this->_getReal_right_wrong_user_answer($eid,$data);
     $get_count_return_correct = $get_count_return['correct_count'];
     $get_count_return_wrong = $get_count_return['wrong_count'];
     // if (empty($result)) {
     //     $this->session->set_flashdata('success', 'Exam has been submitted before');
     //   $this->load->view('student/Header');
     //          $this->load->view('student/Show_Exam_result');
     //          $this->load->view('student/footer');
     // }else{
     $result = $data;
      $result = $this->_Dump_Information_($result,$eid,$reg_num,$get_count_return_correct,$get_count_return_wrong);
        if ($result) {
              $this->session->set_userdata('eid',$eid);
              $this->session->set_userdata('reg_num',$reg_num);
              $this->session->set_flashdata('errors', 'Incorrect Login Details.');
              $this->load->view('student/Header');
              $this->load->view('student/Show_Exam_result');
              $this->load->view('student/footer');
            }else{
                 $this->session->set_userdata('eid',$eid);
              $this->session->set_userdata('reg_num',$reg_num);
              $this->session->set_flashdata('errors', 'Incorrect Login Details.');
              $this->load->view('student/Header');
              $this->load->view('student/Show_Exam_result');
              $this->load->view('student/footer');
     }
   // }
     
    }


    function _checkexist($table,$where){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query=$this->db->get();    
         if($query->num_rows()>0){
              return $query->row_array();
         }else{
              return false;
        }
      }

      function _checkexist_list($table,$where){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query=$this->db->get();    
         if($query->num_rows()>0){
              return $query->result();
         }else{
              return false;
        }
      }
    function _getReal_right_wrong_user_answer($eid,$data)
      {
        $i=1;
         foreach ($data as $key => $value) {$ret[$i][$key] = $value;}$i++;
                      $q ="SELECT * FROM question  WHERE eid='$eid'";
                                     $query = $this->db->query($q);
                                     foreach ($query->result_array() as $key => $row) {
                      foreach($ret as $val){ 
                                    if(is_array($val))
                                    if(in_array($row['correctId'],array_column($val, 'ans'))){
                                     $num_of_correct_ans[] = $row['id'];
                                    } else{
                                      $num_of_wrong_answers[] = $row['id'];
                                    }
                                  }
                                }

                                if( empty($num_of_correct_ans)) {
                                    $num_of_correct_ans = 0 ;
                                  }else{
                                    $num_of_correct_ans = count($num_of_correct_ans);
                                  }

                                if( empty($num_of_wrong_answers)) {
                                    $num_of_wrong_answers = 0 ;
                                  }else{
                                    $num_of_wrong_answers = count($num_of_wrong_answers);
                                  }
                                 
                                 // $num_of_wrong_answers = count($num_of_wrong_answers);
                               $Count_rsponse = array('correct_count'=>$num_of_correct_ans,'wrong_count' => $num_of_wrong_answers);
                                 return $Count_rsponse;
        }

      function _Dump_Information_($data,$eid,$reg_num,$get_count_return_correct,$get_count_return_wrong){
        $view = $this->db->get_where('exam_ready',array('eid'=>$eid,'reg_num' => $reg_num))->row();
         $scoreObtainable = $view->scoreObtainable;
         $totalQuestion = $view->totalQuestion;
         $mark = ( $scoreObtainable/$totalQuestion);
         $correctMarks = $view->correct;
         $wrongMarks = $view->wrong;
         $wrongScore = $view->WrongScore;
          $data_exam_ready = array(
          'score' => ($mark*$get_count_return_correct),
          'correct' => ($get_count_return_correct),
          'wrong' => $get_count_return_wrong,
          'status' => 'Finished',
        );
          
          $res = $this->db->insert_batch('student_history', $data);
          $this->db->where('eid', $eid);
          $this->db->where('reg_num', $reg_num);
          $result = $this->db->update('exam_ready', $data_exam_ready); 
        if($result){return $result;}else{return FALSE;}
      }

      function removeElementWithValue($array, $key,$eid,$reg_num){
    $q ="SELECT * FROM exam_ready  WHERE eid='$eid' AND reg_num = '$reg_num'";
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
}
