<style>
    .imagePreview {
        width: 250px;
        height: 250px;
        object-fit: cover;
        object-position: center;
        /* display: inline-block; */
        /* box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2); */
    }

    @media (max-width: 750px) {
        .imagePreview {
            width: 130px;
            height: 130px;
            object-fit: cover;
            object-position: center;
            /* display: inline-block; */
            /* box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2); */
        }

        .btn-primary {
            display: block;
            width: 30%;
            border-radius: 50px;
            box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
            margin-top: 6px;
            margin-bottom: 20px;
            /* padding-left: 3.5%; */
            height: 35px;
            padding: 2px auto;
        }
    }

    .btn-primary {
        display: block;
        width: 30%;
        border-radius: 50px;
        box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
        margin-top: 6px;
        /* padding-left: 3.5%; */
        height: 35px;
        padding: 2px auto;
    }

    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        padding: 2px 30px 2px 2px;
        border: none;

    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }
</style>
<script type="text/javascript">
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
<div class="col-lg-12 bg-white m-2">
    <div class="row">
        <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
        <div class="col-lg-12">
            <div class="text-center">
                <h1 class="h4 mb-4 text-primary mt-4">Edit Product</h1>
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="p-3">
                <form class="user" method="post" action="<?= base_url(); ?>seller/edit_product"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <select class="form-control" style="border-radius: 7px;height: 40px;" name="kategori_produk"
                            id="kategoori_produk">
                            <option value="<?php echo $kategori; ?>" selected><?php echo $kategori; ?></option>
                            <?php
                            foreach ($kategori_product as $row) { ?>
                                <option value="<?php echo $row->kategori; ?>"> <?php echo $row->kategori; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control " value="<?php echo $nama_product; ?>" id="nama_product"
                            required placeholder="Nama Produk" name="nama_produk">
                        <?= form_error('name', '<small class="text-danger pl-3" >', '</small> ') ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="number" min="0" class="form-control " value="<?php echo $harga; ?>" id="harga"
                                name="harga" required placeholder="Harga">
                            <?= form_error('harga', '<small class="text-danger pl-3" >', '</small> ') ?>
                        </div>
                        <div class="col-sm-6">
                            <input type="number" min="0" class="form-control " value="<?php echo $stok; ?>" id="stok"
                                name="stok" required placeholder="Stok">
                            <?= form_error('stok', '<small class="text-danger pl-3" >', '</small> ') ?>
                        </div>
                    </div>
                    <div class="form-group ">
                        <select class="form-control" style="border-radius: 7px;height: 40px;margin-top: -10px;"
                            name="status_produk" id="status_produk">
                            <option value="<?php echo $status_aktif; ?>" selected>
                                <?php
                                if ($status_aktif == 1) {
                                    echo "Aktif";
                                } else {
                                    echo "Tidak aktif";
                                }
                                ; ?></option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak aktif</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <!-- <textarea
                            style="resize:none;border-radius: 25px;-moz-appearance: none;-webkit-appearance: none;"
                            class="form-control" name="address" placeholder="Address" id="exampleFormControlTextarea1"
                            rows="4" <?= set_value('address') ?>><?= $user['address']; ?></textarea> -->

                        <textarea placeholder="Deskripsi Produk" name="deskripsi_produk" id="editor">
                            <?= $deskripsi ?>
                        </textarea>

                    </div>

                    <hr>
            </div>
        </div>
        <div class="col-lg-5 pt-3">
            <center>
                <label for="">*Gambar Produk</label><br>
                <img class="imagePreview " src="<?= base_url($image) ?>" id="output"></img>
                <label class="btn btn-primary mx-auto">
                    <i class="fa-solid fa-pen-to-square  mx-auto"></i> Upload
                    <input type="file" accept="image/*" name="image" onchange="loadFile(event)"
                        style="width: 0px;height: 0px;overflow: hidden;">
                </label>
            </center>
        </div>
        <input type="hidden" name="gambar_old" value="<?php echo $image; ?>">
        <input type="hidden" name="id_product" value="<?php echo $id_product; ?>">
        <input type="hidden" name="nama_toko" value="<?= $user['nama_toko']; ?>" id="">
        <input type="hidden" name="asal_produk" value="<?= $user['kabupaten_kota']; ?>" id="">
        <button type="submit" class="btn btn-success btn-user btn-block w-75 mx-auto">
            Save
        </button>
        </form>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
        $("#txtEditor").Editor();
        // $("#txtEditor").html("I am a <b>bold</b> text.");

    });

</script>