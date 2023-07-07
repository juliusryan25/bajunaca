<style>
    @media (min-width: 750px) {
        .masukan-keranjang {
            margin-top: 77px;

        }
    }
</style>
<div class="container" style="margin-bottom: 20%;">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
    <div class="row">
        <div class="col-lg-12 bg-white rounded">
            <div class="row">
                <div class="col-lg-5">
                    <img src="<?= base_url($image) ?>"
                        style="width: 100%;height: 400px;object-fit: cover;object-position: center;" alt="">
                </div>
                <div class="col-lg-7 shadow">
                    <div class="row">
                        <div class="col-lg-12 mt-3">
                            <h2 style="text-align: justify;">
                                <?= $nama_product; ?>
                            </h2>
                        </div>
                        <div class="col-lg-12 mt-1">
                            <h4>
                                <?= $nama_toko; ?><b>&nbsp&nbsp<i class="fa-solid fa-location-dot"></i>&nbsp
                                    <?php echo $asal_product; ?>
                                </b>
                            </h4>
                        </div>
                        <div class="col-lg-12 mt-1 text-warning">
                            <h2>
                                <b> Rp.&nbsp;
                                    <?= number_format($harga); ?>
                                </b>
                            </h2>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="row">
                                <div class="col-lg-2 col-sm-2 ">
                                    <h6 class="mt-2">Stok</h6>
                                </div>
                                <div class="col-lg-9 col-sm-9  ml-2">
                                    <?= number_format($stok); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <div class="row">
                                <div class="col-lg-2 col-sm-2 ">
                                    <h6 class="mt-2">Kuantitas</h6>
                                </div>
                                <div class="col-lg-10 col-sm-10">
                                    <input type="number" class="form-control" style="width: 20%;" value="1"
                                        name="kuantitas" min="1" id="kuantitas">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <!-- <?php echo anchor('keranjang/masukan_keranjang/' . $id_product, '<div class="btn  btn-primary" style="width: 50%;" ><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i> &nbsp;+</div>') ?> -->
                            <a id="masukan_keranjang" class="btn btn-success masukan-keranjang w-100 mb-2 "
                                href="<?= base_url('Keranjang/masukan_keranjang/' . $id_product) ?>">Masukan Keranjang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mt-3 p-0 rounded">
            <div class="card" style="width: 100%;">
                <div class="card-header bg-primary text-white">
                    <h5 class="my-auto"><b>Deskripsi Produk</b></h5>
                </div>
                <article class="p-3">
                    <?php echo $deskripsi; ?>
                </article>
            </div>
        </div>
    </div>
</div>
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
                data.forEach((element) => {
                    tampung += `<option data-prov="${element.id}" value="${element.id}">${element.name}</option>`;
                });
                document.getElementById("kota").innerHTML = tampung;
            });
    });
</script>
<script>
    $('#masukan_keranjang').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');
        var getLink = "<?php echo base_url(); ?>";

        const stok = <?php echo $stok; ?>;
        const kuantitas = document.getElementById('kuantitas').value;
        console.log(kuantitas);

        if (kuantitas > stok) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Stok hanya tersedia! ' + <?= $stok; ?>,
            })
            // return false;
        }
        else {
            document.location.href = href + '/' + kuantitas;
        }

    });

    const flashData = $('.flash-data').data('flashdata')
    if (flashData) {
        Swal.fire(
            'Bagus!',
            'Berhasil Masukan Keranjang',
            'success'
        );
    }
</script>