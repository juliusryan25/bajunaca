<?php

use SebastianBergmann\Environment\Console;

defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function index(){
        $data['title'] = 'Check Out Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['product'] = $this->product_model->get_product();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/user_topbar',$data);
        $this->load->view('pembayaran/index',$data);
        $this->load->view('templates/user_footer');
    }

    public function proses_pesanan(){
         //UPLOAD KE pemesanan
         $nama_user = $this->input->post('nama');
         $no_telp = $this->input->post('no_hp');
         $alamat = $this->input->post('alamat');
         $jasa_pengiriman = $this->input->post('jasa_pengiriman');
         $subtotal_produk= $this->input->post('subtotal_produk');
         $subtotal_ongkir = $this->input->post('subtotal_ongkir');
         $total_pembayaran= $this->input->post('total_pembayaran');
         $no_rekening= $this->input->post('no_rekening');
         $tgl_pesan= $this->input->post('tgl_pesan');
         $id_user= $this->input->post('id_user');
         
         $pesanan = array(
             'id_user' => $id_user,
             'nama_user' => $nama_user,
             'no_telp' => $no_telp,
             'alamat' => $alamat,
             'jasa_pengiriman' => $jasa_pengiriman,
             'subtotal_produk' => $subtotal_produk,
             'subtotal_pengiriman' => $subtotal_ongkir,
             'total_bayar' => $total_pembayaran,
             'no_rekening' => $no_rekening,
             'status' => 'Menunggu Pembayaran',
             'tgl_pesan' => $tgl_pesan,
            
         );
         
         $this->db->insert('invoice',$pesanan);
 
         //SETELAH UPLOAD DATA KE TB_INVOICE SISTEM MENGUPLOAD DATA BARANG KE TB_PESANAN
         $di_proses = $this->invoice_model->index();
         // 
         if ($di_proses->num_rows() > 0) {
            $i = $di_proses->row_array();
            $data = array(
                'id_invoice' => $i['id_invoice'],
                'no_rekening' => $i['no_rekening'],
                'total_bayar' => $i['total_bayar']
                // 'asal_product' => $i['asal_product'],
                // 'nama_product' => $i['nama_product'],
                // 'deskripsi' => $i['deskripsi'],
                // 'harga' => $i['harga'],
                // 'stok' => $i['stok'],
                // 'image' => $i['image']
            );
        
             $this->cart->destroy();
             $data['title'] = 'Pembayaran';
             $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
             $this->session->set_flashdata('flash', 'flashdata');
             $this->load->view('templates/header',$data);
             $this->load->view('templates/user_topbar',$data);
             $this->load->view('pembayaran/transfer',$data);
            //  $this->load->view('templates/user_footer');
            
       
         }
       
    }

    public function upload_bukti_pembayaran(){
        $id_invoice = $this->input->post('id_invoice');
        
        $profile_picture = $_FILES['image']['name'];
        $namafoto = "upload/" . str_replace(" ", "_", $profile_picture); //DIGUNAKAN UNTUK RENAME GAMBAR
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);




        if (!$this->upload->do_upload('image')) {

            // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully added product</div>');
            // $this->product_model->add_product($kategori_produk, $email_seller, $nama_toko,$rekening_toko, $asal_product, $nama_produk, $harga, $stok, $status_produk, $deskripsi_produk, $gambar_old);
            // redirect('seller/add_product_view');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully added product</div>');
            $this->invoice_model->upload_bukti_pembayaran($id_invoice, $namafoto);
            redirect('pesanan/detail_pesanan/'.$id_invoice);

        }
      
    }

}
?>