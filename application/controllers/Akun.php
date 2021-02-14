<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function editprofile()
	{
		$id_user = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$telepon = $this->input->post('telepon');
		$alamat = $this->input->post('alamat');
		$akses_level = $this->input->post('akses_level');

		$data= array('id_user' => $id_user,
					 'nama' => $nama,
					 'email' => $email,
					 'password' => $password,
					 'telepon' => $telepon,
					 'alamat' => $alamat,
					 'akses_level' => $akses_level );
		$where= array('id_user' => $id_user);
		$this->model_akun->update_akun($where, $data, 'user');
		redirect('Produk/katalog');
	}

	public function edit($id_user)
	{
		if ($this->session->userdata('akses_level') == 'pelanggan') {
		$data['detail']=$this->model_akun->get_detail($id_user);
		$this->load->view('Template/header');
		$this->load->view('Akun/editprofile',$data);
		}
	}

	public function detail($id_user)
	{	if ($this->session->userdata('akses_level') == 'pelanggan') {
		$data['detail']=$this->model_akun->get_detail($id_user);
		$this->load->view('Template/header');
		$this->load->view('Akun/profile',$data);
		}
	}

	public function login()
	{
		$this->load->view('Template/header');
		$this->load->view('Akun/login');
	}

	public function login_akun()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('model_akun');
			$query = $this->model_akun->can_login($post);
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$params = array('id_user' => $row->id_user, 'nama' => $row->nama, 'email' => $row->email , 'telepon' => $row->telepon, 'alamat' => $row->alamat, 'akses_level' => $row->akses_level, 'password' => $row->password );
			$this->session->set_userdata($params);
			if ($this->session->userdata('akses_level') == 'admin') {
				redirect('Produk/katalog1');
			}else{
					redirect('Produk/katalog');
			}
		}else{
			echo "<script>alert('Gagal login!');</script>";
			$this->load->view('Template/header');
			$this->load->view('Akun/login');

			}
		}
	}

	public function register()
	{
		$this->load->view('Template/header');
		$this->load->view('Akun/register');
	}

	public function register_akun()
	{
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$telepon = $this->input->post('telepon');
		$alamat = $this->input->post('alamat');
		$akses_level = $this->input->post('akses_level');

		$data= array('nama' => $nama,
					 'email' => $email,
					 'password' => $password,
					 'telepon' => $telepon,
					 'alamat' => $alamat,
					 'akses_level' => $akses_level );
		$this->model_akun->register_akun($data, 'user');
		redirect('Akun/login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(). 'Akun/login');
	}

	public function emailexist(){
		if ($this->model_akun->email_registered($this->input->post('email'))) {
			echo "1";
		}else{
			echo "0";
		}
	}
	
}
