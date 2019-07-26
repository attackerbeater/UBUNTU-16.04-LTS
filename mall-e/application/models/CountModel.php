<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CountModel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->table = "mall_master";
	}
	
	public function countMallType($mtid,$status,$countryid)
	{	 
	 
		$this->db->select('*');
		$this->db->from('mall_master');
		$this->db->where('mt_id',$mtid);
		$this->db->where('mall_active',$status);
		$this->db->where('country_id',$countryid);
		$query = $this->db->count_all_results();
		return $query;
	}
	
	public function countEvents($countryid,$event_type)
	{	 
	 
		$this->db->select('*');
		$this->db->from('events_master as a');
		$this->db->join('mall_master as b','a.mall_id = b.mall_id');
		$this->db->where('a.type',$event_type); 
		$this->db->where('b.mall_active','Y'); 
		$this->db->where('b.country_id',$countryid); 
		$query = $this->db->count_all_results();
		return $query;
	}

	public function countPromotions($countryid,$promotion_active)
	{	 	 
		$this->db->select('*');
		$this->db->from('promotions_master as a');	
		$this->db->join('merchant_master as c','a.merchant_id = c.merchant_id');
		$this->db->where('a.active',$promotion_active); 
		$this->db->where('c.country_id',$countryid); 
		$query = $this->db->count_all_results();
		return $query;
	}

	public function countOffers($countryid)
	{	 	 
		$this->db->select('*');
		$this->db->from('offer_master as a');	
		$this->db->join('mall_master as b','a.mall_id = b.mall_id');
		$this->db->where('b.country_id',$countryid); 
		$query = $this->db->count_all_results();
		return $query;
	}

}