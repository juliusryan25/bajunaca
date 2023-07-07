<?php

class Product_model extends CI_Model
{
    public function get_product()
    {
        $result = $this->db->query("SELECT * FROM product;");
        return $result;
    }
    public function get_product_seller($email_seller)
    {
        $result = $this->db->get_where('product', array('email_seller' => $email_seller));
        return $result;
    }

    public function get_product_id($id_product)
    {
        $result = $this->db->get_where('product', array('id_product' => $id_product));
        return $result;
    }
    public function add_product($kategori_produk, $email_seller, $nama_toko,$rekening_toko, $asal_product, $nama_produk, $harga, $stok, $status_produk, $deskripsi_produk, $gambar_old)
    {
        $data = [

            'email_seller' => $email_seller,
            'nama_toko' => $nama_toko,
            'no_rekening' => $rekening_toko,
            'asal_product' => $asal_product,
            'kategori' => $kategori_produk,
            'nama_product' => $nama_produk,
            'deskripsi' => $deskripsi_produk,
            'harga' => $harga,
            'stok' => $stok,
            'status_aktif' => $status_produk,
            'image' => $gambar_old,


        ];
        $this->db->insert('product', $data);
    }

    public function edit_product1($id_product, $kategori_produk, $email_seller, $nama_toko, $asal_product, $nama_produk, $harga, $stok, $status_produk, $deskripsi_produk, $gambar_old)
    {
        $data = [

            'email_seller' => $email_seller,
            'nama_toko' => $nama_toko,
            'asal_product' => $asal_product,
            'kategori' => $kategori_produk,
            'nama_product' => $nama_produk,
            'deskripsi' => $deskripsi_produk,
            'harga' => $harga,
            'stok' => $stok,
            'status_aktif' => $status_produk,
            'image' => $gambar_old,


        ];
        $this->db->where('id_product', $id_product);
        $this->db->update('product', $data);
    }

    public function edit_product2($id_product, $kategori_produk, $email_seller, $nama_toko, $asal_product, $nama_produk, $harga, $stok, $status_produk, $deskripsi_produk, $namafoto)
    {
        $data = [

            'email_seller' => $email_seller,
            'nama_toko' => $nama_toko,
            'asal_product' => $asal_product,
            'kategori' => $kategori_produk,
            'nama_product' => $nama_produk,
            'deskripsi' => $deskripsi_produk,
            'harga' => $harga,
            'stok' => $stok,
            'status_aktif' => $status_produk,
            'image' => $namafoto,


        ];
        $this->db->where('id_product', $id_product);
        $this->db->update('product', $data);
    }

    public function delete_product($id_product)
    {
        $this->db->where('id_product', $id_product);
        $this->db->delete('product');
    }

    public function find($id_product)
    {
        $result = $this->db->where('id_product', $id_product)
            ->limit(1)
            ->get('product');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
?>