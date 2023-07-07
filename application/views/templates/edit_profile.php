<style>
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
        width: 22%;
        border-radius: 50px;
        box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
        margin-top: 6px;
        /* padding-left: 3.5%; */
        height: 35px;
        padding: 2px auto;
    }

    @media (max-width: 750px) {
        .btn-primary {
            display: block;
            width: 35%;
            border-radius: 50px;
            box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
            margin-top: 6px;
            /* padding-left: 3.5%; */
            height: 35px;
            padding: 2px auto;
        }
    }
</style>

<script type="text/javascript">
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<div class="container" style="margin-bottom: 100px;">

    <div class="card o-hidden border-0 shadow-lg my-auto col-lg-7 col-md-12 col-sm-12 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                <div class="col-lg-12">
                    <div class="p-3">
                        <div class="text-left ">
                            <h1 class="h4 text-primary mb-4">Edit Profile</h1>
                        </div>
                        <form class="user" method="post" action="<?php
                            if ($user['role_id'] == 1) {
                                echo base_url('admin/edit_profile_admin');
                            } elseif ($user['role_id']  == 2 ) {
                                echo base_url('user/edit_profile_user');
                            } else {
                                echo base_url('seller/edit_profile_seller');
                            }


                        ?>"
                            enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $user['id']; ?>">
                            <input type="hidden" name="gambar_old" value="<?= $user['image']; ?>">
                            <center>
                                <img class="imagePreview rounded-circle" src="<?= base_url() . $user['image']; ?>"
                                    id="output"></img>
                                <label class="btn btn-primary mx-auto">
                                    <i class="fa-solid fa-pen-to-square  mx-auto"></i> Upload
                                    <input type="file" accept="image/*" name="image" onchange="loadFile(event)"
                                        style="width: 0px;height: 0px;overflow: hidden;">
                                </label>
                                <!-- <img class="img-profile rounded-circle mt-3 border" style="width: 120px;height: 120px;"
                                    src="<?= base_url('assets/img/profile/') . $user['image']; ?>. "> -->
                            </center>
                            <label for="inputPassword5"><b class="text-danger">*</b> Nama Lengkap</label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="name"
                                    value="<?= $user['name']; ?><?= set_value('name') ?>" placeholder="Nama Lengkap"
                                    name="name" required>
                                <?= form_error('name', '<small class="text-danger pl-3" >', '</small> ') ?>
                            </div>
                            <label for="inputPassword5"><b class="text-danger">*</b> No Telp</label>
                            <div class="form-group">
                                <input required type="text" class="form-control" id="no_telp"
                                    value="<?= $user['no_telp']; ?><?= set_value('no_telp') ?>"
                                    placeholder="example : 081111111111" name="no_telp">
                                <?= form_error('no_telp', '<small class="text-danger pl-3" >', '</small> ') ?>
                            </div>
                            <label for="inputPassword5"><b class="text-danger">*</b> Alamat</label>
                            <div class="form-group">
                                <select required class="form-control" name="provinsi" id="provinsi">
                                    <option value="<?= $user['provinsi']; ?>"></option>
                                </select>
                                <select required class="form-control" name="kota" id="kota">
                                    <option value="<?= $user['kabupaten_kota']; ?>">
                                        <?php
                                        if ($user['kabupaten_kota'] == "") {
                                            echo "Pilih Kabupaten / Kota";
                                        } else if ($user['kabupaten_kota'] != NULL) {
                                            echo $user['kabupaten_kota'];
                                        }
                                        ?>
                                    </option>

                                </select>
                                <div class="small ml-3 mb-2 text-grey" style="margin-top: -4px;">
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
                                <textarea style="resize:none" required class="form-control" name="address"
                                    placeholder="Alamat Detail" rows="4" <?= set_value('address') ?>><?= $user['address']; ?></textarea>
                                <?= form_error('address', '<small class="text-danger pl-3" >', '</small> ') ?>
                            </div>
                            <input type="submit" value="Save" class="btn btn-success btn-user btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
        .then((response) => response.json())
        .then((provinces) => {
            var data = provinces;
            var tampung = `<option> <?php
            if ($user['provinsi'] == "") {
                echo "Pilih Provinsi";
            } else {
                echo $user['provinsi'];
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
                var tampung = `<option></option>`;
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