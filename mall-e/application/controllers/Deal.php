<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Deal extends CI_Controller

{
	public function __construct(){
	
		parent::__construct();
		$this->load->model('MerchantModel', 'merchant');
		$this->load->model('Home_model','home');
		$this->load->model('MallModel', 'mall');
		$this->load->model('DealModel', 'deal');

	}

	public function DealInfo($dm_id,$sub_category_id)
	{
		$data['title'] = 'Mall-E | Deal Info';

		$data['deal_info'] = $this->deal->getDealInfo($dm_id);
		$data['subcategory_info'] = $this->deal->getDealCategory($sub_category_id);


		$data['d_image'] = $this->deal->getMerchantImage($dm_id);
			
		$data['deals'] = $this->home->getDealsBySub($sub_category_id,$dm_id);

		$rr =  $this->home->getDealsBySub($sub_category_id,$dm_id);

		

		foreach ($rr as $r) {
			
		
				$data['d_images'] = $this->home->getMerchantImages();
			

		}

		$data['deal_count'] = count($data['deals']);

		$this->load->view('deal_view',$data);
	}

}