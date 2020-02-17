<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_user extends CI_Model {

		public function user($user, $akses)
		{
			$this->db->insert('user', $user);
			$data_id	= $this->db->insert_id();

			$akses['id_user']	= $data_id;
			$this->db->insert('akses', $akses);
		
			return $insert_id = $this->db->insert_id();	
		}

		public function perbaruiuser($var, $where)
		{
			$res = $this->db->update('user', $var, $where);
			return $res;
		}

		public function tambahakses($detail)// db detail akses
		{
			$this->db->insert('detailakses', $detail);
		}

		public function hapusakses($where='')
		{
			return $this->db->query('DELETE FROM detailakses WHERE id_akses = '.$where);
		}

		public function kode()
		{
			$this->db->select('RIGHT(akses.id_akses,2) as id_akses', FALSE);
			$this->db->order_by('id_akses', 'desc');
			$this->db->limit(1);
			$query	= $this->db->get('akses');

			if ($query->num_rows() <> 0) {
				$data 	= $query->row();
				$kode 	= intval($data->id_akses) + 1;
			}else{
				$kode	= 1;
			}

			$batas	= str_pad($kode, 2, "0", STR_PAD_LEFT);
			$kotam	= "AK".$batas;
			return $kotam;
		}

		public function ambilDiv()
		{
			return $this->db->get('divisi')->result();
		}

		public function menu()
		{
			return $this->db->get('menu')->result();
		}

		public function role($where)
		{
			$query = $this->db->query('SELECT akses.id_user, akses.id_akses, detailakses.id_menu, menu.nama_menu, menu.parent, menu.child FROM akses
					JOIN detailakses ON akses.id_akses = detailakses.id_akses
					JOIN menu ON detailakses.id_menu = menu.id_menu
					JOIN user ON user.id_user = akses.id_user
					WHERE user.id_user = '.$where);
			return $query->result();
		}

		public function ambilUser()
		{
			$this->db->select('user.id_user, divisi.no_div, user.nama, user.email, divisi.nama_div, user.foto, user.aktif');
			$this->db->from('user');
			$this->db->join('divisi', 'divisi.no_div = user.no_div');
			return $this->db->get()->result();
		}

		public function ambilUserById($id)
		{
			return $this->db->get_where('user', ['id_user' => $id])->result();
		}

		public function hitungUser()
		{
			$this->db->where('aktif', 1);
			$this->db->where('level', 0);
			$this->db->from('user');
			return $this->db->count_all_results();
		}

		public function ambilUserWh($value)
		{
			$this->db->select('akses.* , user.* , divisi.*');
			$this->db->from('akses');
			$this->db->join('user', 'user.id_user = akses.id_user');
			$this->db->join('divisi', 'user.no_div = divisi.no_div');
			$this->db->where('user.id_user', $value);
			return $this->db->get()->result();
		}
	}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */