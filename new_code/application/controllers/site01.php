<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$type = '';
$name = '';
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
			$GLOBALS['name'] = $data["nume"];
			$data['type1'] = $GLOBALS['type'];
			$this->load->model('users_load');
			$array = $this->users_load->load($GLOBALS['type'],$this->input->post('user'),'','asc','all');
			$data['users'] = array_shift($array);
			$data['email'] = array_shift($array);
			$data['phone'] = array_shift($array);
			$data['type'] = array_shift($array);
			$data['description'] = array_shift($array);
			$data['age'] = array_shift($array);
			$this->load->model('age_category_load');
			$ages = $this->age_category_load->load();
			$data['ages'] = $ages;
			$data['ageops'] = $ages;
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
	public function add(){
		$this->load->model("users_Add");
		echo $this->users_Add->add($_POST['useradd'],$_POST['teladd'],$_POST['emailadd'],$_POST['passwordadd'],$_POST['typeadd'],$_POST['descriptionadd'],$_POST['age']);
	}
	public function edit(){
		$this->load->model("users_Modify");
		if(isset($_POST['typeedit'])){
		    if($_POST['age'] != ''){
				echo $this->users_Modify->update($_POST['useredit'],$_POST['teledit'],$_POST['emailedit'],$_POST['passwordedit'],$_POST['typeedit'],$_POST['descriptionedit'],$_POST['age']);
			}
			else
			{
				echo $this->users_Modify->update($_POST['useredit'],$_POST['teledit'],$_POST['emailedit'],$_POST['passwordedit'],$_POST['typeedit'],$_POST['descriptionedit'],'');
			}
		}
		else {
			if($_POST['age'] != ''){
				echo $this->users_Modify->update($_POST['useredit'],$_POST['teledit'],$_POST['emailedit'],$_POST['passwordedit'],"",$_POST['descriptionedit'],$_POST['age']);
			}
			else
			{
				echo $this->users_Modify->update($_POST['useredit'],$_POST['teledit'],$_POST['emailedit'],$_POST['passwordedit'],"",$_POST['descriptionedit'],'');
			}
		}

	}
	public function reload(){
		$this->load->model("reload");
		if (isset($_POST['search'])){
			echo $this->reload->load($_POST['type'],$_POST['nume'],$_POST['search'],$_POST['ord'],$_POST['ustypes']);
		}
		else 
		{
			echo $this->reload->load($_POST['type'],$_POST['nume'],'',$_POST['ord'],$_POST['ustypes']);
		}

	}
	public function delete_user(){
		$this->load->model("delete_user");
		echo $this->delete_user->delete($_POST['name']);
	}
	public function add_age(){
		$this->load->model("add_age");
		echo $this->add_age->add($_POST['agecat']);
	}
	public function delete_age(){
		$this->load->model("delete_age");
		echo $this->delete_age->delete($_POST['agecat']);
	}
	public function reload_ages() {
		$this->load->model("reload_ages");
		echo $this->reload_ages->reload();
	}
}
?>