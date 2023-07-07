<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }
</style>
<div class="container bg-white shadow rounded " style="margin-bottom: 20%;">
    <div class="row">
    <div class="col-lg-12 mt-2 mb-0">
            <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="col-lg-12">
            <br>
            <h4>Keranjang Belanja</h4>
            <p>
                <!-- <?php
                $keranjang = 'Keranjang Belanja:' . $this->cart->total_items() . 'items';
                echo anchor('katalog_product/detail_keranjang', $keranjang); ?> -->
            </p>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sub-Total</th>
                        <th scope="col"></th>
                      
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($this->cart->contents() as $items):
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $no++ ?>
                            </th>
                            <td>
                                <?php echo $items['name'] ?>
                            </td>
                            <td class="row" style="height: 65px;">
                                <!-- <div class="btn btn-danger" onclick="kurang_qty()" style="height: 40px;">-</div>
                                &nbsp; -->
                                <!-- <input type="hidden" id="p_id" name="p_id" value="<?php echo $items['rowid'] ?>"> -->
                                <a
                                    href="<?php echo base_url('Keranjang/kurang_qty/' . $items['rowid'] . '/' . $items['qty']) ?>">
                                    <i class="fa-solid fa-circle-minus fa-lg mr-2 mt-2 " style="color: red;" ></i>
                                </a>
                                <input value="<?php echo $items['qty'] ?>" class="form-control ml-1 mr-1" disabled
                                    style="width: 45px;text-align: center;height: 40px;" type="number" min="1" name="qty"
                                    id="qty">
                                <a
                                    href="<?php echo base_url('Keranjang/tambah_qty/' . $items['rowid'] . '/' . $items['qty']) ?>">
                                    <i class="fa-solid fa-circle-plus fa-lg ml-2 mt-2 "></i>
                                </a>
                                <!-- &nbsp;
                                <div class="btn btn-success" onclick="tambah_qty()" style="height: 40px;">+</div> -->
                            </td>
                            <td>Rp.
                                <?php echo number_format($items['price'], 0, ',', '.') ?>
                            </td>
                            <td>Rp.
                                <?php echo number_format($items['subtotal'], 0, ',', '.') ?>
                            </td>
                           
                            <td>
                                <a href="<?php echo base_url('Keranjang/hapus_keranjang_id/' . $items['rowid']) ?>">
                                    <i class="fa-solid fa-trash text-danger fa-lg" style="cursor: pointer;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <td class="text-white bg-secondary" colspan="4">Total</td>
                    <td class="text-white bg-secondary" colspan="2">Rp.
                        <?php echo number_format($this->cart->total(), 0, ',', '.') ?>
                    </td>
                <tbody>
            </table>
        </div>
        <div class="col-lg-12 p-2">
            <div align="right ">
                <a href="<?php echo base_url('keranjang/hapus_keranjang') ?>">
                    <div class="btn btn-sm btn-danger mb-1">Hapus Keranjang</div>
                </a>
                <a href="<?php 
                 if ($this->session->userdata('role_id') == 2) {
                    echo base_url('pembayaran');

                 }  else {
                    echo base_url('auth');
                 }     ?>">
                    <div class="btn btn-sm btn-success mb-1">Pembayaran</div>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function update_qty() {
        var jumlah_qty = document.getElementById('qty').value;
        var product_id = document.getElementById('p_id').value;

        var getLink = "<?php echo base_url('keranjang/update_qty'); ?>";

        if (jumlah_qty == "") {
            console.log(jumlah_qty);
        } else {
            document.location.href = getLink + '/' + product_id + '/' + jumlah_qty;
        }
    }
    function tambah_qty() {
        var jumlah_qty = document.getElementById('qty').value;
        var product_id = document.getElementById('p_id').value;
        var hasil = Number(jumlah_qty) + 1;
        var getLink = "<?php echo base_url('keranjang/update_qty'); ?>";

        if (jumlah_qty == "") {
            console.log("asasa");
        } else {
            document.location.href = getLink + '/' + product_id + '/' + hasil;
        }
    }
    function kurang_qty() {
        var jumlah_qty = document.getElementById('qty').value;
        var product_id = document.getElementById('p_id').value;
        var hasil = Number(jumlah_qty) - 1;
        var getLink = "<?php echo base_url('keranjang/update_qty'); ?>";

        if (jumlah_qty == "") {
            console.log("asasa");
        } else if (jumlah_qty == 0) {
            console.log("gabole nol")
        }

        else {
            document.location.href = getLink + '/' + product_id + '/' + hasil;
        }
    }
</script>