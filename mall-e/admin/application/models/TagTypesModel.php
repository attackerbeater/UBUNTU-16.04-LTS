<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class TagTypesModel extends CI_Model
{
	
	public function getTagType()
	{
		$query = $this->db->get('tags_master');
		return $query->result();
	}
	public function getTagTypeInfo($tag_id)
	{  
		$this->db->select('*');
		$this->db->from('tags_master as a');  
		$this->db->join('user_master as b','a.user_id = b.user_id');  
		$this->db->where('a.tag_id',$tag_id);
		

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

	public function editTagType()
	{
		$tag_id = $this->input->post('tag_id');

		$data = array(
			'tag_name' => $this->input->post('tag_name')   
		);  

		$this->db->where('tag_id',$tag_id);
		$this->db->update('tags_master',$data);
		
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function uploadImageTagType($tag_id,$filename)
	{
		$this->db->where('tag_id',$tag_id);
		$this->db->update('tags_master',array('image' => $filename));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

public function deleteImgTag()
	{
		$tag_id = $this->input->get('tag_id');
		$this->db->where('tag_id', $tag_id);
		$this->db->update('tags_master',array('image' => '')); 
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}
	
}

?>