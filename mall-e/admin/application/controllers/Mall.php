<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mall extends CI_Controller
{
	
	public function index()
	{	
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';


			$this->load->model('CityModel');
			$data['cities'] = $this->CityModel->getCityForSelect();

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('home_view',$data);
			$this->load->view('include/footer');
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
		
	}

	public function displayMalls()
	{
		$this->load->model('MallModel');
		$result = $this->MallModel->getMalls();
		echo json_encode($result);
	}
	
	public function liveSearchMalls()
	{
		$this->load->model('MallModel');		
		$search=  $this->input->post('search');
		$query = $this->MallModel->getMallByLiveSearch($search);
		echo json_encode ($query);	
	}

	public function processMall()
	{
		$this->load->model('MallModel');
		$result = $this->MallModel->saveMall();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);

	}

	public function destroyMall()
	{
		$this->load->model('MallModel');
		$result = $this->MallModel->deleteMall();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function EditMall($mall_id)
	{
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';


			$this->load->model('MallModel');
			$data['mall'] = $this->MallModel->getMallInfo($mall_id);
			$data['mall_images'] = $this->MallModel->getMallImages($mall_id);



			$this->load->model('MallTypeModel');
			$data['malltypes'] = $this->MallTypeModel->getMallType();

			$this->load->model('CountryModel');
			$data['countries'] = $this->CountryModel->getCountries();

			$this->load->model('CityModel');
			$data['cities'] = $this->CityModel->getCitiesWithCountry();

			$this->load->model('TownModel');
			$data['towns'] = $this->TownModel->getTownWithCity();
			
			for($i = 1; $i <= 5; $i++){
				$data['image_count'][$i] = $this->MallModel->getMallEvents($mall_id,$i);
			}

			for($i = 1; $i <= 3; $i++){
				$data['image_parking'][$i] = $this->MallModel->getMallParkingImg($mall_id,$i);
			}

			for($i = 1; $i <= 5; $i++){
				$data['image_offers'][$i] = $this->MallModel->getMallOfferImg($mall_id,$i);
			}
			
			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('edit_mall_view',$data);
			$this->load->view('include/footer');
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
	}

	public function processEditMall()
	{
		$this->load->model('MallModel');
		$result = $this->MallModel->updateMall();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function addImageEvent($mall_id,$count)
	{
		if ( !empty($_FILES)) {

			 		// $path = FCPATH.'assets\images\uploads\\';
			 	 	$config['upload_path']          = './events';
			        $config['allowed_types']        = 'gif|jpg|png|jpeg';
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
			        	$this->load->model('MallModel');
			        	$this->MallModel->uploadImageToMerchantEvent($mall_id,$count,$filename);

			       	}

			 }
	}
		public function addImageToMall($mall_image_id)
		{
				if ( !empty($_FILES)) {

			 		// $path = FCPATH.'assets\images\uploads\\';
			 	 	$config['upload_path']          = './uploads';
			        $config['allowed_types']        = 'gif|jpg|png|jpeg';
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
			        	$this->load->model('MallModel');
			        	$this->MallModel->uploadImageToMall($mall_image_id,$filename);

			       	}

			 }
		}
		
		public function addMallLogo($mall_id)
		{
				if ( !empty($_FILES)) {

			 		// $path = FCPATH.'assets\images\uploads\\';
			 	 	$config['upload_path']          = './mall_photos';
			        $config['allowed_types']        = 'gif|jpg|png|jpeg';
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
			        	$this->load->model('MallModel');
			        	$this->MallModel->uploadImageToMallLogo($mall_id,$filename);

			       	}

			 }
		}

		public function destroyMallImage()
		{
			$this->load->model('MallModel');
			$result = $this->MallModel->deleteMallImage();

			$msg['success'] = false;
			if ($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}
		
		
		public function destroMallImageEvent()
		{
			$this->load->model('MallModel');
			$result = $this->MallModel->destroMallImageEvent();

			$msg['success'] = false;
			if ($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}
	
	
		
		public function destroyMallImageLogo()
		{
			$this->load->model('MallModel');
			$result = $this->MallModel->deleteMallImageLogo();

			$msg['success'] = false;
			if ($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}

		public function addImageParking($mall_id,$count)
	{
		if ( !empty($_FILES)) {

			 		// $path = FCPATH.'assets\images\uploads\\';
			 	 	$config['upload_path']          = './parking_images';
			        $config['allowed_types']        = 'gif|jpg|png|jpeg';
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
			        	$this->load->model('MallModel');
			        	$this->MallModel->uploadImageToParking($mall_id,$count,$filename);

			       	}

			 }
	}

	public function destroMallImageParking()
		{
			$this->load->model('MallModel');
			$result = $this->MallModel->destroMallImageParking();

			$msg['success'] = false;
			if ($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}

		public function addImageOffer($mall_id,$count,$user_id,$offer_id)
	{
		if ( !empty($_FILES)) {

			 		// $path = FCPATH.'assets\images\uploads\\';
			 	 	$config['upload_path']          = './offer_images';
			        $config['allowed_types']        = 'gif|jpg|png|jpeg';
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
			        	$this->load->model('MallModel');
			        	$this->MallModel->uploadImageToOffer($mall_id,$count,$filename,$user_id,$offer_id);

			       	}

			 }
	}
	public function destroMallImageOffer()
		{
			$this->load->model('MallModel');
			$result = $this->MallModel->destroyMallImageOffer();

			$msg['success'] = false;
			if ($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}

		public function processMallActive()
	{
		$this->load->model('MallModel');
		$result = $this->MallModel->updateMallActive();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processMallFeatured()
	{
		$this->load->model('MallModel');
		$result = $this->MallModel->updateMallFeatured();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	
		
		
}