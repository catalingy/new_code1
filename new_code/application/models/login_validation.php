<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class login_validation extends CI_Model{
		public function validate($name,$password){
			$this->load->helper('security');
			$str = do_hash($password, 'md5'); // MD5
			$query = $this->db->query('Select password,username,type from users where username ="'.$name.'" and password ="'.$str.'"');
			if ($query->num_rows() == 1){
				 $row = $query->row_array(); 
				 return $row['type'];
			}
			else{
				return '0';
			}
		}
	}
?>