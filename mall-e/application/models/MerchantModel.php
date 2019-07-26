<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MerchantModel extends CI_Model {
	
		
	public function getMerchantInfos($merchant_id)
	{
		$this->db->select('*,a.main_image as mer_main_image');
		$this->db->from('merchant_master as a');
		$this->db->join('merchant_image as b','a.merchant_id = b.merchant_id');
		$this->db->join('country_master as c','a.country_id = c.country_id');
		$this->db->join('merchant_type as d','a.mt_id = d.mt_id');
		$this->db->join('merchant_locations as e','e.merchant_id = a.merchant_id');
		$this->db->where('a.merchant_id',$merchant_id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function getMerchantLocationInfos($merchantLoc_id,$mall_id)
	{
		$this->db->select('*,e.main_image as mer_main_image');
		$this->db->from('merchant_master as a');
		$this->db->join('merchant_image as b','a.merchant_id = b.merchant_id');
		$this->db->join('country_master as c','a.country_id = c.country_id');
		$this->db->join('merchant_type as d','a.mt_id = d.mt_id');
		$this->db->join('merchant_locations as e','e.merchant_id = a.merchant_id');
		$this->db->join('mall_master as f','e.mall_id = f.mall_id');	
		$this->db->where(array('e.merchantLocation_id'=> $merchantLoc_id,'e.mall_id'=>$mall_id));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getAllMerchantTypeCount($country_id = ''){
		$query = $this->db->query("SELECT COUNT(merchant_type.mt_id) as total_count,type FROM `merchant_type` INNER JOIN `merchant_master` on `merchant_master`.`mt_id` = merchant_type.mt_id WHERE merchant_master.merchant_active = 'Y'  and country_id = ".$country_id." GROUP by merchant_type.mt_id");
		return $query->result();
	}
	
	public function getMallCountinMerchant($merchant_id)
	{
		$this->db->select('*');
		$this->db->from('merchant_locations as a');
		$this->db->where('a.merchant_id',$merchant_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function getMerchantPromos($merchant_id)
	{
		$this->db->select('*, a.promo_id');
		$this->db->from('merchant_promo_image as a');
		$this->db->join('promotions_master as p','p.promo_id = a.promo_id', 'left');
		$this->db->join('merchant_master as c','c.merchant_id = p.merchant_id', 'left');
		$this->db->join('country_master as d','d.country_id = c.country_id', 'left');

		$this->db->join('promotions_tags as ta','ta.promo_id = a.promo_id', 'left');
		$this->db->join('tags_master as t','ta.tag_id = t.tag_id', 'left');

		$this->db->where('a.merchant_id',$merchant_id);
		$this->db->where('c.merchant_active','Y');
		$this->db->group_by('p.promo_id');
		$query = $this->db->get();
		// echo $this->db->last_query();
		return $query->result();
	}

	public function getOutletsCount($promoId)
    {
        $this->db->where('promo_id', $promoId);
        $this->db->where('live', 'Y');
        $query = $this->db->get('promotions_outlets');
        return count($query->result());
    }
	
	
	
	public function getMerchantPromosbyMall($mall_id)
	{
		$this->db->select('*');
		$this->db->from('mall_master as a');
		$this->db->join('merchant_locations as b','b.mall_id = a.mall_id');
		$this->db->join('merchant_master as c','c.merchant_id = b.merchant_id');
		$this->db->join('merchant_type as d','d.mt_id = c.mt_id');
		$this->db->join('merchant_promo_image as e','e.merchant_id = c.merchant_id');
		$this->db->join('country_master as f','f.country_id = a.country_id');
		$this->db->where('a.mall_id',$mall_id);
		$this->db->where('c.merchant_active','Y');
		$this->db->order_by('c.merchant_name','ASC');
		$query = $this->db->get();
		return $query->result();

	}
	
	
	
	
	public function getOutletImages($merchantLoc_id)
	{
		$this->db->select('*');
		$this->db->from('merchant_loc_image as a');
		$this->db->where('a.merchantLocation_id',$merchantLoc_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getMerchantMallLocations($merchant_id)
	{
		$this->db->select('*,g.image_name as mall_image,a.main_image as loc_main_image,h.image_name as merchantmall_image');
		$this->db->from('merchant_locations as a');		
		$this->db->join('merchant_master','a.merchant_id = merchant_master.merchant_id');	
		$this->db->join('mall_master as b','a.mall_id = b.mall_id');	
		$this->db->join('mall_type as c','b.mt_id = c.mt_id');
		$this->db->join('country_master as d','b.country_id = d.country_id');
		$this->db->join('city_master as e','b.city_id = e.city_id');
		$this->db->join('town_master as f','b.town_id = f.town_id');
		$this->db->join('mall_image as g','b.mall_id = g.mall_id');
		$this->db->join('merchant_loc_image as h','h.merchant_id = merchant_master.merchant_id');
		$this->db->group_by('a.mall_id');
		$this->db->order_by('h.merchant_image_id','ASC');
		
		$this->db->where('h.image_name !=','');
		$this->db->where('a.merchant_id',$merchant_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getMerchantLocationsbyMall($merchantLoc_id)
	{
		$this->db->select('*,a.main_image as loc_main_image,b.main_image as mall_image');
		$this->db->from('merchant_locations as a');		
		$this->db->join('merchant_master','a.merchant_id = merchant_master.merchant_id');	
		$this->db->join('mall_master as b','a.mall_id = b.mall_id');	
		$this->db->join('mall_type as c','b.mt_id = c.mt_id');
		$this->db->join('country_master as d','b.country_id = d.country_id');
		$this->db->join('city_master as e','b.city_id = e.city_id');
		$this->db->join('town_master as f','b.town_id = f.town_id');
		$this->db->join('mall_image as g','b.mall_id = g.mall_id');
		$this->db->group_by('a.mall_id');
		$this->db->where('a.merchantLocation_id',$merchantLoc_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getMallsBymerchantCount($merchant_id)
	{
		$this->db->select('COUNT(a.mall_id) as total_count,f.type_name');
		$this->db->from('mall_master as a');
		$this->db->join('mall_type as f','a.mt_id = f.mt_id');
		$this->db->join('merchant_locations as g','a.mall_id = g.mall_id');
		$this->db->group_by('type_name');
		$this->db->where('g.merchant_id',$merchant_id);
		$query = $this->db->get();
		return $query->result();
	}
	public function getMerchantbyLocation($merchantLoc_id)
	{
		$this->db->select('*');
		$this->db->from('merchant_master as a');
		$this->db->join('merchant_locations as b','a.merchant_id = b.merchant_id');
		$this->db->where('b.merchantLocation_id',$merchantLoc_id);
		$query = $this->db->get();
		return $query->result();
	}


}