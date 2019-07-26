<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CityModel extends CI_Model
{
	
	public function getCityForSelect()
	{
		
		$query = $this->db->get('city_master');
		return $query->result();
	}

	public function getCitiesWithCountry()
	{
		$this->db->select('*');
		$this->db->from('city_master as a');
		$this->db->join('country_master as b','a.country_id = b.country_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function saveCity()
	{
		$data = array(
			'city_name' => $this->input->post('cityname'),
			'state_id' => '0',
			'country_id' => $this->input->post('country_id'),
			'favourite' => '',
			'date_added' => date('Y-m-d'),
			'user_id' => $this->session->userdata('user')['user_id']
		);

		return $this->db->insert('city_master',$data);
	}

	public function deleteCity()
	{
		$ct_id = $this->input->get('ct_id');
		$this->db->where('city_id', $ct_id);
		$this->db->delete('city_master');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function getCitiesByCountry()
	{
		$country_id = $this->input->get('country_id');

		$query = $this->db->get_where('city_master',array('country_id' => $country_id));
		
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}
}

?>