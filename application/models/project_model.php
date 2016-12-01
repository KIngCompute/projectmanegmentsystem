<?php
	class Project_model extends CI_Model
	{
		public function get_allocated_cid()
		{
			$q = $this->db->get('projects');
			return $q->result();
		}
		
		public function get_data($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('projects');
			return $query->row();
		}
		
		public function count_data($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('projects');
			return $query->num_rows();
		}
		
		public function get_img($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('projects');
			return $query->row()->profile_image;
		}
		
		public function view_project($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('projects');
			return $query->result();
		}
	}
?>