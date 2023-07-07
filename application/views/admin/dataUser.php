<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-10 col-md-9 col-sm-12">
            <h1 class="h3 mb-4 text-gray-800">Data Users</h1>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-12">
            <a href="<?= base_url('admin/add_user_view')?>" class="btn btn-primary" style="width: 100%;">
                Add +
            </a>
        </div>
        <div class="col-lg-12">
            <?= $this->session->flashdata('delete_success'); ?>
            <?= $this->session->flashdata('edit_success'); ?>
        </div>
        <div class="col-lg-12 col-md-12 mt-3 col-sm-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Seller</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">User</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="col-12 mt-3" style="overflow: auto;" ;>
                        <table id="tabel-data" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;

                                foreach ($tb_user1->result() as $row) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $count; ?>
                                        </th>
                                        <td>
                                            <?php echo $row->name; ?>
                                        </td>
                                        <td>
                                            <?php echo $row->email; ?>
                                        </td>
                                        <td>
                                            <img class="rounded-circle mx-auto" style="width: 50px;height: 50px;"
                                                src="<?= base_url() . $row->image; ?>">
                                        </td>
                                        <td>
                                            <?php
                                            if ($row->role_id == "1") {
                                                echo 'Admin';
                                            } else if ($row->role_id == "2") {
                                                echo 'User';
                                            } else {
                                                echo 'Seller';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $row->no_telp; ?>
                                        </td>
                                        <td>
                                            <?php echo $row->kabupaten_kota; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('admin/edit_data_user_view/' . $row->id); ?>"
                                                class="btn btn-warning"><i class="fa-solid fa-fw fa-pen-to-square"
                                                    style="color: #ffffff;"></i></a>
                                            <a href="<?php echo site_url('admin/delete_data_user/' . $row->id); ?>"
                                                class="btn btn-danger alert_notif"><i class="fa-solid fa-fw fa-trash"
                                                    style="color: #ffffff;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="col-12 mt-3" style="overflow: auto;" ;>
                        <table id="tabel-data2" class="table  table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Nama Toko</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;

                                foreach ($tb_user3->result() as $row) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $count; ?>
                                        </th>
                                        <td>
                                            <?php echo $row->name; ?>
                                        </td>
                                        <td>
                                            <?php echo $row->email; ?>
                                        </td>
                                        <td>
                                            <img class="rounded-circle mx-auto" style="width: 50px;height: 50px;"
                                                src="<?= base_url() . $row->image; ?>">
                                        </td>
                                        <td>
                                            <?php
                                            if ($row->role_id == "1") {
                                                echo 'Admin';
                                            } else if ($row->role_id == "2") {
                                                echo 'User';
                                            } else {
                                                echo 'Seller';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $row->no_telp; ?>
                                        </td>
                                        <td>
                                            <?php echo $row->nama_toko; ?>
                                        </td>
                                        <td>
                                            <?php echo $row->kabupaten_kota; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('admin/edit_data_user_view/' . $row->id); ?>"
                                                class="btn btn-warning"><i class="fa-solid fa-fw fa-pen-to-square"
                                                    style="color: #ffffff;"></i></a>
                                            <a href="<?php echo site_url('admin/delete_data_user/' . $row->id); ?>"
                                                class="btn btn-danger alert_notif"><i class="fa-solid fa-fw fa-trash"
                                                    style="color: #ffffff;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="col-12 mt-3" style="overflow: auto;" ;>
                        <table id="tabel-data3" class="table  table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;

                                foreach ($tb_user2->result() as $row) {
                                    $count++;
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $count; ?>
                                        </th>
                                        <td>
                                            <?php echo $row->name; ?>
                                        </td>
                                        <td>
                                            <?php echo $row->email; ?>
                                        </td>
                                        <td>
                                            <img class="rounded-circle mx-auto" style="width: 50px;height: 50px;"
                                                src="<?= base_url() . $row->image; ?>">
                                        </td>
                                        <td>
                                            <?php
                                            if ($row->role_id == "1") {
                                                echo 'Admin';
                                            } else if ($row->role_id == "2") {
                                                echo 'User';
                                            } else {
                                                echo 'Seller';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $row->no_telp; ?>
                                        </td>
                                        <td>
                                            <?php echo $row->kabupaten_kota; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('admin/edit_data_user_view/' . $row->id); ?>"
                                                class="btn btn-warning"><i class="fa-solid fa-fw fa-pen-to-square"
                                                    style="color: #ffffff;"></i></a>
                                            <a href="<?php echo site_url('admin/delete_data_user/' . $row->id); ?>"
                                                class="btn btn-danger alert_notif"><i class="fa-solid fa-fw fa-trash"
                                                    style="color: #ffffff;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    let table = new DataTable('#tabel-data,#tabel-data2,#tabel-data3', {   // options
    });
</script>

<script>
    $('.alert_notif').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');
        var getLink = "<?php echo base_url(); ?>";
        Swal.fire({
            title: "Are you sure?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonColor: '#3085d6',
            cancelButtonText: "Cancel"

        }).then(result => {
            //jika klik ya maka arahkan ke proses.php
            if (result.value == true) {
                document.location.href = href;
            }
        })
        // return false;
    });
</script>