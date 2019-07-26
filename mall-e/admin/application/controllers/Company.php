<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller
{
	public function index()
	{	
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';


			$this->load->model('CityModel');
			$data['cities'] = $this->CityModel->getCityForSelect();

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('company_view',$data);
			$this->load->view('include/footer');
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
		
	}


	public function processCompany()
	{
		$this->load->model('CompanyModel');
		$result = $this->CompanyModel->saveCompany();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayCompanies()
	{
		$this->load->model('CompanyModel');
		$result = $this->CompanyModel->getAllCompanies();
		echo json_encode($result);
	}

	public function destroyCompany()
	{
		$this->load->model('CompanyModel');
		$result = $this->CompanyModel->deleteCompany();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function EditCompany($company_id)
	{
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';

			$this->load->model('CompanyModel');
			// $this->load->model('MerchantModel');
			// $data['merchant'] = $this->MerchantModel->getMerchantInfo($merchant_id);
			
			// $this->load->model('MallModel');
			// $data['malls']= $this->MallModel->getMalls();



			// $this->load->model('CompanyModel');
			// $data['companies']= $this->CompanyModel->getCompanies();

			// $data['comp'] = $this->CompanyModel->getMerchantCompany($merchant_id);

			$data['image'] = $this->CompanyModel->getCompanyImage($company_id);

			
			$data['company'] = $this->CompanyModel->getCompanyInfo($company_id);

			$this->load->model('CountryModel');
			$data['countries'] = $this->CountryModel->getCountries();

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('edit_company_view',$data);
			$this->load->view('include/footer');
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
	}

	public function processEditCompany()
	{
		$this->load->model('CompanyModel');
		$result = $this->CompanyModel->updateCompany();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function addImageToCompany($company_image_id)
	{
		if ( !empty($_FILES)) {

			 		// $path = FCPATH.'assets\images\uploads\\';
			 	 	$config['upload_path']          = './uploads';
			        $config['allowed_types']        = 'gif|jpg|png';
			        $config['encrypt_name']			= TRUE;
			        $config['max_size']             = 0;
			        $config['max_width']            = 0;
			        $config['max_height']           = 0;

			 	 	$this->load->library('upload', $config);

			 	 	if ( ! $this->upload->do_upload('file'))
			        {
			            echo "failed to upload file";
			        }
			        else
			        {	
			        	$filename = $this->upload->data('file_name');
			        	$this->load->model('CompanyModel');
			        	$this->CompanyModel->uploadImageToCompany($company_image_id,$filename);

			       	}

			 }
	}

	public function destroyCompanyImage()
	{
			$this->load->model('CompanyModel');
			$result = $this->CompanyModel->deleteCompanyImage();

			$msg['success'] = false;
			if ($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
	}


	public function processContact()
	{
		$this->load->model('CompanyModel');
		$result = $this->CompanyModel->saveCompanyContact();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayContacts()
	{
		$this->load->model('CompanyModel');
		$result = $this->CompanyModel->getCompanyContacts();
		echo json_encode($result);
	}
	
	public function destroyContact()
	{
		$this->load->model('CompanyModel');
		$result = $this->CompanyModel->deleteCompanyContact();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function getContact()
	{
		$this->load->model('CompanyModel');
		$result = $this->CompanyModel->getSpecificContact();
		echo json_encode($result);
	}

	public function processContactEdit()
	{
		$this->load->model('CompanyModel');
		$result = $this->CompanyModel->updateContact();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
}