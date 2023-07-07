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
        display: block;
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
                <h1 class="h4 mb-4 text-primary mt-4">Add User</h1>
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="p-3">
                <form class="user" method="post" action="<?= base_url(); ?>admin/add_user"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" required placeholder="Nama Lengkap"
                            name="name">
                        <?= form_error('name', '<small class="text-danger pl-3" >', '</small> ') ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" required placeholder="Email">
                        <?= form_error('email', '<small class="text-danger pl-3" >', '</small> ') ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control" id="password1" required name="password1"
                                placeholder="Password">
                            <?= form_error('password1', '<small class="text-danger pl-3" >', '</small> ') ?>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password2" required name="password2"
                                placeholder="Repeat Password">
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: -10px;">
                        <input type="text" class="form-control" id="no_telp" placeholder="No Telp" required
                            name="no_telp">
                        <?= form_error('no_telp', '<small class="text-danger pl-3" >', '</small> ') ?>
                    </div>

                    <div class="form-group">
                        <select class="form-control" style="border-radius: 8px;" name="role_id" required id="role_id">
                            <option value="" selected disabled>Pilih Role</option>
                            <option value="1">Admin</option>
                            <option value="3">Seller</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <div id="inputan_nama_toko" style="" class="inputan_mati">
                        <!-- <label for="inputPassword5"><b class="text-danger">*</b> Nama Toko</label> -->
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_toko" required placeholder="Nama Toko"
                                name="nama_toko">
                            <?= form_error('name', '<small class="text-danger pl-3" >', '</small> ') ?>
                        </div>
                    </div>
                    <div id="inputan_rekening_toko" style="" class="inputan_mati">
                        <!-- <label for="inputPassword5"><b class="text-danger">*</b> Nama Toko</label> -->
                        <div class="form-group">
                            <input type="text" class="form-control" id="rekening_toko" required placeholder="Rekening Toko"
                                name="rekening_toko">
                            <?= form_error('name', '<small class="text-danger pl-3" >', '</small> ') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="form-control mb-3" name="provinsi" required id="provinsi">
                            <option selected disabled>Pilih Provinsi</option>
                            <!-- <option></option> -->
                        </select>
                        <select class="form-control" name="kota" required id="kota">
                            <option selected disabled>
                                Pilih Kabupaten / Kota
                            </option>
                        </select>
                        <div class="small ml-1 mb-2 text-grey" style="margin-top: -4px;">
                            *(Pilih ulang Provinsi jika ingin merubah Kabupaten / Kota)
                        </div>
                        <textarea style="resize:none;border-radius: 8px;-moz-appearance: none;-webkit-appearance: none;"
                            required class="form-control" name="address" placeholder="Alamat Detail"
                            id="exampleFormControlTextarea1" rows="4" <?= set_value('address') ?>></textarea>
                        <?= form_error('address', '<small class="text-danger pl-3" >', '</small> ') ?>
                    </div>
                    <hr>
            </div>
        </div>
        <div class="col-lg-5 pt-3">
            <center>
                <img class="imagePreview " src="<?= base_url('assets/img/profile/user.png') ?>" id="output"></img>
                <label class="btn btn-primary mx-auto">
                    <i class="fa-solid fa-pen-to-square  mx-auto"></i> Upload
                    <input type="file" accept="image/*" name="image" onchange="loadFile(event)"
                        style="width: 0px;height: 0px;overflow: hidden;">
                </label>
            </center>
        </div>
        <button type="submit" class="btn btn-success btn-user btn-block w-75 mx-auto">
            Save
        </button>
        </form>
    </div>
</div>

<script>
    $("#nama_toko").prop('required', false);
    $("#provinsi").prop('required', true);
    $("#kota").prop('required', true);
    $("#role_id").prop('required', true);

    $('#role_id').on('change', function () {


        const selectedRole = $('#role_id').val();

        if (selectedRole == "3") {

            $('#inputan_nama_toko').toggleClass('inputan_nyala');
            $('#inputan_rekening_toko').toggleClass('inputan_nyala');
            $("#nama_toko").prop('required', true);
            $("#rekening_toko").prop('required', true);
           
        } else {
           
            $('#inputan_nama_toko').removeClass('inputan_nyala');
            $('#inputan_rekening_toko').removeClass('inputan_nyala');
            $("#nama_toko").prop('required', false);
            $("#rekening_toko").prop('required', false);

        }

        // $('#selected').text(selectedPackage);
    });

</script>

<script>
    fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
        .then((response) => response.json())
        .then((provinces) => {
            var data = provinces;
            var tampung = `<option selected disabled value="" >Pilih Provinsi</option>`;
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
                var tampung = `<option value="" selected disabled>Pilih Kabupaten / Kota</option>`;
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