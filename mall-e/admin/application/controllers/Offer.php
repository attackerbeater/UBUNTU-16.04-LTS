<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Controller
{
	
	public function processOffer()
	{
		$this->load->model('OfferModel');
		$result = $this->OfferModel->saveMallOffer();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayOffer()
	{
		$this->load->model('OfferModel');
		$result = $this->OfferModel->getMallOffer();
		echo json_encode($result);
	}

	public function destroyOffer()
	{
		$this->load->model('OfferModel');
		$result = $this->OfferModel->deleteMallOffer();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function getOffer()
	{
		
		$this->load->model('OfferModel');
		$result = $this->OfferModel->getSpecificOffer();
		echo json_encode($result);

	}

		public function EditOffer($offer_id)
	{
		

		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';

			$this->load->model('OfferModel');
			$data['offers'] = $this->OfferModel->getOfferInfo($offer_id);

			$this->load->model('MallModel');
			for($i = 1; $i <= 5; $i++){
				$data['image_offers'][$i] = $this->MallModel->getMallOfferImg($offer_id,$i);
			}
			

	 
			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('edit_offfer_view',$data);
			$this->load->view('include/footer'); 
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}


	}

		public function processOfferEdit()
	{
		$this->load->model('OfferModel');
		$result = $this->OfferModel->updateOffer();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}




	public function processFeatured()
	{
		$this->load->model('OfferModel');
		$result = $this->OfferModel->updateFeatured();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processLive()
	{
		$this->load->model('OfferModel');
		$result = $this->OfferModel->updateLive();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}