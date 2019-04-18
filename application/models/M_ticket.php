<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ticket extends CI_Model {

	public function tampil()
	{
		$query	= $this->db->query("SELECT tiket.no_tiket, user.nama, tiket.flag, user.id_user, user.level, tiket.masalah, divisi.nama_div, kategori.nama_kat, status.nama_sts, status.no_sts, tiket.create_at 
			FROM tiket 
			JOIN user ON user.id_user = tiket.id_user 
			JOIN divisi ON divisi.no_div = user.no_div 
			JOIN kategori ON tiket.no_kat = kategori.no_kat
      JOIN status ON tiket.no_sts = status.no_sts");
		return $query->result();
	}

	public function hitungTiket()
	{
		return $this->db->count_all_results('tiket');
	}
	public function getDiv($where)
	{
		$query	= $this->db->query("SELECT user.nama, divisi.nama_div 
					FROM user
					JOIN divisi ON divisi.no_div = user.no_div
					WHERE user.id_user =".$where);
		return $query->result();
	}

	public function getUsr($where="")
	{
		$query 	= $this->db->query('SELECT user.nama, tiket.no_tiket, user.foto
					FROM tiket
					JOIN user ON user.id_user = tiket.updated_by
					WHERE tiket.no_tiket ='.$where);
		return $query->result();
	}

  public function ambilsemuauser()
  {
    return $this->db->get('user')->result();
  }

	public function getKat()
	{
		return $this->db->get('kategori')->result();
	}

	public function getSts()
	{
		return $this->db->get('status')->result();
	}

	public function inputTic($data)
	{
		$d = $this->db->insert('tiket', $data);
	}

	public function ubah($where="")
	{
		$query	= $this->db->query("SELECT tiket.no_tiket, user.nama, user.id_user, tiket.masalah, divisi.nama_div, kategori.nama_kat, kategori.no_kat, tiket.create_at, tiket.updated_at, tiket.closed_at, tiket.updated_by, tiket.closed_by, tiket.no_sts
					FROM tiket
					JOIN user ON user.id_user = tiket.id_user
					JOIN divisi ON divisi.no_div = user.no_div
					JOIN kategori ON tiket.no_kat = kategori.no_kat
					WHERE tiket.no_tiket=".$where);
		return $query->result();
	}

	public function perbarui($nama, $var, $where)
	{
		$res = $this->db->update($nama, $var, $where);
		return $res;
	}

	public function hapus($notic, $where)
	{
		return $this->db->delete($notic, $where);
	}

	public function kode()
	{
		$this->db->select('RIGHT(tiket.no_tiket,2) as no_tiket', FALSE);
		$this->db->order_by('no_tiket', 'desc');
		$this->db->limit(1);
		$query	= $this->db->get('tiket');

		if ($query->num_rows() <> 0) {
			$data 	= $query->row();
			$kode 	= intval($data->no_tiket) + 1;
		}else{
			$kode	= 1;
		}

		$batas	= str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kotam	= "TK".$batas;
		return $kotam;
	}

	public function inputComment($data)
	{
		$d = $this->db->insert('comment', $data);
	}

	public function pilihComment($where)
	{
		$this->db->select('user.nama, comment.id_user, comment.com, comment.no_tiket, comment.created_at');
		$this->db->from('comment');
		$this->db->join('tiket', 'tiket.no_tiket = comment.no_tiket');
		$this->db->join('user', 'user.id_user = comment.id_user');
		$this->db->order_by('comment.created_at', 'asc');
		$this->db->where('comment.no_tiket', $where);
		$query 	= $this->db->get();

		return $query->result();
	}

	public function chart()
	{
		return $this->db->get('tiket')->result();
	}

}

/* End of file m_ticket.php */
/* Location: ./application/models/m_ticket.php */