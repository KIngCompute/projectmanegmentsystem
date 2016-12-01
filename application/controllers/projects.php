<?php
	class Projects extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('project_model');
			$this->checkSession();
		}
		
		public function checkSession()
		{
			$isloggedin = $this->session->userdata('pms-emp');
			if(!isset($isloggedin) || $isloggedin != TRUE)
			{
				redirect('login');
			}
		}
		
		public function index()
		{
			$arr = "";
			$emp = $this->project_model->get_allocated_cid();
			foreach($emp as $row)
			{
				$cl = explode(',',$row->allocated_to_emp);
				if(in_array($this->session->userdata('eid'),$cl))
				{
					$arr[]= $this->project_model->get_data($row->id);
				}
			}
			$data['project_list'] = $arr;
			$data['page'] = 'projects/emp/projects_list';		
			$this->load->view('ki_templates/content',$data);
		}
		
		public function view_project($id)
		{ 
			$data['view_project'] = $this->project_model->view_project($id);
			$data['page'] = 'projects/emp/view_project';
			$this->load->view('ki_templates/content',$data);
		}
	}
?>