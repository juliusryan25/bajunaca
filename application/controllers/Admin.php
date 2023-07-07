<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function data_user()
    {
        $data['title'] = 'Data users';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tb_user1'] = $this->user_model->get_user_admin();
        $data['tb_user2'] = $this->user_model->get_user_user();
        $data['tb_user3'] = $this->user_model->get_user_seller();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dataUser', $data);
        $this->load->view('templates/footer');
    }

    public function carosel(){
        $data['title'] = 'Data users';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['carosel'] = $this->konten_model->get_carosel();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/carosel', $data);
        $this->load->view('templates/footer');
    }

    public function add_carosel(){
        $carosel_picture = $_FILES['image']['name'];
        $namafoto = "upload/" . str_replace(" ", "_", $carosel_picture); //DIGUNAKAN UNTUK RENAME GAMBAR
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('image')) {
            echo"gagal";
        }else{
            $this->konten_model->add_carosel($namafoto);
                    redirect('admin/carosel');

        }
    }
    public function delete_carosel()
    {
        $id_carosel = $this->uri->segment(3);
        $this->konten_model->delete_carosel($id_carosel);
        $this->session->set_flashdata('delete_success', '<div class="alert alert-success" role="alert">Delete Success<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/carosel');
    }

    public function add_user_view()
    {
        $data['title'] = 'Add users';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/addUser', $data);
        $this->load->view('templates/footer');
    }

    public function add_user()
    {
        $name = htmlspecialchars($this->input->post('name', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
        $no_telp = $this->input->post('no_telp');
        $role_id = $this->input->post('role_id');
        $nama_toko = $this->input->post('nama_toko');
        $rekening_toko = $this->input->post('rekening_toko');
        $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        $role_id = $this->input->post('role_id');
        $address = $this->input->post('address');
        $gambar_old = 'assets/img/profile/user.png';

        $profile_picture = $_FILES['image']['name'];
        $namafoto = "assets/img/profile/" . str_replace(" ", "_", $profile_picture); //DIGUNAKAN UNTUK RENAME GAMBAR
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'is_unique' => 'This email is already registered!'
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[8]|matches[password2]',
            [
                'matches' => 'Wrong password',
                'min_length' => 'Password too short'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Add users';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/addUser', $data);
            $this->load->view('templates/footer');
        } else {

            if (!$this->upload->do_upload('image')) {

                if ($role_id == 3) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully added data</div>');
                    $this->user_model->add_user_seller($name, $email, $gambar_old, $password, $role_id, $nama_toko,$rekening_toko, $no_telp, $provinsi, $kota, $address);
                    redirect('admin/add_user_view');

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully added data</div>');
                    $this->user_model->add_user($name, $email, $gambar_old, $password, $role_id, $no_telp, $provinsi, $kota, $address);
                    redirect('admin/add_user_view');
                }

            } else {
                if ($role_id == 3) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully added data</div>');
                    $this->user_model->add_user2_seller($name, $email, $namafoto, $password, $role_id, $nama_toko,$rekening_toko, $no_telp, $provinsi, $kota, $address);
                    redirect('admin/add_user_view');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully added data</div>');
                    $this->user_model->add_user2($name, $email, $namafoto, $password, $role_id, $no_telp, $provinsi, $kota, $address);
                    redirect('admin/add_user_view');
                }
            }

        }

    }

    public function edit_data_user_view()
    {
        $id = $this->uri->segment(3);
        $result = $this->user_model->get_user_id($id);

        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id' => $i['id'],
                'name' => $i['name'],
                'email' => $i['email'],
                'image' => $i['image'],
                'password' => $i['password'],
                'role_id' => $i['role_id'],
                'no_telp' => $i['no_telp'],
                'nama_toko' => $i['nama_toko'],
                'no_rekening' => $i['no_rekening'],
                'provinsi' => $i['provinsi'],
                'kabupaten_kota' => $i['kabupaten_kota'],
                'address' => $i['address']
            );

            $data['title'] = 'Edit users';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/editUser', $data);
            $this->load->view('templates/footer');


        } else {
            echo "Data Was Not Found";
        }
    }

    public function edit_user()
    {
        $id = $this->input->post('id');
        $name = htmlspecialchars($this->input->post('name', true));
        $email = htmlspecialchars($this->input->post('email', true));
        // $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
        $no_telp = $this->input->post('no_telp');
        $role_id = $this->input->post('role_id');
        $nama_toko = $this->input->post('nama_toko');
        $rekening_toko = $this->input->post('rekening_toko');
        $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        $address = $this->input->post('address');
        $gambar_old = $this->input->post('gambar_old');


        $profile_picture = $_FILES['image']['name'];
        $namafoto = "assets/img/profile/" . str_replace(" ", "_", $profile_picture); //DIGUNAKAN UNTUK RENAME GAMBAR
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email',
            [
                'is_unique' => 'This email is already registered!'
            ]
        );


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit users';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->session->set_flashdata('email_salah', '<small class="text-danger pl-3" >Input email salah (Sistem memulihkan email sebelumnya)</small>');
            redirect('admin/edit_data_user_view/' . $id, $data);

        } else {

            if (!$this->upload->do_upload('image')) {

                if ($role_id == 3) {
                    $this->session->set_flashdata('edit_success', '<div class="alert alert-success" role="alert">Successfully edit data</div>');
                    $this->user_model->edit_user_admin1($id, $name, $email, $gambar_old, $role_id, $nama_toko,$rekening_toko, $no_telp, $provinsi, $kota, $address);
                    redirect('admin/data_user');
                } else {
                    $nama_toko = "";
                    $this->session->set_flashdata('edit_success', '<div class="alert alert-success" role="alert">Successfully edit data</div>');
                    $this->user_model->edit_user_admin1($id, $name, $email, $gambar_old, $role_id, $nama_toko,$rekening_toko, $no_telp, $provinsi, $kota, $address);
                    redirect('admin/data_user');
                }


            } else {
                // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Successfully edit data</div>');
                if ($role_id == 3) {
                    $this->user_model->edit_user_admin2($id, $name, $email, $namafoto, $role_id, $nama_toko,$rekening_toko, $no_telp, $provinsi, $kota, $address);
                    if ($gambar_old == "assets/img/profile/user.png") {
                        $this->session->set_flashdata('edit_success', '<div class="alert alert-success" role="alert">Successfully edit data<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button></div>');
                        redirect('admin/data_user');
                    } else {
                        unlink('./' . $gambar_old);
                        $this->session->set_flashdata('edit_success', '<div class="alert alert-success" role="alert">Successfully edit data<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button></div>');
                        redirect('admin/data_user');
                    }
                } else {
                    $nama_toko = "";
                    $this->user_model->edit_user_admin2($id, $name, $email, $namafoto, $role_id, $nama_toko, $no_telp,$rekening_toko, $provinsi, $kota, $address);
                    if ($gambar_old == "assets/img/profile/user.png") {
                        $this->session->set_flashdata('edit_success', '<div class="alert alert-success" role="alert">Successfully edit data<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button></div>');
                        redirect('admin/data_user');
                    } else {
                        unlink('./' . $gambar_old);
                        $this->session->set_flashdata('edit_success', '<div class="alert alert-success" role="alert">Successfully edit data<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button></div>');
                        redirect('admin/data_user');
                    }
                }

            }

        }

    }

    public function delete_data_user()
    {
        $id = $this->uri->segment(3);
        $this->user_model->delete_user($id);
        $this->session->set_flashdata('delete_success', '<div class="alert alert-success" role="alert">Delete Success<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/data_user');
    }

    public function profile()
    {
        $data['title'] = 'Profile admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
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

    public function edit_profile_admin()
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
            redirect('admin/profile');
        } else {
            $this->user_model->update_profile_user($id, $name, $namafoto, $no_telp, $provinsi, $kota, $address);
            if ($gambar_old != "assets/img/profile/user.png") {
                unlink($gambar_old);
            }
            redirect('admin/profile');
        }
    }

}
?>