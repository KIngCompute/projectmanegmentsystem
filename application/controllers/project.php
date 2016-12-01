<?php
	class Project extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('project_model');
			$this->checkSession();
		}
		
		public function checkSession()
		{
			$isloggedin = $this->session->userdata('pms-client');
			if(!isset($isloggedin) || $isloggedin != TRUE)
			{
				redirect('login');
			}
		}
		
		public function index()
		{
			$arr = "";
			$client = $this->project_model->get_allocated_cid();
			foreach($client as $row)
			{
				$cl = explode(',',$row->allocated_to_client);
				if(in_array($this->session->userdata('id'),$cl))
				{
					$arr[]= $this->project_model->get_data($row->id);
				}
			}
			$data['project_list'] = $arr;
			$data['page'] = 'projects/projects_list';		
			$this->load->view('ki_templates/content',$data);
		}
		
		public function view_project($id)
		{ 
			$data['view_project'] = $this->project_model->view_project($id);
			$data['page'] = 'projects/view_project';
			$this->load->view('ki_templates/content',$data);
		}
	}
?>