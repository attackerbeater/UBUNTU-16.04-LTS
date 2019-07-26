<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Country extends CI_Controller
{
	
	public function index()
	{
		
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('manage_country_view',$data);
			$this->load->view('include/footer');
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
	}

	public function displayCountries()
	{
		$this->load->model('CountryModel');
		$result = $this->CountryModel->getCountries();
		echo json_encode($result);
	}

	public function processCountry()
	{
			
		$this->load->model('CountryModel');
		$result = $this->CountryModel->saveCountry();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);

	}

	public function destroyCountry()
	{
		$this->load->model('CountryModel');
		$result = $this->CountryModel->deleteCountry();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
}