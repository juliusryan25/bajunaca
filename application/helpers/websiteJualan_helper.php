<?php
    function cek_login(){
        $ci = get_instance();
        if (!$ci->session->userdata('email')) {
            redirect('auth');
        }
        else {
            $role_id = $ci->session->userdata('role_id');
            $menu = $ci->uri->segment(1);

            $queryMenu = $ci->db->get_where('user_role',['role' => $menu])->row_array();

            $menu_id = $queryMenu['id'];

            $queryAccess= $ci->db->get_where('user_access_menu',[
                'role_id' => $menu_id,
                'menu_id' => $role_id
            ]);

            if ($queryAccess->num_rows() < 1) {
                redirect('auth/bloked');
            }

        }
    }
?>