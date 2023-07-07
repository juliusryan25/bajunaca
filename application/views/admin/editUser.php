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

    .inputan_mati {
        display: none;
    }

    .inputan_nyala {
        display: contents;
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
                <h1 class="h4 mb-4 text-primary mt-4">Edit User</h1>
                <!-- <?= $this->session->flashdata('message'); ?> -->
            </div>
        </div>
        <div class="col-lg-7">
            <div class="p-3">
                <form class="user" method="post" action="<?php echo base_url('admin/edit_user'); ?>"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control " id="name" required value="<?php echo $name; ?>"
                            placeholder="Full name" name="name">
                        <?= form_error('name', '<small class="text-danger pl-3" >', '</small> ') ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control " id="email" name="email" required
                            value="<?= set_value('email') ?><?php echo $email; ?>" placeholder="Email Address">
                        <?= $this->session->flashdata('email_salah'); ?>
                        <?= form_error('email', '<small class="text-danger pl-3" >', '</small> ') ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control " id="no_telp" placeholder="No Telp" required
                            value="<?php echo $no_telp; ?>" name="no_telp">
                        <?= form_error('no_telp', '<small class="text-danger pl-3" >', '</small> ') ?>
                    </div>

                    <div class="form-group mb-3">
                        <select class="form-control" style="border-radius: 8px" name="role_id" required id="role_id">
                            <option value="<?php echo $role_id; ?>" selected>
                                <?php if ($role_id == 1) {
                                    echo "Admin";
                                } else if ($role_id == 2) {
                                    echo "User";
                                } else {
                                    echo "Seller";
                                }
                                ?>
                            </option>
                            <option value="1">Admin</option>
                            <option value="3">Seller</option>
                            <option value="2">User</option>
                        </select>

                    </div>
                    <div id="inputan_nama_toko" style="" class=" 
                    <?php if ($role_id == 3) {
                        echo 'inputan_nyala';
                    } ?> inputan_mati">
                        <!-- <label for="inputPassword5"><b class="text-danger">*</b> Nama Toko</label> -->
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo $nama_toko; ?>" id="nama_toko" placeholder="Nama Toko"
                                name="nama_toko">
                            <?= form_error('name', '<small class="text-danger pl-3" >', '</small> ') ?>
                        </div>
                    </div>
                    <div id="inputan_rekening_toko" style="" class=" <?php if ($role_id == 3) {
                        echo 'inputan_nyala';
                    } ?>    inputan_mati">
                        <!-- <label for="inputPassword5"><b class="text-danger">*</b> Nama Toko</label> -->
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo $no_rekening; ?>" id="rekening_toko" required
                                placeholder="Rekening Toko" name="rekening_toko">
                            <?= form_error('name', '<small class="text-danger pl-3" >', '</small> ') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <select required class="form-control mb-3" style="border-radius: 8px;" name="provinsi"
                            id="provinsi">
                            <option value="<?php echo $provinsi; ?>"></option>
                        </select>
                        <select required class="form-control" style="border-radius: 8px;" name="kota" id="kota">
                            <option value="<?php echo $kabupaten_kota; ?>">
                                <?php
                                if ($kabupaten_kota == "") {
                                    echo "Pilih Kabupaten / Kota";
                                } else {
                                    echo $kabupaten_kota;
                                }
                                ?>
                            </option>
                        </select>
                        <div class="small ml-2 mb-2 text-grey" style="margin-top: -4px;">
                            <?php
                            if ($user['kabupaten_kota'] == "") {
                                if ($user['provinsi'] != NULL) {
                                    echo "*(Pilih ulang Provinsi jika ingin merubah kota)";
                                } else {
                                    echo "*(Pilih Provinsi terlebih dahulu)";
                                }
                            } else if ($user['kabupaten_kota'] != NULL) {
                                echo "(Pilih ulang Provinsi jika ingin merubah kota)";
                            }
                            ?>
                        </div>
                        <textarea
                            style="resize:none;border-radius: 10px;-moz-appearance: none;-webkit-appearance: none;"
                            required class="form-control" name="address" placeholder="Address"
                            id="exampleFormControlTextarea1" rows="4" <?= set_value('address') ?>><?php echo $address; ?></textarea>
                        <?= form_error('address', '<small class="text-danger pl-3" >', '</small> ') ?>
                    </div>

                    <hr>
            </div>

        </div>
        <div class="col-lg-5 pt-3">
            <center>
                <img class="imagePreview " src="<?= base_url($image) ?>" id="output"></img>
                <label class="btn btn-primary mx-auto">
                    <i class="fa-solid fa-pen-to-square  mx-auto"></i> Upload
                    <input type="file" accept="image/*" name="image" onchange="loadFile(event)"
                        style="width: 0px;height: 0px;overflow: hidden;">
                </label>
            </center>
        </div>
        <input type="hidden" name="gambar_old" value="<?php echo $image; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-success btn-user btn-block w-75 mx-auto">
            Save
        </button>
        </form>
    </div>
</div>
<script>

    const data_role = "<?php echo $role_id; ?>";

    $('#ubah_nama_toko').on('click', function () {
        $('#inputan_nama_toko').toggleClass("inputan_nyala");
    });

    $('#role_id').on('change', function () {


        const selectedRole = $('#role_id').val();

        if (selectedRole == "3") {
            $('#inputan_nama_toko').toggleClass('inputan_nyala');
            $('#inputan_rekening_toko').toggleClass('inputan_nyala');
            $("#rekening_toko").prop('required', true);
            $("#nama_toko").prop('required', true);
            console.log(selectedRole);
        }
        else {
            console.log("saasasas");
            $('#inputan_nama_toko').removeClass('inputan_nyala');
            $('#inputan_rekening_toko').removeClass('inputan_nyala');
            $("#nama_toko").prop('required', false);
            $("#rekening_toko").prop('required', false);


        }

        // $('#selected').text(selectedPackage);
    });
</script>
<script>
    const data_prov = "<?php echo $provinsi; ?>";

    if (data_prov == "") {
        $("#provinsi").prop('required', true);
        $("#kota").prop('required', true);
    }

    fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
        .then((response) => response.json())
        .then((provinces) => {
            var data = provinces;
            var tampung = `<option value="<?php echo $provinsi; ?>" selected > <?php
               if ($provinsi == "") {
                   echo "Pilih Provinsi";
               } else {
                   echo $provinsi;
               }
               ?></option>`;
            data.forEach((element) => {
                tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
            });
            document.getElementById("provinsi").innerHTML = tampung;
        });
</script>
<script>
    const selectProvinsi = document.getElementById('provinsi');
    const selectKota = document.getElementById('kota');
    // const selectKecamatan = document.getElementById('kecamatan');
    // const selectKelurahan = document.getElementById('kelurahan');

    selectProvinsi.addEventListener('change', (e) => {
        var provinsi = e.target.options[e.target.selectedIndex].dataset.prov;
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
            .then((response) => response.json())
            .then((regencies) => {
                var data = regencies;
                var tampung = `<option selected disabled value="">Pilih Kabupaten / Kota</option>`;
                document.getElementById('kota').innerHTML = '<option>Pilih</option>';
                // document.getElementById('kecamatan').innerHTML = '<option>Pilih</option>';
                // document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                data.forEach((element) => {
                    tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById("kota").innerHTML = tampung;
            });
    });
</script>