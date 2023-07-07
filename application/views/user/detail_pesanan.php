<style>
    .muncul{
        display: block;
    }
    .mati{
        display: none;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto bg-white rounded shadow" style="margin-bottom: 20%;">
            <div class="row p-2">
                <div class="col-lg-12">
                    <h3>Detail Pesanan</h3>
                </div>
                <div class="col-lg-12 pt-2 pb-1 text-white bg-warning" id="bg-status">
                    <h6>
                        <?php echo $status; ?>
                        <input type="hidden" name="status" value="<?php echo $status; ?>" id="stat">
                    </h6>
                    <small>Tanggal Pesan :
                        <?php
                        $originalDate = $tgl_pesan;
                        $newDate = date("d-m-Y", strtotime($originalDate));
                        echo $newDate; ?>
                    </small>
                </div>
                <div class="col-lg-3 pt-2 ">
                    <small><b>Nama</b></small>
                </div>
                <div class="col-lg-1 pt-2 ">
                    <small><b>:</b></small>
                </div>
                <div class="col-lg-8 pt-2 pl-0">
                    <small>
                        <?php echo $nama_user; ?>
                    </small>
                </div>
                <div class="col-lg-3 pt-2 ">
                    <small><b>Alamat</b></small>
                </div>
                <div class="col-lg-1 pt-2 ">
                    <small><b>:</b></small>
                </div>
                <div class="col-lg-8 pt-2 pl-0">
                    <small>
                        <?php echo $alamat; ?>
                    </small>
                </div>
                <div class="col-lg-3 pt-2 ">
                    <small><b>Jasa Pengiriman</b></small>
                </div>
                <div class="col-lg-1 pt-2 ">
                    <small><b>:</b></small>
                </div>
                <div class="col-lg-8 pt-2 pl-0">
                    <small>
                        <?php echo $jasa_pengiriman; ?>
                    </small>
                </div>
                <div class="col-lg-3 pt-2 ">
                    <?php if ($status == "Dalam Pengiriman" OR $status == "Pesanan Diterima") { ?>
                        <small><b>No Resi</b></small>
                    <?php } else { ?>

                    <?php } ?>
                </div>
                <div class="col-lg-1 pt-2 ">
                    <?php if ($status == "Dalam Pengiriman" OR $status == "Pesanan Diterima") { ?>
                        <small><b>:</b></small>
                    <?php } else { ?>

                    <?php } ?>

                </div>
                <div class="col-lg-8 pt-2 pl-0">
                    <?php if ($status == "Dalam Pengiriman" OR $status == "Pesanan Diterima") { ?>
                        <?php echo $resi; ?>
                    <?php } else { ?>

                    <?php } ?>

                </div>
                <div class="col-lg-12 pt-2 ">
                    <table class="shadow" style="width: 100%;text-align: center;">
                        <thead class="bg-secondary text-white pl-1">
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pesanan as $psn):
                                ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $no++ ?>
                                    </th>
                                    <td>
                                        <?php echo $psn->nama_product ?>
                                    </td>
                                    <td>
                                        <?php echo $psn->jumlah ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($psn->harga) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12 mt-4 px-4">
                    <div class="row">
                        <div class="col-lg-10">
                            Subtotal Produk
                        </div>
                        <div class="col-lg-2">
                            <?php echo number_format($subtotal_produk); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-0 px-4">
                    <div class="row">
                        <div class="col-lg-10">
                            Subtotal Pengiriman
                        </div>
                        <div class="col-lg-2">
                            <?php echo number_format($subtotal_pengiriman); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 bg-success text-white mt-0 px-4">
                    <div class="row">
                        <div class="col-lg-10">
                            Total Bayar
                        </div>
                        <div class="col-lg-2">
                            <?php echo number_format($total_bayar); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-2 mati" id="konfirmasi">
                    <form action="<?php echo base_url('pesanan/konfirmasi_terima_pesanan') ?>" method="post">
                        <input type="hidden" name="id_invoice" value="<?php echo $id_invoice; ?>">
                        <button class="btn btn-primary w-100" type="submit">Konfirmasi Terima Pesanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {

        const status = document.getElementById('stat').value;

        if (status == "Pesanan Diterima") {
            $('#bg-status').removeClass('bg-warning');
            $('#bg-status').toggleClass('bg-success');

        }
        else if (status == "Dalam Pengiriman") {
            $('#konfirmasi').removeClass('mati');
            $('#konformasi').toggleClass('muncul');

        }
    });

</script>