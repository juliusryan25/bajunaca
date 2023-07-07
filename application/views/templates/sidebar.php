
<!-- Sidebar -->
<ul class="navbar-nav sidebar bg-primary sidebar-dark accordion toggled"  id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center " href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sibizathrift</div>
    </a>
    <!-- <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-duotone fa-list"></i>
            <span>Dashboard</span></a>
    </li> -->


    <!-- Divider -->
    <hr class="sidebar-divider ">

    <div class="sidebar-heading">
        <?php
        if ($this->session->userdata('role_id') == 1) {
            echo 'Admin';
        } else if (($this->session->userdata('role_id') == 2)) {
            echo 'User';
        } else {
            echo 'Seller';
        }
        ?>
    </div>

    <?php
    $menuId = $this->session->userdata('role_id');
    $querySubMenu = "SELECT *
                        FROM `user_sub_menu`
                        JOIN `user_role`
                        ON `user_sub_menu`.`menu_id` = `user_role`.`id`
                        WHERE `user_sub_menu`.`menu_id` = $menuId
                        AND `user_sub_menu`.`is_active` = 1
        ";
    $subMenu = $this->db->query($querySubMenu)->result_array();
    ?>
    <?php foreach ($subMenu as $sm): ?>
        <?php if ($title == $sm['title']): ?>
                <li class="nav-item active">
            <?php else: ?>
                <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link" href="<?= base_url($sm['url']) ?>">
                <i class="<?= $sm['icon'] ?>"></i>
                <span>
                    <?= $sm['title'] ?>
                </span></a>
        </li>
    <?php endforeach ?>



    <!-- Nav Item - Dashboard -->



    <!-- Nav Item - Charts -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-duotone fa-user"></i>
            <span>Data users</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->