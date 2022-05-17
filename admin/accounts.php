<?php
session_start();
include('includes/login.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="accountCreate" tabindex="-1" role="dialog" aria-labelledby="accountCreateLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="accountCreateLabel">Přidat účet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Account creation form -->
      <form action="server.php" method="POST">
        <div class="modal-body">
            <div class="form-group">
                <label>Jméno<br><small>Max 24 znaků</small></label>
                <input type="text" name="username" class="form-control" >
            </div>
            <div class="form-group">
                <label>Heslo<br><small>Max 256 znaků</small></label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Potvrdit heslo</label>
                <input type="password" name="confirmpassword" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zrušit</button>
            <button type="submit" name="createaccount" class="btn btn-primary">Přidat</button>
        </div>
      </form>
      <!-- End of form -->
    </div>
  </div>
</div>
<div class="container-fluid">

  
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Účty</h1>
  <div class="mb-4"></div>

  <!-- DataTables Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#accountCreate">
              Přidat účet
            </button>
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

              $query = "SELECT * FROM users";
              $query_run = mysqli_query($connection, $query);
            ?>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Jméno</th>
                          <th>Heslo</th>
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
                          <td><?php echo $row['username']; ?></td>
                          <td><?php echo $row['password']; ?></td>
                          <td style="text-align: center">
                            <form action="accedit.php" method="post">
                              <input type="hidden" name="edit_account_id" value="<?php echo $row['id']; ?>">
                              <button type="submit" name="edit_account" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                            </form>
                          </td>
                          <td style="text-align: center">
                            <form action="server.php" method="post">
                              <input type="hidden" name="delete_account_id" value="<?php echo $row['id']; ?>">
                              <button type="submit" name="delete_account" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                          </td>
                      </tr>
                      <?php
                          }
                        }
                        else {
                          echo "Nebyl nalezen žádný uživatel";
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