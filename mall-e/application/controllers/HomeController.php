<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class HomeController extends CI_Controller

{
	public function __construct(){

		parent::__construct();
		$this->load->model('Home_model', 'home');
		$this->load->model('EventModel', 'event');
		$this->load->model('CountModel', 'countm');

	}



	public function index()

	{

		$data['title'] = 'Mall-E';
		$country_id = $this->input->get('country');
		if($this->input->get('country'))
		$country_id = $this->input->get('country');
		else
		$country_id = 1;

		$data['malls'] = $this->home->get($country_id);
		$data['merchants'] = $this->home->getMerchants($country_id);

		// echo '<pre>';
  //       print_r($data['merchants'] );
       
  //       die();

		$data['countries'] = $this->home->getMallCountries();
		$data['events'] = $this->home->getEvents();
		$data['months'] = $this->home->getMonths();

		
		// echo '<pre>';
		// print_r($data['events']);
		// echo '<pre/>';

		// die();

		$data['promo_m'] = $this->home->getPromoByMerhant($country_id);

		// echo '<pre>';
		// print_r($data['promo_m']);
		// die();
		$outlets = array();
		foreach ($data['promo_m'] as $key => $row) {
            $outlets[$key] = $this->home->getOutletsCount($row->promo_id);
        }
        $data['promo_m_outlets'] = $outlets;

  //       // $primary_tags = array();
		// foreach ($data['promo_m'] as $key => $row) {
  //           // $primary_tags[$key] = 
  //           $data['promo_m'][$key]->tags = $this->home->getPrimaryTags($row->merchant_id);
  //       }
        // $data['primary_tags'] = $primary_tags;

  //       echo '<pre>';
		// // if($data['promo_m'][0]->merchant_id == 68){
		// 	print_r($data['promo_m']);
		// 	print_r($data['primary_tags']);
		// // }
		
		// die();

        // $data['promo_m'][3]->primary_tags = array(
        // 		'a'=>1,
        // 		'b' => 2
        // 	);

        // echo '<pre>';
        // print_r($data['promo_m']);
        // // print_r($data['primary_tags'] );

        // die();

		$data['parkings'] = $this->home->getParking();
		$data['offers'] = $this->home->getOffers($country_id);
		$data['subcat'] = $this->home->getSubCat();
		$data['deals'] = $this->home->getDeals($country_id);
		$rr = $this->home->getDeals($country_id);


		// echo '<pre>';
  //       print_r(count($data['offers']));
     
  //       die();



		foreach ($rr as $r) {
				$data['d_images'] = $this->home->getMerchantImages();
		}

		$data['merchant_count'] = count($data['merchants']);
		$data['count_malls'] = $this->countm->countMallType(1,'Y',$country_id); //active malls
		$data['count_events'] = count($this->event->getEventsCount($country_id, $type='')); //$this->countm->countEvents($country_id,'C'); //active events - type C
		$data['events_per_malls'] = $this->event->getEventsPerMall($country_id);

		$data['count_offers'] = $this->countm->countOffers($country_id,'Y'); 
		$data['count_promotions'] = $this->countm->countPromotions($country_id,'Y'); 


		// echo '<pre>';
		// print_r($data['count_events']);

		// die();


		$this->load->view('home_view',$data);



	}




}
