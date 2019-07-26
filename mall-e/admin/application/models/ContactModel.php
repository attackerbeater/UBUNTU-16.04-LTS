<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class ContactModel extends CI_Model
{
	
	public function saveMallContact()
	{
		
		$data = array(
			'mall_id' => $this->input->post('mall_id'),
			'contact_name' => $this->input->post('contactperson'),
			'position_held' => $this->input->post('positionheld'),
			'contact_number' => $this->input->post('contactnumber'),
			'email_id' => $this->input->post('emailcontact')
		);


		return $this->db->insert('mall_contacts',$data);
	}

	public function getMallContacts()
	{	
		$mall_id = $this->input->get('mall_id');

		$query = $this->db->get_where('mall_contacts',array('mall_id' => $mall_id));
		return $query->result();
	}

	public function deleteMallContact()
	{
		$mc_id = $this->input->get('mc_id');
		$this->db->where('mc_id', $mc_id);
		$this->db->delete('mall_contacts');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function getSpecificContact()
	{
		$mc_id = $this->input->get('mc_id');
		$query = $this->db->get_where('mall_contacts',array('mc_id' => $mc_id));
		return $query->row_array();
	}

	public function updateContact()
	{
		$mc_id = $this->input->post('mc_idedit');

		$data = array(
			'contact_name' => $this->input->post('contactpersonedit'),
			'position_held' => $this->input->post('positionheldedit'),
			'contact_number' => $this->input->post('contactnumberedit'),
			'email_id' => $this->input->post('emailcontactedit'),
		);

		$this->db->where('mc_id',$mc_id);
		$this->db->update('mall_contacts',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}

	}
	
}

?>