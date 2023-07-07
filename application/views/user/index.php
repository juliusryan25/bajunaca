<style>
    .sf {
        /* box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset; */
    }

    @media (max-width: 750px) {
        .tempat_card {
            width: 49%;
            max-height: 250px;
            text-align: center;
            margin: 10px auto;
            border-radius: 10px;

        }

        .card {
            width: 100%;
            max-height: 255px;
            text-align: center;
            margin: 10px auto;
            border-radius: 10px;

        }

        .card-title {
            font-size: 15px;
            max-height: 15px;
        }

        .badge {
            font-size: 15px;
        }
    }

    .card:hover {

        cursor: pointer;
        /* background-color: #EBEBEF; */
        color: green;
        border: 3px solid #E3E6F0;
    }
</style>
<!-- Begin Page Content -->
<div class="container">

    <div class="row">
        <div class="col-lg-12 p-0">
            <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="col-lg-12 mb-3 bg-secondary p-0 rounded" style="height: 240px;">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <?php foreach ($carosel->result() as $row) {
                    if ($row->id_carosel == 1) { ?>
                        <div class="carousel-item active">
                        <?php } else { ?>
                            <div class="carousel-item">
                            <?php } ?>
                        <img class="d-block w-100 rounded"
                            style="height: 240px;width: 100%;object-fit: cover;object-position: center;"
                            src="<?php echo base_url() . $row->image; ?> " alt="First slide">
                    </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-12 p-0" style="margin-bottom: 10%;">
            <div class="row">
                <?php foreach ($product->result() as $row) { ?>
                    <a class="col-lg-3 col-md-4 tempat_card p-0" style="text-decoration: none; color: black;"
                        href="<?php echo base_url('product/detail_product/' . $row->id_product); ?>">

                        <center>
                            <div class=" card mt-1 mb-1 shadow " style="width: 90%;height: 290px;">
                                <img class="card-img-top"
                                    style="height: 160px;width: 100%;object-fit: cover;object-position: center;"
                                    src="<?php echo base_url() . $row->image; ?> ">
                                <div class="card-body">
                                    <h5 class="card-title " style="height: 46px;overflow: hidden;">
                                        <?php echo $row->nama_product; ?>
                                    </h5>
                                </div>
                                <div class="card-body p-1" style="margin-top: -15px;">

                                    <!-- <b><i class="fa-solid fa-location-dot" ></i>&nbsp<?php echo $row->asal_product; ?></b>  -->
                                    <span class="rounded shadow p-1 " style="width:100%;height: 35px; float:right;">Rp.
                                        <?php echo number_format($row->harga); ?>
                                    </span>

                                </div>
                                <!-- <br>
                                <a class="btn btn-primary" href="<?php echo base_url('keranjang/masukan_keranjang/' . $row->id_product) ?>">dsfsdfsd</a> -->
                            </div>
                        </center>

                    </a>
                <?php } ?>
            </div>
        </div>






    </div>
    <!-- Page Heading -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->