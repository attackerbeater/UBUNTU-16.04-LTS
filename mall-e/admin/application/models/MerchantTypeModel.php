<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class MerchantTypeModel extends CI_Model
{
	
	public function getTagType()
	{
		$query = $this->db->get('tags_master');
		return $query->result();
	}
	public function getMerchantTypeInfo($mt_id)
	{  
		$this->db->select('*');
		$this->db->from('merchant_type as a');  
		$this->db->join('user_master as b','a.user_id = b.user_id');  
		$this->db->where('a.mt_id',$mt_id);
		

		$query = $this->db->get();
		return $query->row_array();
	} 
	public function saveTagType()
	{
		$data = array(
			'tag_name' => $this->input->post('tagtype'),
			'user_id' => $this->input->post('user_id'),
			'dated' => date('d-m-Y'), 
		);

		return $this->db->insert('tags_master',$data);
	}

	public function deleteTagType()
	{
		$tag_id = $this->input->get('tag_id');
		$this->db->where('tag_id', $tag_id);
		$this->db->delete('tags_master');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function editMType()
	{
		$mt_id = $this->input->post('mt_id');

		$data = array(
			'type' => $this->input->post('merchant_type')   
		);  

		$this->db->where('mt_id',$mt_id);
		$this->db->update('merchant_type',$data);
		
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function uploadImageMType($mt_id,$filename)
	{
		$this->db->where('mt_id',$mt_id);
		$this->db->update('merchant_type',array('image' => $filename));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

public function deleteImgMT()
	{
		$mt_id = $this->input->get('mt_id');
		$this->db->where('mt_id', $mt_id);
		$this->db->update('merchant_type',array('image' => '')); 
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}
	
}

?>