<?php 
	class Page extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('page_model');
			$this->load->model('banner_model');
			//$this->load->model('portfolio_model');		
		}
		
		public function index()
		{
			$data['banner_list'] = $this->banner_model->fetch_data();
			//$data['portfolio_list'] = $this->portfolio_model->fetch_data();
			$data['page'] = 'page';
			$this->load->view('templates/content',$data);
		}
	}
?>