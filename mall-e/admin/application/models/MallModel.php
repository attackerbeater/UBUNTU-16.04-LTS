<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class MallModel extends CI_Model
{
	
	public function getMalls()
	{
		$query = $this->db->query("SELECT * FROM mall_master 
		join city_master on mall_master.city_id = city_master.city_id
		join country_master on country_master.country_id = city_master.country_id
		join mall_type on mall_type.mt_id = mall_master.mt_id
		order by mall_master.mall_id desc");
		return $query->result();
	}

	public function saveMall()
	{	
		$city_id = $this->input->post('city_id');

		$query = $this->db->get_where('city_master',array('city_id' => $city_id));
		$city = $query->row_array();

		$query2 = $this->db->get_where('town_master',array('city_id' => $city_id));
		$town = $query2->row_array();

		$query3 = $this->db->get('mall_type');
		$mt = $query3->row_array();

		$mt_id = $mt['mt_id'];

		$data = array(
			'mall_name' => $this->input->post('mallname'),
			'managed_by' => '',
			'mt_id' => $mt_id,
			'country_id' => $city['country_id'],
			'city_id' => $city_id,
			'town_id' => $town['town_id'],
			'postal_code' => '',
			'mall_active' => '',
			'telephone' => '',
			'business_address' => '',
			'website' => '',
			'lat' => $this->input->post('lat'),
			'long' => $this->input->post('long'),
			//'mall_image_1' => '',
			//'mall_image_2' => '',
			//'mall_image_3' => ''
		);

		$this->db->insert('mall_master',$data);

		$last_id = $this->db->insert_id();


		$image = array(
						array(
							
							'mall_id' => $last_id,
							'image_name' => '',
							'image_active' => '0',
							'date_added' => date('Y-m-d') 
						),
						array(
							
							'mall_id' => $last_id,
							'image_name' => '',
							'image_active' => '0',
							'date_added' => date('Y-m-d') 
						),
						array(
							
							'mall_id' => $last_id,
							'image_name' => '',
							'image_active' => '0',
							'date_added' => date('Y-m-d') 
						)
		);


		return $this->db->insert_batch('mall_image',$image);

	}
	
	
	public function uploadImageToMerchantEvent($mall_id,$count,$filename)
	{
		//$this->db->where('merchant_image_id',$merchant_image_id);
		$this->db->insert('mall_event_image',array('mall_id' => $mall_id, 'image_name' => $filename,'image_count' => $count));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function deleteMall()
	{
		$mall_id = $this->input->get('mall_id');
		$this->db->where('mall_id', $mall_id);
		$this->db->delete('mall_master');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function getMallInfo($mall_id)
	{
		$this->db->select('*');
		$this->db->from('mall_master as a');
		$this->db->join('mall_type as b','a.mt_id = b.mt_id');
		$this->db->join('country_master as c','a.country_id = c.country_id');
		$this->db->join('city_master as d','a.city_id = d.city_id');
		$this->db->join('town_master as e','a.town_id = e.town_id');
		// $this->db->join('mall_image as f','a.mall_id = f.mall_id');
		// $this->db->join('mall_contacts as f','a.mall_id = f.mall_id');
		$this->db->where('a.mall_id',$mall_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getMallImages($mall_id)
	{
		$query = $this->db->get_where('mall_image',array('mall_id' => $mall_id));
		return $query->result();
	}

	public function updateMall()
	{
		$mall_id = $this->input->post('mall_id_main');

		$data = array(
			'mall_name' => $this->input->post('mallname'),
			'managed_by' => $this->input->post('manage'),
			'mt_id' => $this->input->post('mt_id'),
			'country_id' => $this->input->post('country_id'),
			'city_id' => $this->input->post('city_id'),
			'town_id' => $this->input->post('town_id'),
			'postal_code' => $this->input->post('postalcode'),
			'mall_active' => $this->input->post('mallactive'),
			'telephone' => $this->input->post('telephone'),
			'business_address' => $this->input->post('address'),
			'website' => $this->input->post('website'),
			'lat' => $this->input->post('lat'),
			'long' => $this->input->post('long'),
			'website' => $this->input->post('website'),
			'facebook' => $this->input->post('facebook'),
			'instagram' => $this->input->post('instagram'),
			'twitter' => $this->input->post('twitter'),
			'opening_hour' => $this->input->post('opening_hour'),
			'about_us' => $this->input->post('about_us'),
			'free_parking' => $this->input->post('free_parking'),
			'paid_parking' => $this->input->post('paid_parking'),
			'total_parking' => $this->input->post('total_parking'),
			'available_parking' => $this->input->post('available_parking'),
			'featured' => $this->input->post('mall_featured'),
			'youtube' => $this->input->post('youtube'), 
		);


		$this->db->where('mall_id',$mall_id);
		$this->db->update('mall_master',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function getMallEvents($mall_id,$count)
	{
		$query = $this->db->get_where('mall_event_image',array('mall_id' => $mall_id,'image_count' => $count));
		return $query->result();
	}


	public function uploadImageToMall($mall_image_id,$filename)
	{
		$this->db->where('mall_image_id',$mall_image_id);
		$this->db->update('mall_image',array('image_name' => $filename));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}
	
	
	public function uploadImageToMallLogo($mall_id,$filename)
	{
		$this->db->where('mall_id',$mall_id);
		$this->db->update('mall_master',array('main_image' => $filename));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}


	public function deleteMallImage()
	{
		$mall_image_id = $this->input->get('mall_image_id');

		$this->db->where('mall_image_id', $mall_image_id);
		$this->db->update('mall_image',array('image_name' => ''));

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}
	
	public function destroMallImageEvent()
	{
		$mallevent_image_id = $this->input->get('mallevent_image_id');

		$data = array('mallevent_image_id' => $mallevent_image_id);
		
		$this->db->delete('mall_event_image',$data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}
	
	
	
	
	public function deleteMallImageLogo()
	{
		$mall_id = $this->input->get('mall_id');

		$this->db->where('mall_id', $mall_id);
		$this->db->update('mall_master',array('main_image' => ''));

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}


	public function getMallParkingImg($mall_id,$count)
	{
		$query = $this->db->get_where('parking_images',array('mall_id' => $mall_id,'image_count' => $count));
		return $query->result();
	}

	public function uploadImageToParking($mall_id,$count,$filename)
	{
		//$this->db->where('merchant_image_id',$merchant_image_id);
		$this->db->insert('parking_images',array('mall_id' => $mall_id, 'parking_image' => $filename,'image_count' => $count));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function destroMallImageParking()
	{
		$pi_id = $this->input->get('pi_id');

		$data = array('pi_id' => $pi_id);
		
		$this->db->delete('parking_images',$data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}
	
	public function getMallOfferImg($offer_id,$count)
	{
		$query = $this->db->get_where('mall_offers_images',array('offer_id' => $offer_id,'count' => $count));
		return $query->result();
	}

	public function uploadImageToOffer($mall_id,$count,$filename,$user_id,$offer_id)
	{
		//$this->db->where('merchant_image_id',$merchant_image_id);
		$this->db->insert('mall_offers_images',array('mall_id' => $mall_id, 'Image_name' => $filename,'count' => $count, 'dated' => date('d-m-Y'), 'user_id' => $user_id, 'offer_id' => $offer_id));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function destroyMallImageOffer()
	{
		$moi_id = $this->input->get('moi_id');

		$data = array('moi_id' => $moi_id);
		
		$this->db->delete('mall_offers_images',$data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function updateMallActive()
	{ 

		$mall_active = $this->input->post('mall_active');
		$mall_id = $this->input->post('mall_id');

		$this->db->where('mall_id',$mall_id);
		$this->db->update('mall_master',array('mall_active' => $mall_active));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function updateMallFeatured()
	{ 

		$featured = $this->input->post('featured');
		$mall_id = $this->input->post('mall_id');

		$this->db->where('mall_id',$mall_id);
		$this->db->update('mall_master',array('featured' => $featured));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}
	
	public function getMallByLiveSearch($search)
	{
		
		$query = $this->db->query("SELECT * FROM mall_master
		join city_master on mall_master.city_id = city_master.city_id
		join country_master on country_master.country_id = city_master.country_id
		join mall_type on mall_type.mt_id = mall_master.mt_id
		where mall_master.mall_name like '%$search%'");
		return $query->result();
	}
	

}
?>