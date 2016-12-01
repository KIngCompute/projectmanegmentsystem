<?php
	class Banner_model extends CI_Model {
		
		public function fetch_data()
		{
			$this->db->where('status','1');
			$this->db->order_by('id','desc');
			$data = $this->db->get('banner');
			return $data->result();
		}
	}
?>