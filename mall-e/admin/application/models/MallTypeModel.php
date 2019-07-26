<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class MallTypeModel extends CI_Model
{
	
	public function getMallType()
	{
		$query = $this->db->get('mall_type');
		return $query->result();
	}

	public function saveMallType()
	{
		$data = array(
			'type_name' => $this->input->post('malltype')
		);

		return $this->db->insert('mall_type',$data);
	}

	public function deleteMallType()
	{
		$mt_id = $this->input->get('mt_id');
		$this->db->where('mt_id', $mt_id);
		$this->db->delete('mall_type');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	
}

?>