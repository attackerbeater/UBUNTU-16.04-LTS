<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Mall extends CI_Controller

{
	public function __construct(){
	
		parent::__construct();
		$this->load->model('MallModel', 'mall');
		$this->load->model('MerchantModel', 'merchant');
		$this->load->model('Home_model', 'home');
	}	

	public function index()
	{	

			//$data['malls'] = $this->home->get();

			$data['title'] = 'Mall-E - Malls';

			$data['mall_counts'] = count($this->mall->getMallCount());

			$data['megamall_counts'] = count($this->mall->getMegaMallCount());

			$data['shoppingcenter_counts'] = count($this->mall->getSCCount());
			
			$country_id = $this->input->get('country');
			if($this->input->get('country'))
			$country_id = $this->input->get('country');
			else
			$country_id = 1;
			
			$data['malls'] = $this->home->get($country_id);
			//$data['merchants'] = $this->home->getMerchants($country_id);
			$data['countries'] = $this->home->getMallCountries();
			
			$data['mall_count'] = count($data['malls']);
			
			$data['malltype_count'] = $this->mall->getAllMalltypeCount($country_id);

			// echo '<pre>';
			// print_r(count($data['malls']));
			// echo '<pre/>';
			// die();

			$this->load->view('mall_view',$data);

	}

	public function MallInfo($mall_id)
	{	
		
		$data['title'] = 'Mall-E - Mall Info';

		$country_id = $this->input->get('country');
		if($this->input->get('country'))
		$country_id = $this->input->get('country');
		else
		$country_id = 1;
		
		$data['malls'] = $this->home->get($country_id);

		$data['subcat'] = $this->home->getSubCatByMall($mall_id);


		$data['deals'] = $this->mall->getDealsByMalls($mall_id);

		$rr = $this->home->getDealsByMall($mall_id);

		

		foreach ($rr as $r) {
			
		
				$data['d_images'] = $this->home->getMerchantImages();
			

		}



		$data['merchant_promos'] = $this->merchant->getMerchantPromosbyMall($mall_id);

		$data['merchants'] = $this->mall->getMerchantsByMall($mall_id);

		$data['mall_images'] = $this->mall->getMallImages($mall_id);
		
		$data['event_images'] = $this->mall->getMallEvents($mall_id);

		$data['events'] = $this->mall->getEvents($mall_id);

		$data['parkings'] = $this->mall->getParking($mall_id);

		$data['offers'] = $this->mall->getOffers($mall_id);

		

		// echo '<pre>';
  //       print_r($data['mall_images']);
     
  //       die();

		$data['months'] = $this->mall->getMonths();
		
		$data['mall_info'] = $this->mall->getMallInfo($mall_id);
		
		

		$this->load->view('mall_info_view_revise',$data);
	}

}