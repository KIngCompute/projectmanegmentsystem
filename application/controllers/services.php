<?php 
	class Services extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('page_model');
		}
		
		public function index()
		{
			$url = 'services';
			$data['content'] = $this->page_model->get_content($url);
			$data['page'] = 'services';
			$this->load->view('templates/content',$data);
		}
	}
?>