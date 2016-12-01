<?php
	class Ki_dashboard extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->checkSession();
			date_default_timezone_set('Asia/Kolkata');
			$this->load->model('project_model');
			$this->load->model('ticket_model');
		}
		
		public function checkSession()
		{
			$loggedin = $this->session->userdata('pms-client');
			if(!isset($loggedin) || $loggedin != TRUE)
			{
				redirect('login');
			}
		}
		
		public function index()
		{
			$r = "0";
			$client = $this->project_model->get_allocated_cid();
			foreach($client as $row)
			{
				$cl = explode(',',$row->allocated_to_client);
				if(in_array($this->session->userdata('id'),$cl))
				{
					$r += $this->project_model->count_data($row->id);
				}
			}
			$data['count_project'] = $r;
			$data['count_response'] = $this->ticket_model->total_response($this->session->userdata('id'));
			$data['new_ticket_response'] = $this->ticket_model->new_ticket_response($this->session->userdata('id'));
			$data['page'] = 'ki-dashboard';
			$this->load->view('ki_templates/content',$data);
		}
		
		public function logout()
		{
			$this->session->unset_userdata('client',$this->input->post('username'));
			$this->session->unset_userdata('pms-client',TRUE);
			$this->ticket_model->set_logged_out_time($this->session->userdata('id'));
			$this->session->unset_userdata('id');
			redirect('login');
		}
	}
?>