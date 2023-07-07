<?php

use SebastianBergmann\Environment\Console;

defined('BASEPATH') or exit('No direct script access allowed');

class product extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        // cek_login();
    }
    public function detail_product()
    {
        $id_product = $this->uri->segment(3);
        $result = $this->product_model->get_product_id($id_product);

        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_product' => $i['id_product'],

                'email_seller' => $i['email_seller'],
                'nama_toko' => $i['nama_toko'],
                'asal_product' => $i['asal_product'],
                'nama_product' => $i['nama_product'],
                'deskripsi' => $i['deskripsi'],
                'harga' => $i['harga'],
                'stok' => $i['stok'],
                'image' => $i['image']
            );

            $data['title'] = 'Detail Product';
            
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['product'] = $this->product_model->get_product();
            $this->load->view('templates/header',$data);
            $this->load->view('templates/user_topbar',$data);
            $this->load->view('visitor/detail_product',$data);
            $this->load->view('templates/user_footer');

        } else {
            echo "Data Was Not Found";
           
        }
    }

    
}
?>