<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->table = "mall_master";
	}

	public function get($default_country = 1, $columns = "*", $format = 'object'){
		$this->db->select($columns)
				 ->join('country_master', 'mall_master.country_id = country_master.country_id')
				 ->join('city_master','mall_master.city_id = city_master.city_id')
				 ->join('town_master','mall_master.town_id = town_master.town_id')
				 ->join('mall_image','mall_master.mall_id = mall_image.mall_id')
				 ->join('mall_type','mall_master.mt_id = mall_type.mt_id')
				 //->join('merchant_locations','merchant_locations.mall_id = mall_master.mall_id')
				 ->order_by('mall_master.lat', 'desc')
				 ->group_by('mall_master.mall_id');
		
		$res = $this->db->get_where($this->table,array('mall_active' => 'Y','mall_master.country_id' => $default_country));
		// echo $this->db->last_query();
		//exit();
		if( $res->num_rows() > 0 )
			return $format == 'array' ? $res->result_array() : $res->result();
		return array();
	}

	// public function get($default_country = 1, $columns = "*", $format = 'object'){
	// 	$this->db->select($columns);
	// 	$this->db->from('mall_master as a');
	// 	$this->db->join('mall_type as b', 'a.mt_id = b.mt_id');
	// 	$this->db->join('mall_image as c', 'a.mall_id = c.mall_id');
	// 	$this->db->join('country_master as d', 'a.country_id = d.country_id');
	// 	$this->db->join('town_master as e', 'a.town_id = e.town_id');
	// 	$this->db->join('city_master as f', 'a.city_id = f.city_id');
	// 	$this->db->where('a.mall_active', 'Y');
	// 	$this->db->where('a.country_id', $default_country);
	// 	// $this->db->where('b.mt_id', 2);
	// 	$this->db->group_by('a.mall_id');
	// 	$query = $this->db->get();
	// 	echo $this->db->last_query();
	// 	return $query->result(); 
	// }


	public function getEvents()
	{	 
	 
		$this->db->select('*');
		$this->db->from('events_master as a');
		$this->db->join('mall_master as b','a.mall_id = b.mall_id');
		$this->db->join('user_master as c','a.user_id = c.user_id'); 
		$this->db->join('event_image as d','a.event_id = d.event_id'); 
		$this->db->join('events_category as e','a.ec_id = e.ec_id');
		$this->db->group_by('a.event_id');
		$query = $this->db->get();		
		// echo $this->db->last_query();
		return $query->result(); 
	}

		public function getPromoByMerhant($default_country = 1)
	{
		$this->db->select('a.*, b.featured, b.po_id, b.amount as pm_amount, c.merchant_id, c.merchant_name, mi.image_name as image, d.currency_symbol, e.image_name, t.tag_name,p.primary_tag');
		$this->db->from('promotions_master as a');
		$this->db->join('promotions_outlets as b','a.promo_id = b.promo_id', 'left');
		$this->db->join('merchant_master as c','a.merchant_id = c.merchant_id', 'left');
		$this->db->join('merchant_locations as ml','ml.merchant_id = c.merchant_id');
		$this->db->join('mall_master as mm','ml.mall_id = mm.mall_id');
		$this->db->join('country_master as d','d.country_id = c.country_id', 'left');
		$this->db->join('merchant_promo_image as e', 'e.promo_id = a.promo_id', 'left');
        $this->db->join('merchant_image as mi', 'mi.merchant_id = c.merchant_id', 'left');
        $this->db->join('promotions_tags as p','a.promo_id = p.promo_id', 'left');
		$this->db->join('tags_master as t','p.tag_id = t.tag_id', 'left');

//        $this->db->join('promotions_tags as t', 't.po_id = b.promo_id');
		// $this->db->where(array('merchant_active' => 'Y','mm.country_id' => $default_country));
		// 	$this->db->order_by('mm.lat', 'desc');
		$this->db->where('e.image_count',1);
		$this->db->where('p.primary_tag','Y');
		$this->db->where('a.active','Y');
//		$this->db->where('b.live','Y');
//		$this->db->where('c.merchant_active','Y');
//        $this->db->where('t.primary_tag','Y');

            $this->db->group_by('a.promo_id');
            // $this->db->group_by('c.merchant_name');
        $query = $this->db->get();

//        echo $this->db->last_query();
		return $query->result();  
	}

	

	public function getMallsBymerchant($merchant_id)
	{
		$this->db->select('*');
		$this->db->from('mall_master as a');
		$this->db->join('country_master as b','a.country_id = b.country_id');
		$this->db->join('city_master as c','a.city_id = c.city_id');
		$this->db->join('town_master as d','a.town_id = d.town_id');
		$this->db->join('mall_image as e','a.mall_id = e.mall_id');
		$this->db->join('mall_type as f','a.mt_id = f.mt_id');
		$this->db->join('merchant_locations as g','a.mall_id = g.mall_id');
		$this->db->group_by('a.mall_id');
		$this->db->where('g.merchant_id',$merchant_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getMerchants($default_country = 1)
	{
		$this->db->select('*');
		$this->db->from('merchant_master as a');
		$this->db->join('merchant_image as b','a.merchant_id = b.merchant_id');
		$this->db->join('merchant_type as mt','mt.mt_id = a.mt_id');
		$this->db->join('merchant_locations as c','a.merchant_id = c.merchant_id');
		$this->db->join('mall_master as e','c.mall_id = e.mall_id');
		$this->db->join('country_master as d','e.country_id = d.country_id');
		$this->db->where(array('merchant_active' => 'Y','e.country_id' => $default_country));
		$this->db->order_by('e.lat', 'desc');
		$this->db->group_by('a.merchant_name');
		$query = $this->db->get();
		// echo $this->db->last_query();
		//exit();
		return $query->result();

	}

	public function getMerchantsByMall($mall_id)
	{
		$this->db->select('*');
		$this->db->from('merchant_master as a');
		$this->db->join('merchant_image as b','a.merchant_id = b.merchant_id');
		$this->db->join('merchant_type as mt','mt.mt_id = a.mt_id');
		$this->db->join('merchant_locations as c','a.merchant_id = c.merchant_id');
		$this->db->join('mall_master as e','c.mall_id = e.mall_id');
		$this->db->join('country_master as d','e.country_id = d.country_id');
		$this->db->where('e.mall_id',$mall_id);
		$this->db->where('a.merchant_active','Y');
		$query = $this->db->get();
		// print_r($this->db->last_query());
		return $query->result();

	}

	public function getDeals($country_id)
	{
		$this->db->select('*');
		$this->db->from('deal_master as a');
		$this->db->join('user_master as b','a.created_by = b.user_id');
		$this->db->join('merchant_master as c','a.merchant_id = c.merchant_id');
		$this->db->join('mall_master as d','a.mall_id = d.mall_id');
		$this->db->join('sub_category_master as f','a.sub_category_id = f.Sub_Category_id');
		$this->db->join('country_master as g','d.country_id = g.country_id');
		$this->db->join('deal_merchant_images as h','a.dm_id = h.dm_id');
		// $this->db->join('merchant_image as i','c.merchant_id = i.merchant_id');
		$this->db->join('merchant_locations as j','c.merchant_id = j.merchant_id');
		$this->db->where('c.merchant_active','Y');
		$this->db->where('d.country_id',$country_id);
		$this->db->where('a.deal_status','L');
		$this->db->group_by('a.dm_id');
		$this->db->order_by('f.Sub_Category_id','ASC');
		$query = $this->db->get();
		return $query->result();
	}


	public function getDealsByMall($mall_id)
	{
		$this->db->select('*');
		$this->db->from('deal_master as a');
		$this->db->join('user_master as b','a.created_by = b.user_id');
		$this->db->join('merchant_master as c','a.merchant_id = c.merchant_id');
		$this->db->join('mall_master as d','a.mall_id = d.mall_id');
		$this->db->join('sub_category_master as f','a.sub_category_id = f.Sub_Category_id');
		$this->db->join('country_master as g','d.country_id = g.country_id');
		$this->db->join('deal_merchant_images as h','a.dm_id = h.dm_id');
		// $this->db->join('merchant_image as i','c.merchant_id = i.merchant_id');
		$this->db->join('merchant_locations as j','c.merchant_id = j.merchant_id');
		$this->db->group_by('a.dm_id');
		$this->db->where('d.mall_id',$mall_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getDealsByMerchant($merchant_id)
	{
		$this->db->select('*');
		$this->db->from('deal_master as a');
		$this->db->join('user_master as b','a.created_by = b.user_id');
		$this->db->join('merchant_master as c','a.merchant_id = c.merchant_id');
		$this->db->join('mall_master as d','a.mall_id = d.mall_id');
		$this->db->join('sub_category_master as f','a.sub_category_id = f.Sub_Category_id');
		$this->db->join('country_master as g','d.country_id = g.country_id');
		$this->db->join('deal_merchant_images as h','a.dm_id = h.dm_id');
		// $this->db->join('merchant_image as i','c.merchant_id = i.merchant_id');
		$this->db->join('merchant_locations as j','c.merchant_id = j.merchant_id');
		$this->db->group_by('a.dm_id');
		$this->db->where('a.merchant_id',$merchant_id);
		$this->db->where('a.deal_status','L');
		$query = $this->db->get();
		return $query->result();
	}

	public function getDealsBySub($sub_category_id,$dm_id)
	{
		$this->db->select('*');
		$this->db->from('deal_master as a');
		$this->db->join('user_master as b','a.created_by = b.user_id');
		$this->db->join('merchant_master as c','a.merchant_id = c.merchant_id');
		$this->db->join('mall_master as d','a.mall_id = d.mall_id');
		$this->db->join('sub_category_master as f','a.sub_category_id = f.Sub_Category_id');
		$this->db->join('country_master as g','d.country_id = g.country_id');
		$this->db->join('deal_merchant_images as h','a.dm_id = h.dm_id');
		// $this->db->join('merchant_image as i','c.merchant_id = i.merchant_id');
		$this->db->join('merchant_locations as j','c.merchant_id = j.merchant_id');
		$this->db->group_by('a.dm_id');
		$this->db->where('f.Sub_Category_id',$sub_category_id);
		$this->db->where('a.dm_id !=',$dm_id);
		//$this->db->where('a.deal_status','L');
		$query = $this->db->get();
		return $query->result();
	}

	public function getMerchantImages()
	{
		$query = $this->db->get('merchant_image');
		return $query->result();
		
	}

	public function getCountries()
	{
		$query = $this->db->get('country_master');
		return $query->result();
	}

    public function getOutletsCount($promoId)
    {
        $this->db->where('promo_id', $promoId);
        $this->db->where('live', 'Y');
        $query = $this->db->get('promotions_outlets');
        return count($query->result());
    }
	
	public function getMallCountries()
	{
		$this->db->select('*');
		
//		$this->db->join('mall_master','country_master.country_id = mall_master.country_id');
		$this->db->group_by('country_master.country_id');
		$this->db->order_by('country_master.country_id', 'asc');
		$query = $this->db->get('country_master');
		return $query->result();
	}

	public function getPromotionCountries()
	{
		$this->db->select('*');
		
//		$this->db->join('mall_master','country_master.country_id = mall_master.country_id');
		$this->db->group_by('country_master.country_id');
		$this->db->order_by('country_master.country_id', 'asc');
		$query = $this->db->get('country_master');
		return $query->result();
	}

	public function getOfferCountries()
	{
		$this->db->select('*');
		
//		$this->db->join('mall_master','country_master.country_id = mall_master.country_id');
		$this->db->group_by('country_master.country_id');
		$this->db->order_by('country_master.country_id', 'asc');
		$query = $this->db->get('country_master');
		return $query->result();
	}

	public function loginShopper($email)
	{
		$this->db->select('*');
		$this->db->where('Email_id',$email);
		$this->db->group_by('Email_id');
		$query = $this->db->get('shoppers_master');
		return $query->result();
	}

	public function updateShopper($email,$otp)
	{
		$data = array(
               'Otp' => $otp,
            );

		$this->db->where('Email_id',$email);
		$query = $this->db->update('shoppers_master',$data);
		return $query;
	}

	public function saveShopper()
	{

		$q = $this->db->get_where('country_master',array('country_name' => $this->input->post('country')));
		$q1 = $q->row_array();
		$data = array(
			'Shopper_name' => $this->input->post('yourname'),
			'Mobile_number' => $this->input->post('number'),
			'Otp' => '',
			'Registered_on' => date('Y-m-d'),
			'Email_id' => $this->input->post('email'),
			'Gender' => $this->input->post('gender'),
			'Country_id' => $q1['country_id']
		);

		$this->db->insert('shoppers_master',$data);
		
		return $this->db->insert_id();
	}
	
	

	public function saveMerchant()
	{

		$q = $this->db->get_where('country_master',array('country_name' => $this->input->post('country')));
		$q1 = $q->row_array();
		$data = array(
			'Outlet_name' => $this->input->post('merchant_name'),
			'Contact_number' => $this->input->post('number'),
			'Inquiry_Date' => date('Y-m-d'),
			'Email_id' => $this->input->post('email'),
			'Contact_person' => $this->input->post('yourname'),
			'Country' => $q1['country_id']
		);

		return $this->db->insert('Inquiry_master',$data);
	}

	public function getSubCat()
	{
		$this->db->select('*,count(*) as count');
		$this->db->from('deal_master as a');
		$this->db->join('sub_category_master as b','a.sub_category_id = b.sub_category_id');
		$this->db->group_by('b.Sub_Category_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function getSubCatByMerchant($merchant_id)
	{
		$this->db->select('*,count(*) as count');
		$this->db->from('deal_master as a');
		$this->db->join('sub_category_master as b','a.sub_category_id = b.sub_category_id');
		$this->db->join('merchant_master as c','a.merchant_id = c.merchant_id');
		$this->db->group_by('b.Sub_Category_id');
		$this->db->where('a.merchant_id',$merchant_id);
		$query = $this->db->get();
		return $query->result();
	}



	public function getSubCatByMall($mall_id)
	{
		$this->db->select('*,count(*) as count');
		$this->db->from('deal_master as a');
		$this->db->join('sub_category_master as b','a.sub_category_id = b.sub_category_id');
		$this->db->join('mall_master as c','a.mall_id = c.mall_id');
		$this->db->where('c.mall_id',$mall_id);
		$this->db->group_by('b.Sub_Category_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function getMonths()
	{
		$this->db->select('*');
		$this->db->from('months'); 
		$query = $this->db->get();
		return $query->result();
	}

		public function getParking()
	{
		$this->db->select('*');
		$this->db->from('mall_master as a');
		$this->db->join('country_master as b','a.country_id = b.country_id');
		$this->db->join('town_master as c','a.town_id = c.town_id');
		$this->db->join('parking_images as d','a.mall_id = d.mall_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function getOffers($country_id)
	{
		$this->db->select('*');
		$this->db->from('offer_master as a');
		$this->db->join('mall_master as b','b.mall_id = a.mall_id');
		$this->db->join('country_master as c','b.country_id = c.country_id');
		$this->db->join('town_master as d','b.town_id = d.town_id');
		$this->db->join('mall_offers_images as e','e.offer_id = a.offer_id');
		$this->db->where('c.country_id', $country_id);
		$this->db->where('e.count', '1');
		$query = $this->db->get();
		return $query->result();
	}

	

}