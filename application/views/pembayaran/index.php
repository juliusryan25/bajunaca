<div class="container">

    <div class="col-lg-7 mx-auto bg-white" style="margin-bottom: 20%;">
        <div class="col-lg-12 pt-4 bg-white text-center">
            <h3>Checkout Pesanan</h3>
        </div>
        <div class="col-lg-12">
            <form method="post" action="<?php echo base_url('pembayaran/proses_pesanan') ?>">

                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Lengkap</label>
                    <input type="text" value="<?= $user['name']; ?>" name="nama" class="form-control"
                        id="exampleFormControlInput1" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nomor Hp</label>
                    <input type="text" name="no_hp" value="<?= $user['no_telp']; ?>" class="form-control"
                        id="exampleFormControlInput1" placeholder="No Hp">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat Lengkap</label>
                    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1"
                        rows="3"><?= $user['address']; ?> - <?= $user['kabupaten_kota']; ?> - <?= $user['provinsi']; ?> </textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jasa Pengiriman</label>
                    <select class="form-control" name="jasa_pengiriman" required id="pilihan_ongkir">
                        <option value="" selected disabled>Pilih Jasa Pengiriman</option>
                        <option value="JNE">JNE - 9.000</option>
                        <option value="J&T">J&T - 8.000</option>
                        <option value="SICEPAT">SICEPAT - 11.500</option>
                        <option value="AnterAja">AnterAja - 11.500</option>
                    </select>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            Subtotal Produk
                        </div>
                        <div class="col-lg-6 text-right">
                            Rp.
                            <?php echo number_format($this->cart->total(), 0, ',', '.') ?>
                        </div>
                        <div class="col-lg-6">
                            Subtotal Pengiriman
                        </div>
                        <div class="col-lg-6 text-right">
                            Rp.&nbsp;<span id="total_ongkir">

                            </span>
                        </div>
                        <div class="col-lg-9 mt-2 ">
                            <b>Total Pembayaran</b>
                        </div>
                        <div class="col-lg-3 mt-2  text-right">
                            <b>Rp.
                                <span id="total_bayar">
                                    <?php echo number_format($this->cart->total(), 0, ',', '.') ?>
                                </span>
                            </b>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <?php foreach ($this->cart->contents() as $items): ?>
                            <?php foreach ($this->cart->product_options($items['rowid']) as $rekening => $option_value): ?>
                                <!-- <b id="test" ><?php echo $option_value; ?> </b> -->
                                <input type="hidden" name="no_rekening" value="<?php echo $option_value; ?>" id="test">
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="id_user" value="<?= $user['id']; ?>" id="id_user">
                    <input type="hidden" name="subtotal_produk" id="subtotal_produk">
                    <input type="hidden" name="subtotal_ongkir" id="subtotal_ongkir">
                    <input type="hidden" name="total_pembayaran" id="total_pembayaran">
                    <input type="hidden" name="tgl_pesan" id="tgl_pesan">
                </div>


                <div class="col-lg-12 p-2 d-flex justify-content-lg-end  jus"><button type="submit"
                        class="btn btn-sm btn-primary">Proses Pesanan</button>
            </form>
        </div>
    </div>
</div>

</div>


</div>
</div>
<script type="text/javascript">

    $(document).ready(function () {
        var date = new Date();

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = year + "-" + month + "-" + day;
        $("#tgl_pesan").attr("value", today);

    });

</script>
<script>
    document.getElementById("total_ongkir").innerHTML = 0;
    var a = document.getElementById("test").value;
    console.log(a);
    // document.getElementById("total_bayar").innerHTML = 10;


    $('#pilihan_ongkir').on('change', function () {
        var date = new Date();

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = year + "-" + month + "-" + day;
        $("#tgl_pesan").attr("value", today);



        var total_ongkir = $('#pilihan_ongkir').val();
        var total_produk = <?php echo $this->cart->total() ?>

        if (total_ongkir == "JNE") {
            var total_ongkir = 9000;
            var total_bayar = total_produk + total_ongkir;
        }
        if (total_ongkir == "J&T") {
            var total_ongkir = 8000;
            var total_bayar = total_produk + total_ongkir;
        }
        if (total_ongkir == "SICEPAT") {
            var total_ongkir = 11500;
            var total_bayar = total_produk + total_ongkir;
        }
        if (total_ongkir == "AnterAja") {
            var total_ongkir = 11500;
            var total_bayar = total_produk + total_ongkir;
        }




        document.getElementById("total_ongkir").innerHTML = new Intl.NumberFormat("de-DE").format(total_ongkir);
        document.getElementById("total_bayar").innerHTML = new Intl.NumberFormat("de-DE").format(total_bayar);
        document.getElementById("subtotal_produk").value = total_produk;
        document.getElementById("subtotal_ongkir").value = total_ongkir;
        document.getElementById("total_pembayaran").value = total_bayar;






    })
</script>