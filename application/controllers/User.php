<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        $data['title'] = 'Bajunaca';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->product_model->get_product();
        $data['carosel'] = $this->konten_model->get_carosel();
        // echo 'welcome '.$data['user']['name'];

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/user_footer');
    }
    public function profile()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'welcome '.$data['user']['name'];

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('templates/profile', $data);
        $this->load->view('templates/user_footer');
    }
    public function edit_profile()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'welcome '.$data['user']['name'];

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('templates/edit_profile', $data);
        $this->load->view('templates/user_footer');
    }

    public function edit_profile_user()
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

        // $this->user_model->update($id,$name,$no_telp,$address); 
        // redirect('user');

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
            redirect('user/profile');
        } else {
            $this->user_model->update_profile_user($id, $name, $namafoto, $no_telp, $provinsi, $kota, $address);
            if ($gambar_old != "assets/img/profile/user.png") {
                unlink($gambar_old);
            }
            redirect('user/profile');
        }
    }

    public function history_pesanan()
    {
        $data['title'] = 'History Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id'];

        $data['history_pesanan'] = $this->invoice_model->get_history_pesanan($id_user);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/history_pesanan', $data);
        $this->load->view('templates/user_footer');
    }
}
?>