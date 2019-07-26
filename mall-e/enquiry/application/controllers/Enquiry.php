<?php 
	
defined('BASEPATH') OR exit('No direct script access allowed');


class Enquiry extends CI_Controller
{
	
	public function index()
	{
		$data['title'] = 'Enquiry | Mall-E';

		$this->load->model('EnquiryModel');

		$data['countries'] = $this->EnquiryModel->getCountry();
		$this->load->view('enquiry_view',$data);
	}

	public function sendEnquiry()
	{
		$sender = $this->input->post('email');
		$merchant = $this->input->post('m_name');
		$name = $this->input->post('name');
		$country = $this->input->post('country');
		$number = $this->input->post('number');


		$data['sender'] = $sender;
		$data['merchant'] = $merchant;
		$data['name'] = $name;
		$data['country'] = $country;
		$data['number'] = $number;

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
		$this->email->to('inquiry.themallenet@gmail.com');

		$this->email->subject('New Enquiry from '.$name.' ,'.$country);

		

		$body = $this->load->view('emails/email_send',$data,TRUE);
		$this->email->message($body);

		if ($this->email->send()) {


			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.googlemail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'inquiry.themallenet@gmail.com',
			    'smtp_pass' => '@malle1234',
			    'mailtype' => 'html',
			    'charset'   => 'iso-8859-1',
			    'wordwrap' => TRUE
			);


				$this->email->initialize($config);

				$this->email->set_newline("\r\n");


				$this->email->from('inquiry.themallenet@gmail.com','MallE Enquiry');
				$this->email->to($sender);

				$this->email->subject('Enquiry Reponse');

				

				$body = $this->load->view('emails/email_reply',$data,TRUE);
				$this->email->message($body);

				if ($this->email->send()) {

					$this->load->model('EnquiryModel');

					$res = $this->EnquiryModel->saveEnquiry();


					$this->session->set_flashdata('emailsent','Enquiry successfully sent.');
					redirect(base_url());
				}else{
					$this->session->set_flashdata('emailnotsent','Unable to send enquiry.');
					redirect(base_url());
				}


				
		}else{
			$this->session->set_flashdata('emailnotsent','Unable to send enquiry.');
			redirect(base_url());
		}




	}
}