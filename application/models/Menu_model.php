<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	public function get_all_produk()
	{
		$this->db->select('produk.*, kategori.nama_kategori');
		$this->db->from('produk');
		$this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_menu_by_id($id)
	{
	    $this->db->select('produk.*, kategori.nama_kategori');
	    $this->db->from('produk');
	    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
	    $this->db->where('produk.id_produk', $id);
	    $query = $this->db->get();
	    return $query->result_array();
	}

	

}
