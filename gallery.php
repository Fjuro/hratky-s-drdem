<?php
session_start();
require 'includes/database.php';

include('includes/header.php');
?>
<div style="margin-top: 120px" id="content"></div>
<main>

<div class="photo-gallery">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Galerie</h2>
            <p class="text-center">Fotky z hrátek, utkání, školních akcí a mnoha dalších</p>
        </div>
        <div class="row photos">
          <?php
          $query = "SELECT * FROM gallery ORDER BY `id`";
          $query_run = mysqli_query($connection, $query);

          if(mysqli_num_rows($query_run) > 0)
          {
            while($row = mysqli_fetch_assoc($query_run))
          {
          ?>
            <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="<?php echo $row['image']; ?>" data-lightbox="photos"><img class="img-fluid" src="<?php echo $row['image']; ?>"></a></div>
          <?php
            }
          }
          else {
            echo '<div class="container ps-3 pe-3"><div class="alert alert-danger" role="alert" style="color: white">Nebyly nalezeny žádné články</div></div>';
          }
          ?>
        </div>
    </div>
</div>
  
</main>
<?php
include('includes/footer.php');
?>