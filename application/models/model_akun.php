<?php 

/**
 * 
 */
class Model_akun extends CI_Model
{

	public function register_akun($data, $table){
		
		 $this->db->insert($table,$data);
	}

	public function update_akun($where, $data, $table)
	{		
		 $this->db->where($where);
		 $this->db->update($table,$data);
	}

	public function get_detail($id_user){
		
		return $this->db->get_where('user', array('id_user' => $id_user))->row();
	}

	function can_login ($post)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $post['email']);
		$this->db->where('password', $post['password']);
		$query = $this->db->get();
		return $query;
	}

	public function cek_login()
	{
		if($this->session->userdata('id_user') == '') {
 		$this->session->set_flashdata('sukses','Anda belum login');
 		redirect('Akun/login');
 		}
	}

	public function email_registered($email)
	{
		$sql = "(SELECT email FROM `user` WHERE email='$email')";
		$query = $this->db->query($sql);
		if (!empty($query->row_array())) {
			return TRUE;
		}else
		{
			return FALSE;
		}
	}
	
}
