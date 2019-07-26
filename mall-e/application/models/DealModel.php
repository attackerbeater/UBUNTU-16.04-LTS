<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DealModel extends CI_Model {
	
		
	public function getDealInfo($dm_id)
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
		$this->db->where('a.dm_id',$dm_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getDealCategory($sub_category_id)
	{
		$this->db->select('*,count(*) as count');
		$this->db->from('deal_master as a');
		$this->db->join('sub_category_master as b','a.sub_category_id = b.sub_category_id');
		$this->db->join('mall_master as c','a.mall_id = c.mall_id');
		$this->db->group_by('b.Sub_Category_id');
		$this->db->where('b.Sub_Category_id',$sub_category_id);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function getMerchantImage($dm_id)
	{
		$this->db->select('*');
		$this->db->from('deal_master as a');
		$this->db->join('merchant_master as b','a.merchant_id = b.merchant_id');
		$this->db->join('merchant_image as c','b.merchant_id = c.merchant_id');
		$this->db->where('a.dm_id',$dm_id);
		$query = $this->db->get();
		return $query->row_array();
	}


}