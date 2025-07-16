<?php
class Pesanan_model extends CI_Model
{
    public function get_all_pesanan()
    {
        return $this->db->get('pesanan')->result_array();
    }

    public function get_detail_pesanan_by_id($id_pesanan)
    {
        $this->db->select('detail_pesanan.*, produk.nama_produk, pesanan.id_pesanan');
        $this->db->from('detail_pesanan');
        $this->db->join('produk', 'detail_pesanan.id_produk = produk.id_produk', 'left');
        $this->db->join('pesanan', 'detail_pesanan.id_pesanan = pesanan.id_pesanan', 'left');
        $this->db->where('detail_pesanan.id_pesanan', $id_pesanan);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_detail_pesanan_by_detail_id($id_detail_pesanan)
    {
        $this->db->select('detail_pesanan.*, produk.nama_produk, pesanan.id_pesanan');
        $this->db->from('detail_pesanan');
        $this->db->join('produk', 'detail_pesanan.id_produk = produk.id_produk', 'left');
        $this->db->join('pesanan', 'detail_pesanan.id_pesanan = pesanan.id_pesanan', 'left');
        $this->db->where('detail_pesanan.id_detail_pesanan', $id_detail_pesanan);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function add_pesanan($data)
    {
        $this->db->insert('pesanan', $data);
        return $this->db->insert_id();
    }

    public function add_detail_pesanan($data)
    {
        $this->db->insert('detail_pesanan', $data);
    }

    public function status_pesanan($id_pesanan, $status)
    {
        $this->db->where('id_pesanan', $id_pesanan);
        return $this->db->update('pesanan', ['status_pesanan' => $status]);
    }

    public function get_pesanan_by_id($id_pesanan)
    {
        return $this->db->get_where('pesanan', ['id_pesanan' => $id_pesanan])->row_array();
    }


}
