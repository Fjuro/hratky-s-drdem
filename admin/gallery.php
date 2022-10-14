<?php
session_start();
include('includes/login.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Galerie</h1>
  <div class="mb-4"></div>

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">
            <a href="gallerycreate.php" type="button" class="btn btn-primary">
              Přidat obrázek
            </a>
          </h6>
      </div>
      <div class="card-body">
        <?php
          if(isset($_SESSION['success']) && $_SESSION['success'] !='')
          {
            echo '<div class="alert alert-success" role="alert"> '.$_SESSION['success'].' </div>';
            unset($_SESSION['success']);
          }

          if(isset($_SESSION['status']) && $_SESSION['status'] !='')
          {
            echo '<div class="alert alert-danger" role="alert"> '.$_SESSION['status'].' </div>';
            unset($_SESSION['status']);
          }
        ?>
          <div class="table-responsive">
            <?php
              require 'includes/database.php';

              $query = "SELECT * FROM gallery";
              $query_run = mysqli_query($connection, $query);
            ?>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Název</th>
                          <th>Adresa obrázku</th>
                          <th>Upravit</th>
                          <th>Odstranit</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                      if(mysqli_num_rows($query_run) > 0)
                      {
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                    ?>
                      <tr>
                          <td><?php echo $row['id']; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['image']; ?></td>
                          <td style="text-align: center">
                            <form action="galleryedit.php" method="post">
                              <input type="hidden" name="edit_gallery_id" value="<?php echo $row['id']; ?>">
                              <button type="submit" name="edit_gallery" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            </form>
                          </td>
                          <td style="text-align: center">
                            <form action="server.php" method="post">
                              <input type="hidden" name="delete_gallery_id" value="<?php echo $row['id']; ?>">
                              <button type="submit" name="delete_gallery" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                          </td>
                      </tr>
                      <?php
                          }
                        }
                        else {
                          echo '<div class="alert alert-danger" role="alert">Nebyla nalezena žádná položka</div>';
                        }
                      ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>