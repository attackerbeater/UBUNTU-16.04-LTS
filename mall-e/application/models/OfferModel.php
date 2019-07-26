<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OfferModel extends CI_Model {




	public function getOfferInfo($offer_id)
	{

		$this->db->select('*');
		$this->db->from('offer_master as a');
		$this->db->join('mall_master as b','b.mall_id = a.mall_id');
		$this->db->join('country_master as c','b.country_id = c.country_id');
		$this->db->join('town_master as d','b.town_id = d.town_id');
		$this->db->where('a.offer_id',$offer_id);

		$query = $this->db->get();


		return $query->row_array();
	}

	public function getMallOfferImg($offer_id,$count)
	{
		$query = $this->db->get_where('mall_offers_images',array('offer_id' => $offer_id,'count' => $count));
		// echo $this->db->last_query();	
		return $query->result();
	}



}
