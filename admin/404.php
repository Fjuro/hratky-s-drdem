<?php
session_start();
include('includes/login.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Stránka nenalezena</p>
        <p class="text-gray-500 mb-0">Vypadá to, že tahle stránka je ještě v přípravě...</p>
        <a href="" onclick="window.history.back()">&larr; Chci zpět</a>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>