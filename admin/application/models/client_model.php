<?php
	class Client_model extends CI_Model {
		
		public function get_client()
		{
			$this->db->order_by('id','desc');
			$query = $this->db->get('client');
			return $query->result();
		}
		
		public function record_count()
		{
			return $this->db->count_all('client');
		}
		
		public function total_client()
		{
			$query = $this->db->get('client');
			return $query->num_rows();
		}
		
		public function set_client($name,$add,$contact,$email,$uname,$pass,$company,$country,$state,$city,$code,$web,$status)
		{
			$date = date('Y-m-d h:i:s');
			$data=array('name'=>"$name",'address'=>"$add",'contact'=>"$contact",'email'=>"$email",'username'=>"$uname",'password'=>"$pass",'company'=>"$company",'country'=>"$country",'state'=>"$state",'city'=>"$city",'zipcode'=>"$code",'website'=>"$web",'status'=>"$status",'created'=>"$date");
			$this->db->insert('client',$data);
		}
		
		public function update($id,$name,$add,$contact,$email,$uname,$company,$country,$state,$city,$code,$web,$status)
		{
			$data['name']=$name;
			$data['address']=$add;
			$data['contact']=$contact;
			$data['email']=$email;
			if($this->input->post('uname_hidden')!=$this->input->post('uname'))
			{
				$data['username']=$uname;
			}
			$data['company']=$company;
			$data['country']=$country;
			$data['state']=$state;
			$data['city']=$city;
			$data['zipcode']=$code;
			$data['website']=$web;
			$data['status']=$status;
			
			$this->db->where('id',$id);
			$this->db->update('client',$data);
		}
		
		public function update_pwd($id,$name,$add,$contact,$email,$uname,$pass,$company,$country,$state,$city,$code,$web,$status)
		{
			$data['name']=$name;
			$data['address']=$add;
			$data['contact']=$contact;
			$data['email']=$email;
			if($this->input->post('uname_hidden')!=$this->input->post('uname'))
			{
				$data['username']=$uname;
			}
			$data['password']=$pass;
			$data['company']=$company;
			$data['country']=$country;
			$data['state']=$state;
			$data['city']=$city;
			$data['zipcode']=$code;
			$data['website']=$web;
			$data['status']=$status;
			
			$this->db->where('id',$id);
			$this->db->update('client',$data);
		}
		
		public function deleteclient($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('client');
		}
		
		public function view_client($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('client');
			return $query->result();
		}
		
		public function del_multiple($box)
		{
			$this->db->where('id',$box);
			$query = $this->db->delete('client');
			return TRUE;
		}
		
		public function enable_multiple($box)
		{
			$data = array('status'=>1);
			$this->db->where('id',$box);
			$this->db->update('client',$data);
		}
		
		public function disable_multiple($box)
		{
			$data = array('status'=>0);
			$this->db->where('id',$box);
			$this->db->update('client',$data);
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