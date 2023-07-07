<?php

use SebastianBergmann\Environment\Console;

defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function detail_pesanan()
    {


        $id_invoice = $this->uri->segment(3);

        $result = $this->invoice_model->get_detail_pesanan($id_invoice);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_invoice' => $i['id_invoice'],
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
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/detail_pesanan', $data);
        $this->load->view('templates/user_footer');

    }

    public function konfirmasi_terima_pesanan()
    {
        $id_invoice = $this->input->post('id_invoice');

        $this->invoice_model->konfirmasi_terima_pesanan($id_invoice);

        redirect('pesanan/detail_pesanan/' . $id_invoice);

    }

} ?>