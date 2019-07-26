<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class TownModel extends CI_Model
{
	public function getTownWithCity()
	{
		$this->db->select('*');
		$this->db->from('town_master as a');
		$this->db->join('city_master as b','a.city_id = b.city_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function saveTown()
	{
		$data = array(
			'town_name' => $this->input->post('townName'),
			'city_id' => $this->input->post('city_id'),
			'date_added' => date('Y-m-d'),
			'user_id' => $this->session->userdata('user')['user_id']
		);

		return $this->db->insert('town_master',$data);
	}

	public function deleteTown()
	{
		$town_id = $this->input->get('town_id');
		$this->db->where('town_id', $town_id);
		$this->db->delete('town_master');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function getTownByCity()
	{
		$city_id = $this->input->get('city_id');

		$query = $this->db->get_where('town_master',array('city_id' => $city_id));
		
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}
}

?>