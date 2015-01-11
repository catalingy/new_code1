<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class delete_age extends CI_Model{
		public function delete($agecat){
			$query1 = $this->db->query('UPDATE users SET age_id = "1" WHERE age_id =(SELECT id FROM age_category WHERE category ="'.$agecat.'")');
			$query = $this->db->query('DELETE FROM age_category WHERE category="'.$agecat.'"');
		}
	}
?>