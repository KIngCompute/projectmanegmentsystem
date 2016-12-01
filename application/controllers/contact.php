<?php
	class Contact extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('page_model');
			$this->load->model('contact_model');
		}
		
		public function index()
		{
			$url = 'contact';
			$data['content'] = $this->page_model->get_content($url);
			$data['page'] = 'contact';
			$this->load->view('templates/content',$data);
		}
		
		public function create()
		{
		
			$this->form_validation->set_rules('name','Name','required|max_length[50]|callback_valid_name');
			$this->form_validation->set_rules('phone','Phone No.','required|min_length[10]|callback_valid_contact');
			$this->form_validation->set_rules('email','Email','required|callback_check_valid_email');
			$this->form_validation->set_rules('msg','Message','required');
			
			if($this->form_validation->run() == false)
			{
				$this->session->set_userdata('validation_errors',validation_errors());
				redirect('contact');
			}
			else
			{
				$name = $this->input->post('name');
				$phone = $this->input->post('phone');
				$email = $this->input->post('email');
				$msg = $this->input->post('msg');

				
				$this->contact_model->set_contact($name,$phone,$email,$msg);
				$this->session->set_userdata('msg','Added Successfully!!!');
				redirect('contact');
			}
		}
		
		public function valid_name($str)
		{
			if(!preg_match("/^([a-zA-z ])+$/i",$str))
			{
				$this->form_validation->set_message('valid_name','The %s field contains only alphabets and spaces.');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		
		public function check_valid_email($str)
		{
			if(!preg_match("/^[a-zA-Z1-9]{2}[a-zA-Z0-9._]+@[a-zA-Z]+\.[a-zA-Z.]+$/i",$str))
			{
				$this->form_validation->set_message('check_valid_email','The %s field should be valid.');
				return FALSE;
			}
			else
			{
				return true;
			}
		}
		
		public function valid_contact($value)
		{
			if(!preg_match("/^\+?[1-9][0-9]+$/i",$value))
			{
				$this->form_validation->set_message('valid_contact','The %s field should be valid.');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
}
?>