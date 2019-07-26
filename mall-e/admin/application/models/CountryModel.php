<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class CountryModel extends CI_Model
{
	
	public function getCountries()
	{
		$query = $this->db->get('country_master');
		return $query->result();
	}

	public function saveCountry()
	{
		$data = array(
			'country_name' => $this->input->post('countryname'),
			'one_city' => '',
			'country_code' => '',
			'nationality' => '',
			'currency_symbol' => '',
			'currency_name' => '',
			'date_added' => date('Y-m-d'),
			'user_id' => $this->session->userdata('user')['user_id'],
			'favorite' => '',
			'open_to' => '',
			'active' => ''
		);

		return $this->db->insert('country_master',$data);
	}

	public function deleteCountry()
	{
		$country_id = $this->input->get('country_id');
		$this->db->where('country_id', $country_id);
		$this->db->delete('country_master');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}
	
}

?>