<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class SubCategoryModel extends CI_Model
{
	
	public function getSubCategories()
	{
		$this->db->select('*');
		$this->db->from('sub_category_master as a');
		$this->db->join('category_master as b','a.Category_id = b.Category_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function saveSubCategory()
	{
		$data = array(
			'Category_id' => $this->input->post('Category_id'),
			'Sub_Category_name' => $this->input->post('subcategoryname'),
			'Created_on' => date('Y-m-d'),
			'Created_by' => $this->session->userdata('user')['user_id']
		);

		return $this->db->insert('sub_category_master',$data);
	}

	public function deleteSubcategory()
	{
		$sub_category_id = $this->input->get('sub_category_id');
		$this->db->where('sub_category_id', $sub_category_id);
		$this->db->delete('sub_category_master');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

}

?>