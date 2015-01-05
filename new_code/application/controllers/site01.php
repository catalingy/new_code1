<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$type = '';
class site01 extends CI_Controller {

	
	public function index()
	{
		$this->login();
	}
	public function login()
	{
		$data["title"] = "First site | Pagina de logare";
		$this->load->view("login_page", $data);
	}
	
	public function validation()
	{
		$this->form_validation->set_rules('user', 'Numele de utilizator','required');
		$this->form_validation->set_rules('password', 'Parola','required|callback_userValidation');
		
		if($this->form_validation->run() == false)
		{
			$this->login();
		}
		else 
		{
			$data["title"] = "First site | Home";
			$data["nume"] = $this->input->post('user');
			$data['type'] = $GLOBALS['type'];
			$this->load->model('users_load');
			$data['users'] = $this->users_load->load($GLOBALS['type'],$this->input->post('user'));
			$this->load->view("home_page", $data);
		}
	}
	public function userValidation(){
		$this->load->model('login_validation');
		$name = $this->input->post('user');
		$password = $this->input->post('password');
		$case = $this->login_validation->validate($name,$password);
		if ($case == '0'){
				$this->form_validation->set_message('userValidation','Numele de utilizator sau parola sunt incorecte! Incercati din nou.');
				return FALSE;
				break;
		}
		else
		{
			$GLOBALS['type'] = $case;
			return TRUE;
			break;
		}
		
	}
	public function reset_pass(){
		$data["title"] = "First site | Pagina de logare";
		$this->load->model("send_mail");
		$data['messaje'] = $this->send_mail->send_email($_POST["userrec"],$_POST["emailrec"]);
		$this->load->view("login_page", $data);
	}
}
?>