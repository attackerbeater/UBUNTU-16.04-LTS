<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PromotionModel extends CI_Model {

  public function getPromotionInfo($promo_id)
	{
    $this->db->select('a.*, b.featured, b.po_id, b.amount as pm_amount, c.merchant_id, c.merchant_name, mi.image_name as image, d.currency_symbol, e.image_name, pdow.monday,
      pdow.tuesday, pdow.wednesday, pdow.thursday, pdow.friday, pdow.saturday, pdow.sunday, t.tag_name');
		$this->db->from('promotions_master as a');
		$this->db->join('promotions_outlets as b','a.promo_id = b.promo_id', 'left');
		$this->db->join('merchant_master as c','a.merchant_id = c.merchant_id', 'left');
		$this->db->join('country_master as d','d.country_id = c.country_id', 'left');
		$this->db->join('merchant_promo_image as e', 'e.promo_id = a.promo_id', 'left');
    	$this->db->join('merchant_image as mi', 'mi.merchant_id = c.merchant_id', 'left');
    	$this->db->join('promotions_days_of_week as pdow', 'pdow.promo_id = a.promo_id', 'left');

    	$this->db->join('promotions_tags as pt','pt.promo_id = a.promo_id', 'left');
		$this->db->join('tags_master as t','t.tag_id = pt.tag_id', 'left');

		$this->db->where('a.active','Y');
		$this->db->where('pt.primary_tag','Y');
    	$this->db->where('a.promo_id', $promo_id);
    	$query = $this->db->get();
  		return $query->row_array();
	}

	public function getPromoterImg($promo_id,$count)
	{
		$query = $this->db->get_where('merchant_promo_image',array('promo_id' => $promo_id,'image_count' => $count));
    // echo $this->db->last_query();
		return $query->result();
	}

	public function getPromoterOutlets($promo_id){
		// $this->db->select('m.mall_id, m.mall_name, mi.image_name as image, mm.merchant_id, ml.merchant_location'); //, mi.image_name as image
		$this->db->select('m.mall_id, m.mall_name, mi.image_name as image, mm.merchant_id');
		$this->db->from('promotions_outlets as p');
		$this->db->join('mall_master as m','p.mall_id = m.mall_id');
		$this->db->join('mall_image as mi','m.mall_id = mi.mall_id');
		$this->db->join('merchant_master as mm','p.merchant_id = mm.merchant_id');
		// $this->db->join('merchant_locations as ml','mm.merchant_id = ml.merchant_id');
		// $this->db->where('p.live','Y');
		// $this->db->where('ml.mall_id',15);
		$this->db->where('mm.merchant_id',$promo_id);
		$this->db->where('p.promo_id',$promo_id);
	
		$query = $this->db->get();
		// echo $this->db->last_query();
		return $query->result();
	}

	//  afaf
	public function getPromotionOutlets($promo_id){
		// $this->db->distinct();
		$this->db->select('*, c.main_image as image');
		$this->db->from('promotions_master as a');
		$this->db->join('promotions_outlets as b','a.promo_id = b.promo_id');
		$this->db->join('mall_master as c','b.mall_id = c.mall_id');
		// $this->db->join('merchant_master as d','a.merchant_id = d.merchant_id');
		// $this->db->join('mall_image as d','c.mall_id = d.mall_id');
		$this->db->order_by('c.mall_id', 'asc');
		// $this->db->where('d.merchant_id',$promo_id);
		$this->db->where('a.promo_id',$promo_id);
		$query = $this->db->get();
		// echo $this->db->last_query();
		return $query->result();
	}

	public function getMalls($promo_id){
		$this->db->select('c.type_name');
		$this->db->from('promotions_outlets as a');
		$this->db->join('mall_master as b','a.mall_id = b.mall_id');
		$this->db->join('mall_type as c','b.mt_id = c.mt_id');
		$this->db->where('a.promo_id',$promo_id);
		$query = $this->db->get();
		// echo $this->db->last_query();
		return $query->result();
	}

	public function getMallImages($mall_id)
	{
		$query = $this->db->get_where('mall_image',array('mall_id' => $mall_id));
		return $query->result();
	}

	public function getMerchantLocations($promo_id, $mall_id){
		$this->db->select('mall_id, merchant_id, merchant_location');
		$this->db->from('merchant_locations');
		$this->db->where('merchant_id',$promo_id);
		$this->db->where('mall_id',$mall_id);
		$query = $this->db->get();
		// echo $this->db->last_query();
		return $query->result();
	}


	public function getPromoterAllOutlets($promo_id){
		$this->db->select('*'); //, mi.image_name as image
		$this->db->from('promotions_outlets as p');	
		$this->db->where('p.live','Y');
		$this->db->where('p.promo_id',$promo_id);
	
		$query = $this->db->get();
		// echo $this->db->last_query();
		return $query->result();
	}
}
