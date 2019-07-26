<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiry extends CI_Controller
{
	
	public function index()
	{	
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';

			$this->load->model('InquiryModel');
			$data['inquiries'] = $this->InquiryModel->getInquirues();

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('inquiry_view',$data);
			$this->load->view('include/footer');
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
		
	}


}