<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model
{
	
	public function getCategories()
	{
		$query = $this->db->get('category_master');
		return $query->result();
	}

	public function saveCategory()
	{
			$data = array(
			'Category_name' => $this->input->post('categoryname'),
			'Created_on' => date('Y-m-d'),
			'Created_by' => $this->session->userdata('user')['user_id']
		);

		return $this->db->insert('category_master',$data);
	}

	public function deleteCategory()
	{
		$Category_id = $this->input->get('Category_id');
		$this->db->where('Category_id', $Category_id);
		$this->db->delete('category_master');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}	 

	public function getDealCategoryInfo($sub_category_id)
	{
		$this->db->select('*');
		$this->db->from('sub_category_master as a');
		$this->db->join('category_master as b','a.Category_id = b.Category_id');
		$this->db->join('user_master as c','a.Created_by = c.user_id');
		$this->db->where('a.sub_category_id',$sub_category_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function EditDealCategoryData()
	{
		$sub_category_id = $this->input->post('sub_category_id');

		$data = array(
			'Sub_Category_name' => $this->input->post('Sub_Category_name'),
			'Category_id' => $this->input->post('Category_name'),

		);  

		$this->db->where('sub_category_id',$sub_category_id);
		$this->db->update('sub_category_master',$data);
		
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}


	public function uploadImgDealCategory($sub_category_id,$filename)
	{
		$this->db->where('sub_category_id',$sub_category_id);
		$this->db->update('sub_category_master',array('image' => $filename));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function deleteImgDealCategory()
	{
		$sub_category_id = $this->input->get('sub_category_id');
		$this->db->where('sub_category_id', $sub_category_id);
		$this->db->update('sub_category_master',array('image' => '')); 
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

}

?>