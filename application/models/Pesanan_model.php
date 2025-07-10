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

    public function selesai($id_detail_pesanan)
    {
        $this->db->set('selesai', 1);
        $this->db->where('id_detail_pesanan', $id_detail_pesanan);
        $this->db->update('detail_pesanan');
    }

    public function cancel($id)
    {
        $this->db->set('status_sewa', 'cancel');
        $this->db->where('id_sewa', $id);
        return $this->db->update('sewa');
    }

}
