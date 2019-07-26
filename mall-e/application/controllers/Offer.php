<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Offer extends CI_Controller

{
	public function __construct(){
		parent::__construct();
		$this->load->model('OfferModel', 'offer');
		$this->load->model('Home_model','home');
	}

	public function index()
	{	
		$data['title'] = 'Mall-E - Offers';		
		$country_id = $this->input->get('country');
		if($this->input->get('country'))
		$country_id = $this->input->get('country');
		else
		$country_id = 1;	
		$data['offers'] = $this->home->getOffers($country_id);
		$data['countries'] = $this->home->getOfferCountries();
		$this->load->view('offers_view',$data);
	}

	public function OfferInfo($offer_id)
	{
		$data['title'] = 'Mall-E | Offer Info';
		$data['offers'] = $this->offer->getOfferInfo($offer_id);
		for($i = 1; $i <= 5; $i++){
			$data['offer_img'][$i] = $this->offer->getMallOfferImg($offer_id, $i);
		}
		$this->load->view('offer_view_revise',$data);
	}

}
