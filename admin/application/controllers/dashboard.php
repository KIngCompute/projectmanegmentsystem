<?php

class Dashboard extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
		$this->load->model('project_model');
		$this->load->model('client_model');
		$this->load->model('dashboard_model');
		$this->checkSession();
	}
	
	public function index()
	{
		$data['total_project'] = $this->project_model->total_project();
		$data['new_client'] = $this->dashboard_model->new_client();
		$data['total_client'] = $this->client_model->total_client();
		$data['page'] = 'dashboard';
		$this->load->view('templates/content',$data);
	}
	
	public function checkSession()
	{
		$isloggedin = $this->session->userdata('pms');
		if(!isset($isloggedin) || $isloggedin != TRUE)
		{
			redirect('login');
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('admin',$this->input->post('username'));
		$this->session->unset_userdata('pms',TRUE);
		$this->session->unset_userdata('last_logged');
		$this->dashboard_model->set_logged_out_time();
		$this->session->set_userdata('msg','You Logout Successfully !!!');
		redirect();
	}
	
	public function unset_client()
	{
		$this->session->unset_userdata('new_client');
	}
}

?>