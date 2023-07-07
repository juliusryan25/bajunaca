<style>
    .imagePreview {
        width: 100px;
        height: 100px;
        object-fit: cover;
        object-position: center;
        /* display: inline-block; */
        /* box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2); */
    }
</style>
<script type="text/javascript">
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
<div class="container">
    <div class="col-lg-7 mx-auto bg-white shadow" style="margin-bottom: 20%;">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
        <div class="row p-3">
            <div class="col-lg-12">
                <center>
                    <h3>Menunggu Pembayaran</h3>
                </center>
            </div>
            <div class="col-lg-12">
                <center>
                    <img style="width: 350px;height: 300px;" class="img-profile rounded-circle"
                        src="<?= base_url('upload/gambar_tf.jpg') ?> ">
                </center>
            </div>
            <div class="col-lg-12">
                <center>
                    <h5>
                        No Rekening :
                        <?php echo $no_rekening; ?>
                    </h5>
                    <h5>
                        Total Pembayaran : Rp
                        <?php echo number_format($total_bayar); ?>
                    </h5>
                </center>
            </div>
            <div class="col-lg-12">
                <form action="<?= base_url(); ?>pembayaran/upload_bukti_pembayaran" method="post"
                    enctype="multipart/form-data">
                    <center>
                        <img class="imagePreview " src="<?= base_url('upload/btf-01.png') ?>" id="output"></img><br>
                        <label for=""><b class="text-warning">*Upload Bukti Pembayaran</b></label><br>
                        <label class="btn btn-primary mx-auto mt-0">
                            <i class="fa-solid fa-pen-to-square  mx-auto"></i> Pilih Gambar
                            <input type="file" accept="image/*" required name="image" onchange="loadFile(event)"
                                style="width: 0px;height: 0px;overflow: hidden;">
                        </label>
                    </center>
                    <input type="hidden" name="id_invoice" value="<?php echo $id_invoice; ?>">
                    <center><button type="submit" class="mt-2 btn btn-success" value="Kirim">Kirim</center>
                </form>
            </div>
          
        </div>
    </div>
</div>

<script>
    const flashData = $('.flash-data').data('flashdata')
    if (flashData) {
        Swal.fire(
            'Bagus!',
            'Pesanan Dibuat',
            'success'
        );
    }
</script>