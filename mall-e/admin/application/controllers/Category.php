<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Category extends CI_Controller
{
	
	public function index()
	{
		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';

			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('category_view',$data);
			$this->load->view('include/footer');
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}
	}

	public function displayCategories()
	{
		$this->load->model('CategoryModel');
		$result = $this->CategoryModel->getCategories();
		echo json_encode($result);
	}

	public function processCategory()
	{
		$this->load->model('CategoryModel');
		$result = $this->CategoryModel->saveCategory();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function destroyCategory()
	{
		$this->load->model('CategoryModel');
		$result = $this->CategoryModel->deleteCategory();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}