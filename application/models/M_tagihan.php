<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_tagihan extends CI_Model {

    public function getTagihan($nim)
    {
        $this->db->where('nim', $nim);
        $this->db->where('pembayaran', 'regis');
        $this->db->where('status', 'lunas');
        $query = $this->db->get('tagihan')->result();
        return $query;
    }

    public function getTagihanAll()
    {
        $this->db->select('tagihan.id_tagihan, tagihan.nim, mahasiswa.nama_mahasiswa, tagihan.pembayaran, tagihan.jumlah_tagihan, tagihan.tgl_bayar, tagihan.status');
        $this->db->join('mahasiswa', 'mahasiswa.nim = tagihan.nim');
        $query = $this->db->get('tagihan')->result();
        return $query;
    }

    public function createTagihan($data)
    {
        $insert = $this->db->insert('tagihan', $data);
    }

    public function edit($id)
    {
        $this->db->select('tagihan.*, mahasiswa.nim, mahasiswa.nama_mahasiswa');
        $this->db->join('mahasiswa', 'mahasiswa.nim = tagihan.nim');
        $this->db->where('id_tagihan', $id);
        $this->db->where('status', 'lunas');
        $query = $this->db->get('tagihan')->result();
        return $query;
    }

    public function update($table, $var, $where)
    {
        $res = $this->db->update($table, $var, $where);
		return $res;
    }

}

/* End of file M_tagihan.php */
