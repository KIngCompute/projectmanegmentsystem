<?php
	class Profile extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
            $this->load->model('profile_model');
			$this->checkSession();
		}
		
		public function checkSession()
		{
			$isloggedin = $this->session->userdata('pms');
			if(!isset($isloggedin) || $isloggedin != TRUE)
			{
				redirect('login');
			}
		}

		public function index()
		{
			$data['arr']=$this->profile_model->get_data();
			$data['page'] = 'profile/admin-detail';
			$this->session->set_userdata('admin-detail','admin-detail');
			$this->load->view('templates/content',$data);
		}
		
		public function validate()
		{
			$this->form_validation->set_rules('firstname','firstname','required|max_length[50]|callback_valid_name');
			$this->form_validation->set_rules('lastname','lastname','required|max_length[50]|callback_valid_name');
			$this->form_validation->set_rules('email','email','required|callback_check_valid_email');
			$this->form_validation->set_rules('username','username','required|max_length[15]|callback_valid_username');
			
			if($this->form_validation->run() == TRUE)
			{
				$firstname=$this->input->post('firstname');
				$lastname=$this->input->post('lastname');
				$email=$this->input->post('email');
				$username=$this->input->post('username');
				
				$data=array('firstname'=>$firstname,'lastname'=>$lastname,'username'=>$username,'email'=>$email);
				
				$this->profile_model->update($data);
				$this->session->set_userdata('msg','Profile Updated Successfully!!!');
				redirect('profile');
			}
			else
			{
				$this->session->set_userdata('validation_errors',validation_errors());
				redirect('profile');
			}
		}
		
		public function changepassword()
		{
			$data['page'] = 'profile/pwd';
			$this->session->set_userdata('changepwd','changepwd');
			$this->load->view('templates/content',$data);
		}
		
		public function pwd_validate()
		{
			$this->form_validation->set_rules('curpass','Current Password','trim|required');
			$this->form_validation->set_rules('npass','New Password','trim|required|max_length[16]|min_length[6]|callback_valid_password');
			$this->form_validation->set_rules('cpass','Confirm Password','trim|required|max_length[16]');
			
			if($this->form_validation->run() == TRUE)
			{
				$curpass = md5($this->input->post('curpass'));
				
				$query=$this->profile_model->checkpwd($curpass);
				
				if($query)
				{
					$npass = $this->input->post('npass');
					$cpass = $this->input->post('cpass');
					
					if($npass == $cpass)
					{
						$npass = md5($this->input->post('npass'));
						$this->profile_model->updatepwd($npass);
						$this->session->set_userdata('msg','Password has been updated Successfully!!!');
						redirect('profile/changepassword');
					}
					else
					{
						$this->session->set_userdata('err','New Password and Confirm Password are missmatch');
						$this->session->set_userdata('validation_errors',validation_errors());
						redirect('profile/changepassword');
					}
				}
				else
				{
					$this->session->set_userdata('err_cur','Current Password is wrong');
					$this->session->set_userdata('validation_errors',validation_errors());
					redirect('profile/changepassword');
				}
			}
			else
			{
				$this->session->set_userdata('validation_errors',validation_errors());
				redirect('profile/changepassword');
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