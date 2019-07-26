<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class InquiryModel extends CI_Model
{
	
	public function getInquirues()
	{
		$this->db->from('Inquiry_master as a');
		$this->db->join('country_master as b','b.country_id = a.Country');
		$query = $this->db->get();
		return $query->result();
	}
}
 ?>