<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');


	class ShopperModel extends CI_Model
	{
		
		public function getShoppers()
		{
			$query = $this->db->get('shoppers_master');
			return $query->result();
		}
	}

 ?>