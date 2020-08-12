<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu_m extends CI_Model
{


    public function showMenu()
    {
        $menu = $this->db->get('menu')->result_array();
        //$menu = $this->db->query($query)->result_array();
        return $menu;
    }

    public function getSubmenu($r)
    {
        //join dua table
        // $this->db->select('*');
        // $this->db->from('menu');
        // $this->db->join('sub_menu', 'menu.kode_menu = sub_menu.kode_menu');
        $datasub = $this->db->get_where('sub_menu', ['kode_menu' => $r])->result_array();
        return $datasub;
    }
}

/* End of file ModelName.php */
