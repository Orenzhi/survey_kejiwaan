<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penduduk_model extends CI_Model
{

    public $table = 'penduduk';
    public $id = 'id_t1';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // function get_penduduk_spesifik()
    // {
    //     $this->db->select('*');
    //     $this->db->from('penduduk');
    //     $this->db->join('provinsi', 'kota.id_provinsi_fk = provinsi.id_provinsi','inner');
    //     $this->db->order_by('nama_kota');
    //     $query = $this->db->get();
    //     return $query->result();
    //     // $this->db->where($this->kd, $kd);
    //     // return $this->db->get($this->table)->result();
    // }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_t1', $q);
	$this->db->or_like('no_kk', $q);
	$this->db->or_like('nik', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('jk', $q);
	$this->db->or_like('stts_perkawinan', $q);
	$this->db->or_like('pekerjaan', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('kewarganeraan', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('rt', $q);
	$this->db->or_like('rw', $q);
	$this->db->or_like('kelurahan', $q);
	$this->db->or_like('kecamatan', $q);
	$this->db->or_like('kota', $q);
	$this->db->or_like('provinsi', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_t1', $q);
	$this->db->or_like('no_kk', $q);
	$this->db->or_like('nik', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tgl_lahir', $q);
	$this->db->or_like('jk', $q);
	$this->db->or_like('stts_perkawinan', $q);
	$this->db->or_like('pekerjaan', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('kewarganeraan', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('rt', $q);
	$this->db->or_like('rw', $q);
	$this->db->or_like('kelurahan', $q);
	$this->db->or_like('kecamatan', $q);
	$this->db->or_like('kota', $q);
	$this->db->or_like('provinsi', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Penduduk_model.php */
/* Location: ./application/models/Penduduk_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-21 05:48:28 */
/* http://harviacode.com */