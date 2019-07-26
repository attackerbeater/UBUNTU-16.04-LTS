<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class DealModel extends CI_Model
{
	
		
		public function saveDeal()
			{
				$merchantname = $this->input->post('merchantname');
				$mallname = $this->input->post('mallname');

				$q = $this->db->get_where('merchant_master',array('merchant_name' => $merchantname));
				$q1 = $q->row_array();

				$merchant_id = $q1['merchant_id'];

				$r = $this->db->get_where('mall_master',array('mall_name' => $mallname));
				$r1 = $r->row_array();

				$s = $this->db->get('sub_category_master');
				$s1 = $s->row_array();


				$mall_id = $r1['mall_id'];

				$user_id = $this->session->userdata('user')['user_id'];

				$deal_ids = $this->db->count_all_results('deal_master');

				$deal_id = $deal_ids + 1;

				$data = array(
					'deal_id' => date('Y-m').'-'.$deal_id,
					'deal_date' => date('Y-m-d'),
					'created_by' => $user_id,
					'merchant_id' => $merchant_id,
					'mall_id' => $mall_id,
					'deal_status' => 'P',
					'sub_category_id' => $s1['sub_category_id'],
					'deal_amount' => 0,
					'usual_price' => 0,
					'short_desc' => '',
					'long_desc' => ''

				);

				$this->db->insert('deal_master',$data);

				$last_id = $this->db->insert_id();

				/*$image = array(

						array(
							
							'dm_id' => $last_id,
							'image_name' => '',
							'image_active' => '0',
							'date_added' => date('Y-m-d') 
						),
						array(
							
							'dm_id' => $last_id,
							'image_name' => '',
							'image_active' => '0',
							'date_added' => date('Y-m-d') 
						),
						array(
							
							'dm_id' => $last_id,
							'image_name' => '',
							'image_active' => '0',
							'date_added' => date('Y-m-d') 
						),

		);


		return $this->db->insert_batch('deal_merchant_images',$image);*/

	}	


	public function getDeals()
	{
		$this->db->select('a.*, b.short_name, b.user_id, c.merchant_name, d.mall_name, g.currency_symbol, f.Sub_Category_name, h.deal_main_name');
		$this->db->from('deal_master as a');
		$this->db->join('user_master as b','a.created_by = b.user_id');
		$this->db->join('merchant_master as c','a.merchant_id = c.merchant_id');
		$this->db->join('mall_master as d','a.mall_id = d.mall_id');
		$this->db->join('sub_category_master as f','a.sub_category_id = f.sub_category_id');
		$this->db->join('country_master as g','d.country_id = g.country_id');
		$this->db->join('deals_main as h','h.dm_id = a.dm_id', 'left');
		$this->db->order_by('a.dm_id','desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	
	public function displayDealsbyMerchantMall($merchant_name,$mall_name)
	{
		
		if($merchant_name != '' && $mall_name == '')
		$value = array('c.merchant_name'=> $merchant_name);
		if($mall_name != '' && $merchant_name== '')
		$value = array('d.mall_name' => $mall_name);
		if($merchant_name != '' && $mall_name != '')
		$value = array('d.mall_name' => $mall_name,'c.merchant_name'=> $merchant_name);
		
		
		$this->db->select('a.*, b.short_name, b.user_id, c.merchant_name, d.mall_name, g.currency_symbol, f.Sub_Category_name, h.deal_main_name');
		$this->db->from('deal_master as a');
		$this->db->join('user_master as b','a.created_by = b.user_id');
		$this->db->join('merchant_master as c','a.merchant_id = c.merchant_id');
		$this->db->join('mall_master as d','a.mall_id = d.mall_id');
		$this->db->join('sub_category_master as f','a.sub_category_id = f.sub_category_id');
		$this->db->join('country_master as g','d.country_id = g.country_id');
		$this->db->join('deals_main as h','h.dm_id = a.dm_id', 'left');
		$this->db->where($value);
		$this->db->order_by('a.dm_id','desc');
		$query = $this->db->get();
		//echo $this->db->last_query();
		//var_export($query);
		return $query->result();
	}

	public function deleteDeal()
	{
		$deal_master_id = $this->input->get('deal_master_id');
		$this->db->where('deal_master_id', $deal_master_id);
		$this->db->delete('deal_master');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function updateDealStatus()
	{
		
		$deal_master_id = $this->input->post('deal_master_id');
		$deal_status = $this->input->post('deal_status');

		$this->db->where('deal_master_id',$deal_master_id);
		$this->db->update('deal_master',array('deal_status' => $deal_status));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	
	
	public function updateDealFeatured()
	{
		
		$deal_master_id = $this->input->post('deal_master_id');
		$featured = $this->input->post('featured_data');

		$this->db->where('deal_master_id',$deal_master_id);
		$this->db->update('deal_master',array('featured' => $featured));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}

	public function getDealInfo($deal_master_id)
	{
		$this->db->select('*');
		$this->db->from('deal_master as a');
		$this->db->join('user_master as b','a.created_by = b.user_id');
		$this->db->join('merchant_master as c','a.merchant_id = c.merchant_id');
		$this->db->join('mall_master as d','a.mall_id = d.mall_id');
		$this->db->join('sub_category_master as e','a.sub_category_id = e.sub_category_id');
		$this->db->join('merchant_locations as f','c.merchant_id = f.merchant_id');
		$this->db->join('country_master as g','d.country_id = g.country_id');
		$this->db->join('deals_images as i','i.di_id = a.di_id', 'left');
		$this->db->join('deals_main as h','h.dm_id = a.dm_id', 'left');
		$this->db->where('a.deal_master_id',$deal_master_id);
		$query = $this->db->get();
		return $query->row_array();

	}
	
	public function cloneDeal()
	{
		$deal_master_id = $this->input->get('deal_master_id');
		$this->db->select('deal_date,a.created_by,a.merchant_id,a.mall_id,featured,deal_status,a.sub_category_id,deal_amount,usual_price,short_desc,long_desc');
		$this->db->from('deal_master as a');
		$this->db->join('user_master as b','a.created_by = b.user_id');
		$this->db->join('merchant_master as c','a.merchant_id = c.merchant_id');
		$this->db->join('mall_master as d','a.mall_id = d.mall_id');
		$this->db->join('sub_category_master as e','a.sub_category_id = e.sub_category_id');
		$this->db->join('merchant_locations as f','c.merchant_id = f.merchant_id');
		$this->db->join('country_master as g','d.country_id = g.country_id');
		$this->db->where('a.deal_master_id',$deal_master_id);
		//echo $this->db->last_query();
		$query = $this->db->get();
		$data = $query->row_array();
		//var_export($data);
		$deal_id = $this->db->count_all_results('deal_master');
		$last_row=$this->db->select('deal_master_id')->order_by('deal_master_id',"desc")->limit(1)->get('deal_master')->row_array();
		//var_export($last_row);
		$data['deal_id'] = date('Y-m').'-'.$last_row['deal_master_id'] ;
		return $this->db->insert('deal_master',$data);
		
		
	}

	public function updateDeal()
	{
		$deal_master_id = $this->input->post('deal_master_id');

		$merchantname = $this->input->post('merchantname');
		$mallname = $this->input->post('mallname');
		$subcategory = $this->input->post('subcategory');

		$q = $this->db->get_where('merchant_master',array('merchant_name' => $merchantname));
		$q1 = $q->row_array();
		$merchant_id = $q1['merchant_id'];

		$r = $this->db->get_where('mall_master',array('mall_name' => $mallname));
		$r1 = $r->row_array();
		$mall_id = $r1['mall_id'];

		$s = $this->db->get_where('sub_category_master',array('Sub_Category_name' => $subcategory));
		$s1 = $s->row_array();
		$sub_category_id = $s1['sub_category_id'];


		$data = array(

					'merchant_id' => $merchant_id,
					'mall_id' => $mall_id,
					'sub_category_id' => $sub_category_id,
					'deal_amount' => $this->input->post('dealamount'),
					'usual_price' => $this->input->post('usualprice'),
					'short_desc' => $this->input->post('short_desc'),
					'di_id' => $this->input->post('di_id1'),
					'dm_id' => $this->input->post('dm_id_main2'),
					'deal_start' => $this->input->post('start_date'),
					'deal_ends' => $this->input->post('end_date'),
					'no_end_date' => $this->input->post('no_end_date'),

		);

		$this->db->where('deal_master_id',$deal_master_id);
		$this->db->update('deal_master',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}

	}

	public function getImages($dm_id, $count)
	{
		$query = $this->db->get_where('deal_merchant_images',array('dm_id' => $dm_id, 'img_count' => $count));
		return $query->result();
	}
	public function uploadDealImage($dm_id,$filename,$count)
	{
		$this->db->insert('deal_merchant_images',array('dm_id' => $dm_id, 'image_name' => $filename,'img_count' => $count, 'date_added' => date('Y-m-d')));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
	}
	

	public function deleteImage()
	{
		$dm_images_id = $this->input->get('dm_images_id');
		
		$this->db->delete('deal_merchant_images',array('dm_images_id' => $dm_images_id));

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;	
		}
			
	}

	public function getDealsMain(){

		$merchant_id = $this->input->get('merchant_id');

		$query = $this->db->get_where('deals_main',array('merchant_id' => $merchant_id));
		return $query->result();
	}

	public function getDealsMainSpec(){

		$dm_id = $this->input->get('dm_id');
		
			$query = $this->db->get_where('deals_main',array('dm_id' => $dm_id));
			return $query->result();
		
		
	}

    	public function getMerchantImageDeal()
	{
	    $dm_id = $this->input->get('dm_id');
        
        $this->db->from('deals_images');
        $this->db->where('dm_id',$dm_id);
        $this->db->order_by("img_count");
        $query = $this->db->get(); 
        return $query->result();
	}
	
		public function getDealTags()
	{
		$dm_id = $this->input->get('dm_id'); 

		$this->db->select('*');
		$this->db->from('deals_tags as a');
		$this->db->join('tags_master as b','a.tag_id = b.tag_id');   
		$this->db->where('a.dm_id',$dm_id);

		$query = $this->db->get();
		return $query->result();
	}

	public function updateMonday()
	{ 

		$dm_id = $this->input->post('dm_id');
		$Monday = $this->input->post('Monday');

		$query = $this->db->get_where('deals_by_week',array('dm_id' => $dm_id));
		$prm = $query->row_array();


		if (empty($prm)) {
			$data = array(
			'monday' => $Monday,
			'dm_id' => $dm_id  
		); 
		 $this->db->insert('deals_by_week',$data);

		 if ($this->db->affected_rows() > 0) {
			return true;
			}
			else{
			return false;	
			}
		

		}else{
			$this->db->where('dm_id',$dm_id);
			$this->db->update('deals_by_week',array('monday' => $Monday));
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else{
				return false;	
			}
		}
		
	}

	public function updateTuesday()
	{ 

		$dm_id = $this->input->post('dm_id');
		$Tuesday = $this->input->post('Tuesday');

		$query = $this->db->get_where('deals_by_week',array('dm_id' => $dm_id));
		$prm = $query->row_array();


		if (empty($prm)) {
			$data = array(
			'tuesday' => $Tuesday,
			'dm_id' => $dm_id  
		); 
		 $this->db->insert('deals_by_week',$data);

		 if ($this->db->affected_rows() > 0) {
			return true;
			}
			else{
			return false;	
			}
		

		}else{
			$this->db->where('dm_id',$dm_id);
			$this->db->update('deals_by_week',array('tuesday' => $Tuesday));
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else{
				return false;	
			}
		}
		
	}

	public function updateWednesday()
	{ 

		$dm_id = $this->input->post('dm_id');
		$Wednesday = $this->input->post('Wednesday');

		$query = $this->db->get_where('deals_by_week',array('dm_id' => $dm_id));
		$prm = $query->row_array();


		if (empty($prm)) {
			$data = array(
			'wednesday' => $Wednesday,
			'dm_id' => $dm_id  
		); 
		 $this->db->insert('deals_by_week',$data);

		 if ($this->db->affected_rows() > 0) {
			return true;
			}
			else{
			return false;	
			}
		

		}else{
			$this->db->where('dm_id',$dm_id);
			$this->db->update('deals_by_week',array('wednesday' => $Wednesday));
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else{
				return false;	
			}
		}
		
	}

	public function updateThursday()
	{ 

		$dm_id = $this->input->post('dm_id');
		$Thursday = $this->input->post('Thursday');

		$query = $this->db->get_where('deals_by_week',array('dm_id' => $dm_id));
		$prm = $query->row_array();


		if (empty($prm)) {
			$data = array(
			'thursday' => $Thursday,
			'dm_id' => $dm_id  
		); 
		 $this->db->insert('deals_by_week',$data);

		 if ($this->db->affected_rows() > 0) {
			return true;
			}
			else{
			return false;	
			}
		

		}else{
			$this->db->where('dm_id',$dm_id);
			$this->db->update('deals_by_week',array('thursday' => $Thursday));
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else{
				return false;	
			}
		}
		
	}

	public function updateFriday()
	{ 

		$dm_id = $this->input->post('dm_id');
		$Friday = $this->input->post('Friday');

		$query = $this->db->get_where('deals_by_week',array('dm_id' => $dm_id));
		$prm = $query->row_array();


		if (empty($prm)) {
			$data = array(
			'friday' => $Friday,
			'dm_id' => $dm_id  
		); 
		 $this->db->insert('deals_by_week',$data);

		 if ($this->db->affected_rows() > 0) {
			return true;
			}
			else{
			return false;	
			}
		

		}else{
			$this->db->where('dm_id',$dm_id);
			$this->db->update('deals_by_week',array('friday' => $Friday));
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else{
				return false;	
			}
		}
		
	}

	public function updateSaturday()
	{ 

		$dm_id = $this->input->post('dm_id');
		$Saturday = $this->input->post('Saturday');

		$query = $this->db->get_where('deals_by_week',array('dm_id' => $dm_id));
		$prm = $query->row_array();


		if (empty($prm)) {
			$data = array(
			'saturday' => $Saturday,
			'dm_id' => $dm_id  
		); 
		 $this->db->insert('deals_by_week',$data);

		 if ($this->db->affected_rows() > 0) {
			return true;
			}
			else{
			return false;	
			}
		

		}else{
			$this->db->where('dm_id',$dm_id);
			$this->db->update('deals_by_week',array('saturday' => $Saturday));
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else{
				return false;	
			}
		}
		
	}

	public function updateSunday()
	{ 

		$dm_id = $this->input->post('dm_id');
		$Sunday = $this->input->post('Sunday');

		$query = $this->db->get_where('deals_by_week',array('dm_id' => $dm_id));
		$prm = $query->row_array();


		if (empty($prm)) {
			$data = array(
			'sunday' => $Sunday,
			'dm_id' => $dm_id  
		); 
		 $this->db->insert('deals_by_week',$data);

		 if ($this->db->affected_rows() > 0) {
			return true;
			}
			else{
			return false;	
			}
		

		}else{
			$this->db->where('dm_id',$dm_id);
			$this->db->update('deals_by_week',array('sunday' => $Sunday));
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else{
				return false;	
			}
		}
		
	}

	public function getDealDOW($dm_id)
	{
		 
		$this->db->from('deals_by_week');

		$this->db->where('dm_id',$dm_id);

		$query = $this->db->get();
		return $query->row_array();
	}


}
 
?>