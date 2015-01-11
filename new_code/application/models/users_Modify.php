<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class users_Modify extends CI_Model{
		public function update($useredit,$teledit,$emailedit,$passwordedit,$typeedit,$descriptionedit,$age){
		    $c = 1;
			$this->load->helper('security');
			$querystr = 'UPDATE users SET';
			if ($useredit != ''){
				$return = "Datele modificate sunt: ";
				if ($emailedit != ''){
					if ($c != 1){
						$querystr  = $querystr.',';
						$return = $return.', ';
					}
					$querystr  = $querystr.' email="'.$emailedit.'"';
					$return = $return.' email';
					$c = $c +1;
				}
				if ($teledit != ''){
					if ($c != 1){
						$querystr  = $querystr.', ';
						$return = $return.', ';
					}
					$querystr  = $querystr.' phone_number="'.$teledit.'"';
					$return = $return.'  numar de telefon';
					$c = $c +1;
				}
				if ($passwordedit != ''){
					if ($c != 1){
						$querystr  = $querystr.',';
						$return = $return.', ';
					}
					$pass = do_hash($passwordedit, 'md5');
					$querystr  = $querystr.' password="'.$pass.'"';
					$return = $return.'  parola';
					$c = $c +1;
				}
				if ($descriptionedit != ''){
					if ($c != 1){
						$querystr  = $querystr.', ';
						$return = $return.', ';
					}
					$querystr  = $querystr.' description="'.$descriptionedit.'"';
					$return = $return.'  descriere';
					$c = $c +1;
				}
				if($age != '-'){
					$query = $this->db->query('SELECT id from age_category WHERE category="'.$age.'"');
					foreach($query->result() as $row)
					{    
						$ageid = $row->id;
					}
					if ($c != 1){
						$querystr  = $querystr.', ';
						$return = $return.', ';
					}
					$querystr  = $querystr.' age_id="'.$ageid.'"';
					$return = $return.'  categoria de varsta';
					$c = $c +1;
				}
				if ($typeedit != ''){
					if ($c != 1){
						$querystr  = $querystr.', ';
						$return = $return.', ';
					}
					$querystr  = $querystr.' type="'.$typeedit.'"';
					$return = $return.'.Tipul utilizatorului este de acum : ';
					if($typeedit == 'u')
						$return = $return.'utilizator';
					if($typeedit == 'a')
						$return = $return.'administrator';
				}
				$querystr  = $querystr.' WHERE username= "'.$useredit.'";';
				
 			}

			
			
			$query = $this->db->query($querystr); 
			return $return;
			
			
		}
	}
?>