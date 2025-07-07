<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
	public function get_all_menu()
	{
		return $this->db->get('menu')->result_array();
	}

	public function get_menu_by_id($id)
	{
		return $this->db->get_where('menu', ['id_menu' => $id])->row_array();
	}

	public function get_produk_by_menu($id)
	{
	    $this->db->select('produk.*, kategori.nama_kategori');
	    $this->db->from('produk');
	    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
	    $this->db->where('produk.id_produk', $id);
	    $query = $this->db->get();
	    return $query->result_array();
	}

	public function count_all()
	{
		return $this->db->count_all('menu');
	}

	public function insert_menu($data)
	{
		$this->db->insert('menu', $data);
	}

	public function update_menu($id, $data)
	{
		$this->db->where('id_menu', $id);
		$this->db->update('menu', $data);
	}

	public function delete_menu($id)
	{
		$this->db->where('id_menu', $id);
		return $this->db->delete('menu');
	}

	public function get_all_produk()
	{
		$this->db->select('produk.*, kategori.nama_kategori');
		$this->db->from('produk');
		$this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function get_produk_by_id($id_produk)
    {
        return $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
    }

    public function get_menu_by_menu($id_menu)
	{
	    $this->db->select('produk.*, menu.nama_menu, kategori.nama_kategori');
	    $this->db->from('produk');
	    $this->db->join('menu', 'produk.id_menu = menu.id_menu', 'left');
	    $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
	    $this->db->where('produk.id_menu', $id_menu);
	    $query = $this->db->get();
	    return $query->result_array();
	}
}
