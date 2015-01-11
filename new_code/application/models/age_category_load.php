<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class age_category_load extends CI_Model{
		public function load(){
			$query = $this->db->query('Select category from age_category WHERE id > 1');
			foreach($query->result() as $row)
			{    
				 $categories[] = $row->category; 
			}
			return $categories;
		}
	}
?>