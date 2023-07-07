<style>
    .detail_hover:hover {
        background: #858796;
        color: white;
    }
</style>
<div class="container" style="margin-bottom: 20%;">
    <div class="row">
        <div class="col-lg-12">
            <h2>History Pesanan</h2>
        </div>
    </div>
    <?php foreach ($history_pesanan->result() as $row) { ?>
        <a href="<?php echo base_url('pesanan/detail_pesanan/'.$row->id_invoice) ?>" style="text-decoration:none;color: black;cursor: pointer;">
            <div class="col-lg-12 mt-2 detail_hover shadow rounded py-4" style="height: 70px;">
                <div class="row">
                    <div class="col-lg-6 ">
                        <i class="fa-solid fa-lg fa-bag-shopping"></i>
                        Pesanan
                        <?php
                        $originalDate = $row->tgl_pesan;
                        $newDate = date("d-m-Y", strtotime($originalDate));
                        echo $newDate; ?>
                    </div>
                    <div class="col-lg-6  text-right" >
                        <?php echo $row->status; ?>
                    </div>
                </div>

            </div>
        </a>
    <?php } ?>

</div>