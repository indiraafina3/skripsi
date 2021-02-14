<?php 

/**
 * 
 */
class Model_produk extends CI_Model
{
	
	public function tampil_data()
	{
		return $this->db->get('produk');
	}
	public function get_detail($id){
		
		return $this->db->get_where('produk', array('id_produk' => $id))->row();
	}
	public function cari($keyword)
	{
		$this->db->like('nama_produk',$keyword);
        $query  =   $this->db->get('produk');
        return $query->result();
	}
	public function tambah_produk($data, $table){
		
		 $this->db->insert($table,$data);
	}
	public function update_produk($where, $data, $table)
	{	
		 $this->db->where($where);
		 $this->db->update($table,$data);
	}
	public function hapus_produk($id){
		return $this->db->delete('produk', array("id_produk" => $id));
    }
}
