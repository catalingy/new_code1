<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class users_load extends CI_Model{
		public function load($type,$name,$search){
			if($type == 'a')
				if($search != "")
					$query = $this->db->query('Select users.username,users.email,users.type,users.phone_number,users.description,age_category.category from users INNER JOIN age_category ON age_category.id = users.age_id  WHERE users.username like "'.$search.'%" ORDER BY username ASC');
				else
					$query = $this->db->query('Select users.username,users.email,users.type,users.phone_number,users.description,age_category.category from users INNER JOIN age_category ON age_category.id = users.age_id   ORDER BY username ASC');
			if($type == 'u')
				$query = $this->db->query('Select users.username,users.email,users.type,users.phone_number,users.description,age_category.category from users INNER JOIN age_category ON age_category.id = users.age_id  WHERE username = "'.$name.'" ORDER BY username ASC');
			foreach($query->result() as $row)
			{    
				 $users[] = $row->username; 
				 $email[] = $row->email; 
				 $types[] = $row->type; 
				 $phone[] = $row->phone_number; 
				 $description[] = $row->description;
				 $age[] =$row->category;
			}
			$rows['user'] = $users;
			$rows['email'] = $email;
			$rows['phone'] = $phone;
			$rows['type'] =  $types;
			$rows['description'] = $description;
			$rows['age'] = $age;
			return $rows;
		}
	}
?>