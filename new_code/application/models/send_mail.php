
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class send_mail extends CI_Model{
		public function send_email($user,$mail)
		{
			$query = $this->db->query('Select username,email from users where username="'.$user.'" and email="'.$mail.'"');
			if ($query->num_rows() == 1){
				$this->load->helper('security');
				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.mail.yahoo.com',
					'smtp_port' => 465,
					'smtp_user' => 'catalingy@yahoo.com',
					'smtp_pass' => '0365@800'
					);
					$this->load->library('email',$config);
					$this->email->set_newLine("\r\n");
					$this->email->from('catalingy@yahoo.com');
					$this->email->to($mail);
					$this->email->subject("Password recover!");
					$this->load->model("random_password");
					$password = $this->random_password->get_password();
					$passhash = do_hash($password, 'md5');
					$query = $this->db->query('UPDATE users SET password ="'.$passhash.'" WHERE username ="'.$user.'";');
					$this->email->message("Ati primit o noua parola in urma cereri dumneavoastra ".$user." : \n\n"."Parola dumneavoastra este: ".$password);
					if ($this->email->send()){
						return "Parola de resetare a fost trimisa!";
					}else {
						return "A aparut o problema la trimiterea mail-ului!";
					}
			}
			else
			{
				return 'Nu a fost gasit un utilizator cu numele si emailul introduse';
			}
		}
	}
?>