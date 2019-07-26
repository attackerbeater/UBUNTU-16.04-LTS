<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller
{
	
	public function processEvent()
	{
		$this->load->model('EventModel');
		$result = $this->EventModel->saveMallEvent();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function displayEvent()
	{
		$this->load->model('EventModel');
		$result = $this->EventModel->getMallEvent();
		echo json_encode($result);
	}

	public function destroyEvent()
	{
		$this->load->model('EventModel');
		$result = $this->EventModel->deleteMallEvent();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function getEvent()
	{
		
		$this->load->model('EventModel');
		$result = $this->EventModel->getSpecificEvent();
		echo json_encode($result);

	}

		public function EditEvent($event_id)
	{
		

		if ($this->session->userdata('user')) {
			$data['title'] = 'Mall-E - Admin';

			$this->load->model('EventModel');
			$data['event'] = $this->EventModel->getEventInfo($event_id);
			$data['event_category'] = $this->EventModel->getEventCategory();


			//$data['event_image'] = $this->EventModel->getEventImage($event_id);
			for($i = 1; $i <= 5; $i++){
				$data['event_image'][$i] = $this->EventModel->getEventImage($event_id, $i);
			}
			

	 
			$this->load->view('include/header',$data);
			$this->load->view('include/nav');
			$this->load->view('edit_event_view',$data);
			$this->load->view('include/footer'); 
		}
		else{
			$this->session->set_flashdata('login_required','Please login first.');
			redirect(base_url());
		}


	}

		public function processEventEdit()
	{
		$this->load->model('EventModel');
		$result = $this->EventModel->updateEvent();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}


	public function addEventImg($event_id, $user_id, $event_count)
		{
				if ( !empty($_FILES)) {

			 		// $path = FCPATH.'assets\images\uploads\\';
			 	 	$config['upload_path']          = './event_photos';
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
			        	$this->load->model('EventModel');
			        	$this->EventModel->uploadImageToEvent($event_id,$user_id,$event_count,$filename);

			       	}

			 }
		}

			public function destroyImageEvent()
		{
			$this->load->model('EventModel');
			$result = $this->EventModel->deleteEventImage();

			$msg['success'] = false;
			if ($result) {
				$msg['success'] = true;
			}
			echo json_encode($msg);
		}


	public function processTypeStatus()
	{
		$this->load->model('EventModel');
		$result = $this->EventModel->updateTypeStatus();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function processFeatured()
	{
		$this->load->model('EventModel');
		$result = $this->EventModel->updateFeatured();

		$msg['success'] = false;
		if ($result) {
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}