<div class="container-fluid pt-4 ">
    <div class="row bg-white shadow p-2">
        <div class="col-lg-10 col-md-9 col-sm-12 bg-white p-2 ">
            <h1 class="h3 mb-4 text-gray-800">Data Product</h1>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-12">
            <a href="<?= base_url('seller/add_product_view') ?>" class="btn btn-primary" style="width: 100%;">
                Add +
            </a>
        </div>
        <div class="col-lg-12">
            <?= $this->session->flashdata('delete_success'); ?>
            <?= $this->session->flashdata('edit_success'); ?>
        </div>
        <div class="col-lg-12 col-md-12 mt-3 col-sm-12" style="overflow: auto;">
                <table id="tabel-data" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Nama Product</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Status Aktif</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($tb_product->result() as $row) {
                            $count++;
                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $count; ?>
                                </th>
                                <td>
                                    <?php echo $row->kategori; ?>
                                </td>
                                <td>
                                    <?php echo $row->nama_product; ?>
                                </td>
                                <td>
                                    <?php echo $row->deskripsi; ?>
                                </td>
                                <td>
                                    <?php echo number_format($row->harga); ?>
                                </td>
                                <td>
                                    <?php echo number_format($row->stok); ?>
                                </td>
                                <td>
                                    <?php
                                    if ($row->status_aktif == "1") {
                                        echo 'Aktif';
                                    } else {
                                        echo 'Tidak aktif';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <img class="rounded-circle mx-auto" style="width: 50px;height: 50px;"
                                        src="<?= base_url() . $row->image; ?>">
                                </td>
                                <td>
                                    <a href="<?php echo site_url('seller/edit_product_view/' . $row->id_product); ?>"
                                        class="btn btn-warning"><i class="fa-solid fa-fw fa-pen-to-square"
                                            style="color: #ffffff;"></i></a>
                                    <a href="<?php echo site_url('seller/delete_product/' . $row->id_product); ?>"
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