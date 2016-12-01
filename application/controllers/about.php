<?php 
	class About extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('page_model');
		}
		
		public function index()
		{
			$url = 'about';
			$data['content'] = $this->page_model->get_content($url);
			$data['page'] = 'about';
			$this->load->view('templates/content',$data);
		}
	}
?>