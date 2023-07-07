<?php
use SebastianBergmann\Environment\Console;

class invoice_model extends CI_Model
{
    public function index()
    {
        // date_default_timezone_get('Asia/Jakarta');


        // $jumlah_dipilih = count((array)$this->cart->total_items());
        // echo("<script>console.log('PHP: " . $jumlah_dipilih . "');</script>");
        // foreach ($this->cart->contents() as $items):

        $id_invoice = $this->db->insert_id();
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'id_invoice' => $id_invoice,
                'id_product' => $items['id'],
                'nama_product' => $items['name'],
                'jumlah' => $items['qty'],
                'harga' => $items['price'],
            );

            $this->db->insert('data_pesanan', $data);
        }


        $get_hasil = $this->db->get_where('invoice', array('id_invoice' => $id_invoice));
        return $get_hasil;

    }

    public function upload_bukti_pembayaran($id_invoice, $namafoto)
    {

        $data = [
            'bukti_pembayaran' => $namafoto,
            'status' => 'Pesanan Diproses'
        ];
        $this->db->where('id_invoice', $id_invoice);
        $this->db->update('invoice', $data);

    }

    public function get_history_pesanan($id_user)
    {
        $result = $this->db->get_where('invoice', array('id_user' => $id_user));
        return $result;
    }
    public function get_detail_pesanan($id_invoice)
    {
        $result = $this->db->get_where('invoice', array('id_invoice' => $id_invoice));
        return $result;
    }
    public function ambil_data_pesanan($id_invoice)
    {
        $pesanan = $this->db->get_where('data_pesanan', array('id_invoice' => $id_invoice));
        return $pesanan;
    }

    public function get_pesanan_diproses()
    {

        $result = $this->db->get_where('invoice', array('status' => 'Pesanan Diproses'));
        
        return $result;

    }
    public function get_pesanan_dikirim()
    {

        $result = $this->db->get_where('invoice', array('status' => 'Dalam Pengiriman'));
        
        return $result;

    }
    public function get_pesanan_selesai()
    {

        $result = $this->db->get_where('invoice', array('status' => 'Pesanan Diterima'));
        
        return $result;

    }

    public function proses_resi($id_invoice, $resi)
    {

        $data = [
            'resi' => $resi,
            'status' => 'Dalam Pengiriman'
        ];
        $this->db->where('id_invoice', $id_invoice);
        $this->db->update('invoice', $data);

    }
    public function konfirmasi_terima_pesanan($id_invoice)
    {

        $data = [
            'status' => 'Pesanan Diterima'
        ];
        $this->db->where('id_invoice', $id_invoice);
        $this->db->update('invoice', $data);

    }
}
?>