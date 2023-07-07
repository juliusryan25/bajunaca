<style>
    @media (max-width: 800px) {
        .tempat_foto {
            width: 40%;
            text-align: center;

        }

        .tempat_data {
            width: 60%;
            text-align: left;

        }

        h5 {
            font-size: 15px;
        }

    }

    .menu_personal {
        width: 95%;
        text-decoration: none;
        color: #858796;
        border-radius: 10px;
        height: 45px;
        padding-top: 11px;
        padding-left: 2px;
        padding-right: 2px;
    }

    .menu_personal:hover {
        cursor: pointer;
        background-color: #EBEBEF;
        color: #4E73DF;
        text-decoration: none;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12 bg-white shadow">
            <div class="row">
                <div class="col-lg-4 col-md-4 my-auto tempat_foto col-sm-4 d-flex justify-content-center"
                    style="height: 150px;">
                    <img class="img-profile rounded-circle mt-3 " style="width: 120px;height: 120px;"
                        src="<?= base_url() . $user['image']; ?>">
                </div>
                <div class="col-lg-8 col-md-8 tempat_data ">
                    <p>
                    <h2>
                        <?= $user['name']; ?>
                    </h2>

                    <h5>
                        <?= $user['email']; ?>
                    </h5>
                    <h5>
                        <?= $user['no_telp']; ?>
                    </h5>
                    <h5>
                        <?= $user['kabupaten_kota']; ?>
                    </h5>
                    <a href="<?php
                    if ($user['role_id'] == 1) {
                        echo base_url('admin/edit_profile/' . $user['id']);
                    } else if ($user['role_id'] == 3) {
                        echo base_url('seller/edit_profile/' . $user['id']);
                    } else {
                        echo base_url('user/edit_profile/' . $user['id']);
                    }
                    ?>" class="btn btn-success ">
                        <i class="fa-solid fa-fw fa-gear"></i>
                        Edit Profile
                    </a>
                    </p>
                </div>
            </div>
        </div>
        <?php
        if ($user['role_id'] == 2) { ?>
            <div class="col-lg-12 p-1 mt-4 bg-white shadow" style="height: 53px;">
                <div class="row d-flex justify-content-center">
                    <a href="<?php echo base_url('user/history_pesanan/'); ?>" class="menu_personal">
                        <h5>
                            <b>
                                Pesanan
                                <i class="fa-solid fa-fw fa-angle-right float-right"></i>
                            </b>
                        </h5>
                    </a>
                </div>
            </div>
            <?php ;
        } ?>
        <div class="col-lg-12 p-1 mt-2 bg-white shadow" style="height: 53px;margin-bottom: 280px;">
            <div class="row d-flex justify-content-center">
                <a href="#" data-toggle="modal" data-target="#logoutModal" class="menu_personal text-danger">
                    <h5>
                        <b>
                            Logout
                            <i class="fa-solid fa-right-from-bracket fa-fw float-right"></i>
                        </b>
                    </h5>
                </a>
            </div>
        </div>
    </div>
</div>