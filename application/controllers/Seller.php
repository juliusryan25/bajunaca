<?php

use SebastianBergmann\Environment\Console;

defined('BASEPATH') or exit('No direct script access allowed');

class Seller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'welcome '.$data['user']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('seller/index', $data);
        $this->load->view('templates/footer');
    }
    public function profile()
    {
        $data['title'] = 'Profile Seller';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'welcome '.$data['user']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit_profile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'welcome '.$data['user']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/edit_profile', $data);
        $this->load->view('templates/footer');

    }

    public function edit_profile_seller()
    {

        $id = $this->input->post('id');
        $name = $this->input->post('name');
        // $profile = $this->input->post('profile');
        $no_telp = $this->input->post('no_telp');
        $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        if ($kota == "Pilih Kabupaten / Kota") {
            $kota = "";
        }
        $address = $this->input->post('address');
        $gambar_old = $this->input->post('gambar_old');



        $profile_picture = $_FILES['image']['name'];
        $namafoto = "assets/img/profile/" . str_replace(" ", "_", $profile_picture); //DIGUNAKAN UNTUK RENAME GAMBAR
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('image')) {
            // $error = array('error' => $this->upload->display_errors());
            // var_dump($error);

            $this->user_model->update_profile_user($id, $name, $gambar_old, $no_telp, $provinsi, $kota, $address);
            redirect('seller/profile');
        } else {
            $this->user_model->update_profile_user($id, $name, $namafoto, $no_telp, $provinsi, $kota, $address);
            if ($gambar_old != "assets/img/profile/user.png") {
                unlink($gambar_old);
            }
            redirect('seller/profile');
        }
    }

    public function product()
    {
        $data['title'] = 'Product';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $email_seller = $_SESSION['email'];
        // var_dump($id_seller);

        $data['tb_product'] = $this->product_model->get_product_seller($email_seller);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('seller/product', $data);
        $this->load->view('templates/footer');
    }

    public function add_product_view()
    {
        $data['title'] = 'Product';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->db->get_where('kategori_product', ['kategori'])->result();

        // $email_seller = $_SESSION['email'];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('seller/addProduct', $data);
        $this->load->view('templates/footer');
    }

    public function add_product()
    {
        $kategori_produk = $this->input->post('kategori_produk');
        $email_seller = $_SESSION['email'];
        $asal_product = $this->input->post('asal_produk');
        $nama_toko = $this->input->post('nama_toko');
        $rekening_toko = $this->input->post('rekening_toko');
        $nama_produk = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $status_produk = $this->input->post('status_produk');
        $deskripsi_produk = $this->input->post('deskripsi_produk');
        $gambar_old = 'upload/box.png';

        $profile_picture = $_FILES['image']['name'];
        $namafoto = "upload/" . str_replace(" ", "_", $profile_picture); //DIGUNAKAN UNTUK RENAME GAMBAR
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);




        if (!$this->upload->do_upload('image')) {

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully added product</div>');
            $this->product_model->add_product($kategori_produk, $email_seller, $nama_toko, $rekening_toko, $asal_product, $nama_produk, $harga, $stok, $status_produk, $deskripsi_produk, $gambar_old);
            redirect('seller/add_product_view');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully added product</div>');
            $this->product_model->add_product($kategori_produk, $email_seller, $nama_toko, $rekening_toko, $asal_product, $nama_produk, $harga, $stok, $status_produk, $deskripsi_produk, $namafoto);
            redirect('seller/add_product_view');

        }
    }

    public function edit_product_view()
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
                'kategori' => $i['kategori'],
                'nama_product' => $i['nama_product'],
                'deskripsi' => $i['deskripsi'],
                'harga' => $i['harga'],
                'stok' => $i['stok'],
                'status_aktif' => $i['status_aktif'],
                'image' => $i['image']
            );

            $data['title'] = 'Edit Product';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['kategori_product'] = $this->db->get_where('kategori_product', ['kategori'])->result();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('seller/editProduct', $data);
            $this->load->view('templates/footer');


        } else {
            echo "Data Was Not Found";
        }
    }

    public function edit_product()
    {
        $id_product = $this->input->post('id_product');
        $kategori_produk = $this->input->post('kategori_produk');
        $email_seller = $_SESSION['email'];
        $asal_product = $this->input->post('asal_produk');
        $nama_toko = $this->input->post('nama_toko');
        $nama_produk = $this->input->post('nama_produk');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $status_produk = $this->input->post('status_produk');
        $deskripsi_produk = $this->input->post('deskripsi_produk');
        $gambar_old = $this->input->post('gambar_old');

        $profile_picture = $_FILES['image']['name'];
        $namafoto = "upload/" . str_replace(" ", "_", $profile_picture); //DIGUNAKAN UNTUK RENAME GAMBAR
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if (!$this->upload->do_upload('image')) {

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully added product</div>');
            $this->product_model->edit_product1($id_product, $kategori_produk, $email_seller, $nama_toko, $asal_product, $nama_produk, $harga, $stok, $status_produk, $deskripsi_produk, $gambar_old);
            $this->session->set_flashdata('edit_success', '<div class="alert alert-success" role="alert">Edit Success<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('seller/product');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully d product</div>');
            $this->product_model->edit_product2($id_product, $kategori_produk, $email_seller, $nama_toko, $asal_product, $nama_produk, $harga, $stok, $status_produk, $deskripsi_produk, $namafoto);
            unlink($gambar_old);
            $this->session->set_flashdata('edit_success', '<div class="alert alert-success" role="alert">Edit Success<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            redirect('seller/product');

        }
    }

    public function delete_product()
    {
        $id_product = $this->uri->segment(3);
        $this->product_model->delete_product($id_product);
        $this->session->set_flashdata('delete_success', '<div class="alert alert-success" role="alert">Delete Success<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        redirect('seller/product');

    }

    public function pesanan()
    {
        $data['title'] = 'Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $email_seller = $_SESSION['email'];

        // var_dump($id_seller);

        $data['pesanan_diproses'] = $this->invoice_model->get_pesanan_diproses();
        $data['pesanan_dikirim'] = $this->invoice_model->get_pesanan_dikirim();
        $data['pesanan_selesai'] = $this->invoice_model->get_pesanan_selesai();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('seller/pesanan', $data);
        $this->load->view('templates/footer');
    }

    public function proses_pesanan()
    {
        $id_invoice = $this->uri->segment(3);

        $result = $this->invoice_model->get_detail_pesanan($id_invoice);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_invoice' => $id_invoice,
                'nama_user' => $i['nama_user'],
                'no_telp' => $i['no_telp'],
                'alamat' => $i['alamat'],
                'jasa_pengiriman' => $i['jasa_pengiriman'],
                'subtotal_produk' => $i['subtotal_produk'],
                'subtotal_pengiriman' => $i['subtotal_pengiriman'],
                'total_bayar' => $i['total_bayar'],
                'no_rekening' => $i['no_rekening'],
                'bukti_pembayaran' => $i['bukti_pembayaran'],
                'status' => $i['status'],
                'tgl_pesan' => $i['tgl_pesan'],
                'resi' => $i['resi']

            );

            $data['pesanan'] = $this->db->get_where('data_pesanan', ['id_invoice' => $id_invoice])->result();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Detail Pesanan';
        }



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('seller/detail_pesanan_seller', $data);
        $this->load->view('templates/footer');

    }

    public function proses_resi(){
        $id_invoice = $this->input->post('id_invoice');
        $resi = $this->input->post('resi');

        $this->invoice_model->proses_resi($id_invoice, $resi);
        $this->session->set_flashdata('proses_success', '<div class="alert alert-success" role="alert">Pesanan Berhasil Diproses<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('seller/pesanan');
    }
}
?>
