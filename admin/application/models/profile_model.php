<?php
	class Profile_model extends CI_Model {
		
		public function get_data()
		{
			$this->db->where('id',1);
			$data=$this->db->get('admin');
			
			return $data->result_array();
		}
		
		public function update($data)
		{
			$this->db->where('id',1);
			$this->db->update('admin',$data);
		}
		
		public function checkpwd($curpass)
		{	
			$this->db->where('password',$curpass);
			$data=$this->db->get('admin');
			
			if($data->num_rows == 1)
			{
				return true;
			}
		}
		
		public function updatepwd($npass)
		{
			$data = array('password' => $npass);
			$this->db->where('id',1);
			$this->db->update('admin',$data);
		}
	}
?>