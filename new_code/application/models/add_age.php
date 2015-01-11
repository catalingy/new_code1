<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class add_age extends CI_Model{
		public function add($agecat){
			$query = $this->db->query('INSERT INTO age_category(category) VALUES("'.$agecat.'")');
		}
	}
?>