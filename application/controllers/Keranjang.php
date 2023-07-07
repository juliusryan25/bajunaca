<?php

use SebastianBergmann\Environment\Console;

defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Product_model');
        // cek_login();

    }


    public function masukan_keranjang($id_product)
    {
        $id_product = $this->uri->segment(3);
        $kuantitas = $this->uri->segment(4);


        $barang = $this->product_model->find($id_product);
        $nama_product = $barang->nama_product;
        $nama_product_kompres = substr($nama_product, 0, 5);

        $data = array(
            'id' => $id_product,
            'qty' => $kuantitas,
            'price' => $barang->harga,
            'name' => $barang->nama_product,
            'options'  =>  array ( 'rekening'  => $barang->no_rekening ) 
        );
        if (!$this->cart->insert($data)) {
            echo "gagal insert";
            var_dump($data);
        } else {
            // var_dump($data);
            $this->session->set_flashdata('flash', 'flashdata');
            redirect('Product/detail_product/' . $id_product);

        }
        // echo 'data berhasil';
        // 
    }



    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('keranjang');
    }

    public function hapus_keranjang_id($row_id)
    {
        $this->cart->remove($row_id);
        redirect('Keranjang');
    }

    public function tambah_qty()
    {
        $p_id = $this->uri->segment(3);
        $qty = $this->uri->segment(4) + 1;

        $data = array(
            'rowid' => $p_id,
            'qty' => $qty
        );

        $this->cart->update($data);
        redirect('keranjang');
    }
    public function kurang_qty()
    {
        $p_id = $this->uri->segment(3);
        $qty = $this->uri->segment(4) - 1;

        if ($qty < 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kuantitas tidak boleh kosong</div>');
            redirect('keranjang');
        } else {

            $data = array(
                'rowid' => $p_id,
                'qty' => $qty
            );

            $this->cart->update($data);
            redirect('keranjang');
        }



    }


    public function index()
    {
        $data['title'] = 'Keranjang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('keranjang/index', $data);
        $this->load->view('templates/user_footer');
    }
}
?>