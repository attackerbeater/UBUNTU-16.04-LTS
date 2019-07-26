<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller
{
	
	public function index()
	{	
		if ($this->session->userdata('user')) {
			redirect(base_url('mall'));
		}else{
			$data['title'] = 'Mall-E - Login';
			$this->load->view('include/header',$data);
			$this->load->view('login_view',$data);
			$this->load->view('include/footer');
		}
	}

	public function validate_login()
	{
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');

		$user = null;

		if ($this->form_validation->run()) {
			$this->load->model('AccountModel');
			$user = $this->AccountModel->validate_user();
		}

		if ($user) {
			$this->session->set_userdata('user',$user);
			redirect(base_url('mall'));
		}
		else{
			$this->session->set_flashdata('invalid_login','Invalid login. Please try again.');
			redirect(base_url());
		}
		

	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect(base_url());
	}

	public function forgotPassword()
	{

		$this->load->model('AccountModel');
		$is_exist = $this->AccountModel->isEmailExist();

		if ($is_exist) {
			
			$receiver = $this->input->post('email_fp');

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


					
			$this->email->from('themallenet@gmail.com','Mall E');
			$this->email->to($receiver);

			$this->email->subject('Mall-E Password Recovery');


			$new_password = $this->AccountModel->changePassword();


			$data['new_password'] = $new_password;
			$body = $this->load->view('emails/email_view_template',$data,TRUE);
			$this->email->message($body);

			if ($this->email->send()) {
				$this->session->set_flashdata('emailsent','Email successfully sent. Please check your email.');
				redirect(base_url());
			}else{
				$this->email->print_debugger();
				$this->session->set_flashdata('emailnotsent','Unable to send email.');
				redirect(base_url());
			}

		}else{
			$this->session->set_flashdata('email','Email not recognized.');
			redirect(base_url());
		}

		


	}
}