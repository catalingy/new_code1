<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class users_Add extends CI_Model{
		public function add($useradd,$teladd,$emailadd,$passwordadd,$typeadd,$descritionadd,$age){
			$this->load->helper('security');
			$query = $this->db->query('Select username from users where username ="'.$useradd.'"');
			if ($query->num_rows() == 1){
				return 2;
			}
			else{
				if($age !== '-')
				{
					$query = $this->db->query('SELECT id from age_category WHERE category="'.$age.'"');
					foreach($query->result() as $row)
						{    
							$ageid = $row->age;
						}
				}
				else
				{
					$ageid = 1;
				}
			}
			$str = do_hash($passwordadd, 'md5'); // MD5
			$query = $this->db->query('INSERT INTO users(phone_number,username,type,email,password,description,age_id) VALUES("'.$teladd.'","'.$useradd.'","'.$typeadd.'","'.$emailadd.'","'.$str.'","'.$descritionadd.'","'.$ageid.'")');
			return 3;
			
		}
	}
?>