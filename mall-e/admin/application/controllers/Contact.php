<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{
	
	public function processContact()
	{
		$this->load->model('ContactModel');
		$result = $this->ContactModel->saveMallContact();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayContacts()
	{
		$this->load->model('ContactModel');
		$result = $this->ContactModel->getMallContacts();
		echo json_encode($result);
	}

	public function destroyContact()
	{
		$this->load->model('ContactModel');
		$result = $this->ContactModel->deleteMallContact();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function getContact()
	{
		
		$this->load->model('ContactModel');
		$result = $this->ContactModel->getSpecificContact();
		echo json_encode($result);

	}

	public function processContactEdit()
	{
		$this->load->model('ContactModel');
		$result = $this->ContactModel->updateContact();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}