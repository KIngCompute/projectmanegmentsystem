<?php
	class Myprofile extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
            $this->load->model('profile_model');
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
			$data['emp']=$this->profile_model->get_emp($this->session->userdata('eid'));
			$data['page'] = 'myaccount';
			$this->load->view('ki_templates/content',$data);
		}
		
		public function validate()
		{
			$id = $this->input->post('id');
			if($this->input->post('uname_hidden')!=$this->input->post('uname'))
			{
				$change="|callback_check_if_url_exists";
			}
			else
			{
				$change="";
			}
			
			if($this->input->post('email_hidden')!=$this->input->post('email'))
			{
				$em="|callback_check_email_exists";
			}
			else
			{
				$em="";
			}
			
			$this->form_validation->set_rules('fname','Full Name','required|max_length[50]|callback_valid_name');
			$this->form_validation->set_rules('add','Address','required');
			$this->form_validation->set_rules('contact','Contact','required|min_length[10]|callback_valid_contact');
			$this->form_validation->set_rules('email','Email',"required|check_valid_email{$em}");
			$this->form_validation->set_rules('uname','Username',"required|max_length[15]|callback_valid_username{$change}");
			
			if($this->form_validation->run() == false)
			{
				$this->session->set_userdata('validation_errors',validation_errors());
				redirect("Myprofile/index/$id");
			}
			else
			{
				$fname = $this->input->post('fname');
				$add = $this->input->post('add');
				$contact = $this->input->post('contact');
				$email = $this->input->post('email');
				$uname = $this->input->post('uname');
				$pass = $this->input->post('pass');
				$cpass = $this->input->post('cpass');
			
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$this->load->library('upload',$config);
				$res=$this->upload->do_upload('profile_image');
				if($pass == "")
				{
					if($res == "")
					{
						$this->profile_model->update_emp($id,$fname,$add,$email,$uname,$contact);
						$this->session->set_userdata('msg','Your profile has been Updated.');
						redirect('myprofile');	
					
					}
					else
					{
						$img = $this->profile_model->get_img($id);
						unlink("./uploads/$img");
						$img=$this->upload->data();
						$this->profile_model->update_img_emp($id,$img['file_name'],$fname,$add,$email,$uname,$contact);
						$this->session->set_userdata('msg','Your profile has been Updated.');
						redirect('myprofile');
					}
				}
				else
				{
					if($pass == $cpass)
					{
						$pass = md5($this->input->post('pass'));
						if($res == "")
						{
							$this->profile_model->update_pwd_emp($id,$fname,$add,$email,$uname,$pass,$contact);
						$this->session->set_userdata('msg','Your profile has been Updated.');
						redirect('myprofile');	
						
						}
						else
						{	
							$img = $this->profile_model->get_img($id);
							unlink("./uploads/$img");
							$img=$this->upload->data();
							$this->emp_model->update_pwd_img_emp($id,$img['file_name'],$fname,$add,$email,$uname,$pass,$contact);
							$this->session->set_userdata('msg','Your profile has been Updated.');
							redirect('myprofile');
						}
					}
					else
					{
						$this->session->set_userdata('pwderror','The Password and Confirm Password are mismatch');
						redirect("myprofile/index/$id");
					}
				}
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
		
		public function valid_username($str)
		{
			if(!preg_match("/^([a-zA-z0-9_])+$/i",$str))
			{
				$this->form_validation->set_message('valid_username','The %s field contains alphabets,numeric and underscore.');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		
		public function valid_password($value)
		{
			if(!preg_match("/^([a-zA-z0-9@#$%^&*,.?+-])+$/i",$value))
			{
				$this->form_validation->set_message('valid_password','The %s field contains alphabets,numeric and special symbols.');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		
		public function valid_web($str)
		{
			if(!preg_match("/^(www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$str))
			{
				$this->form_validation->set_message('valid_web','The %s is invalid format.');
				return FALSE;
			}
			else
			{
				return TRUE;
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
		
		function check_if_url_exists()
		{
			$this->load->model('profile_model');
			$url_not_in_use = $this->profile_model->check_if_url_exists($this->input->post('uname'));
			if($url_not_in_use)
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('check_if_url_exists','Username must be unique');
				return FALSE;
			}
		}
		
		public function check_email_exists()
		{
			$email_not_in_use = $this->profile_model->check_if_email_exists($this->input->post('email'));
			if($email_not_in_use)
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('check_email_exists','The requested email address is already exists.');
				return FALSE;
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
	}
?>