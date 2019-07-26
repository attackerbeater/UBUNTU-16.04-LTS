<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class SubCategory extends CI_Controller
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

	public function displaySubCategories()
	{
		$this->load->model('SubCategoryModel');
		$result = $this->SubCategoryModel->getSubCategories();
		echo json_encode($result);
	}

	public function processSubCategory()
	{
		$this->load->model('SubCategoryModel');
		$result = $this->SubCategoryModel->saveSubCategory();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function destroySubCategory($value='')
	{
		$this->load->model('SubCategoryModel');
		$result = $this->SubCategoryModel->deleteSubcategory();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	
}