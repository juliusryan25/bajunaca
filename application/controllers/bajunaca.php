<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bajunaca extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();
    }
    public function index()
    {
        $data['title'] = 'Bajunaca';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'welcome '.$data['user']['name'];
        $data['product'] = $this->product_model->get_product();
        $data['carosel'] = $this->konten_model->get_carosel();
        $this->load->view('templates/header',$data);
        // $this->load->view('templates/sidebar');
        $this->load->view('templates/user_topbar');
        $this->load->view('visitor/index',$data);
        $this->load->view('templates/user_footer');
    }
}
?>