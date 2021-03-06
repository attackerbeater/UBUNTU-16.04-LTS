<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EventModel extends CI_Model {
	
		
		
	public function getAllMalltypeCount($country_id = ''){
		$query = $this->db->query("SELECT COUNT(mall_type.mt_id) as total_count,type_name FROM `mall_type` INNER JOIN `mall_master` on `mall_master`.`mt_id` = mall_type.mt_id WHERE mall_master.mall_active = 'Y' and country_id = ".$country_id." GROUP by mall_type.mt_id");
		return $query->result();
	}
	public function getMallCount()
	{
		$this->db->select('*');
		$this->db->from('mall_master as a');
		$this->db->join('mall_type as b','a.mt_id = b.mt_id');
		$this->db->where('b.type_name','Mall');
		$query = $this->db->get();
		return $query->result();
	}

	public function getMegaMallCount()
	{
		$this->db->select('*');
		$this->db->from('mall_master as a');
		$this->db->join('mall_type as b','a.mt_id = b.mt_id');
		$this->db->where('b.type_name','Mega Mall');
		$query = $this->db->get();
		return $query->result();
	}

	public function getSCCount()
	{
		$this->db->select('*');
		$this->db->from('mall_master as a');
		$this->db->join('mall_type as b','a.mt_id = b.mt_id');
		$this->db->where('b.type_name','Shopping Centre');
		$query = $this->db->get();
		return $query->result();
	}

	public function getMallInfo($mall_id)
	{	
		$this->db->select('*');
		$this->db->from('mall_master as a');
		$this->db->join('mall_image as b','a.mall_id = b.mall_id');
		$this->db->join('mall_type as c','a.mt_id = c.mt_id');
		$this->db->join('country_master as d','a.country_id = d.country_id');
		$this->db->join('city_master as e','a.city_id = e.city_id');
		$this->db->join('town_master as f','a.town_id = f.town_id');
		$this->db->where('a.mall_id',$mall_id);
		$this->db->group_by('a.mall_id');
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function getMerchantsByMall($mall_id)
	{
		$this->db->select('*');
		$this->db->from('mall_master as a');
		$this->db->join('merchant_locations as b','b.mall_id = a.mall_id');
		$this->db->join('merchant_master as c','c.merchant_id = b.merchant_id');
		$this->db->join('merchant_type as d','d.mt_id = c.mt_id');
		$this->db->join('merchant_image as e','e.merchant_id = c.merchant_id');
		$this->db->join('country_master as f','f.country_id = a.country_id');
		$this->db->where('a.mall_id',$mall_id);
		$this->db->where('c.merchant_active','Y');
		$query = $this->db->get();
		return $query->result();

	}
	
	public function getDealsByMalls($mall_id)
	{
		
		//$this->db->from('mall_master as a');
		//$this->db->join('merchant_locations as b','b.mall_id = a.mall_id');
		//$this->db->join('merchant_master as c','c.merchant_id = b.merchant_id');
		//$this->db->join('merchant_type as d','d.mt_id = c.mt_id');
		//$this->db->join('merchant_image as e','e.merchant_id = c.merchant_id');
		//$this->db->join('country_master as f','f.country_id = a.country_id');
		//$this->db->join('deal_master as g','g.mall_id = a.mall_id');
		//$this->db->join('deal_merchant_images as h','h.dm_id = g.dm_id');
		//$this->db->join('sub_category_master as i','i.sub_category_id = g.Sub_Category_id');
		//$this->db->where('a.mall_id',$mall_id);
		//$this->db->where('c.merchant_active','Y');
		//$this->db->group_by('g.dm_id');
		//$query = $this->db->get();
		//return $query->result();
		
		$this->db->select('*');
		$this->db->from('deal_master as a');
		$this->db->join('user_master as b','a.created_by = b.user_id');
		$this->db->join('merchant_master as c','a.merchant_id = c.merchant_id');
		$this->db->join('mall_master as d','a.mall_id = d.mall_id');
		$this->db->join('sub_category_master as f','a.sub_category_id = f.sub_category_id');
		$this->db->join('country_master as g','d.country_id = g.country_id');
		$this->db->join('deal_merchant_images as h','a.dm_id = h.dm_id');
		// $this->db->join('merchant_image as i','c.merchant_id = i.merchant_id');
		$this->db->join('merchant_locations as j','c.merchant_id = j.merchant_id');
		$this->db->where('c.merchant_active','Y');
		$this->db->where('d.mall_id',$mall_id);
		$this->db->where('a.deal_status','L');
		$this->db->group_by('a.dm_id');
		$this->db->order_by('f.sub_category_id','ASC');
		$query = $this->db->get();
		return $query->result();
	
	}


	
	public function getMallImages($mall_id)
	{
		$query = $this->db->get_where('mall_image',array('mall_id' => $mall_id));
		return $query->result();
	}
	
	public function getMallEvents($mall_id)
	{
		$query = $this->db->get_where('mall_event_image',array('mall_id' => $mall_id,));
		return $query->result();
	}

	
	public function getEventsInfo($event_id)
	{	 
	 
		$this->db->select('*');
		$this->db->from('events_master as a');
		$this->db->join('mall_master as b','a.mall_id = b.mall_id');
		$this->db->join('user_master as c','a.user_id = c.user_id');
		$this->db->join('event_image as d','a.event_id = d.event_id'); 
		$this->db->join('events_category as e','a.ec_id = e.ec_id');		
		$this->db->where('a.event_id',$event_id);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function getEventImage($event_id, $event_count)
	{ 
		$query = $this->db->get_where('event_image',array('event_id' => $event_id,'event_count' => $event_count));
		return $query->result();
	}
	
	public function getEventsPerMall($country_id)
	{
		
		$this->db->select('a.mall_name,a.mall_id,c.ec_id,c.event_cat');
		$this->db->distinct('mall_master.mall_name');		
		$this->db->from('mall_master as a');		
		$this->db->join('events_master as b','a.mall_id = b.mall_id');						
		$this->db->join('events_category as c','b.ec_id = c.ec_id');						
		$this->db->where('a.country_id',$country_id);
		$this->db->where('a.mall_active','Y');		
		
		$query = $this->db->get();
		return $query->result();
	
	}
	
	public function getAllEvents($country_id)
	{
		
		$this->db->select('*');				
		$this->db->from('mall_master as a');		
		$this->db->join('events_master as b','a.mall_id = b.mall_id');						
		$this->db->join('events_category as c','b.ec_id = c.ec_id');						
		$this->db->join('event_image as d','b.event_id = d.event_id');	
		$this->db->join('town_master as e','a.town_id = e.town_id');
		$this->db->join('city_master as f','a.city_id = f.city_id');
		$this->db->join('country_master as g','a.country_id = g.country_id');
		$this->db->join('mall_type as h','a.mt_id = h.mt_id');
		$this->db->where('a.country_id',$country_id);
		$this->db->where('a.mall_active','Y');		
		// $this->db->where('b.type', 'P');	
		
		$query = $this->db->get();
				// echo $this->db->last_query();
		return $query->result();


		// $this->db->select('a.mall_id, b.lat, b.long, b.mall_name, d.type_name, a.type, e.event_image, c.country_name, g.city_name, f.town_name');		
		// $this->db->from('events_master as a');		
		// $this->db->join('mall_master as b','a.mall_id = b.mall_id');	
		// $this->db->join('country_master as c','b.country_id = c.country_id');	
		// $this->db->join('mall_type as d','b.mt_id = d.mt_id');	
		// $this->db->join('event_image as e','a.event_id = e.event_id');	
		// $this->db->join('event_image as e','a.event_id = e.event_id');	
		// $query = $this->db->get();
		// 		// echo $this->db->last_query();
		// return $query->result();
	
	
	}
	
	public function getAllEventsCount($country_id)
	{
		$query = $this->db->query("SELECT COUNT(events_master.type) as type_count,type FROM `events_master` INNER JOIN `mall_master` on `mall_master`.`mall_id` = events_master.mall_id WHERE mall_master.mall_active = 'Y' and country_id = ".$country_id." GROUP by events_master.type");

		return $query->result();
	}


	public function getEvents($country_id)
	{	 	 
		$this->db->select('*');
		$this->db->from('events_master as a');
		$this->db->join('mall_master as b','a.mall_id = b.mall_id', 'left');	
		$this->db->join('user_master as c','a.user_id = c.user_id', 'left'); 
		$this->db->join('event_image as d','a.event_id = d.event_id', 'left'); 
		$this->db->join('events_category as e','a.ec_id = e.ec_id', 'left');
		$this->db->join('country_master as f','b.country_id = f.country_id');	
		// $this->db->where('b.mall_active', 'Y');					
		$this->db->where('f.country_id',$country_id);	
		// $this->db->where('a.type',  '');	
		$this->db->group_by('a.event_name');
		$this->db->order_by('a.event_id','ASC');
		$query = $this->db->get();	
		echo $this->db->last_query();	
		return $query->result(); 
	}
	
	
	public function getEventsCount($country_id, $type){
		$this->db->select('*');				
		$this->db->from('events_master as a');		
		$this->db->join('mall_master as b','a.mall_id = b.mall_id', 'left');						
		$this->db->join('country_master as c','b.country_id = c.country_id', 'left');	
		// $this->db->join('event_image as d','a.event_id = d.event_id'); 
		// $this->db->where('b.mall_active', 'Y');				
		$this->db->where('b.country_id',$country_id);	
		if($type){
			$this->db->where('a.type',  $type);		
		}			
		// $this->db->order_by('a.event_image','ASC');
		$query = $this->db->get();
		// echo $this->db->last_query();
		return $query->result();
	}


	// public function getEventsCurrentCount($country_id){
	// 	$this->db->select('*');				
	// 	$this->db->from('events_master as a');		
	// 	$this->db->join('mall_master as b','a.mall_id = b.mall_id');						
	// 	$this->db->join('country_master as c','b.country_id = c.country_id');		
	// 	$this->db->where('a.type', 'C');				
	// 	$this->db->where('b.country_id',$country_id);			
	// 	$query = $this->db->get();
	// 	return $query->result();	
	// }


}