<?php

class User_model extends CI_Model
{
    ///////////////////////////// GET DATA USER PERKATEGORI ////////////////////////////////
    public function get_user_admin()
    {
        $result = $this->db->get_where('user', array('role_id' => 1));
        return $result;
    }
    public function get_user_seller()
    {
        $result = $this->db->get_where('user', array('role_id' => 3));
        return $result;
    }
    public function get_user_user()
    {
        $result = $this->db->get_where('user', array('role_id' => 2));
        return $result;
    }

    ///////////////////////////// ADD DATA USER ////////////////////////////////
    public function add_user_seller($name, $email, $gambar_old, $password, $role_id, $nama_toko,$rekening_toko, $no_telp, $provinsi, $kota, $address)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'image' => $gambar_old,
            'password' => $password,
            'role_id' => $role_id,
            'is_active' => 1,
            'date_created' => time(),
            'no_telp' => $no_telp,
            'nama_toko' => $nama_toko,
            'no_rekening' => $rekening_toko,
            'provinsi' => $provinsi,
            'kabupaten_kota' => $kota,
            'address' => $address,
            'status_data' => 1

        ];
        $this->db->insert('user', $data);
    }
    public function add_user($name, $email, $gambar_old, $password, $role_id, $no_telp, $provinsi, $kota, $address)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'image' => $gambar_old,
            'password' => $password,
            'role_id' => $role_id,
            'is_active' => 1,
            'date_created' => time(),
            'no_telp' => $no_telp,
            'provinsi' => $provinsi,
            'kabupaten_kota' => $kota,
            'address' => $address,
            'status_data' => 1

        ];
        $this->db->insert('user', $data);
    }
    public function add_user2_seller($name, $email, $namafoto, $password, $role_id, $nama_toko,$rekening_toko, $no_telp, $provinsi, $kota, $address)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'image' => $namafoto,
            'password' => $password,
            'role_id' => $role_id,
            'is_active' => 1,
            'date_created' => time(),
            'no_telp' => $no_telp,
            'nama_toko' => $nama_toko,
            'no_rekening' => $rekening_toko,
            'provinsi' => $provinsi,
            'kabupaten_kota' => $kota,
            'address' => $address,
            'status_data' => 1

        ];
        $this->db->insert('user', $data);
    }

    public function add_user2($name, $email, $namafoto, $password, $role_id, $no_telp, $provinsi, $kota, $address)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'image' => $namafoto,
            'password' => $password,
            'role_id' => $role_id,
            'is_active' => 1,
            'date_created' => time(),
            'no_telp' => $no_telp,
            'provinsi' => $provinsi,
            'kabupaten_kota' => $kota,
            'address' => $address,
            'status_data' => 1

        ];
        $this->db->insert('user', $data);
    }

    /////////////////////////////GET DATA USER BY ID////////////////////////////////
    function get_user_id($id)
    {
        $query = $this->db->get_where('user', array('id' => $id));
        return $query;
    }

    /////////////////////////////GET DATA USER PERKATEGORI////////////////////////////////
    public function edit_user1($id, $name, $email, $gambar_old, $role_id, $no_telp, $nama_toko, $provinsi, $kota, $address)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'image' => $gambar_old,
            'role_id' => $role_id,
            'is_active' => 1,
            'date_created' => time(),
            'no_telp' => $no_telp,
            'nama_toko' => $nama_toko,
            'provinsi' => $provinsi,
            'kabupaten_kota' => $kota,
            'address' => $address,

        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
    public function edit_user2($id, $name, $email, $namafoto, $role_id, $no_telp, $nama_toko, $provinsi, $kota, $address)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'image' => $namafoto,
            'role_id' => $role_id,
            'is_active' => 1,
            'date_created' => time(),
            'no_telp' => $no_telp,
            'nama_toko' => $nama_toko,
            'provinsi' => $provinsi,
            'kabupaten_kota' => $kota,
            'address' => $address,

        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function edit_user_admin1($id, $name, $email, $gambar_old, $role_id,$nama_toko,$rekening_toko,  $no_telp, $provinsi, $kota, $address)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'image' => $gambar_old,
            'role_id' => $role_id,
            'is_active' => 1,
            'date_created' => time(),
            'no_telp' => $no_telp,
            'nama_toko' => $nama_toko,
            'no_rekening' => $rekening_toko,
            'provinsi' => $provinsi,
            'kabupaten_kota' => $kota,
            'address' => $address,

        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
    public function edit_user_admin2($id, $name, $email, $namafoto, $role_id,$nama_toko,$rekening_toko, $no_telp, $provinsi, $kota, $address)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'image' => $namafoto,
            'role_id' => $role_id,
            'is_active' => 1,
            'date_created' => time(),
            'no_telp' => $no_telp,
            'nama_toko' => $nama_toko,
            'no_rekening' => $rekening_toko,
            'provinsi' => $provinsi,
            'kabupaten_kota' => $kota,
            'address' => $address,

        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function edit_user_admin1_seller($id, $name, $email, $gambar_old,  $no_telp,$nama_toko, $provinsi, $kota, $address)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'image' => $gambar_old,
            'is_active' => 1,
            'date_created' => time(),
            'no_telp' => $no_telp,
            'nama_toko' => $nama_toko,
            'provinsi' => $provinsi,
            'kabupaten_kota' => $kota,
            'address' => $address,

        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
    public function edit_user_admin2_seller($id, $name, $email, $namafoto, $no_telp,$nama_toko, $provinsi, $kota, $address)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'image' => $namafoto,
            'is_active' => 1,
            'date_created' => time(),
            'no_telp' => $no_telp,
            'nama_toko' => $nama_toko,
            'nama_toko' => '',
            'provinsi' => $provinsi,
            'kabupaten_kota' => $kota,
            'address' => $address,

        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }


    ///////////////////////////// UPDATE PROFILE USER , ADMIN , SELLER ////////////////////////////////
    public function update_profile_user($id, $name, $namafoto, $no_telp, $provinsi, $kota, $address)
    {
        $data = array(
            'name' => $name,
            'no_telp' => $no_telp,
            'provinsi' => $provinsi,
            'kabupaten_kota' => $kota,
            'address' => $address,
            'status_data' => 1,
            'image' => $namafoto,
            'status_data' => 1
        );

        $this->db->where('id', $id);
        $this->db->update('user', $data);

    }

    ///////////////////////////// DELETE DATA USER , ADMIN , SELLER ////////////////////////////////
    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }


}
?>