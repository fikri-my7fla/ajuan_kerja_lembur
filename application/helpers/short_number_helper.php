<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (! function_exists('currency')) {
    function currency($input)
    {
        $ci = & get_instance();
        $ci->load->database();
        $var = $ci->session->userdata('set_currency');
        if (isset($var)) {
            $ci->db->select('*');
            $ci->db->from('currencies');
            $ci->db->where('name', $var);
            $query = $ci->db->get();
            $row = $query->row();
            $rate = $row->rate;
        } else {
            $rate = 1;
        }
        $total = (double) $input * (double) $rate;
        return number_format((double) $total, 2);
    }
}
if (! function_exists('label')) {
    function label()
    {
        $ci = & get_instance();
        $var = $ci->session->userdata('set_currency');
        if (isset($var)) {
            $result = $ci->session->userdata('set_currency');
        } else {
            $result = "Rp";
        }
        return $result;
    }
}