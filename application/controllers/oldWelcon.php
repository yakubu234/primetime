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
          // $query = $this->db->query("SELECT * FROM question WHERE 'eid' = '$eid' AND 'sn' != '54'ORDER BY RAND() LIMIT 0,1;");
          // $usage['Exams_Questions'] =  $query->result();
          // $this->load->view('student/Header');
          // $this->load->view('student/Show_Exam',$usage);
          // $this->load->view('student/footer');
        }else{

        }
  }

    function getrandom()
        {
           $eid = $this->session->userdata('eid');
           $query = "SELECT * FROM question WHERE eid = '$eid' AND sn != '2' ORDER BY RAND() LIMIT 1;";
           $query = $this->db->query($query); 
           $usage['Exams_Questions'] =  $query->result();
          $this->load->view('student/Header');
          $this->load->view('student/Show_Exam',$usage);
          $this->load->view('student/footer');
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
     // get the view to save in hisory
     $view = $this->db->get_where('question',array('eid'=>$eid,'qid' => $qid))->row();
   echo   $question_view = $view->question." here is question<br>";
    echo  $correct_view = $view->correct ." here is correct<br>";
     $idA= $view->optAid;
     $idB= $view->optBid;
     $idC= $view->optCid;
     $idD= $view->optDid;
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
     // view getting ended
            echo $User_View;
            die;
     $timeRemaining = $this->session->userdata('time_remaining');
     $res = $this->db->get_where('student_history',array('eid'=>$eid,'qid' => $qid,'reg_num' => $reg_num))->result();
     $user_answer_id = $res->user_answer_id;
     $remaining = (($Duration * 60) - ((time() - $timeRemaining)));
     if ($remaining > 0 ) {
       # code...
     }
    }


    function _checkexist($table,$where){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->result_array();
        // $this->db->select("*");
        // $this->db->from("question");
        // $this->db->where(array('eid'=>$eid,'sn !=' => '5'));
        // $query = $this->db->get();
        // $result = $query->result_array();
        // $count = count($result);
      }

}
