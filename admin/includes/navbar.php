       <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="img/logo.png" style="width: 35px">
                </div>
                <div class="sidebar-brand-text mx-3">Administrace</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Přehled</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Nastavení
            </div>

            <!-- Nav Item - Articles -->
            <li class="nav-item">
                <a class="nav-link" href="articles.php">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Články</span></a>
            </li>

            <!-- Nav Item - Accounts -->
            <li class="nav-item">
                <a class="nav-link" href="accounts.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Účty</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Ostatní
            </div>

            <!-- Nav Item - Gallery -->
            <li class="nav-item">
                <a class="nav-link" href="gallery.php">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Galerie</span></a>
            </li>

            <!-- Nav Item - About -->
            <li class="nav-item">
                <a class="nav-link" href="stats.php">
                    <i class="fa-solid fa-bars-staggered"></i>
                    <span>Statistiky</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <a href="/" type="button" class="btn btn-primary" target="_blank">Přejít na web</a>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                    <img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Odhlásit se
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Opravdu se chcete odhlásit?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pro ukončení této relace klikněte na Odhlásit se níže.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Zrušit</button>
                    <form action="logout.php" method="post">
                      <button type="submit" name="logout_button" class="btn btn-primary">Odhlásit se</button>
                    </form>
                </div>
            </div>
        </div>
    </div>