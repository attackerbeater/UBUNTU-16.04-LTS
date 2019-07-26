<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class OfferModel extends CI_Model
{
	
	public function saveMallOffer()
	{
		
		$data = array(
			'mall_id' => $this->input->post('mall_id_offer'),
			'offer_title' => $this->input->post('offer_title'),
			'user_id' => $this->input->post('user_id_offer'),
			'dated' => date('Y-m-d')    
		);
		return $this->db->insert('offer_master',$data);
	}

	public function getMallOffer()
	{	
		$mall_id = $this->input->get('mall_id');
		

		$this->db->select('a.*, b.mall_id, b.mall_name, c.*');
		$this->db->from('offer_master as a');
		$this->db->join('mall_master as b','a.mall_id = b.mall_id');
		$this->db->join('user_master as c','a.user_id = c.user_id');
		$this->db->where('a.mall_id',$mall_id);
		$this->db->order_by('a.dated');

		$query = $this->db->get();
		return $query->result();
}

	public function getOfferInfo($offer_id)
	{
		$this->db->select('*');
		$this->db->from('offer_master as a');
		$this->db->join('mall_master as b','a.mall_id = b.mall_id');
		$this->db->join('user_master as c','a.user_id = c.user_id');
		$this->db->where('a.offer_id',$offer_id);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function deleteMallOffer()
	{
		$offer_id = $this->input->get('offer_id');
		$this->db->where('offer_id', $offer_id);
		$this->db->delete('offer_master');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function getSpecificEvent()
	{
		$event_id = $this->input->get('event_id');
		$query = $this->db->get_where('offer_master',array('event_id' => $event_id));
		return $query->row_array();
	}

	public function updateOffer()
		{
		$offer_id = $this->input->post('offer_id'); 

		$data = array( 
			'offer_title' => $this->input->post('offer_title'),
			'offer_desc' => $this->input->post('offer_desc'),
			'start_date' => $this->input->post('start_date'),
			'no_end_date' => $this->input->post('no_end_date'),
			'End_date' => $this->input->post('End_date'),
		);

		$this->db->where('offer_id',$offer_id);
		$this->db->update('offer_master',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}

	}


	public function updateFeatured()
	{ 

		$offer_id = $this->input->post('offer_id');
		$featured = $this->input->post('featured');

		$this->db->where('offer_id',$offer_id);
		$this->db->update('offer_master',array('featured' => $featured));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function updateLive()
	{ 

		$offer_id = $this->input->post('offer_id');
		$live = $this->input->post('live');

		$this->db->where('offer_id',$offer_id);
		$this->db->update('offer_master',array('live' => $live));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	
}

?>