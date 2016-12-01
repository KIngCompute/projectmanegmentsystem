<?php
	class Signup_model extends CI_Model {
		
		public function set_client($name,$add,$contact,$email,$uname,$pass,$company,$country,$state,$city,$code,$web,$ip)
		{
			$date = date('Y-m-d h:i:s');
			$data=array('name'=>"$name",'address'=>"$add",'contact'=>"$contact",'email'=>"$email",'username'=>"$uname",'password'=>"$pass",'company'=>"$company",'country'=>"$country",'state'=>"$state",'city'=>"$city",'zipcode'=>"$code",'website'=>"$web",'status'=>'0','created'=>"$date",'ip_address'=>"$ip");
			$this->db->insert('client',$data);
		}
		
		public function get_message()
		{
			$this->db->where('id',1);
			$query = $this->db->get('messages');
			return $query->row_array();
		}
		
		function check_if_url_exists($uname)
		{
			$this->db->where('username',$uname);
			$result = $this->db->get('client');
			$this->db->where('username',$uname);
			$result2 = $this->db->get('employees');
			if($result->num_rows() == 0 && $result2->num_rows() == 0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		
		function check_if_email_exists($email)
		{
			$this->db->where('email',$email);
			$result = $this->db->get('client');
			$this->db->where('email',$email);
			$result2 = $this->db->get('employees');
			if($result->num_rows() == 0 && $result2->num_rows() == 0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
	}
?>