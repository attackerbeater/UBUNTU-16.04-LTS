<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MerchantModel extends CI_Model
{

	public function saveMerchant()
	{

		$c1 = $this->db->get('country_master');
		$c = $c1->row_array();

		$m1 = $this->db->get('merchant_type');
		$m = $m1->row_array();

		$data = array(
			'merchant_name' => $this->input->post('merchantname'),
			'city_id' => 0,
			'country_id' => $c['country_id'],
			'town_id' => 0,
			'merchant_address' => '',
			'postal_code' => '',
			'telephone' => '',
			'website' => '',
			'company_id' => 0,
			'mt_id' => $m['mt_id']
		);

		$this->db->insert('merchant_master',$data);

		$last_id = $this->db->insert_id();

		$image = array(
			'merchant_id' => $last_id,
			'image_name' => '',
			'image_active' => 0,
			'date_added' => date('Y-m-d')
		);

		return $this->db->insert('merchant_image',$image);
	}

	public function getMerchants()
	{
		$this->db->select('*');
		$this->db->from('merchant_master as a');
		$this->db->join('country_master as b','a.country_id = b.country_id');
		$this->db->join('merchant_type as c','a.mt_id = c.mt_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function deleteMerchant()
	{
		$merchant_id = $this->input->get('merchant_id');
		$this->db->where('merchant_id', $merchant_id);
		$this->db->delete('merchant_master');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function getMerchantInfo($merchant_id)
	{

		$this->db->select('*');
		$this->db->from('merchant_master as a');
		$this->db->join('country_master as b','a.country_id = b.country_id');
		$this->db->join('merchant_type as c','a.mt_id = c.mt_id');
		$this->db->where('a.merchant_id',$merchant_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getMerchantTypes()
	{
		$query = $this->db->get('merchant_type');
		return $query->result();
	}


	public function getMerchantLevels()
	{
		$query = $this->db->get('level_master');
		return $query->result();
	}

	public function getMerchantNames()
	{

       	// $this->db->like("merchant_name", $merchant_name,'both');
       	// $this->db->limit(5);
        $query = $this->db->get('merchant_master');
        return $query->result();
	}


	public function updateMerchant()
	{

		$comp_name = $this->input->post('parentcompany');
		$country_name = $this->input->post('country');
		$type_name = $this->input->post('merchanttype');

		$s1 = $this->db->get_where('merchant_type',array('type' => $type_name));
		$s = $s1->row_array();

		$q1 = $this->db->get_where('country_master',array('country_name' => $country_name));
		$q = $q1->row_array();

		$query = $this->db->get_where('company_master',array('company_name' => $comp_name));
		$comp = $query->row_array();

		$merchant_id = $this->input->post('merchant_id_main');

		$data = array(
			'merchant_name' => $this->input->post('merchantname'),
			'merchant_address' => $this->input->post('merchantaddress'),
			'postal_code' => $this->input->post('postalcode'),
			'telephone' => $this->input->post('telephone'),
			'website' => $this->input->post('website'),
			'facebook' => $this->input->post('facebook'),
			'instagram' => $this->input->post('instagram'),
			'twitter' => $this->input->post('twitter'),
			'opening_hour' => $this->input->post('opening_hour'),
			'about_us' => $this->input->post('about_us'),
			'merchant_active' => $this->input->post('merchantactive'),
			'company_id' => $comp['company_id'],
			'country_id' => $q['country_id'],
			'mt_id' => $s['mt_id'],
			'youtube' =>$this->input->post('youtube'),
			'featured' =>$this->input->post('featured')



		);


		$this->db->where('merchant_id',$merchant_id);
		$this->db->update('merchant_master',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function getMerchantImage($merchant_id)
	{
		$query = $this->db->get_where('merchant_image',array('merchant_id' => $merchant_id));
		return $query->row_array();
	}

	public function getMerchantImagePromo($promo_id,$count)
	{
		$query = $this->db->get_where('merchant_promo_image',array('promo_id' => $promo_id,'image_count' => $count));
		return $query->result();
	}


	public function uploadImageToMerchant($merchant_image_id,$filename)
	{
		$this->db->where('merchant_image_id',$merchant_image_id);
		$this->db->update('merchant_image',array('image_name' => $filename));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}


	public function uploadImageToMerchantPromo($merchant_id,$promo_id,$count,$filename)
	{
		//$this->db->where('merchant_image_id',$merchant_image_id);
		$this->db->insert('merchant_promo_image',array('merchant_id' => $merchant_id, 'image_name' => $filename,'image_count' => $count, 'promo_id' => $promo_id));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function uploadImageToMerchantMain($merchant_id,$filename)
	{
		$this->db->where('merchant_id',$merchant_id);
		$this->db->update('merchant_master', array('main_image'=>$filename));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function uploadImageToMerchantMainLoc($merchantLoc_id,$filename)
	{
		$this->db->where('merchantLocation_id',$merchantLoc_id);
		$this->db->update('merchant_locations', array('main_image'=>$filename));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function deleteMerchantImage()
	{
		$merchant_image_id = $this->input->get('merchant_image_id');

		$this->db->where('merchant_image_id', $merchant_image_id);
		$this->db->update('merchant_image',array('image_name' => ''));

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function deleteMerchantImageMain()
	{
		$merchant_id = $this->input->get('merchant_id');

		$this->db->where('merchant_id', $merchant_id);
		$this->db->update('merchant_master',array('main_image' => ''));

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function deleteMerchantImageMainLoc()
	{
		$merchantLocation_id = $this->input->get('merchantLocation_id');

		$this->db->where('merchantLocation_id', $merchantLocation_id);
		$this->db->update('merchant_locations',array('main_image' => ''));

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}



	public function deleteMerchantImagePromo()
	{
		$mallpromo_image_id = $this->input->get('mallpromo_image_id');
		//$count = $this->input->get('count');

		//$this->db->where();
		$this->db->delete('merchant_promo_image',array('mallpromo_image_id' => $mallpromo_image_id));

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function saveMerchantContact()
	{
		$data = array(
			'merchant_id' => $this->input->post('merchant_id'),
			'contact_name' => $this->input->post('contactperson'),
			'position_held' => $this->input->post('positionheld'),
			'contact_number' => $this->input->post('contactnumber'),
			'email_id' => $this->input->post('emailcontact')
		);


		return $this->db->insert('merchant_contacts',$data);
	}

	public function saveMerchantLocation()
	{


		$mall_name = $this->input->post('mall_name');


		$query = $this->db->get_where('mall_master',array('mall_name' => $mall_name));
		$mall = $query->row_array();

		$mall_id = $mall['mall_id'];

		$data = array(
			'merchant_id' => $this->input->post('merchant_id'),
			'mall_id' => $mall_id,
			'merchant_location' => $this->input->post('location'),
			'level_id' => $this->input->post('level_id'),

		);


		$this->db->insert('merchant_locations',$data);


		$last_id = $this->db->insert_id();

		$image = array(

						array(

							'merchantLocation_id' => $last_id,
							'merchant_id' => $this->input->post('merchant_id'),
							'image_name' => '',
							'image_active' => '0',
							'date_added' => date('Y-m-d')
						),
						array(

							'merchantLocation_id' => $last_id,
							'merchant_id' => $this->input->post('merchant_id'),
							'image_name' => '',
							'image_active' => '0',
							'date_added' => date('Y-m-d')
						),
						array(

							'merchantLocation_id' => $last_id,
							'merchant_id' => $this->input->post('merchant_id'),
							'image_name' => '',
							'image_active' => '0',
							'date_added' => date('Y-m-d')
						),

		);


		return $this->db->insert_batch('merchant_loc_image',$image);
	}

	public function getMerchantContacts()
	{
		$merchant_id = $this->input->get('merchant_id');

		$query = $this->db->get_where('merchant_contacts',array('merchant_id' => $merchant_id));
		return $query->result();
	}


	public function getMerchantLocation()
	{
		$merchant_id = $this->input->get('merchant_id');

		$this->db->select('*');
		$this->db->from('merchant_locations as a');
		$this->db->join('mall_master as b','a.mall_id = b.mall_id');
		$this->db->join('level_master as c','a.level_id = c.level_id', 'left');
		$this->db->where('a.merchant_id',$merchant_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function deleteMerchantContact()
	{
		$mrc_id = $this->input->get('mrc_id');
		$this->db->where('mrc_id', $mrc_id);
		$this->db->delete('merchant_contacts');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}


	public function deleteMerchantLocation()
	{
		$merchantLocation_id = $this->input->get('merchantLocation_id');
		$this->db->where('merchantLocation_id', $merchantLocation_id);
		$this->db->delete('merchant_locations');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function getSpecificContact()
	{
		$mrc_id = $this->input->get('mrc_id');
		$query = $this->db->get_where('merchant_contacts',array('mrc_id' => $mrc_id));
		return $query->row_array();
	}

	public function getSpecificLocation()
	{
		$merchantLocation_id = $this->input->get('merchantLocation_id');
		$this->db->select('*');
		$this->db->from('merchant_locations as a');
		$this->db->join('mall_master as b','a.mall_id = b.mall_id');
		$this->db->where('a.merchantLocation_id',$merchantLocation_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function updateContact()
	{
		$mrc_id = $this->input->post('mrc_idedit');

		$data = array(
			'contact_name' => $this->input->post('contactpersonedit'),
			'position_held' => $this->input->post('positionheldedit'),
			'contact_number' => $this->input->post('contactnumberedit'),
			'email_id' => $this->input->post('emailcontactedit'),
		);

		$this->db->where('mrc_id',$mrc_id);
		$this->db->update('merchant_contacts',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}

	}

	public function updateLocation()
	{

		$mall_name = $this->input->post('mallname');


		$query = $this->db->get_where('mall_master',array('mall_name' => $mall_name));
		$mall = $query->row_array();

		$mall_id = $mall['mall_id'];

		$merchantLocation_id = $this->input->post('merchantLocation_id');
		$data = $this->input->post();
		unset($data['mallname']);
		unset($data['merchantLocation_id']);


		//$data = array(
		//	'mall_id' => $mall_id,
		//	'merchant_location' => $this->input->post('location')
		//);

		$this->db->where('merchantLocation_id',$merchantLocation_id);
		$this->db->update('merchant_locations',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}

	}

	public function getMerchantLocationInfo($merchantLocation_id)
	{
		$this->db->select('*, a.main_image as location_image');
		$this->db->from('merchant_locations as a');
		$this->db->join('merchant_master as b','a.merchant_id = b.merchant_id');
		$this->db->join('mall_master as c','a.mall_id = c.mall_id');
		$this->db->join('level_master as d','a.level_id = d.level_id','left');
		$this->db->where('a.merchantLocation_id',$merchantLocation_id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getLocationImages($merchantLocation_id)
	{
		$query = $this->db->get_where('merchant_loc_image',array('merchantLocation_id' => $merchantLocation_id));
		return $query->result();
	}

	public function uploadImageToMerchantLocation($merchant_image_id,$filename)
	{
		$this->db->where('merchant_image_id',$merchant_image_id);
		$this->db->update('merchant_loc_image',array('image_name' => $filename));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function deleteMerchantLocationImage()
	{
		$merchant_image_id = $this->input->get('merchant_image_id');

		$this->db->where('merchant_image_id', $merchant_image_id);
		$this->db->update('merchant_loc_image',array('image_name' => ''));

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function saveMerchantType()
	{
		$data = array(
			'type' => $this->input->post('merchanttype'),
			'user_id' => $this->input->post('user_id')
		);

		return $this->db->insert('merchant_type',$data);
	}

	public function deleteMerchantType()
	{
		$mt_id = $this->input->get('mt_id');

		$this->db->where('mt_id', $mt_id);
		$this->db->delete('merchant_type');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function getSpecificMerchantType()
	{
		$mt_id = $this->input->get('mt_id');
		$query = $this->db->get_where('merchant_type',array('mt_id' => $mt_id));
		return $query->row_array();
	}

	public function updateMerchantType()
	{
		$mt_id = $this->input->post('mt_id_edit');

		$data = array(
			'type' => $this->input->post('merchantedit'),
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


	public function saveMerchantPromo()
	{

		$data = array(
			'merchant_id' => $this->input->post('merchant_id_promo'),
			'promo_name' => $this->input->post('promotion_name'),
			'user_id' => $this->input->post('user_id_promo'),
			'dated' => date('Y-m-d')
		);


		return $this->db->insert('promotions_master',$data);
	}

    public function processEditMerchantProm()
    {
//        print_r($this->input->post());
        $promo_id = $this->input->post('promo_id');
        $data = array(
            'merchant_id' => $this->input->post('merchant_id'),
            'description' => $this->input->post('description'),
            'promo_name' => $this->input->post('promo_name'),
            'amount' => $this->input->post('promo_amount'),
            'other_offer' => $this->input->post('other_offer'),
            'redeemable' => $this->input->post('redeemable_txt'),
            'user_id' => $this->input->post('user_id'),
            'start_on' => $this->input->post('start_date'),
            'ends_on' => $this->input->post('end_date'),
            'no_end_date' => $this->input->post('no_end_date'),
        );



        $this->db->where('promo_id', $promo_id);
        $this->db->update('promotions_master', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function getMerchantPromo()
	{
		$merchant_id = $this->input->get('merchant_id');


		$this->db->select('*');
		$this->db->from('promotions_master as a');
		$this->db->join('merchant_master as b','a.merchant_id = b.merchant_id');
		$this->db->join('user_master as c','a.user_id = c.user_id');
		$this->db->where('a.merchant_id',$merchant_id);

		$query = $this->db->get();
		return $query->result();
	}

	public function getPromoInfo($promo_id)
	{

		$this->db->from('promotions_master as a');
		$this->db->join('merchant_master as b','a.merchant_id = b.merchant_id');
		$this->db->join('user_master as c','a.user_id = c.user_id');
		$this->db->join('country_master as d','b.country_id = d.country_id');
		//$this->db->join('promotions_outlets as d','a.promo_id = d.promo_id', 'left join');


		$this->db->where('a.promo_id',$promo_id);

		$query = $this->db->get();
		return $query->row_array();
	}


	public function deleteMerchantPromo()
	{
		$promo_id = $this->input->get('promo_id');
		$this->db->where('promo_id', $promo_id);
		$this->db->delete('promotions_master');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function updatePromo()
	{
		$promo_id = $this->input->post('promo_id');
		$redeemable_txt = $this->input->post('redeemable_txt');

		 $checker_deal = $this->db->get_where('deals_main',array('deal_main_name' => $this->input->post('promo_name')));
		 $chk = $checker_deal->row_array();

		 if(empty($chk) && $redeemable_txt == 'Y'){

		 		$data_deals_main = array(
			'deal_main_name' => $this->input->post('promo_name'),
			'deal_details' => $this->input->post('description'),
			'deal_amount' => $this->input->post('promo_amount'),
			'user_id' => $this->input->post('user_id'),
			'merchant_id' => $this->input->post('merchant_id'),
			'dated' => date('d/m/Y')
			);
			 $this->db->insert('deals_main',$data_deals_main);
			 $last_id = $this->db->insert_id();

			 $query = $this->db->get_where('merchant_promo_image',array('promo_id' => $promo_id,'image_count' => 1));
			 $img = $query->row_array();

				$img_name = $img['image_name'];
				$img_cnt = $img['image_count'];

				 $data_deals_images= array(
							'deal_image' => $img_name,
							'dm_id' => $last_id,
							'img_count' => $img_cnt,
							'loc' => 1,
						);
						 $this->db->insert('deals_images',$data_deals_images);


					 $data = array(
					'promo_name' => $this->input->post('promo_name'),
					'amount' => $this->input->post('promo_amount'),
					'description' => $this->input->post('description'),
					'other_offer' => $this->input->post('other_offer'),
					'start_on' => $this->input->post('start_date'),
					'ends_on' => $this->input->post('end_date'),
					'no_end_date' => $this->input->post('no_end_date'),
					'dm_id' => $last_id,
					'active' => 'Y',
					'redeemable' => $redeemable_txt,
						);

						$this->db->where('promo_id',$promo_id);
						$this->db->update('promotions_master',$data);
						if ($this->db->affected_rows() > 0) {
							return true;
						}
						else{
							return false;
						}

		 }else{

		 	 $data = array(
			'promo_name' => $this->input->post('promo_name'),
			'amount' => $this->input->post('promo_amount'),
			'description' => $this->input->post('description'),
			'other_offer' => $this->input->post('other_offer'),
			'start_on' => $this->input->post('start_date'),
			'ends_on' => $this->input->post('end_date'),
			'no_end_date' => $this->input->post('no_end_date'),
			'active' => 'Y',
			'redeemable' => $redeemable_txt,
		);

		$this->db->where('promo_id',$promo_id);
		$this->db->update('promotions_master',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}

		 }


	}

	public function getPromos($merchant_id){

		$this->db->select('*');
	//	$this->db->from('promotions_outlets as a');
		$this->db->from('promotions_master');
		$this->db->where('merchant_id',$merchant_id);
	//	$this->db->where('a.mall_id',$merchant_id);
		$query = $this->db->get();
		return $query->result();
	}

		public function updatePromoMerchant()
	{


		$promo_id = $this->input->post('promo_name_merchant');
		$mall_id = $this->input->post('mall_id');


		$query = $this->db->get_where('promotions_outlets',array('promo_id' => $promo_id, 'mall_id' => $mall_id ));
		$prm = $query->row_array();

		//$prm_id = $prm['promo_id'];

		$bol = false;

		if (empty($prm)) {
			$data = array(
			'promo_id' => $this->input->post('promo_name_merchant'),
			'merchant_id' => $this->input->post('merchant_id'),
			'mall_id' => $this->input->post('mall_id'),
			'user_id' => $this->input->post('user_id'),
			'dated' => date('d/m/Y')
		);
		 $this->db->insert('promotions_outlets',$data);

		 if ($this->db->affected_rows() > 0) {
			$bol = true;
			}
			else{
			$bol = false;
			}


		}

		return $bol;

	}

	public function getPromoMerchant()
	{
		 $merchant_id = $this->input->get('merchant_id');
		 $mall_id = $this->input->get('mall_id');

		$this->db->select('*');
		$this->db->from('promotions_outlets as a');
		$this->db->join('promotions_master as b','a.promo_id = b.promo_id');
        $this->db->where('a.merchant_id',$merchant_id);
		$this->db->where('a.mall_id',$mall_id);
		$query = $this->db->get();
		return $query->result();

		//return $query->result();
	}
		public function deletePromoMerchant()
	{
		$promo_id = $this->input->get('promo_id');
		$this->db->where('promo_id', $promo_id);
		$this->db->delete('promotions_outlets');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function getPromoMerchantInfo($promo_id)
	{
		$this->db->select('a.*, b.promo_name, b.description,  a.amount as pm_amount, c.merchant_id, c.merchant_name, d.currency_symbol');
		$this->db->from('promotions_outlets as a');
		$this->db->join('promotions_master as b','a.promo_id = b.promo_id');
		$this->db->join('merchant_master as c','b.merchant_id = c.merchant_id');
		$this->db->join('country_master as d','d.country_id = c.country_id');
		$this->db->where('a.promo_id',$promo_id);

		$query = $this->db->get();
		return $query->row_array();
	}

		public function getMerchantImagePromo2($promo_id,$count)
	{
		$query = $this->db->get_where('merchant_promo_image',array('promo_id' => $promo_id,'image_count' => $count));
		return $query->row_array();
	}

	public function EditPromoMerchantInfo()
	{
		$promo_id = $this->input->post('promo_id');

		$data = array(
			'promo_description' => $this->input->post('promo_description'),
			'amount' => $this->input->post('promo_amount'),
			'live' => $this->input->post('live'),
			'featured' => $this->input->post('featured'),
			'redeem' => $this->input->post('redeem_deal'),
		);

		$this->db->where('promo_id',$promo_id);
		$this->db->update('promotions_outlets',$data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function savePromoTagType()
	{

		$tag_name = $this->input->post('tagtype');


		$query = $this->db->get_where('tags_master',array('tag_name' => $tag_name));
		$tag = $query->row_array();

		$tag_id = $tag['tag_id'];


		$data = array(
			'promo_id' => $this->input->post('promo_id'),
			'user_id' => $this->input->post('user_id'),
			'merchant_id' => $this->input->post('merchant_id'),
			'tag_id' => $tag_id,
			'dated' => date('d-m-Y'),
		);

		return $this->db->insert('promotions_outlets_tags',$data);
	}

	public function getPromoTagType()
	{
		$promo_id = $this->input->get('promo_id');

		$this->db->select('*');
		$this->db->from('promotions_outlets_tags as a');
		$this->db->join('tags_master as b','a.tag_id = b.tag_id');
		$this->db->where('a.promo_id',$promo_id);

		$query = $this->db->get();
		return $query->result();
	}

	public function deletePromoTagType()
	{
		$pot_id = $this->input->get('pot_id');
		$this->db->where('pot_id', $pot_id);
		$this->db->delete('promotions_outlets_tags');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

		public function saveMerchantDeals()
	{
		$data = array(
			'merchant_id' => $this->input->post('merchant_id_deal'),
			'deal_main_name	' => $this->input->post('deal_name'),
			'user_id' => $this->input->post('user_id_deal'),
			'dated' => date('Y-m-d')
		);


		return $this->db->insert('deals_main',$data);
	}

	public function getMerchantDeals()
	{
		$merchant_id = $this->input->get('merchant_id');


		$this->db->select('*');
		$this->db->from('deals_main as a');
		$this->db->join('user_master as b','a.user_id = b.user_id');
		$this->db->where('merchant_id',$merchant_id);

		$query = $this->db->get();
		return $query->result();
	}

	public function deleteMerchantDeals()
	{
		$dm_id = $this->input->get('dm_id');
		$this->db->where('dm_id', $dm_id);
		$this->db->delete('deals_main');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function getDealMerchantInfo($dm_id)
	{
		$this->db->select('*');
		$this->db->from('deals_main as a');
		$this->db->join('user_master as b','a.user_id = b.user_id');
		$this->db->join('merchant_master as c','a.merchant_id = c.merchant_id');
		$this->db->join('country_master as d','d.country_id = c.country_id');
		$this->db->where('a.dm_id',$dm_id);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function updateDeal()
	{
		$dm_id = $this->input->post('dm_id');

		$data = array(
			'deal_main_name' => $this->input->post('deal_main_name'),
			'deal_amount' => $this->input->post('dealamount'),
			'deal_details' => $this->input->post('deal_details'),
			'active' => 'Y',
		);

		$this->db->where('dm_id',$dm_id);
		$this->db->update('deals_main',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}

	}

		public function getMerchantImageDeal($dm_id,$count)
	{
		$query = $this->db->get_where('deals_images',array('dm_id' => $dm_id,'img_count' => $count));
		return $query->result();
	}


	public function uploadImageToMerchantDeal($dm_id,$count,$filename)
	{
		//$this->db->where('merchant_image_id',$merchant_image_id);
		$this->db->insert('deals_images',array('dm_id' => $dm_id, 'deal_image' => $filename,'img_count' => $count));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function deleteMerchantImageDeal()
	{
		$di_id = $this->input->get('di_id');
		;
		$this->db->delete('deals_images',array('di_id' => $di_id));

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function saveDealTagType()
	{

		$tag_name = $this->input->post('tagtype');


		$query = $this->db->get_where('tags_master',array('tag_name' => $tag_name));
		$tag = $query->row_array();

		$tag_id = $tag['tag_id'];


		$data = array(
			'dm_id' => $this->input->post('dm_id'),
			'user_id' => $this->input->post('user_id'),
			'tag_id' => $tag_id,
			'dated' => date('d-m-Y'),
		);

		return $this->db->insert('deals_tags',$data);
	}

  public function getDealTagType()
	{
		$dm_id = $this->input->get('dm_id');

		$this->db->select('*');
		$this->db->from('deals_tags as a');
		$this->db->join('tags_master as b','a.tag_id = b.tag_id');
		$this->db->where('a.dm_id',$dm_id);

		$query = $this->db->get();
		return $query->result();
	}

	public function deleteDealTagType()
	{
		$dt_id = $this->input->get('dt_id');
		$this->db->where('dt_id', $dt_id);
		$this->db->delete('deals_tags');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function saveMerchantPromoTagType()
	{
		$tag_name = $this->input->post('tagtype');


		$query = $this->db->get_where('tags_master',array('tag_name' => $tag_name));
		$tag = $query->row_array();

		$tag_id = $tag['tag_id'];

		$data = array(
			'promo_id' => $this->input->post('promo_id'),
			'user_id' => $this->input->post('user_id'),
			'merchant_id' => $this->input->post('merchant_id'),
			'tag_id' => $tag_id,
			'dated' => date('d/m/Y'),
		);

		return $this->db->insert('promotions_tags',$data);
		// echo $this->db->last_query();
		// exit();
	}

	public function getMerchantPromoTagType()
	{
		$promo_id = $this->input->get('promo_id');

		$this->db->select('*');
		$this->db->from('promotions_tags as a');
		$this->db->join('tags_master as b','a.tag_id = b.tag_id');
		$this->db->where('a.promo_id',$promo_id);

		$query = $this->db->get();
		return $query->result();
	}

	public function deleteMerchantPromoTagType()
	{
		$pt_id = $this->input->get('pt_id');
		$this->db->where('pt_id', $pt_id);
		$this->db->delete('promotions_tags');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function updateActive()
	{

		$merchant_active = $this->input->post('merchant_active');
		$merchant_id = $this->input->post('merchant_id');

		$this->db->where('merchant_id',$merchant_id);
		$this->db->update('merchant_master',array('merchant_active' => $merchant_active));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function updateFeatured()
	{

		$featured = $this->input->post('featured');
		$merchant_id = $this->input->post('merchant_id');

		$this->db->where('merchant_id',$merchant_id);
		$this->db->update('merchant_master',array('featured' => $featured));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function updateLive()
	{

		$live = $this->input->post('live');
		$promo_id = $this->input->post('promo_id');

		$this->db->where('promo_id',$promo_id);
		$this->db->update('promotions_outlets',array('live' => $live));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function updateFeaturedPromo()
	{

		$featured = $this->input->post('featured');
		$promo_id = $this->input->post('promo_id');

		$this->db->where('promo_id',$promo_id);
		$this->db->update('promotions_outlets',array('featured' => $featured));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function updateRedeem()
	{

		$redeem = $this->input->post('redeem');
		$promo_id = $this->input->post('promo_id');

		$this->db->where('promo_id',$promo_id);
		$this->db->update('promotions_outlets',array('redeem' => $redeem));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function updatePrimaryTag()
	{

		$primary_tag = $this->input->post('primary_tag');
		$pt_id = $this->input->post('pt_id');

		$this->db->where('pt_id',$pt_id);
		$this->db->update('promotions_tags',array('primary_tag' => $primary_tag));
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	public function getMerchantPromoOutlets()
	{
		$merchant_id = $this->input->get('merchant_id');
		$promo_id = $this->input->get('promo_id');

		$this->db->select('*');
		$this->db->from('promotions_outlets as a');
		$this->db->join('mall_master as b','a.mall_id = b.mall_id');
		$this->db->where('a.merchant_id',$merchant_id);
		$this->db->where('a.promo_id',$promo_id);

		$query = $this->db->get();
		return $query->result();
	}


	public function updateMonday()
	{

		$promo_id = $this->input->post('promo_id');
		$Monday = $this->input->post('Monday');

		$query = $this->db->get_where('promotions_days_of_week',array('promo_id' => $promo_id));
		$prm = $query->row_array();


		if (empty($prm)) {
			$data = array(
			'monday' => $Monday,
			'promo_id' => $promo_id
		);
		 $this->db->insert('promotions_days_of_week',$data);

		 if ($this->db->affected_rows() > 0) {
			return true;
			}
			else{
			return false;
			}


		}else{
			$this->db->where('promo_id',$promo_id);
			$this->db->update('promotions_days_of_week',array('monday' => $Monday));
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

		$promo_id = $this->input->post('promo_id');
		$Tuesday = $this->input->post('Tuesday');

		$query = $this->db->get_where('promotions_days_of_week',array('promo_id' => $promo_id));
		$prm = $query->row_array();


		if (empty($prm)) {
			$data = array(
			'tuesday' => $Tuesday,
			'promo_id' => $promo_id
		);
		 $this->db->insert('promotions_days_of_week',$data);

		 if ($this->db->affected_rows() > 0) {
			return true;
			}
			else{
			return false;
			}


		}else{
			$this->db->where('promo_id',$promo_id);
			$this->db->update('promotions_days_of_week',array('tuesday' => $Tuesday));
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

		$promo_id = $this->input->post('promo_id');
		$Wednesday = $this->input->post('Wednesday');

		$query = $this->db->get_where('promotions_days_of_week',array('promo_id' => $promo_id));
		$prm = $query->row_array();


		if (empty($prm)) {
			$data = array(
			'wednesday' => $Wednesday,
			'promo_id' => $promo_id
		);
		 $this->db->insert('promotions_days_of_week',$data);

		 if ($this->db->affected_rows() > 0) {
			return true;
			}
			else{
			return false;
			}


		}else{
			$this->db->where('promo_id',$promo_id);
			$this->db->update('promotions_days_of_week',array('wednesday' => $Wednesday));
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

		$promo_id = $this->input->post('promo_id');
		$Thursday = $this->input->post('Thursday');

		$query = $this->db->get_where('promotions_days_of_week',array('promo_id' => $promo_id));
		$prm = $query->row_array();


		if (empty($prm)) {
			$data = array(
			'thursday' => $Thursday,
			'promo_id' => $promo_id
		);
		 $this->db->insert('promotions_days_of_week',$data);

		 if ($this->db->affected_rows() > 0) {
			return true;
			}
			else{
			return false;
			}


		}else{
			$this->db->where('promo_id',$promo_id);
			$this->db->update('promotions_days_of_week',array('thursday' => $Thursday));
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

		$promo_id = $this->input->post('promo_id');
		$Friday = $this->input->post('Friday');

		$query = $this->db->get_where('promotions_days_of_week',array('promo_id' => $promo_id));
		$prm = $query->row_array();


		if (empty($prm)) {
			$data = array(
			'friday' => $Friday,
			'promo_id' => $promo_id
		);
		 $this->db->insert('promotions_days_of_week',$data);

		 if ($this->db->affected_rows() > 0) {
			return true;
			}
			else{
			return false;
			}


		}else{
			$this->db->where('promo_id',$promo_id);
			$this->db->update('promotions_days_of_week',array('friday' => $Friday));
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

		$promo_id = $this->input->post('promo_id');
		$Saturday = $this->input->post('Saturday');

		$query = $this->db->get_where('promotions_days_of_week',array('promo_id' => $promo_id));
		$prm = $query->row_array();


		if (empty($prm)) {
			$data = array(
			'saturday' => $Saturday,
			'promo_id' => $promo_id
		);
		 $this->db->insert('promotions_days_of_week',$data);

		 if ($this->db->affected_rows() > 0) {
			return true;
			}
			else{
			return false;
			}


		}else{
			$this->db->where('promo_id',$promo_id);
			$this->db->update('promotions_days_of_week',array('saturday' => $Saturday));
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

		$promo_id = $this->input->post('promo_id');
		$Sunday = $this->input->post('Sunday');

		$query = $this->db->get_where('promotions_days_of_week',array('promo_id' => $promo_id));
		$prm = $query->row_array();


		if (empty($prm)) {
			$data = array(
			'sunday' => $Sunday,
			'promo_id' => $promo_id
		);
		 $this->db->insert('promotions_days_of_week',$data);

		 if ($this->db->affected_rows() > 0) {
			return true;
			}
			else{
			return false;
			}


		}else{
			$this->db->where('promo_id',$promo_id);
			$this->db->update('promotions_days_of_week',array('sunday' => $Sunday));
			if ($this->db->affected_rows() > 0) {
				return true;
			}
			else{
				return false;
			}
		}

	}

	public function getPromoDOW($promo_id)
	{

		$this->db->from('promotions_days_of_week');

		$this->db->where('promo_id',$promo_id);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function getMerchantByLiveSearch($search)
	{

		$query = $this->db->query("SELECT * FROM merchant_master
		join country_master on country_master.country_id = merchant_master.country_id
		join merchant_type on merchant_type.mt_id = merchant_master.mt_id
		where merchant_master.merchant_name like '%$search%'");
		return $query->result();
	}

}

?>
