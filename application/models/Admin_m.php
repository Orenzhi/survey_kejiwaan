<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_m extends CI_Model
{
	// berikut adalah method crud data, $tabel merupakan parameter untuk menampung nama tabel
	// $data merupakan parameter untuk menampung data apa saja yang akan di crud dengan bentuk array()
	// contoh array("nik"=>$a);
	// $id merupakan parameter untuk menampung kondisi yang akan diterapkan, atau disebut dengan klausa
	// where. contoh array("id"=>aa);
	public function showData($tabel)
	{
		$data = $this->db->get($tabel)->result_array();
		return $data;
	}
	public function insertData($tabel, $data)
	{
		$has = $this->db->insert($tabel, $data);
		return $has;
	}

	public function updateData($tabel, $data, $id)
	{
		$has = $this->db->update($tabel, $data, $id);
		return $has;
	}
	public function deleteData($tabel, $id)
	{
		$has = $this->db->delete($tabel, $id);
		return $has;
	}

	public function showDataspesifik($tabel, $id)
	{
		$has = $this->db->get_where($tabel, $id)->row_array();
		return $has;
	}

	
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */
