<?php
	class Login_model extends CI_Model
	{
		public function validate_login()
		{
			$this->db->where('username',trim($this->input->post('username')));
			$this->db->where('password',trim(md5($this->input->post('password'))));
			$this->db->where('status','1');
			$query = $this->db->get('client');
			if($query->num_rows == 1)
			{
				return "client";
			}
			else
			{
				$this->db->where('username',trim($this->input->post('username')));
				$this->db->where('password',trim(md5($this->input->post('password'))));
				$this->db->where('status','0');
				$query = $this->db->get('client');
				if($query->num_rows == 1)
				{
					return "client-err";
				}
				else
				{
					$this->db->where('username',trim($this->input->post('username')));
					$this->db->where('password',trim(md5($this->input->post('password'))));
					$this->db->where('status','1');
					$res=$this->db->get('employees');
					if($res->num_rows == 1)
					{
						return "employee";
					}
					else
					{
						return FALSE;
					}
				}
			}
		}
		
		public function get_id($username)
		{
			$this->db->select('id');
			$this->db->where('username',$username);
			$query = $this->db->get('client');
			return $query->row()->id;
		}
		
		public function get_eid($username)
		{
			$this->db->select('id');
			$this->db->where('username',$username);
			$query = $this->db->get('employees');
			return $query->row()->id;
		}
		
		public function get_image($uname)
		{
			$this->db->select('profile_image');
			$this->db->where('username',$uname);
			$query = $this->db->get('employees');
			return $query->row()->profile_image;
		}
		
		public function validate_email($email)
		{
			$this->db->where('email',$email);
			$query = $this->db->get('client');
			
			if($query->num_rows == 1)
			{
				return true;
			}
			else
			{
				$this->db->where('email',$email);
				$query2 = $this->db->get('employees');
				if($query2->num_rows == 1)
				{
					return true;
				}
				else
				{
					return false;
				}
				return false;
			}
		}
		
		public function save_password($email,$npass)
		{
			$this->db->where('email',$email);
			$qry = $this->db->get('client');
			if($qry->num_rows() == 1)
			{
				$data = array('password'=>"$npass");
				$this->db->where('email',$email);
				$this->db->update('client',$data);
			}
			else
			{
				$this->db->where('email',$email);
				$qry2 = $this->db->get('employees');
				if($qry2->num_rows() == 1)
				{
					$data = array('password'=>"$npass");
					$this->db->where('email',$email);
					$this->db->update('employees',$data);
				}
			}
		}
		
		public function get_cname($email)
		{
			$this->db->where('email',$email);
			$result = $this->db->get('client');
			if($result->num_rows() == 1)
			{
				return $result->row()->name;
			}
			else
			{
				$this->db->where('email',$email);
				$result2 = $this->db->get('employees');
				return $result2->row()->fullname;
			}
		}
		
		public function get_message()
		{
			$this->db->where('id',2);
			$qry = $this->db->get('messages');
			return $qry->row_array();
		}
	}
?>