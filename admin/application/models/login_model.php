<?php
	class Login_model extends CI_Model{
		
		public function validate()
		{	
			$this->db->where('username',trim($this->input->post('username')));
			$this->db->where('password',trim(md5($this->input->post('password'))));
			$query = $this->db->get('admin');
			
			if($query->num_rows == 1)
			{
				return true;
			}
		}
		
		public function get_data()
		{
			$this->db->select('last_logged_in');
			$query = $this->db->get('admin');
			return $query->row()->last_logged_in;
		}
		
		public function update_last_logged()
		{
			date_default_timezone_set('Asia/Calcutta');
			$datestring = "%Y:%m:%d %h:%i:%s";
			$time = time();
			$date = mdate($datestring, $time);

			$data = array('last_logged_in'=>"$date");
			$this->db->where('id','1');
			$this->db->update('admin',$data);
		}
		
		public function validate_email($email)
		{
			$this->db->where('email',$email);
			$query = $this->db->get('admin');
			
			if($query->num_rows == 1)
			{
				return true;
			}
		}
		
		public function save_password($npass)
		{
			$data = array('password'=>"$npass");
			$this->db->where('id',1);
			$this->db->update('admin',$data);
		}
		
		public function get_message()
		{
			$this->db->where('id',2);
			$qry = $this->db->get('messages');
			return $qry->row_array();
		}
		
		public function get_name($email)
		{
			$this->db->select('username');
			$this->db->where('email',$email);
			$qry = $this->db->get('admin');
			return $qry->row()->username;
		}
	} 
?>