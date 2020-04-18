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
            $this->getrandom();
        }else{

        }
  }

    function getrandom()
        {
           $eid = $this->session->userdata('eid');
           $query = "SELECT * FROM question WHERE eid = '$eid' ORDER BY RAND()";
           $query = $this->db->query($query); 
           $usage['Exams_Questions'] =  $query->result();
          $this->load->view('student/Header');
          $this->load->view('student/Show_Exam',$usage);
          $this->load->view('student/footer');
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
              $this->getrandom_with_constraint();

      }

    public function save_answer_selected_now(){
     $subject = $this->input->post('subject');
     $total = $this->input->post('total');
     $sn = $this->input->post('current');
     $qid = $this->input->post('qid');
     $qid_sn = $this->input->post('qid_sn');
     $correct = $this->input->post('correct');
     $student_ans = $this->input->post('ans');
     $reg_num = $this->session->userdata('reg_num');
     $Duration = $this->session->userdata('duration');
     $eid = $this->session->userdata('eid');
     $name_of_table = 'question';
     // get the view to save in hisory
     $User_View = $this->_getReal_view($eid,$qid,$name_of_table,$student_ans);
     // view getting ended
     $correctId = $User_View["correct_view_id"];
     $data = array(
          'eid' => $eid,
          'qns' => $User_View["qView"],
          'qid' => $qid,
          'reg_num' => $reg_num,
          'user_answer' => $User_View["user_view"],
          'user_answer_id' =>$student_ans,
          'correct' =>$User_View["correct_view_id"],
          'correct_view' =>$User_View["correctView"],
          'subject' =>$subject,
          'qid_sn' =>$qid_sn,
          'sn' =>$sn,
        );
     $timeRemaining = $this->session->userdata('time_remaining');
     $where = array('eid'=>$eid,'qid' => $qid,'reg_num' => $reg_num);
     $table = 'student_history';
     $res = $this->_checkexist($table,$where);
     // var_dump($res);
     if ($res === false) {
        $user_answer_id_existing = "none";
     }else{
     $user_answer_id_existing = $res['user_answer_id'];
     }
     $remaining = (($Duration * 60) - ((time() - $timeRemaining)));
     if ($remaining > 0 ) {
        $result = $this->_Dump_Information_($user_answer_id_existing,$data,$eid,$reg_num,$student_ans,$correctId,$qid);
        if ($result) {
          $sn = $sn+1;
          if ($sn > $total) {
            # code... that means the total is meet
          }else{
              $this->session->set_userdata('time_remaining',$timeRemaining);
              $this->session->set_userdata('duration',$Duration);
              $this->session->set_userdata('Total_Number',$total);
              $this->session->set_userdata('sn',$sn);
              $this->session->set_userdata('eid',$eid);
              $this->session->set_userdata('reg_num',$reg_num);
              $this->getrandom_with_constraint();
          }
        }
     }
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
    function _getReal_view($eid,$qid,$name_of_table,$student_ans)
      {
        $view = $this->db->get_where($name_of_table,array('eid'=>$eid,'qid' => $qid))->row();
        $question_view = $view->question;
        $correct_view = $view->correct;
        $idA= $view->optAid;
        $idB= $view->optBid;
        $idC= $view->optCid;
        $idD= $view->optDid;
        switch ($correct_view) {
                case 'a':
                  $correct_view = $view->optionA;
                  $correct_view_id = $idA;
                  break;
                case 'b':
                  $correct_view = $view->optionB;
                  $correct_view_id = $idB;
                  break;
                case 'c':
                  $correct_view = $view->optionC;
                  $correct_view_id = $idC;
                  break;
                case 'd':
                  $correct_view = $view->optionD;
                  $correct_view_id = $idD;
                  break;
            }

        switch ($student_ans) {
                case $idA:
                  $User_View = $view->optionA;
                  break;
                case $idB:
                  $User_View = $view->optionB;
                  break;
                case $idC:
                  $User_View = $view->optionC;
                  break;
                case $idD:
                  $User_View = $view->optionD;
                  break;
            } 

           $User_View = array('user_view'=>$User_View,'qView' => $question_view,'correctView' => $correct_view, 'correct_view_id'  => $correct_view_id);
      if($User_View != " "){return $User_View;}else{return FALSE;}
      }

      function _Dump_Information_($user_answer_id_existing,$data,$eid,$reg_num,$student_ans,$correctId,$qid){
        $view = $this->db->get_where('exam_ready',array('eid'=>$eid,'reg_num' => $reg_num))->row();
         $scoreObtainable = $view->scoreObtainable;
         $totalQuestion = $view->totalQuestion;
         $mark = ( $scoreObtainable/$totalQuestion);
         $totalQuestion = $view->totalQuestion;
         $score = $view->score;
         $correctMarks = $view->correct;
         $wrongMarks = $view->wrong;
         $wrongScore = $view->WrongScore;
         $now = time();
        if ( $user_answer_id_existing == $student_ans) {
         $data_exam_ready = array(
          'status' => 'Ongoing',
        );
         $this->db->where('eid', $eid);
          $this->db->where('reg_num', $reg_num);
          $result = $this->db->update('exam_ready', $data_exam_ready);
        }else if ($user_answer_id_existing == "none") {
          if ($student_ans == $correctId) {            
          $data_exam_ready = array(
          'score' => ($score+$mark),
          'correct' => ($correctMarks+1),
          'wrong' => $wrongMarks,
        );
          }else{
           $data_exam_ready = array(
          'score' => ($score),
          'correct' => ($correctMarks),
          'wrong' => ($wrongMarks + 1),
        );
          }
          $res = $this->db->insert('student_history', $data);
          $this->db->where('eid', $eid);
          $this->db->where('reg_num', $reg_num);
          $result = $this->db->update('exam_ready', $data_exam_ready); 
        }else if ($user_answer_id_existing != $student_ans && $student_ans == $correctId) {
          $data_exam_ready = array(
          'score' => ($score+$mark),
          'correct' => ($correctMarks + 1),
          'wrong' => ($wrongMarks - 1),
        );
          $this->db->where('eid', $eid);
          $this->db->where('reg_num', $reg_num);
          $this->db->where('qid', $qid);
          $res = $this->db->update('student_history', $data);
          $this->db->where('eid', $eid);
          $this->db->where('reg_num', $reg_num);
          $result = $this->db->update('exam_ready', $data_exam_ready);
        }else if ($user_answer_id_existing != $student_ans && $student_ans != $correctId) {
          if ($user_answer_id_existing == $correctId) { 
             $data_exam_ready = array(
          'score' => ($score - $mark),
          'correct' => ($correctMarks - 1),
          'wrong' => ($wrongMarks + 1),
        );}else{
            $data_exam_ready = array(
          'status' => 'Ongoing',
        );
          }
          $this->db->where('eid', $eid);
          $this->db->where('reg_num', $reg_num);
          $this->db->where('qid', $qid);
          $res = $this->db->update('student_history', $data);
          $this->db->where('eid', $eid);
          $this->db->where('reg_num', $reg_num);
          $result = $this->db->update('exam_ready', $data_exam_ready); 
        }
        if($result){return $result;}else{return FALSE;}
      }
}
