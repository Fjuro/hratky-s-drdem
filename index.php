<?php
session_start();
require 'includes/database.php';

include('includes/header.php');
?>

<!-- Header -->
<header>
  <div class="page-header min-vh-100">
    <div class="oblique position-absolute top-0 h-100 d-md-block d-none">
      <!-- <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url(./assets/img/curved-images/curved11.jpg)"></div> -->
      <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url(https://i.ibb.co/SBp61pV/IMG-20210527-172857663-2.jpg)"></div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-7 d-flex justify-content-center flex-column">
          <h1 class="text-gradient text-warning">Vítej na webu</h1>
          <h1 class="mb-4">Hrátek s Drdem</h1>
          <p class="lead pe-5 me-5">Jsme drobné fotbalové sdružení které se v případě času a dobrého počasí schází den co den, aby si zahráli.</p>
          <div class="buttons">
            <a href="#articles" type="button" class="btn bg-gradient-warning mt-4">Články</a>
            <a href="about.php" type="button" class="btn text-warning shadow-none mt-4">O nás</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- End Header -->
<div class="p-3" id="articles"></div>
<main>
<!-- Articles -->
<?php
$query = "SELECT * FROM articles ORDER BY `id` DESC";
$query_run = mysqli_query($connection, $query);

if(mysqli_num_rows($query_run) > 0)
{
  while($row = mysqli_fetch_assoc($query_run))
{
?>
  <div class="container shadow-sm p-3 mb-5" style="border-radius: 10px">
    <h3><?php echo $row['title']; ?>
    </h3>
    <p><small><?php $phpdate = strtotime( $row['date'] ); echo $mysqldate = date( 'd.m.Y', $phpdate ); ?></small>
    </p>
    <p><?php echo $row['content']; ?></p>
    <div>
      <!-- LikeBtn.com BEGIN -->
      <span class="likebtn-wrapper" data-lang="cs" data-i18n_like="Líbí se mi" data-ef_voting="push" data-identifier="<?php echo $row['title']; ?>" data-share_enabled="false" data-lazy_load="true" data-loader_show="true"></span>
      <script>(function(d,e,s){if(d.getElementById("likebtn_wjs"))return;a=d.createElement(e);m=d.getElementsByTagName(e)[0];a.async=1;a.id="likebtn_wjs";a.src=s;m.parentNode.insertBefore(a, m)})(document,"script","//w.likebtn.com/js/w/widget.js");</script>
      <!-- LikeBtn.com END -->
    </div>
  </div>
<?php
  }
}
else {
  echo '<div class="container ps-3 pe-3"><div class="alert alert-danger" role="alert" style="color: white">Nebyly nalezeny žádné články</div></div>';
}
?>
<!-- End Articles -->
</main>
<?php
include('includes/footer.php');
?>