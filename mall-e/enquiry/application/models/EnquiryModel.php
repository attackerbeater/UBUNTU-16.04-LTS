<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class EnquiryModel extends CI_Model
{
	
	public function getCountry()
	{
		$query = $this->db->get('country_master');
		return $query->result();
	}


	public function saveEnquiry()
	{
		$data = array(
			'Inquiry_Date' => date('Y-m-d'),
			'Outlet_name' => $this->input->post('m_name'),
			'Contact_person' => $this->input->post('name'),
			'Contact_number' => $this->input->post('number'),
			'Email_id' => $this->input->post('email'),
			'Country' => $this->input->post('country')
		);

		return $this->db->insert('inquiry_master',$data);
	}

}

?>