<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Event extends CI_Controller

{
	public function __construct(){
	
		parent::__construct();
		$this->load->model('MerchantModel', 'merchant');
		$this->load->model('Home_model','home');
		$this->load->model('MallModel', 'mall');
		$this->load->model('EventModel', 'event');

	}
	
	public function index()

	{	

			//$data['malls'] = $this->home->get();

			$data['title'] = 'Mall-E - Event';

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
			$data['events_all'] = $this->event->getAllEvents($country_id);

			$data['events_view'] = $this->event->getEvents($country_id);

			$data['events_all_counts'] = count($this->event->getAllEvents($country_id));
			$data['events_type_count'] = $this->event->getAllEventsCount($country_id);

			$data['events'] = $this->event->getEventsCount($country_id, $type='');
			$data['events_current'] = $this->event->getEventsCount($country_id, $type='C');
			$data['events_past'] = $this->event->getEventsCount($country_id, $type='P');
			$data['events_upcoming'] = $this->event->getEventsCount($country_id, $type='U');


			// echo '<pre>';
			// print_r(count($data['events']));
			// print_r(count($data['events_view']));
			// // // print_r($data['events_all']);
			// die();

			$this->load->view('events',$data);

	}

	public function EventInfo($event_id)
	{
		$data['title'] = 'Mall-E | Event Info';
 
			
		$data['events'] = $this->event->getEventsInfo($event_id); 
		$data['months'] = $this->home->getMonths();

		for($i = 1; $i <= 5; $i++){
				$data['event_image'][$i] = $this->event->getEventImage($event_id, $i);
			}

		$data['url'] = $this->uri->segment(4);

		$this->load->view('event_view',$data);
	}

}