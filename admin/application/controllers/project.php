<?php
	class Project extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('project_model');
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
			$data['project_list'] = $this->project_model->get_data();
			$data['page'] = 'projects/projects_list';		
			$this->load->view('templates/content',$data);
		}
		
		public function add_project()
		{
			$this->form_validation->set_rules('name','Name','required|callback_valid_name');
			$this->form_validation->set_rules('desc','Description','required');
			$this->form_validation->set_rules('start_date','Starting Date','required');
			$this->form_validation->set_rules('end_date','Ending Date','required');
			
			if($this->form_validation->run() == false)
			{
				//$q = $this->project_model->fetch_types();
				//$data['types_data'] = $r;
				
				$sql = $this->project_model->fetch_status();
				foreach($sql as $res)
				{
					$row[$res->name] = $res->name;
				}
				$data['status_data'] = $row;
				$data['clients'] = $this->project_model->get_client();
				$data['developer'] = $this->project_model->get_dev();
				$data['designer'] = $this->project_model->get_designer();
				$data['tester'] = $this->project_model->get_tester();
				$this->session->set_userdata('validation_errors',validation_errors());
				$data['page'] = 'projects/add_project';
				$this->load->view('templates/content',$data);
			}
			else
			{
				$name = $this->input->post('name');
				$status = $this->input->post('status');
				$desc = $this->input->post('desc');
				$bdate = $this->input->post('start_date');
				$edate = $this->input->post('end_date');
				$client = implode($this->input->post('client'),',');
				$emp = implode($this->input->post('emp'),',');
				
				$config['upload_path'] = '../attachment/';
				$config['allowed_types'] ='gif|jpg|png|jpeg|pdf|doc|xml|txt';
				$this->load->library('upload',$config);
				$res=$this->upload->do_upload('file');
				if($res)
				{
					$file=$this->upload->data();
					$this->project_model->add_project_file($name,$status,$desc,$client,$emp,$file['file_name'],$bdate,$edate);
					$this->session->set_userdata('msg','Added Successfully!!!');
					redirect('project');
				}
				else
				{
					$this->project_model->add_project($type,$status,$name,$lurl,$turl,$desc,$client,$emp,$bdate,$edate);
					$this->session->set_userdata('msg','Added Successfully!!!');
					redirect('project');
				}
			}
		}
		
		public function edit_project($id)
		{
			$q = $this->project_model->fetch_types();
			foreach($q as $res)
			{
				$r[$res->name] = $res->name;
			}
			$data['types_data'] = $r;
				
			$sql = $this->project_model->fetch_status();
			foreach($sql as $res)
			{
				$row[$res->name] = $res->name;
			}
			
			$data['status_data'] = $row;
			$data['clients'] = $this->project_model->get_client();
			$data['developer'] = $this->project_model->get_dev();
			$data['designer'] = $this->project_model->get_designer();
			$data['tester'] = $this->project_model->get_tester();
			$data['pro'] = $this->project_model->view_project($id);
			if(empty($data['pro']))
			{
				redirect('project');
			}
			$data['page'] = 'projects/edit_project';
			$this->load->view('templates/content',$data);
		}
		
		public function edit_pro()
		{
			$pro_id = $this->input->post('pro_id');
			$this->form_validation->set_rules('name','Name','required|callback_valid_name');
			$this->form_validation->set_rules('desc','Description','required');
			$this->form_validation->set_rules('start_date','Starting Date','required');
			$this->form_validation->set_rules('end_date','Ending Date','required');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_userdata('validation_errors',validation_errors());
				redirect("project/edit_project/".$pro_id);
			}
			else
			{	$name = $this->input->post('name');
				$status = $this->input->post('status');
				$desc = $this->input->post('desc');
				$bdate = $this->input->post('start_date');
				$edate = $this->input->post('end_date');
				$client = implode($this->input->post('client'),',');
				$emp = implode($this->input->post('emp'),',');
				
				$config['upload_path'] = '../attachment/';
				$config['allowed_types'] ='gif|jpg|png|jpeg|pdf|doc|xml|txt';
				$this->load->library('upload',$config);
				$res=$this->upload->do_upload('file');
				if($res)
				{
					
					$file=$this->upload->data();
					$data=$this->project_model->update_project_file($pro_id,$type,$status,$name,$lurl,$turl,$desc,$client,$emp,$file['file_name'],$bdate,$edate);
					$this->session->set_userdata('msg','Updated Successfully!!!');
					redirect('project');
				}
				else
				{
					$this->project_model->update_project($pro_id,$type,$status,$name,$lurl,$turl,$desc,$client,$emp,$bdate,$edate);
					$this->session->set_userdata('msg','Updated Successfully!!!');
					redirect('project');
				}
			}
		}
		
		public function delete_project($id=NULL)
		{
			if($id == NULL)
			{
				redirect('project');
			}
			else
			{
				$files = $this->project_model->get_file($id);
				unlink("../attachment/$files");
				$this->project_model->delete_project($id);
				$this->session->set_userdata('msg','Deleted Successfully!!!');
				redirect('project');
			}
		}
		
		public function delete_file($id)
		{
			$file = $this->project_model->get_file($id);
			unlink("../attachment/$file");
			$this->project_model->delete_file($id);
			redirect("project/edit_project/$id");
		}
		
		public function view_project($id)
		{ 
			$client = $this->project_model->get_allocated_cid($id);
			$cl = explode(',',$client);
			foreach($cl as $row)
			{
				$ar[] = $this->project_model->client_allocated($row);
			}
			$data['arr'] = $ar;
			$emp = $this->project_model->get_allocated_eid($id);
			$em = explode(',',$emp);
			foreach($em as $r)
			{
				$dev[] = $this->project_model->dev_allocated($r);
			}
			$data['row'] = $dev;
			foreach($em as $des_id)
			{
				$des[] = $this->project_model->des_allocated($des_id);
			}
			$data['des'] = $des;
			foreach($em as $test_id)
			{
				$test[] = $this->project_model->test_allocated($test_id);
			}
			$data['test'] = $test;
			$data['view_project'] = $this->project_model->view_project($id);
			$data['page'] = 'projects/view_project';
			$this->load->view('templates/content',$data);
		}
		
		public function delete_multiple()
		{
			if($this->input->post('delete'))
			{
				$box = $this->input->post('selector');
				if($box == "")
				{
					$this->session->set_userdata('err_del','Please select record');
					redirect('project');
				}
				else
				{
					foreach($box as $key => $value)
					{
						$data = $this->project_model->get_file($value);
						unlink('../attachment/'.$data);
						$this->project_model->del_multiple($value);	
						$this->session->set_userdata('msg','Selected project Deleted Successfully');
					}
				}
				redirect('project');
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
	}
?>