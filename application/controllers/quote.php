<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quote extends CI_Controller
{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('quote_model');
			$this->load->model('banner_model');
			$this->load->model('portfolio_model');		
		}
	
		public function index()
		{
			$data['banner_list'] = $this->banner_model->fetch_data();
			$data['portfolio_list'] = $this->portfolio_model->fetch_data();
			$data['page']='page';
			$this->load->view('templates/content',$data);
		}
		
		public function create()
		{
		
			$this->form_validation->set_rules('pro_title','Project Title','required|max_length[100]');
			$this->form_validation->set_rules('pro_type','Project Type','required');
			$this->form_validation->set_rules('est_bud','Estimate Budget','required');
			$this->form_validation->set_rules('priority','Priority','required');
			$this->form_validation->set_rules('desc_pro','Describe Project','required');
			$this->form_validation->set_rules('fname','Full Name','required|max_length[100]|callback_valid_name');
			$this->form_validation->set_rules('email','Email','required|callback_check_valid_email');
			$this->form_validation->set_rules('pno','Phone No.','required|min_length[10]|callback_valid_contact');	
			
			if($this->form_validation->run() == false)
			{
				echo validation_errors();
			}
			else
			{
				$pro_title = $this->input->post('pro_title');
				$pro_type = $this->input->post('pro_type');
				$est_bud = $this->input->post('est_bud');
				$priority = $this->input->post('priority');
				$desc_pro = $this->input->post('desc_pro');
				$fname = $this->input->post('fname');
				$email = $this->input->post('email');	
				$pno = $this->input->post('pno');
				
				$this->quote_model->set_quote($pro_title,$pro_type,$est_bud,$priority,$desc_pro,$fname,$email,$pno);
				
				echo '1';
			}
		}
	
		public function valid_contact($value)
		{
			if(!preg_match("/^\+?[1-9][0-9]+$/i",$value))
			{
				$this->form_validation->set_message('valid_contact','The %s field should be valid.');
				return FALSE;
			}
		}
	
		public function valid_name($str)
		{
			if(!preg_match("/^([a-zA-z ])+$/i",$str))
			{
				$this->form_validation->set_message('valid_name','The %s field contains only alphabets and spaces.');
				return FALSE;
			}
		}
		
		public function check_valid_email($val)
		{
			if(!preg_match("/^[a-zA-Z1-9]{2}[a-zA-Z0-9._]+@[a-zA-Z]+\.[a-zA-Z.]+$/i",$val))
			{
				$this->form_validation->set_message('check_valid_email','The %s field should be valid.');
				return FALSE;
			}
		}
} 
?>