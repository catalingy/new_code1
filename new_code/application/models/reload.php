<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class reload extends CI_Model{
		public function load($user,$nume,$search,$ord,$ustypes){
			$returns = "";
			$this->load->model('users_load');
			$array = $this->users_load->load($user,$nume,$search,$ord,$ustypes);
			$users = array_shift($array);
			$email = array_shift($array);
			$phone = array_shift($array);
			$type = array_shift($array);
			$description = array_shift($array);
			$age= array_shift($array);
			foreach($users as $data) 
			{
			    $returns = $returns.'<div style = "text-align: left;" class = "btn btn-info big namepopover" data-pop="true" data-html=true data-content="'.'Email: '.array_shift($email).'<br> Număr telefon: '.array_shift($phone).'<br> Categorie varsta: '.array_shift($age).' ani<br>Descriere: '.array_shift($description);
				if(array_shift($type) == 'u') 
						 $returns = $returns.'<br>Tipul: utilizator';
				else 
						$returns = $returns.'<br>Tipul: administrator';
				$returns = $returns.'">'.$data.'<a href = "#edituser" onclick = "edit(this)" id = "'.$data.'" data-toggle = "modal" class = "btn btn-primary pull-right" title = "Editare"></a></div><br><br>';} 
		
			return $returns;
		}
	}
?>