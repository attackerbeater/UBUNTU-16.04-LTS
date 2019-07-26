<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class AccountModel extends CI_Model
{
	
	public function validate_user()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$this->db->where(array('email_id' => $email,'password' => md5($password)));
		$query = $this->db->get('user_master');
		return $query->row_array();
	}

	public function isEmailExist()
	{
		$email = $this->input->post('email_fp');

		$query = $this->db->get_where('user_master',array('email_id' => $email));
		return $query->row_array();

	}

	public function changePassword()
	{
		$email = $this->input->post('email_fp');
		$new_password = random_string('alnum', 6);

		$this->db->where('email_id',$email);
		$this->db->update('user_master',array('password' => md5($new_password)));
		if ($this->db->affected_rows() > 0) {
			return $new_password;
		}
		else{
			return false;	
		}
	}
	
}

?>