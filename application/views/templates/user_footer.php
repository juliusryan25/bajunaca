<!-- Footer -->
<style>
    .sf {
        /* box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset; */
    }

    .menu_footer {
        width: 25%;
        height: 50px;
        text-align: center;
        margin: 10px auto;
        border-radius: 10px;
        color: #D1D3E2;
        /* background: blue; */

    }

    .aktif-menu {
        cursor: pointer;
        background-color: #EBEBEF;
        color: #4E73DF;
    }

    .menu_footer:hover {
        cursor: pointer;
        background-color: #EBEBEF;
        color: #4E73DF;
    }
</style>

<footer class="fixed-bottom w-100 bg-light sf shadow">
    <?php if ($this->session->userdata('role_id') == 2) { ?>
        <div class="container my-auto">
            <div class="row">
                <a href="<?= base_url() ?>user" class="menu_footer" id="menu_etalase">
                    <i class="mt-3   fa-solid fa-fw fa-lg fa-house"></i>
                </a>
                <!-- <a id="menu_footer">
                    <i class="mt-3 fa-solid fa-fw fa-lg fa-heart"></i>
                </a> -->
                <a href="<?= base_url() ?>Keranjang" class="menu_footer" id="menu_keranjang">
                    <?php
                    $total_items = $this->cart->total_items();

                    if ($total_items > 0) { ?>
                        <i class="mt-3 fa-solid fa-fw fa-lg fa-cart-shopping"></i>
                        <small style="position: relative;top: -10px;left: -15px;">
                            <span class="mt-0 badge badge-primary badge-counter">
                                <?php echo count($this->cart->contents()); ?>
                            </span>
                        </small>

                    <?php } else { ?>
                        <i class="mt-3 fa-solid fa-fw fa-lg fa-cart-shopping"></i>
                    <?php } ?>
                </a>
                <a href="<?= base_url() ?>user/profile" class="menu_footer" id="menu_profile">
                    <i class="mt-3 fa-solid fa-fw fa-lg fa-user"></i>
                </a>
            </div>
        </div>
    <?php } else { ?>
        <footer class="fixed-bottom w-100 bg-light sf shadow">
            <div class="container my-auto">
                <div class="row">
                    <a href="<?= base_url() ?>bajunaca" class="menu_footer" id="menu_etalase">
                        <i class="mt-3   fa-solid fa-fw fa-lg fa-house"></i>
                    </a>
                    <!-- <a id="menu_footer">
                        <i class="mt-3 fa-solid fa-fw fa-lg fa-heart"></i>
                    </a> -->
                    <a href="<?= base_url() ?>Keranjang" class="menu_footer" id="menu_keranjang">
                        <?php
                        $total_items = $this->cart->total_items();

                        if ($total_items > 0) { ?>
                            <i class="mt-3 fa-solid fa-fw fa-lg fa-cart-shopping"></i>
                            <small style="position: relative;top: -10px;left: -15px;">
                                <span class="mt-0 badge badge-primary badge-counter">
                                    <?php echo count($this->cart->contents()); ?>
                                </span>
                            </small>

                        <?php } else { ?>
                            <i class="mt-3 fa-solid fa-fw fa-lg fa-cart-shopping"></i>
                        <?php } ?>
                    </a>
                    <a href="<?= base_url() ?>auth" class="menu_footer" id="menu_profile">
                        <i class="mt-3 fa-solid fa-fw fa-lg fa-user"></i>
                    </a>
                </div>
            </div>
        </footer>
    <?php }
    ?>
</footer>

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= base_url() ?>auth/logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

</body>
<script>
    var title = '<?= $title ?>';
    console.log(title);
    if (title == "Bajunaca" | title == "Detail Product") {
        $('#menu_etalase').toggleClass('aktif-menu');

    }
    else if (title == "Keranjang") {
        $('#menu_keranjang').toggleClass('aktif-menu');

    }
    else if (title == "Profile") {
        $('#menu_profile').toggleClass('aktif-menu');

    }
    else if (title == "Peminjaman") {
        $('#nav-peminjaman-aktif').toggleClass('active');

    }
</script>

</html>