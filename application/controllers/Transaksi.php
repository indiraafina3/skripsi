<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

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

	public function checkout()
	{
		$id_user = $this->session->userdata('id_user'); 
		$data['detail']=$this->model_akun->get_detail($id_user);
		$this->load->view('Template/header');
		$this->load->view('Transaksi/checkout',$data);
	}

	public function create()
	{	
		$keranjang=$this->cart->total();
		$cart=$this->cart->contents();
		if (empty($cart)) {
			redirect('Transaksi/checkout');
		}else{			
		$tx_ID = date('U');
		$item = 1;
		//var_dump($cart);
		foreach ($cart as $cart) {
			
		$cart= array('id_user' => $this->session->userdata('id_user'),
			 'id_transaksi' => $tx_ID,
			 'id_item' => $tx_ID . $this->tambah_nol( $item, 2 ),
			 'nama_produk' => $cart['name'],
			 'subtotal' => $cart['subtotal'],
			 'harga' => $cart['price'],
			 'jumlah' => $cart['qty'],
			 'kurir' => $this->input->post('kurir'),
			 'status_transaksi' => $this->input->post('status_transaksi')
		);
		    
		$this->model_transaksi->create($cart, 'transaksi');

		$this->cart->destroy();

		$item++;
			}
		}
		redirect('Transaksi/lihat');				
	}

	public function batalkan($id_transaksi)
	{
		$data['transaksi']=$this->model_transaksi->batalkan($id_transaksi);
		redirect('Transaksi/lihat');
	}

	public function tambah_nol($nilai, $digit)
	{
		return str_repeat('0', $digit-strlen($nilai)) . $nilai;
	}

	public function detail_checkout($id_user)
	{
		$data['detail']=$this->model_akun->get_detail($id_user);
		$this->load->view('Template/header');
		$this->load->view('Transaksi/checkout',$data);
	}

	public function lihat()
	{
		if ($this->session->userdata('akses_level') == 'admin') {
		$data['transaksi'] = $this->model_transaksi->tampil_data_admin()->result();
		$this->load->view('Template/header');
		$this->load->view('Transaksi/transaksi',$data);
		}
		elseif ($this->session->userdata('akses_level') == 'pelanggan') {
		$id_user= $this->session->userdata('id_user');
		$data['transaksi'] = $this->model_transaksi->tampil_data($id_user)->result();
		$this->load->view('Template/header');
		$this->load->view('Transaksi/transaksi',$data);
		}
	}

	public function detail($id_transaksi)
	{
		if ($this->session->userdata('akses_level') == 'pelanggan') {
		$id_user = $this->session->userdata('id_user');
		$data['transaksi'] = $this->model_transaksi->tampil_detail($id_transaksi,$id_user);
		$data['item'] = $this->model_transaksi->tampil_detail_item($id_transaksi,$id_user)->result();
		$this->load->view('Template/header');
		$this->load->view('Transaksi/detailtransaksi',$data);}
		elseif ($this->session->userdata('akses_level') == 'admin') {
		$data['transaksi'] = $this->model_transaksi->tampil_detail_admin($id_transaksi);
		$data['item'] = $this->model_transaksi->tampil_detail_item_admin($id_transaksi)->result();
		$this->load->view('Template/header');
		$this->load->view('Transaksi/detailtransaksi',$data);}
		}
	

	public function pembayaran($id_transaksi)
	{
		if ($this->session->userdata('akses_level') == 'pelanggan') {	
		$id_user = $this->session->userdata('id_user');
		$data['transaksi'] = $this->model_transaksi->tampil_detail($id_transaksi,$id_user);
		$this->load->view('Template/header');
		$this->load->view('Transaksi/pembayaran',$data);
		}
	}

	public function pembayaran_list($id_transaksi)
	{
		if ($this->session->userdata('akses_level') == 'admin') {
		$data['pembayaran'] = $this->model_transaksi->tampil_detail_pembayaran($id_transaksi);
		$this->load->view('Template/header');
		$this->load->view('Transaksi/pembayaran_list',$data);
		}
	}

	public function do_pembayaran()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		
		if (!empty($_FILES['buktibayar'])) {
		$this->upload->do_upload('buktibayar');
		$data1=$this->upload->data();
		$bukti_bayar= $data1['file_name'];
			}
			
		$data= array('id_user' => $this->session->userdata('id_user'),
					'id_transaksi' => $this->input->post('id_transaksi'),
					'atas_nama' => $this->input->post('atas_nama'),
					'jumlah_bayar' => $this->input->post('jumlah_bayar'),
					'bank_tujuan' => $this->input->post('bank_tujuan'),
					'bank_asal' => $this->input->post('bank_asal'),
					'no_rekening' => $this->input->post('no_rekening'),
					'bukti_bayar' => $bukti_bayar,
					'tanggal_bayar' => $this->input->post('tanggal_bayar')
					 );
		$this->model_transaksi->tambah_pembayaran($data, 'pembayaran');
		redirect('Transaksi/lihat');
	}

	public function pengiriman($id_transaksi)
	{
		if ($this->session->userdata('akses_level') == 'admin') {
		$data['transaksi'] = $this->model_transaksi->tampil_detail_admin($id_transaksi);
		$this->load->view('Template/header');
		$this->load->view('Transaksi/pengiriman',$data);
		}
	}

	public function pengiriman_list($id_transaksi)
	{
		if ($this->session->userdata('akses_level') == 'admin') {
		$data['pengiriman'] = $this->model_transaksi->tampil_detail_pengiriman($id_transaksi);
		$this->load->view('Template/header');
		$this->load->view('Transaksi/pengiriman_list',$data);
		}
	}

	public function do_pengiriman ()
	{
		$data= array('id_transaksi' => $this->input->post('id_transaksi'),
					'no_resi' => $this->input->post('no_resi'),
					'tanggal_pengiriman' => $this->input->post('tanggal_pengiriman'),
					'kurir' => $this->input->post('kurir')
					 );
		$this->model_transaksi->tambah_pengiriman($data, 'pengiriman');
		redirect('Transaksi/lihat');
	}

	public function cetaktransaksi($id_transaksi)
	{
		if ($this->session->userdata('akses_level') == 'admin') {
		$data['transaksi'] = $this->model_transaksi->tampil_detail_admin($id_transaksi);
		$data['item'] = $this->model_transaksi->tampil_detail_item_admin($id_transaksi)->result();
		$this->load->view('Transaksi/cetaktransaksi',$data);
		}
	}

	public function deletecart($id_produk)
	{
            $data = array( 
     		'rowid' => $id_produk,
     		'qty'=> 0 
     	);

        $this->cart->update($data);
        redirect('Transaksi/checkout');
    	
    }

    public function updatecart()
	{
            $data = array( 
     		'rowid' => $this->input->post('id'),
     		'qty' => $this->input->post('jumlah'));

            $res = $this->cart->update($data);

            var_dump($res);
	}

	public function sorting()
	{
				
	}
}
