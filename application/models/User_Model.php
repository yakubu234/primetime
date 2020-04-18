<?php
class User_Model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function checkLogin($username, $password) {
        
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where('username',$username);
    $this->db->where('password',$password);
    $query=$this->db->get();
    
         if($query->num_rows()>0){
              return $query->row_array();
         }else{
              return false;
        }
    }

    public function checkLogin_student($username, $password) {
        
    $this->db->select('*');
    $this->db->from('student');
    $this->db->where('reg_num',$username);
    $this->db->where('surname',$password);
    $query=$this->db->get();
    
         if($query->num_rows()>0){
              return $query->row_array();
         }else{
              return false;
        }
    }

    public function insert_customer($data){  
    $query = $this->db->insert('exam', $data);
    if ($query) {
        return true; 
            }else{
        return false;
        }
    }

    public function get_table_data(){ 
        $qry=$this->db->select('*')->from('exam')->get()->result(); 
        return $qry; 
    }
}