<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Shopper extends CI_Controller

{
	

	

	public function index()

	{	

		$data['title'] = 'Shopper - Mall-E';

		$this->load->model('Home_model');
		$data['countries'] = $this->Home_model->getCountries();

		$this->load->view('shopper_view',$data);
	}
	public function login()

	{	

		$data['title'] = 'Registered Shopper - Mall-E';

		//$this->load->model('Home_model');
		//$data['countries'] = $this->Home_model->getCountries();

		$this->load->view('shopper_login_view',$data);
	}
	
	public function newregistration()

	{	

		$data['title'] = 'Registered Shopper - Mall-E';

		$this->load->model('Home_model');
		$data['countries'] = $this->Home_model->getCountries();

		$this->load->view('shopper_registration',$data);
	}
	
	
	public function success()

	{	

		$data['title'] = 'Registered Shopper - Mall-E';

		$this->load->view('shopper_success',$data);
	}
	
	public function otp()

	{	

		$data['title'] = 'Registered Shopper - Mall-E';

		//$this->load->model('Home_model');
		//$data['countries'] = $this->Home_model->getCountries();

		$this->load->view('shopper_otp_view',$data);
	}
	
	public function logout()

	{	

		$this->session->sess_destroy();
		redirect(base_url('shopper'));
	}
	

	public function processLogin()
	{
		
		$email = $this->input->post('email');
		
		

		

		
			$data = array();
			
			$this->load->model('Home_model');
			$arr = $this->Home_model->loginShopper($email);
			//var_export($arr);
			//exit();
			
			if($arr){
				$data['name'] = $arr[0]->Shopper_name;
				$data['sender'] = $email;
				$data['code'] = $this->generateRandomString();
				$res = $this->Home_model->updateShopper($email,$data['code']);
				
				if($res){
					
					$data['id'] = $res;
					
					$config = Array(
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.googlemail.com',
						'smtp_port' => 465,
						'smtp_user' => 'themallenet@gmail.com',
						'smtp_pass' => '@malle1234',
						'mailtype' => 'html',
						'charset'   => 'iso-8859-1',
						'wordwrap' => TRUE
					);

					$this->email->initialize($config);
		
					$this->email->set_newline("\r\n");
		
		
					$this->email->from('no-reply@mall-e.net','Mall-e Login Code');
					$this->email->to($email);
		
					$this->email->subject('4 Digit Login Code');

					$body = $this->load->view('emails/email_code',$data,TRUE);
					
					$this->email->message($body);
					
					if ($this->email->send()) {
						$this->session->set_userdata('email_login',$email);
						redirect(base_url('shopper/otp'));
						
					}else{
							$this->session->set_flashdata('emailnotsent','Email is not registered.');
							redirect(base_url('shopper/login'));
					}
				}
				else{
							$this->session->set_flashdata('emailnotsent','Email is not registered.');
							redirect(base_url('shopper/login'));
				}
			}else{
				
					$this->session->set_userdata('email_login',$email);
					redirect(base_url('shopper/newregistration'));
			}
			
	}

	public function processOTP()
	{
		
		$otp = $this->input->post('Otp');
		$email = $this->session->userdata('email_login');
		

		

		
		$data = array();
			
		$this->load->model('Home_model');
		$arr = $this->Home_model->loginShopper($email);
		//var_export($arr);
		//exit();
			
		if($arr[0]->Otp == $otp){
			$this->session->set_userdata('name_login',$arr[0]->Shopper_name);	
			$this->session->set_userdata('last_login',date('M d, Y, h:i a'));	
			redirect(base_url('shopper/success'));
		}
		else{
			$this->session->set_flashdata('emailnotsent','Email is not registered.');
			redirect(base_url('shopper/login'));
		}
			
	}

	function generateRandomString($length = 4) {
		$characters = '0123456789';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	

	public function sendEmail()
	{
		$name = $this->input->post('yourname');
		$mobile = $this->input->post('number');
		$country = $this->input->post('country');
		$email = $this->input->post('email');
		$gender = $this->input->post('gender');
		if($gender == 0)
		$gender= 'Male';
		else
		$gender = 'Female';
		
		$data['name'] = $name;
		$data['gender'] = $gender;
		$data['number'] = $mobile;
		$data['country'] = $country;
		$data['sender'] = $email;

		

		
			
			$this->load->model('Home_model');
			$res = $this->Home_model->saveShopper();
			
			if($res){
				
				$data['id'] = $res;
				
				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'themallenet@gmail.com',
					'smtp_pass' => '@malle1234',
					'mailtype' => 'html',
					'charset'   => 'iso-8859-1',
					'wordwrap' => TRUE
				);

				$this->email->initialize($config);
	
				$this->email->set_newline("\r\n");
	
	
				$this->email->from('no-reply@mall-e.net','MallE Enquiry');
				$this->email->to($email);
	
				$this->email->subject('Successfully Registered');

				$body = $this->load->view('emails/email_reply',$data,TRUE);
				
				$this->email->message($body);
				
				if ($this->email->send()) {
					
					//send to admin
					
						$this->email->set_newline("\r\n");
				
						$this->email->from('no-reply@mall-e.net','Mall E');
						$this->email->to('admin@mall-e.net');
				//		$this->email->to('tapzbraiel@gmail.com');
				
						$this->email->subject('Shopper # '.$mobile.' ,'.$name.' ,'.$country);
				
						$body = $this->load->view('emails/email_send',$data,TRUE);
						$this->email->message($body);
						
						if ($this->email->send()) {
							$this->session->set_flashdata('emailsent','Successfully registered.');
							redirect(base_url('Shopper'));
						}
						else{
							$this->session->set_flashdata('emailnotsent','Unable to register.');
							redirect(base_url('Shopper'));
						}
						
	
	
				}else{
						$this->session->set_flashdata('emailnotsent','Unable to register.');
						redirect(base_url('Shopper'));
				}
			}
			else{
						$this->session->set_flashdata('emailnotsent','Unable to register.');
						redirect(base_url('Shopper'));
			}
	}


	

}