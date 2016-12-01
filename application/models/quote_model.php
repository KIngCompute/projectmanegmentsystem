<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quote_model extends CI_Model
{
	public function set_quote($pro_title,$pro_type,$est_bud,$priority,$desc_pro,$fname,$email,$pno)
	{
		/*?>$date = date('Y-m-d H:i:s');<?php */
		$data=array('ptitle'=>"$pro_title",'project_type'=>"$pro_type",'estimate_budget'=>"$est_bud",'priority'=>"$priority",'describe_project'=>"$desc_pro",'fname'=>"$fname",'email'=>"$email",'phone'=>"$pno");
		$this->db->insert('quote',$data);
	}	
} 
?>