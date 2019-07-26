<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Town extends CI_Controller
{
	
	public function index()
	{
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';

			$this->load->model('CityModel');
			$data['cities'] = $this->CityModel->getCityForSelect();

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('manage_town_view',$data);
			$this->load->view('include/footer');
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
	}

	public function displayTowns()
	{
		$this->load->model('TownModel');
		$result = $this->TownModel->getTownWithCity();
		echo json_encode($result);
	}

	public function processTown()
	{
		$this->load->model('TownModel');
		$result = $this->TownModel->saveTown();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function destroyTown()
	{
		$this->load->model('TownModel');
		$result = $this->TownModel->deleteTown();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayTownByCity()
	{
		$this->load->model('TownModel');
		$result = $this->TownModel->getTownByCity();
		echo json_encode($result);
	}
	
}