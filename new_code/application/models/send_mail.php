
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class send_mail extends CI_Model{
		public function send_email($user,$mail)
		{
			
			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.mail.yahoo.com',
				'smtp_port' => 465,
				'smtp_user' => 'catalingy@yahoo.com',
				'smtp_pass' => '0365@800');
				$this->load->library('email',$config);
				$this->email->set_newLine("\r\n");
				$this->email->from('catalingy@yahoo.com');
				$this->email->to($mail);
				$this->email->subject("Password recover!");
				$this->load->model("random_password");
				$password = $this->random_password->get_password();
				$this->email->message("You have received a temporary password for the user ".$user." : \n\n"."Your new password is: ".$password."\n\n"." Click the link below to change your password \n\n"."http://www.google.ro");
				if ($this->email->send()){
					return "Your new pasword was sent!";
				}else {
					return "Your new pasword was not sent!";
				}
		}
	}
?>