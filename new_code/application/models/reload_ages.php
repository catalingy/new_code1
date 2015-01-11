<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class reload_ages extends CI_Model{
		public function reload(){
			$ret = "";
			$this->load->model('age_category_load');
			$ages = $this->age_category_load->load();
			foreach($ages as $age) {
				$ret = $ret.'<input type="radio" name = "age_category_radio" value="'.$age.'"> '.$age.' ani   <button class = "btn btn-default" onclick="delete_age(this.name)" name="'.$age.'">X</button></input><br>';
			}
			return $ret;
		}
	}
?>