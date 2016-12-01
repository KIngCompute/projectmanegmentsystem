<?php
	class Page_model extends CI_Model
	{	
		public function get_content($url)
		{
			$this->db->where('status','1');
			$this->db->where('url_key',$url);
			$query = $this->db->get('page_manager');
			return $query->result();
		}
			} 
?>