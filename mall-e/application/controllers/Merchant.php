<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Merchant extends CI_Controller

{
	public function __construct(){
	
		parent::__construct();
		$this->load->model('MerchantModel', 'merchant');
		$this->load->model('Home_model','home');
		$this->load->model('MallModel', 'mall');

	}

	public function index()
	{
			//$data['merchants'] = $this->home->getMerchants();

			$data['title'] = 'Mall-E - Merchants';
			
			
			
			$country_id = $this->input->get('country');
			if($this->input->get('country'))
			$country_id = $this->input->get('country');
			else
			$country_id = 1;
			
			
			$data['merchants'] = $this->home->getMerchants($country_id);
			$data['merchanttype_count'] = $this->merchant->getAllMerchantTypeCount($country_id);
			$data['countries'] = $this->home->getMallCountries();


			$this->load->view('merchants_view',$data);
	}
	
	
	public function new_merchant()
	{
			
		$data['title'] = 'Merchants - Mall-E';

		$this->load->model('Home_model');
		$data['countries'] = $this->Home_model->getCountries();

		$this->load->view('merchant_view_new',$data);
	}

	public function MerchantInfo($merchant_id)

	{	
		// echo '<pre>';


		$data['malls'] = $this->home->getMallsBymerchant($merchant_id);

		
		$data['subcat'] = $this->home->getSubCatByMerchant($merchant_id);
		
		

		$data['deals'] = $this->home->getDealsByMerchant($merchant_id);

		$rr = $this->home->getDealsByMerchant($merchant_id);

		

		foreach ($rr as $r) {
			
		
				$data['d_images'] = $this->home->getMerchantImages();
			

		}

		$data['mall_locations'] =  $this->merchant->getMerchantMallLocations($merchant_id);
		$data['mall_location_count'] = count($this->merchant->getMallCountinMerchant($merchant_id));
		$data['mall_type_count'] = $this->merchant->getMallsBymerchantCount($merchant_id);

		$data['merchant_promos'] = $this->merchant->getMerchantPromos($merchant_id);
		$outlets = array();
		foreach ($data['merchant_promos'] as $key => $row) {
	        $outlets[$key] = $this->merchant->getOutletsCount($row->promo_id);
        }
        $data['promo_m_outlets'] = $outlets;

		$data['merchant_info'] = $this->merchant->getMerchantInfos($merchant_id);
		$data['title'] = 'Mall-e | Merchant';


		// echo '<pre>';
		// print_r($data['merchant_promos']);
		// exit();

		$this->load->view('merchant_view_revise',$data);

	}
	
	public function MerchantProfile($merchantLoc_id,$mall_id)

	{	
		
		$merchant_arr = $this->merchant->getMerchantbyLocation($merchantLoc_id);
		$merchant_id= $merchant_arr[0]->merchant_id;
		$rr = $this->home->getDealsByMerchant($merchant_id);
		
		$data['subcat'] = $this->home->getSubCatByMerchant($merchant_id);
		$data['deals'] = $this->home->getDealsByMerchant($merchant_id);

		foreach ($rr as $r) {
			
		
				$data['d_images'] = $this->home->getMerchantImages();
			

		}

		$data['mall_locations'] =  $this->merchant->getMerchantLocationsbyMall($merchantLoc_id);
		$data['mall_location_count'] = count($this->merchant->getMallCountinMerchant($merchant_id));
		$data['mall_type_count'] = $this->merchant->getMallsBymerchantCount($merchant_id);
		$data['outlet_images'] = $this->merchant->getOutletImages($merchantLoc_id);
		$data['merchant_promos'] = $this->merchant->getMerchantPromos($merchant_id);

		$data['merchant_info'] = $this->merchant->getMerchantLocationInfos($merchantLoc_id,$mall_id);
		$data['title'] = 'Mall-e | Merchant Outlet';

		$this->load->view('merchant_profile_view',$data);

	}
	
	public function sendEmail()
	{
		$name = $this->input->post('yourname');
		$mobile = $this->input->post('number');
		$country = $this->input->post('country');
		$email = $this->input->post('email');
		$merchant_name = $this->input->post('merchant_name');

		$data['merchant_name'] = $merchant_name;
		$data['name'] = $name;
		$data['number'] = $mobile;
		$data['country'] = $country;
		$data['sender'] = $email;



			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.googlemail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'themallenet@gmail.com',
			    'smtp_pass' => '@malle1234',
			    'mailtype' => 'html',
			    'charset'   => 'iso-8859-1',
			    'wordwrap' => TRUE
			);

			$this->email->initialize($config);

			$this->email->set_newline("\r\n");


			$this->email->from('no-reply@mall-e.net','MallE Enquiry');
			$this->email->to($email);
			//$this->email->to('tapzbraiel@gmail.com');

			$this->email->subject('Acknowledgment of Inquiry');


			$body = $this->load->view('emails/email_merchant',$data,TRUE);
			$this->email->message($body);

			$this->load->model('Home_model');
			$res = $this->Home_model->saveMerchant();
			
			if($res){
				
				if ($this->email->send()) {
				
						$this->email->set_newline("\r\n");
				
						$this->email->from('no-reply@mall-e.net','Mall E');
						$this->email->to('admin@mall-e.net');
						//$this->email->to('tapzbraiel@gmail.com');
				
						$this->email->subject('Inquiry Received from '. '"'.$merchant_name.'"'.', "'. $name.'" '.' , "' .$country.'"');
				
						$body = $this->load->view('emails/email_admin',$data,TRUE);
						$this->email->message($body);
						if ($this->email->send()) {
							$this->session->set_flashdata('emailsent','Successfully registered.');
							redirect(base_url('NewMerchant'));
						}
						else{
							$this->session->set_flashdata('emailnotsent','There is a problem with sending the email.');
							redirect(base_url('NewMerchant'));
						}
	
	
				}else{
						$this->session->set_flashdata('emailnotsent','There is a problem with sending the email.');
						redirect(base_url('NewMerchant'));
				}
				
			}else{
				$this->session->set_flashdata('emailnotsent','Unable to register.');
				redirect(base_url('NewMerchant'));
			}
			


	}

}