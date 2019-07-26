<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class EventModel extends CI_Model
{
	
	public function saveMallEvent()
	{
		
		$data = array(
			'mall_id' => $this->input->post('mall_id_event'),
			'event_name' => $this->input->post('event_name'),
			'user_id' => $this->input->post('user_id_event'),
			'created_on' => date('Y-m-d')    
		);


		return $this->db->insert('events_master',$data);
	}

	public function getEventImage($event_id, $event_count)
	{ 
		$query = $this->db->get_where('event_image',array('event_id' => $event_id,'event_count' => $event_count));
		return $query->result();
	}


	public function getMallEvent()
	{	
		$mall_id = $this->input->get('mall_id');
		$type = $this->input->get('type');

		if($type == 'A'){


		$this->db->select('a.*, b.mall_id, b.mall_name, c.*');
		$this->db->from('events_master as a');
		$this->db->join('mall_master as b','a.mall_id = b.mall_id');
		$this->db->join('user_master as c','a.user_id = c.user_id');
		$this->db->where('a.mall_id',$mall_id); 
		$this->db->order_by('a.created_on');

		$query = $this->db->get();
		return $query->result();

		}else{

		$this->db->select('a.*, b.mall_id, b.mall_name, c.*');
		$this->db->from('events_master as a');
		$this->db->join('mall_master as b','a.mall_id = b.mall_id');
		$this->db->join('user_master as c','a.user_id = c.user_id');
		$this->db->where('a.mall_id',$mall_id);
		$this->db->where('a.type',$type);
		$this->db->order_by('a.created_on');

		$query = $this->db->get();
		return $query->result();

		}

	 
		

		//return $query->result();
	}

	public function getEventInfo($event_id)
	{
		$this->db->select('*');
		$this->db->from('events_master as a');
		$this->db->join('mall_master as b','a.mall_id = b.mall_id');
		$this->db->join('user_master as c','a.user_id = c.user_id');
		$this->db->join('events_category as d','a.ec_id = d.ec_id');
		$this->db->where('a.event_id',$event_id);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function deleteMallEvent()
	{
		$event_id = $this->input->get('event_id');
		$this->db->where('event_id', $event_id);
		$this->db->delete('events_master');
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
		$query = $this->db->get_where('events_master',array('event_id' => $event_id));
		return $query->row_array();
	}

	public function updateEvent()
		{
		$event_id = $this->input->post('event_id'); 

		$data = array( 
			'event_name' => $this->input->post('event_name'),
			'start_date' => $this->input->post('start_date'),
			'event_description' => $this->input->post('event_description'),
			'all_day' => $this->input->post('all_day'),
			'event_timing' => $this->input->post('specific_timing'),
			'end_date' => $this->input->post('end_date'),
			'location' => $this->input->post('location'),
			'just_1_day' => $this->input->post('one_day'),
			'daily' => $this->input->post('no_closing'),
			'type' => $this->input->post('e_type'),
			'ec_id' => $this->input->post('ec_id')

		);

		$this->db->where('event_id',$event_id);
		$this->db->update('events_master',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}

	}

	public function uploadImageToEvent($event_id,$user_id,$event_count,$filename)
	{

		$data = array(
			'event_id' => $event_id,
			'event_image' => $filename,
			'user_id' => $user_id, 
			'event_count' => $event_count, 
		);

		return $this->db->insert('event_image',$data);
 
	}

	public function deleteEventImage()
	{ 

		$event_image_id = $this->input->get('event_image_id');

		$data = array('event_image_id' => $event_image_id);
		
		$this->db->delete('event_image',$data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function getEventCategory(){

		$this->db->select('*');
		$this->db->from('events_category');

		$query = $this->db->get();
		return $query->result();
	}

	public function updateTypeStatus()
	{ 

		$event_id = $this->input->post('event_id');
		$type = $this->input->post('type');

		$this->db->where('event_id',$event_id);
		$this->db->update('events_master',array('type' => $type));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}


	public function updateFeatured()
	{ 

		$event_id = $this->input->post('event_id');
		$featured = $this->input->post('featured');

		$this->db->where('event_id',$event_id);
		$this->db->update('events_master',array('featured' => $featured));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	
}

?>