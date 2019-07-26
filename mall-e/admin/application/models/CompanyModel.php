<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class CompanyModel extends CI_Model
{
	
	public function saveCompany()
	{	
		$city_id = $this->input->post('city_id');

		$query = $this->db->get_where('city_master',array('city_id' => $city_id));
		$city = $query->row_array();

		$data = array(
			'company_name' => $this->input->post('companyname'),
			'city_id' => $city_id,
			'country_id' => $city['country_id'],
			'company_address' => '',
			'postal_code' => '',
			'telephone' => '',
			'website' => '',
			'created_on' => date('Y-m-d'),
			'created_by' => $this->session->userdata('user')['user_id']
		);

	 $this->db->insert('company_master',$data);

	 $last_id = $this->db->insert_id();

	 $image = array(
			'company_id' => $last_id,
			'image_name' => '',
			'image_active' => 0,
			'date_added' => date('Y-m-d') 
		);

		return $this->db->insert('company_image',$image);

	}

	public function getCompanies()
	{
		$query = $this->db->get('company_master');
		return $query->result();
	}


	public function getMerchantCompany($merchant_id)
	{
		$this->db->select('*');
		$this->db->from('merchant_master as a');
		$this->db->join('company_master as b','a.company_id = b.company_id');
		$this->db->where('a.merchant_id',$merchant_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getAllCompanies()
	{
		$this->db->select('*');
		$this->db->from('company_master as a');
		$this->db->join('city_master as b','a.city_id = b.city_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function deleteCompany()
	{
		$company_id = $this->input->get('company_id');
		$this->db->where('company_id', $company_id);
		$this->db->delete('company_master');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function getCompanyInfo($company_id)
	{

		$this->db->select('*');
		$this->db->from('company_master as a');
		$this->db->join('city_master as b','a.city_id = b.city_id');
		$this->db->join('country_master as c','a.country_id = c.country_id');
		$this->db->where('a.company_id',$company_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getCompanyImage($company_id)
	{
		$query = $this->db->get_where('company_image',array('company_id' => $company_id));
		return $query->row_array();
	}

	public function updateCompany()
	{
		$comp_id = $this->input->post('company_id_main');

		$data = array(
			'company_name' => $this->input->post('companyname'),
			'city_id' => $this->input->post('city_id'),
			'country_id' => $this->input->post('country_id'),
			'company_address' => $this->input->post('companyaddress'),
			'postal_code' => $this->input->post('postalcode'),
			'telephone' => $this->input->post('telephone'),
			'website' => $this->input->post('website'),
		);


		$this->db->where('company_id',$comp_id);
		$this->db->update('company_master',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function uploadImageToCompany($company_image_id,$filename)
	{
		$this->db->where('company_image_id',$company_image_id);
		$this->db->update('company_image',array('image_name' => $filename));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function deleteCompanyImage()
	{
		$company_image_id = $this->input->get('company_image_id');

		$this->db->where('company_image_id', $company_image_id);
		$this->db->update('company_image',array('image_name' => ''));

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function saveCompanyContact()
	{
		$data = array(
			'company_id' => $this->input->post('company_id'),
			'contact_name' => $this->input->post('contactperson'),
			'position_held' => $this->input->post('positionheld'),
			'contact_number' => $this->input->post('contactnumber'),
			'email_id' => $this->input->post('emailcontact')
		);


		return $this->db->insert('company_contacts',$data);
	}

	public function getCompanyContacts()
	{
		$company_id = $this->input->get('company_id');

		$query = $this->db->get_where('company_contacts',array('company_id' => $company_id));
		return $query->result();
	}

	public function deleteCompanyContact()
	{
		$company_contact_id = $this->input->get('company_contact_id');

		$this->db->where('company_contact_id', $company_contact_id);
		$this->db->delete('company_contacts');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function getSpecificContact()
	{
		$company_contact_id = $this->input->get('company_contact_id');

		$query = $this->db->get_where('company_contacts',array('company_contact_id' => $company_contact_id));
		return $query->row_array();
	}

	public function updateContact()
	{
		$company_contact_id = $this->input->post('company_contact_id_edit');

		$data = array(
			'contact_name' => $this->input->post('contactpersonedit'),
			'position_held' => $this->input->post('positionheldedit'),
			'contact_number' => $this->input->post('contactnumberedit'),
			'email_id' => $this->input->post('emailcontactedit'),
		);

		$this->db->where('company_contact_id',$company_contact_id);
		$this->db->update('company_contacts',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}

	}
	
}

?>