<?php
session_start();
include('includes/login.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Úprava obrázku</h1>
  <div class="mb-4"></div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Úprava obrázku</h6>
    </div>
    <div class="card-body">
        <?php
          if(isset($_SESSION['success']) && $_SESSION['success'] !='')
          {
            echo '<div class="card mb-4 py-3 border-left-success"><div class="card-body"> '.$_SESSION['success'].' </div></div>';
            unset($_SESSION['success']);
          }

          if(isset($_SESSION['status']) && $_SESSION['status'] !='')
          {
            echo '<div class="card mb-4 py-3 border-left-danger"><div class="card-body"> '.$_SESSION['status'].' </div></div>';
            unset($_SESSION['status']);
          }
        ?>
      <form action="server.php" method="POST">
        <div class="modal-body">
          <?php
            require 'includes/database.php';

            if(isset($_POST['edit_gallery']))
            {
              $id = $_POST['edit_gallery_id'];
            
              $query = "SELECT * FROM gallery WHERE id='$id'";
              $query_run = mysqli_query($connection, $query);

              foreach($query_run as $row)
              {
                ?>
            <input type="hidden" name="edit_gallery_id" value="<?php echo $row['id']?>">
            <div class="form-group">
                <label>Adresa obrázku</label>
                <input type="text" name="edit_image" value="<?php echo $row['image']?>" class="form-control" >
            </div>
            <?php
              }
            }
          ?>
        </div>
        <div class="modal-footer">
            <a href="gallery.php"><button type="button" class="btn btn-warning" data-dismiss="modal">Zrušit</button></a>
            <button type="submit" name="updategallery" class="btn btn-success">Uložit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>