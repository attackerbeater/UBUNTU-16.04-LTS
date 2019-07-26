<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Merchant extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';
			$this->load->view('include/header',$data);
			$this->load->view('include/nav');

			$this->load->model('MerchantModel');
			$data['merchantnames'] = $this->MerchantModel->getMerchantNames();


			$this->load->view('merchant_view',$data);
			$this->load->view('include/footer');
		}else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}

	}

	public function processMerchant()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->saveMerchant();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayMerchants()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->getMerchants();
		echo json_encode($result);
	}

	public function liveSearchMerchants()
	{
		$this->load->model('MerchantModel');
		$search=  $this->input->post('search');
		$query = $this->MerchantModel->getMerchantByLiveSearch($search);
		echo json_encode ($query);
	}

	public function destroyMerchant()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->deleteMerchant();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function EditMerchant($merchant_id)
	{
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';


			$this->load->model('MerchantModel');
			$data['merchant'] = $this->MerchantModel->getMerchantInfo($merchant_id);
			$data['types'] = $this->MerchantModel->getMerchantTypes();

			$data['levels'] = $this->MerchantModel->getMerchantLevels();

			$this->load->model('MallModel');
			$data['malls']= $this->MallModel->getMalls();

			$this->load->model('CountryModel');
			$data['countries'] = $this->CountryModel->getCountries();



			$this->load->model('CompanyModel');
			$data['companies']= $this->CompanyModel->getCompanies();

			$data['comp'] = $this->CompanyModel->getMerchantCompany($merchant_id);

			$data['image'] = $this->MerchantModel->getMerchantImage($merchant_id);



			for($i = 1; $i <= 5; $i++){
				$data['image_count'][$i] = $this->MerchantModel->getMerchantImagePromo($merchant_id,$i);
			}

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('edit_merchant_view',$data);
			$this->load->view('include/footer');
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
	}

	public function displayMerchantNames()
	{

		$this->load->model('MerchantModel');

		$result = $this->MerchantModel->getMerchantNames();

		echo json_encode($result);
	}

	public function processEditMerchant()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateMerchant();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function addImageToMerchant($merchant_image_id)
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
			        	$this->load->model('MerchantModel');
			        	$this->MerchantModel->uploadImageToMerchant($merchant_image_id,$filename);

			       	}

			 }
	}

	public function addImagePromo($merchant_id,$promo_id,$count)
	{
		if ( !empty($_FILES)) {

			 		// $path = FCPATH.'assets\images\uploads\\';
			 	 	$config['upload_path']          = './promos';
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
			        	$this->load->model('MerchantModel');
			        	$this->MerchantModel->uploadImageToMerchantPromo($merchant_id,$promo_id,$count,$filename);

			       	}

			 }
	}

	public function addImageToMerchantMain($merchant_id)
	{
		if ( !empty($_FILES)) {

			 		// $path = FCPATH.'assets\images\uploads\\';
			 	 	$config['upload_path']          = './main';
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
			        	$this->load->model('MerchantModel');
			        	$this->MerchantModel->uploadImageToMerchantMain($merchant_id,$filename);

			       	}

			 }
	}

	public function addImageToMerchantMainLocation($merchantLoc_id)
	{
		if ( !empty($_FILES)) {

			 		// $path = FCPATH.'assets\images\uploads\\';
			 	 	$config['upload_path']          = './main_merchant';
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
			        	$this->load->model('MerchantModel');
			        	$this->MerchantModel->uploadImageToMerchantMainLoc($merchantLoc_id,$filename);

			       	}

			 }
	}


	public function destroMerchantImagePromo()
	{
			$this->load->model('MerchantModel');
			$result = $this->MerchantModel->deleteMerchantImagePromo();

			$msg['success'] = false;
			if ($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
	}


	public function destroMerchantImage()
	{
			$this->load->model('MerchantModel');
			$result = $this->MerchantModel->deleteMerchantImage();

			$msg['success'] = false;
			if ($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
	}

	public function destroMerchantImageMain()
	{
			$this->load->model('MerchantModel');
			$result = $this->MerchantModel->deleteMerchantImageMain();

			$msg['success'] = false;
			if ($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
	}

	public function destroMerchantImageMainLoc()
	{
			$this->load->model('MerchantModel');
			$result = $this->MerchantModel->deleteMerchantImageMainLoc();

			$msg['success'] = false;
			if ($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
	}

	public function processContact()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->saveMerchantContact();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayContacts()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->getMerchantContacts();
		echo json_encode($result);
	}

	public function destroyContact()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->deleteMerchantContact();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function destroyLocation()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->deleteMerchantLocation();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function getContact()
	{

		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->getSpecificContact();
		echo json_encode($result);

	}

	public function getLocation()
	{

		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->getSpecificLocation();
		echo json_encode($result);

	}

	public function processContactEdit()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateContact();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processLocationEdit()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateLocation();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processLocation()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->saveMerchantLocation();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayLocations()
	{
		$this->load->model('MerchantModel');

		$result = $this->MerchantModel->getMerchantLocation();

		echo json_encode($result);
	}

	public function EditMerchantLocation($merchantLocation_id, $merchant_id, $mall_id)
	{

		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';
			$this->load->view('include/header',$data);
			$this->load->view('include/nav');

			$this->load->model('MallModel');
			$data['malls']= $this->MallModel->getMalls();

			$this->load->model('MerchantModel');
			$data['merchant_info'] = $this->MerchantModel->getMerchantLocationInfo($merchantLocation_id);

			$data['images'] = $this->MerchantModel->getLocationImages($merchantLocation_id);

			$data['levels'] = $this->MerchantModel->getMerchantLevels();
			$data['promos'] = $this->MerchantModel->getPromos($merchant_id);

			$this->load->view('edit_merchant_location',$data);
			$this->load->view('include/footer');
		}else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}

	}

	public function addImageToMerchantLocation($merchant_image_id)
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
			        	$this->load->model('MerchantModel');
			        	$this->MerchantModel->uploadImageToMerchantLocation($merchant_image_id,$filename);

			       	}

			 }
	}


	public function destroyMerchantLocationImage()
	{
			$this->load->model('MerchantModel');
			$result = $this->MerchantModel->deleteMerchantLocationImage();

			$msg['success'] = false;
			if ($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
	}

	public function processMerchantType()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->saveMerchantType();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayMerchantTypes()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->getMerchantTypes();
		echo json_encode($result);
	}

	public function destroyMerchantType()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->deleteMerchantType();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function getMerchantType()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->getSpecificMerchantType();
		echo json_encode($result);
	}

	public function processMerchantTypeEdit()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateMerchantType();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


	public function processMerchantPromo()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->saveMerchantPromo();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayMerchantPromo()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->getMerchantPromo();
		echo json_encode($result);
	}

	public function destroyMerchantPromo()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->deleteMerchantPromo();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

		public function EditPromo($promo_id)
	{

		

		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';

			$this->load->model('MerchantModel');
			$data['promo'] = $this->MerchantModel->getPromoInfo($promo_id);
			$data['dow'] = $this->MerchantModel->getPromoDOW($promo_id);

			$this->load->model('TagTypesModel');
			$data['tags']= $this->TagTypesModel->getTagType();

			for($i = 1; $i <= 5; $i++){
				$data['image_count'][$i] = $this->MerchantModel->getMerchantImagePromo($promo_id,$i);
			}

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('edit_merchant_promo_view',$data);
			$this->load->view('include/footer');
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}


	}


		public function processEditMerchantProm()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->processEditMerchantProm();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processPromoMerchant()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updatePromoMerchant();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayPromoMerchant()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->getPromoMerchant();
		echo json_encode($result);
	}


	public function destroyPromoMerchant()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->deletePromoMerchant();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function EditPromoMerchant($po_id, $promo_id)
	{
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';


			$this->load->model('MerchantModel');
			$data['pm_info'] = $this->MerchantModel->getPromoMerchantInfo($po_id);

			$data['image_count'] = $this->MerchantModel->getMerchantImagePromo2($promo_id,1);

			$this->load->model('TagTypesModel');
			$data['tags']= $this->TagTypesModel->getTagType();

			$data['tags_added']= $this->MerchantModel->getPromoTagType($po_id);

			$data['promo'] = $this->MerchantModel->getPromoInfo($promo_id);


			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('edit_promo_merchant_view',$data);
			$this->load->view('include/footer');
			//print_r($data);
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
	}

	public function processEditPromoMerchantInfo()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->EditPromoMerchantInfo();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processPromoTagType()
	{

		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->savePromoTagType();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayPromoTagType()
	{

		$this->load->model('MerchantModel');

		$result = $this->MerchantModel->getPromoTagType();

		echo json_encode($result);
	}

		public function destroyPromoTagType()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->deletePromoTagType();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

 	public function processMerchantDeal()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->saveMerchantDeals();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


	public function displayMerchantDeals()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->getMerchantDeals();
		echo json_encode($result);
	}

	public function destroyMerchantDeals()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->deleteMerchantDeals();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


	public function EditMerchantDeal($dm_id)
	{
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';


			$this->load->model('MerchantModel');
			$data['dm_info'] = $this->MerchantModel->getDealMerchantInfo($dm_id);

			for($i = 1; $i <= 3; $i++){
				$data['image_count'][$i] = $this->MerchantModel->getMerchantImageDeal($dm_id,$i);
			}

			$this->load->model('TagTypesModel');
			$data['tags']= $this->TagTypesModel->getTagType();


			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('edit_deal_master_view',$data);
			$this->load->view('include/footer');
			//print_r($data);
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
	}

	public function processEditMerchantDeal()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateDeal();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}



	public function addImageDeal($dm_id,$count)
	{
		if ( !empty($_FILES)) {

			 		// $path = FCPATH.'assets\images\uploads\\';
			 	 	$config['upload_path']          = './deal_images';
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
			        	$this->load->model('MerchantModel');
			        	$this->MerchantModel->uploadImageToMerchantDeal($dm_id,$count,$filename);

			       	}

			 }
	}

	public function destroyMerchantImageDeal()
	{
			$this->load->model('MerchantModel');
			$result = $this->MerchantModel->deleteMerchantImageDeal();

			$msg['success'] = false;
			if ($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
	}

	public function processDealTagType()
	{

		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->saveDealTagType();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayDealTagType()
	{

		$this->load->model('MerchantModel');

		$result = $this->MerchantModel->getDealTagType();

		echo json_encode($result);
	}

	public function destroyDealTagType()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->deleteDealTagType();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processMerchantPromoTagType()
	{

		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->saveMerchantPromoTagType();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayMerchantPromoTagType()
	{

		$this->load->model('MerchantModel');

		$result = $this->MerchantModel->getMerchantPromoTagType();

		echo json_encode($result);
	}

	public function destroyMerchantPromoTagType()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->deleteMerchantPromoTagType();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processActive()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateActive();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processFeatured()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateFeatured();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processLive()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateLive();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processFeaturedPromo()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateFeaturedPromo();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


public function processRedeem()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateRedeem();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processPrimaryTag()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updatePrimaryTag();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayMerchantPromoOutlets()
	{

		$this->load->model('MerchantModel');

		$result = $this->MerchantModel->getMerchantPromoOutlets();

		echo json_encode($result);
	}

	public function processMonday()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateMonday();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processTuesday()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateTuesday();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processWednesday()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateWednesday();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processThursday()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateThursday();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processFriday()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateFriday();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processSaturday()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateSaturday();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processSunday()
	{
		$this->load->model('MerchantModel');
		$result = $this->MerchantModel->updateSunday();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}
