<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ManageMasters extends CI_Controller
{
	
	public function MallTypes()
	{
		if ($this->session->userdata('user')) {

			$data['title'] = 'Mall-E - Admin';

			$this->load->model('MallTypeModel');
			$data['malltypes'] = $this->MallTypeModel->getMallType();

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('malltypes_view',$data);
			$this->load->view('include/footer');

		}else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
	}

	public function MerchantTypes()
	{
		if ($this->session->userdata('user')) {

			$data['title'] = 'Mall-E - Admin';

			$this->load->model('MallTypeModel');
			$data['malltypes'] = $this->MallTypeModel->getMallType();

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('merchanttype_view',$data);
			$this->load->view('include/footer');

		}else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
	}
	public function TagTypes()
		{
			if ($this->session->userdata('user')) {

				$data['title'] = 'Mall-E - Admin';

				$this->load->model('TagTypesModel');
				$data['tagtypes'] = $this->TagTypesModel->getTagType();

				$this->load->view('include/header',$data);
				$this->load->view('include/nav');
				$this->load->view('tagtypes_view',$data);
				$this->load->view('include/footer');

			}else{
				$this->session->set_flashdata('login_required','Please login first.');
				redirect(base_url());
			}
		}

	public function processMallType()
	{
		$this->load->model('MallTypeModel');
		$result = $this->MallTypeModel->saveMallType();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);

	}

	public function displayMallType()
	{
		$this->load->model('MallTypeModel');
		$result = $this->MallTypeModel->getMallType();
		echo json_encode($result);
	}

	public function displayTagType()
	{
		$this->load->model('TagTypesModel');
		$result = $this->TagTypesModel->getTagType();
		echo json_encode($result);
	}

	public function processTagType()
	{ 

		$this->load->model('TagTypesModel');
		$result = $this->TagTypesModel->saveTagType();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	
	public function destroyTagType()
	{
		$this->load->model('TagTypesModel');
		$result = $this->TagTypesModel->deleteTagType();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function destroyMallType()
	{
		$this->load->model('MallTypeModel');
		$result = $this->MallTypeModel->deleteMallType();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	

	public function EditTagsType($tag_id)
	{
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';


			$this->load->model('TagTypesModel');
			$data['tag_info'] = $this->TagTypesModel->getTagTypeInfo($tag_id); 
		
			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('edit_tagtypes_view',$data);
			$this->load->view('include/footer');
			//print_r($data); 
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
	}

	public function EditMerchantType($mt_id)
	{
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';


			$this->load->model('MerchantTypeModel');
			$data['merchant_type'] = $this->MerchantTypeModel->getMerchantTypeInfo($mt_id); 
		
			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('edit_merchanttype_view',$data);
			$this->load->view('include/footer');
			//print_r($data); 
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
	}

	public function processEditTagtype()
	{
		$this->load->model('TagTypesModel');
		$result = $this->TagTypesModel->editTagType();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processEditMtype()
	{
		$this->load->model('MerchantTypeModel');
		$result = $this->MerchantTypeModel->editMType();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	

	public function addImageTagType($tag_id)
	{
		if ( !empty($_FILES)) {

			 		// $path = FCPATH.'assets\images\uploads\\';
			 	 	$config['upload_path']          = './tag_images';
			        $config['allowed_types']        = 'gif|jpg|png|jpeg';
			        $config['encrypt_name']			= TRUE;
			        $config['max_size']             = 0;
			        $config['max_width']            = 0;
			        $config['max_height']           = 0;

			 	 	$this->load->library('upload', $config);

			 	 	if ( ! $this->upload->do_upload('file'))
			        {
			            echo "failed to upload file";
			        }
			        else
			        {	
			        	$filename = $this->upload->data('file_name');
			        	$this->load->model('TagTypesModel');
			        	$this->TagTypesModel->uploadImageTagType($tag_id,$filename);

			       	}

			 }
	}
		public function destroyTagImage()
	{
		$this->load->model('TagTypesModel');
		$result = $this->TagTypesModel->deleteImgTag();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function destroyMTImage()
	{
		$this->load->model('MerchantTypeModel');
		$result = $this->MerchantTypeModel->deleteImgMT();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function addImageMTType($mt_id)
	{
		if ( !empty($_FILES)) {

			 		// $path = FCPATH.'assets\images\uploads\\';
			 	 	$config['upload_path']          = './merchanttype_images';
			        $config['allowed_types']        = 'gif|jpg|png|jpeg';
			        $config['encrypt_name']			= TRUE;
			        $config['max_size']             = 0;
			        $config['max_width']            = 0;
			        $config['max_height']           = 0;

			 	 	$this->load->library('upload', $config);

			 	 	if ( ! $this->upload->do_upload('file'))
			        {
			            echo "failed to upload file";
			        }
			        else
			        {	
			        	$filename = $this->upload->data('file_name');
			        	$this->load->model('MerchantTypeModel');
			        	$this->MerchantTypeModel->uploadImageMType($mt_id,$filename);

			       	}

			 }
	}

	
}