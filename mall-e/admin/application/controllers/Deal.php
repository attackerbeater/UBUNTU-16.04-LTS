<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Deal extends CI_Controller
{
	
	public function index()
	{	
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';

			$this->load->model('MerchantModel');
			$data['merchantnames'] = $this->MerchantModel->getMerchantNames();

			$this->load->model('MallModel');
			$data['malls']= $this->MallModel->getMalls();

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('deal_view',$data);
			$this->load->view('include/footer');
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
		
	}

	public function processDeal()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->saveDeal();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayDeals()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->getDeals();
		echo json_encode($result);
	}
	
	public function displayDealsbyMerchantMall()
	{
		$merchant_name = $this->input->post('merchant_name');
		$mall_name = $this->input->post('mall_name');
		$this->load->model('DealModel');
		$result = $this->DealModel->displayDealsbyMerchantMall($merchant_name, $mall_name);
		echo json_encode($result);
	}
	
	

	public function destroyDeal()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->deleteDeal();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processDealStatus()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->updateDealStatus();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	
	public function cloneDeal(){
		$this->load->model('DealModel');
		$result = $this->DealModel->cloneDeal();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	
	
	public function processDealFeature()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->updateDealFeatured();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function EditDeal($deal_master_id, $dm_id)
	{
		

		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';

			$this->load->model('DealModel');
			$data['deal'] = $this->DealModel->getDealInfo($deal_master_id);
			$data['dow'] = $this->DealModel->getDealDOW($dm_id);

			$this->load->model('MerchantModel');
			$data['merchantnames'] = $this->MerchantModel->getMerchantNames();

			$this->load->model('MallModel');
			$data['malls'] = $this->MallModel->getMalls();

			$this->load->model('SubCategoryModel');
			$data['subs'] = $this->SubCategoryModel->getSubCategories();

			

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('edit_deal_view',$data);
			$this->load->view('include/footer');
			//print_r($data['deal']);
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}


	}

	public function processEditDeal()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->updateDeal();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function addImageToDeal($dm_id, $count)
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
			        	$this->load->model('DealModel');
			        	$this->DealModel->uploadDealImage($dm_id,$filename,$count);

			       	}

			 }
	}

	public function destroyImage()
	{
			$this->load->model('DealModel');
			$result = $this->DealModel->deleteImage();

			$msg['success'] = false;
			if ($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
	}

		public function displayDealsMain()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->getDealsMain();
		echo json_encode($result);
	}

	public function displayDealsMainSpec()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->getDealsMainSpec();
		echo json_encode($result);
	}
	public function displayDealsMainImg()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->getMerchantImageDeal();
		echo json_encode($result);
	}

	public function displayDealTags()
	{ 

		$this->load->model('DealModel');

		$result = $this->DealModel->getDealTags();

		echo json_encode($result);
	}

	public function processMonday()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->updateMonday();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processTuesday()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->updateTuesday();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processWednesday()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->updateWednesday();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processThursday()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->updateThursday();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processFriday()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->updateFriday();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processSaturday()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->updateSaturday();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processSunday()
	{
		$this->load->model('DealModel');
		$result = $this->DealModel->updateSunday();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	



}