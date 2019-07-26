<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('PromotionModel', 'promotion');
		$this->load->model('Home_model','home');
		$this->load->model('MallModel', 'mall');
	}

	public function index()
	{	
		$data['title'] = 'Mall-E - Promotions';		
		$country_id = $this->input->get('country');
		if($this->input->get('country'))
		$country_id = $this->input->get('country');
		else
		$country_id = 1;

		$data['promo_m'] = $this->home->getPromoByMerhant($country_id);
		$outlets = array();
		foreach ($data['promo_m'] as $key => $row) {
            $outlets[$key] = $this->home->getOutletsCount($row->promo_id);
        }
        $data['promo_m_outlets'] = $outlets;
		
		$data['countries'] = $this->home->getPromotionCountries();

		$this->load->view('promotions_view',$data);
	}

	public function Info($promo_id)
	{
	    $data['title'] = 'Mall-E | Promotion Info';
		$data['promotion'] = $this->promotion->getPromotionInfo($promo_id);

	    for($i = 1; $i <= 5; $i++){
	    	$data['promo_img'][$i] = $this->promotion->getPromoterImg($promo_id, $i);
	    }

	    $data['promotions_outlets'] = $this->promotion->getPromoterOutlets($promo_id);

	    $data['all_outlets'] = $this->promotion->getPromoterAllOutlets($promo_id);

	    $data['promo_outlets'] = $this->promotion->getPromotionOutlets($promo_id);
	    $data['promo_malls'] = $this->promotion->getMalls($promo_id);
	   	
	   	$mall_images = array();
	    $merchant_locations = array();
		foreach ($data['promo_outlets'] as $key => $row) {
            $merchant_locations[$key] = $this->promotion->getMerchantLocations($promo_id, $row->mall_id);
            $mall_images[$key] = $this->mall->getMallInfo($row->mall_id);
        }
        $data['merchant_locations'] = $merchant_locations;
        $data['mall_images'] = $mall_images;

		$this->load->view('promotion_view_revise',$data);
	}
}
