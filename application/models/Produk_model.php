<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{

	public function get_all_produk()
	{
		$this->db->select('produk.*, kategori.nama_kategori, menu.nama_menu');
		$this->db->from('produk');
		$this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
		$this->db->join('menu', 'produk.id_menu = menu.id_menu', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_produk_by_id($id)
	{
	    $this->db->select('produk.*, kategori.nama_kategori, menu.nama_menu');
	    $this->db->from('produk');
	    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
	    $this->db->join('menu', 'produk.id_menu = menu.id_menu', 'left');
	    $this->db->where('produk.id_produk', $id);
	    $query = $this->db->get();
	    return $query->row_array();
	}

	public function get_produk_by_kategori($id_kategori)
	{
	    $this->db->select('produk.*, kategori.nama_kategori');
	    $this->db->from('produk');
	    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
	    $this->db->where('produk.id_kategori', $id_kategori);
	    $query = $this->db->get();
	    return $query->result_array();
	}

	public function count_all()
	{
		return $this->db->count_all('produk');
	}

	public function insert_produk($data)
	{
		$this->db->insert('produk', $data);
	}

	public function edit_produk($id, $data)
	{
		$this->db->where('id_produk', $id);
		$this->db->update('produk', $data);
	}

	public function delete_produk($id)
	{
		$this->db->where('id_produk', $id);
		return $this->db->delete('produk');
	}

	public function kategori_exists($kategori_id)
	{
		$this->db->where('id_kategori', $kategori_id);
		$query = $this->db->get('produk');
		return $query->num_rows() > 0;
	}

	public function menu_exists($menu_id)
	{
		$this->db->where('id_menu', $menu_id);
		$query = $this->db->get('produk');
		return $query->num_rows() > 0;
	}

	public function update_status($id_produk, $status)
    {
        $this->db->set('status_produk', $status);
        $this->db->where('id_produk', $id_produk);
        $this->db->update('produk');
    }
}
