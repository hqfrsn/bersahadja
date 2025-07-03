<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{

	public function get_all_kategori()
	{
		return $this->db->get('kategori')->result_array();
	}

	public function get_kategori_by_id($id)
	{
		return $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
	}

	public function count_all()
	{
		return $this->db->count_all('kategori');
	}

	public function insert_kategori($data)
	{
		$this->db->insert('kategori', $data);
	}

	public function update_kategori($id, $data)
	{
		$this->db->where('id_kategori', $id);
		$this->db->update('kategori', $data);
	}

	public function delete_kategori($id)
	{
		$this->db->where('id_kategori', $id);
		return $this->db->delete('kategori');
	}
}
