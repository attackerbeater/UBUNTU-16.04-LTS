<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Dealcategory extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';

			$this->load->model('CategoryModel');
			$data['categories'] = $this->CategoryModel->getCategories();

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('sub_category_view',$data);
			$this->load->view('include/footer');
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
	}
	public function EditDealCategory($sub_category_id)
	{
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';

			$this->load->model('CategoryModel');
			$data['categories'] = $this->CategoryModel->getCategories();
			$data['deal_info'] = $this->CategoryModel->getDealCategoryInfo($sub_category_id);

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('edit_deal_category_view',$data);
			$this->load->view('include/footer');
			//print_r($data);
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
	}
 
	public function processEditDealCategory()
	{
		$this->load->model('CategoryModel');
		$result = $this->CategoryModel->EditDealCategoryData();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function addImageDealCategory($sub_category_id)
	{
		if ( !empty($_FILES)) {

			 		// $path = FCPATH.'assets\images\uploads\\';
			 	 	$config['upload_path']          = './dealcategory_images';
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
			        	$this->load->model('CategoryModel');
			        	$this->CategoryModel->uploadImgDealCategory($sub_category_id,$filename);

			       	}

			 }
	}

		public function destroyimageDealCategory()
	{
		$this->load->model('CategoryModel');
		$result = $this->CategoryModel->deleteImgDealCategory();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


}