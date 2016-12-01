<?php
	class Project_model extends CI_Model
	{
		public function get_data()
		{
			$query = $this->db->get('projects');
			return $query->result();
		}
		
		public function total_project()
		{
			$query = $this->db->get('projects');
			return $query->num_rows();
		}
		
		public function fetch_types()
		{
			$this->db->select('name');
			//$this->db->where('active','1');
			//$query = $this->db->get('project_types');
			//return $query->result();
		}
		
		public function fetch_status()
		{
			$this->db->select('name');
			$this->db->where('active','1');
			$query = $this->db->get('project_status');
			return $query->result();
		}
		
		public function fetch_pname()
		{
			$this->db->select('name');
			$query = $this->db->get('projects');
			return $query->result();
		}
		
		public function get_client()
		{
			$this->db->where('status','1');
			$query = $this->db->get('client');
			return $query->result();
		}
		
		public function get_emp()
		{
			$this->db->where('status','1');
			$query = $this->db->get('employees');
			return $query->result();
		}
		
		public function get_dev()
		{
			$this->db->where('designation','Developer');
			$this->db->where('status','1');
			$query = $this->db->get('employees');
			return $query->result();
		}
		
		public function get_designer()
		{
			$this->db->where('designation','Designer');
			$this->db->where('status','1');
			$query = $this->db->get('employees');
			return $query->result();
		}
		
		public function get_tester()
		{
			$this->db->where('designation','Tester(SEO)');
			$this->db->where('status','1');
			$query = $this->db->get('employees');
			return $query->result();
		}
		
		public function add_project_file($name,$status,$desc,$client,$emp,$file,$bdate,$edate)
		{
			$data = array(
							'name' => "$name",
							'status' => "$status",
							'description' => "$desc",
							'allocated_to_client' => "$client",
							'allocated_to_emp' => "$emp",
							'attachment' => "$file",
							'start_date' => "$bdate",
							'end_date' => "$edate"
							);
			$this->db->insert('projects',$data);
		}
		
		public function add_project($type,$status,$name,$lurl,$turl,$desc,$client,$emp,$bdate,$edate)
		{
			$data = array(	
							'name' => "$name",
							'status' => "$status",
							'description' => "$desc",
							'allocated_to_client' => "$client",
							'allocated_to_emp' => "$emp",
							'start_date' => "$bdate",
							'end_date' => "$edate"
							);
			$this->db->insert('projects',$data);
		}
		
		public function view_project($id)
		{
			$this->db->where('id',$id);
			$query = $this->db->get('projects');
			return $query->result();
		}
		
		public function update_project_file($pro_id,$name,$status,$desc,$client,$emp,$file,$bdate,$edate)
		{
			$data = array(
							'name' => "$name",
							'status' => "$status",
							'description' => "$desc",
							'allocated_to_client' => "$client",
							'allocated_to_emp' => "$emp",
							'attachment' => "$file",
							'start_date' => "$bdate",
							'end_date' => "$edate"
							);
			$this->db->where('id',$pro_id);
			$this->db->update('projects',$data);
		}
		
		public function update_project($pro_id,$name,$status,$desc,$client,$emp,$file,$bdate,$edate)
		{
			$data = array(
							'name' => "$name",
							'status' => "$status",
							'description' => "$desc",
							'allocated_to_client' => "$client",
							'allocated_to_emp' => "$emp",
							'attachment' => "$file",
							'start_date' => "$bdate",
							'end_date' => "$edate"
							);
			$this->db->where('id',$pro_id);
			$this->db->update('projects',$data);
		}
		
		public function get_file($id)
		{
			$this->db->select('attachment');
			$this->db->where('id',$id);
			$qry = $this->db->get('projects');
			return $qry->row()->attachment;
		}
		
		public function delete_project($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('projects');
		}
		
		public function delete_file($id)
		{
			$data = array('attachment' => "");
			$this->db->where('id',$id);
			$this->db->update('projects',$data);
		}
		
		public function get_allocated_cid($id)
		{
			$this->db->where('id',$id);
			$q = $this->db->get('projects');
			return $q->row()->allocated_to_client;	
		}
		
		public function get_allocated_eid($id)
		{
			$this->db->where('id',$id);
			$q = $this->db->get('projects');
			return $q->row()->allocated_to_emp;	
		}
		
		public function client_allocated($row)
		{
			$this->db->select('id');
			$this->db->select('name');
			$this->db->where('id',$row);
			$query = $this->db->get('client');
			return $query->row();
		}
		
		public function dev_allocated($r)
		{
			$this->db->select('id');
			$this->db->select('fullname');
			$this->db->where('id',$r);
			$this->db->where('designation','Developer');
			$query = $this->db->get('employees');
			return $query->row();
		}
		
		public function des_allocated($des_id)
		{
			$this->db->select('id');
			$this->db->select('fullname');
			$this->db->where('id',$des_id);
			$this->db->where('designation','Designer');
			$query = $this->db->get('employees');
			return $query->row();
		}
		
		public function test_allocated($test_id)
		{
			$this->db->select('id');
			$this->db->select('fullname');
			$this->db->where('id',$test_id);
			$this->db->where('designation','Tester(SEO)');
			$query = $this->db->get('employees');
			return $query->row();
		}
		
		public function del_multiple($box)
		{
			$this->db->where('id',$box);
			$query = $this->db->delete('projects');
			return TRUE;
		}
	} 
?>