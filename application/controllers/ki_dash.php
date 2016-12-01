<?php
	class Ki_dash extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->checkSession();
			$this->load->model('project_model');
			
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
			$r = "0";
			$emp = $this->project_model->get_allocated_cid();
			foreach($emp as $row)
			{
				$cl = explode(',',$row->allocated_to_emp);
				if(in_array($this->session->userdata('eid'),$cl))
				{
					$r += $this->project_model->count_data($row->id);
				}
			}
			$data['count_project'] = $r;
			
			$t = "0";
			$emp = $this->task_model->get_allocated_eid();
			foreach($emp as $row)
			{
				$cl = explode(',',$row->allocated_to_emp);
				if(in_array($this->session->userdata('eid'),$cl))
				{
					$t += $this->task_model->count_task($row->id);
				}
			}
			$data['count_task'] = $t;			
			$data['page'] = 'ki-dash';
			$this->load->view('ki_templates/content',$data);
		}
		
		public function logout()
		{
			$this->session->unset_userdata('emp',$this->input->post('username'));
			$this->session->unset_userdata('pms-emp',TRUE);
			$this->session->unset_userdata('eid');
			$this->session->unset_userdata('img');
			redirect('login');
		}
	}
?>