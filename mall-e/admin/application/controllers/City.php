<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class City extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';

			$this->load->model('CountryModel');
			$data['countries'] = $this->CountryModel->getCountries();

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('manage_city_view',$data);
			$this->load->view('include/footer');
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
	}

	public function displayCities()
	{
		$this->load->model('CityModel');
		$result = $this->CityModel->getCitiesWithCountry();
		echo json_encode($result);
	}

	public function processCity()
	{
		$this->load->model('CityModel');
		$result = $this->CityModel->saveCity();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function destroyCity()
	{
		$this->load->model('CityModel');
		$result = $this->CityModel->deleteCity();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayCitiesByCountry()
	{
		$this->load->model('CityModel');
		$result = $this->CityModel->getCitiesByCountry();
		echo json_encode($result);
	}
	
}