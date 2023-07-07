<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3>Data Pesanan</h3>
        </div>
        <div class="col-lg-12">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Diproses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Dalam Pengiriman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">Selesai</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table id="tabel-data" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID Invoice</th>
                                <th scope="col">Tanggal Pesan</th>
                                <th scope="col">Bukti Pembayaaran</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            foreach ($pesanan_diproses->result() as $row) {
                                $count++;
                                ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $count; ?>
                                    </th>
                                    <td>
                                        <?php echo "INV" . $row->id_invoice; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->tgl_pesan; ?>
                                    </td>
                                    <td>
                                        <img class="rounded mx-auto" style="width: 50px;height: 50px;"
                                            src="<?= base_url() . $row->bukti_pembayaran; ?>">
                                    </td>

                                    <td>
                                        <a href="<?php echo site_url('seller/proses_pesanan/' . $row->id_invoice); ?>"
                                            class="btn btn-warning">Proses</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <table id="tabel-data" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID Invoice</th>
                                <th scope="col">Tanggal Pesan</th>
                                <th scope="col">Bukti Pembayaaran</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            foreach ($pesanan_dikirim->result() as $row) {
                                $count++;
                                ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $count; ?>
                                    </th>
                                    <td>
                                        <?php echo "INV" . $row->id_invoice; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->tgl_pesan; ?>
                                    </td>
                                    <td>
                                        <img class="rounded mx-auto" style="width: 50px;height: 50px;"
                                            src="<?= base_url() . $row->bukti_pembayaran; ?>">
                                    </td>

                                    <td>
                                        <a href="<?php echo site_url('seller/proses_pesanan/' . $row->id_invoice); ?>"
                                            class="btn btn-warning">Detail</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <table id="tabel-data" class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID Invoice</th>
                                <th scope="col">Tanggal Pesan</th>
                                <th scope="col">Bukti Pembayaaran</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            foreach ($pesanan_selesai->result() as $row) {
                                $count++;
                                ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $count; ?>
                                    </th>
                                    <td>
                                        <?php echo "INV" . $row->id_invoice; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->tgl_pesan; ?>
                                    </td>
                                    <td>
                                        <img class="rounded mx-auto" style="width: 50px;height: 50px;"
                                            src="<?= base_url() . $row->bukti_pembayaran; ?>">
                                    </td>

                                    <td>
                                        <a href="<?php echo site_url('seller/proses_pesanan/' . $row->id_invoice); ?>"
                                            class="btn btn-warning">Detail</a>
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
<script>
    let table = new DataTable('#tabel-data,#tabel-data2,#tabel-data3', {   // options
    });
</script>