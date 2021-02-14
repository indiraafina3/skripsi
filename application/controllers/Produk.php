<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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

	public function cari()
	{
		$keyword = $this->input->post('keyword');
		$data['produk']=$this->model_produk->cari($keyword);

		if (empty($data['produk']=$this->model_produk->cari($keyword))) {
		echo "<script>alert('no product name found!');</script>";
		$data['produk'] = $this->model_produk->tampil_data()->result();
		$this->load->view('Template/header');
		$this->load->view('Produk/katalog',$data);
		}else{
		$this->load->view('Template/header');
		$this->load->view('Produk/katalog',$data);
	}
	}
	public function katalog()
	{
		$data['produk'] = $this->model_produk->tampil_data()->result();
		$this->load->view('Template/header');
		$this->load->view('Produk/katalog',$data);
	}
	public function katalog1()
	{
		if ($this->session->userdata('akses_level') == 'admin') {
		$data['produk'] = $this->model_produk->tampil_data()->result();
		$this->load->view('Template/header');
		$this->load->view('Produk/katalog1',$data);
		}
	}
	public function detail($id)
	{
		$data['detail']=$this->model_produk->get_detail($id);
		$this->load->view('Template/header');
		$this->load->view('Produk/detailproduk',$data);
	}
	public function edit($id)
	{
		if ($this->session->userdata('akses_level') == 'admin') {
		$data['edit']=$this->model_produk->get_detail($id);
		$this->load->view('Template/header');
		$this->load->view('Produk/editproduk',$data);
		}
	}

	public function edit_produk()
	{
		 $config = array(
                        'upload_path'=>'./uploads',
                        'allowed_types'=>'jpg|png|jpeg',
                        );
        $id_produk = $this->input->post('id_produk');
		$old_image1 = $this->input->post('old_image1');
		$old_image2 = $this->input->post('old_image2');
		$old_image3 = $this->input->post('old_image3');

        $this->load->library('upload',$config);
        
        if($_FILES['gambar1']['name']!=""){
        $this->upload->do_upload('gambar1');
        $finfo = $this->upload->data();
        $namafoto1 = $finfo['file_name'];}
        else{
        	$namafoto1 = $old_image1;
        }

        if($_FILES['gambar2']['name']!=""){
        $this->upload->do_upload('gambar2');
        $finfo2 = $this->upload->data();
        $namafoto2 = $finfo2['file_name'];}
        else{
        	$namafoto2 = $old_image2;
        }

        if($_FILES['gambar3']['name']!=""){
        $this->upload->do_upload('gambar3');
        $finfo3 = $this->upload->data();
        $namafoto3 = $finfo3['file_name'];}
        else{
        	$namafoto3 = $old_image3;
        }

		$data= array('id_produk' => $this->input->post('id_produk'),
						 'nama_produk' => $this->input->post('nama_produk'),
						 'harga' => $this->input->post('harga'),
						 'deskripsi' => $this->input->post('deskripsi'),
						 'gambar1' => $namafoto1,
						 'gambar2' => $namafoto2,
						 'gambar3' => $namafoto3);
        $config2['source_image']= './uploads/';
        $config2['new_image']= './uploads/';
        $this->load->library('upload',$config2);    

		$where= array('id_produk' => $id_produk);
		$this->model_produk->update_produk($where, $data, 'produk');
		redirect('Produk/katalog1');
	}

	public function tambah()
	{
		if ($this->session->userdata('akses_level') == 'admin') {
		$this->load->view('Template/header');
		$this->load->view('Produk/tambahproduk');
		}
	}
	public function tambah_produk()
	{
		$nama_produk = $this->input->post('nama_produk');
		$harga = $this->input->post('harga');
		$deskripsi = $this->input->post('deskripsi');

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);

		if (!empty($_FILES['gambar1'])) {
			$this->upload->do_upload('gambar1');
			$data1=$this->upload->data();
			$gambar1= $data1['file_name'];
		}

		if (!empty($_FILES['gambar2'])) {
			$this->upload->do_upload('gambar2');
			$data2=$this->upload->data();
			$gambar2= $data2['file_name'];
		}
		if (!empty($_FILES['gambar3'])) {
			$this->upload->do_upload('gambar3');
			$data3=$this->upload->data();
			$gambar3= $data3['file_name'];
		}

			$data= array('nama_produk' => $nama_produk,
						 'harga' => $harga,
						 'deskripsi' => $deskripsi,
						 'gambar1' => $gambar1,
						 'gambar2' => $gambar2,
						 'gambar3' => $gambar3 );
			$this->model_produk->tambah_produk($data, 'produk');
			redirect('Produk/katalog1');
	}

	public function add_cart()
	{

        // if($this->input->post())
        // {
            //echo "<pre>"; print_r($this->input->post()); 
            $insert_data = array( 
     		'id' => $this->input->post('id'),
     		'name' => $this->input->post('name'),
     		'price' => $this->input->post('price'),
     		'qty' => $this->input->post('qty'),
     		'image'=> $this->input->post('image') );
        	$this->cart->insert($insert_data);

            //var_dump($res);
		//$data['produk'] = $this->model_produk->tampil_data()->result();
        //redirect('Produk/katalog');
        //}
	}


	public function hapus($id)
	{
		$this->model_produk->hapus_produk($id);
		redirect('Produk/katalog1');
	}
	
}
