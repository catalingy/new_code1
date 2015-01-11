<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class delete_user extends CI_Model{
		public function delete($name){
			$query = $this->db->query('DELETE FROM users WHERE username ="'.$name.'"');
			return 'Utilizatorul a fost sters!';
		}
	}
?>