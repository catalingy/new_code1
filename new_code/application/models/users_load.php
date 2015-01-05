<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class users_load extends CI_Model{
		public function load($type,$name){
			if($type == 'a')
				$query = $this->db->query('Select username from users');
			if($type == 'u')
				$query = $this->db->query('Select username from users where username = "'.$name.'"');
			foreach($query->result() as $row)
			{    
				$rows[] = $row->username; 
			}
			return $rows;
		}
	}
?>